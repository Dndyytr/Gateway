<div class="mx-3 mb-1 flex items-center justify-between gap-1">
    <div
        class="flex items-center gap-1 text-[.65rem] font-medium text-stone-700 bp360:text-[.7rem] bp400:text-xs xl:text-sm 2xl:text-base"
    >
        <label for="custom-length">Show:</label>
        <select
            id="custom-length"
            class="cursor-pointer rounded-xs px-2 py-1 shadow-[0_0_2px_rgba(0,0,0,0.5)] transition-all duration-300 ease-in-out focus:outline-warnaBiruTua"
        >
            <option
                value="2"
                class="transition-all duration-300 ease-in-out checked:bg-warnaBiruTua checked:text-white"
            >
                2
            </option>
            <option
                value="5"
                class="transition-all duration-300 ease-in-out checked:bg-warnaBiruTua checked:text-white"
                selected
            >
                5
            </option>
            <option
                value="10"
                class="transition-all duration-300 ease-in-out checked:bg-warnaBiruTua checked:text-white"
            >
                10
            </option>
            <option
                value="15"
                class="transition-all duration-300 ease-in-out checked:bg-warnaBiruTua checked:text-white"
            >
                15
            </option>
            <option
                value="20"
                class="transition-all duration-300 ease-in-out checked:bg-warnaBiruTua checked:text-white"
            >
                20
            </option>
            <option
                value="25"
                class="transition-all duration-300 ease-in-out checked:bg-warnaBiruTua checked:text-white"
            >
                25
            </option>
        </select>
        <span>entries</span>
    </div>
    <div
        class="flex flex-col items-center gap-1 text-[.65rem] font-medium text-stone-700 bp360:flex-row bp360:text-[.7rem] bp400:text-xs xl:text-sm 2xl:text-base"
    >
        <label for="custom-search">Search:</label>
        <input
            type="search"
            name="custom-search"
            id="custom-search"
            class="shadow-input w-full rounded-xs px-2 py-1 outline-2 outline-transparent transition-all duration-300 ease-in-out focus:outline-warnaBiruTua"
            placeholder="Search..."
        />
    </div>
</div>
<div
    x-data="{
        showUploadInvoice: false,
        invoiceURL: '',

        openUploadInvoice(url) {
            this.invoiceURL = url
            this.showUploadInvoice = true
        },

        closeUploadInvoice() {
            this.showUploadInvoice = false
            this.invoiceURL = ''
        },

        changeStatus(shipmentNumber, newStatus) {
            fetch('{{ route('commercial-invoice.updateStatus') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
                body: JSON.stringify({ shipmentNumber, status: newStatus }),
            })
                .then((response) => response.json())
                .then((data) => {
                    if (data.success) {
                        window.location.reload() // Refresh halaman untuk memperbarui status
                    }
                })
        },

        isMd: false,
        is1650: false,
        isCollapsed: $store.navbar.isCollapsed,
        delayedClass: '',

        updateSize() {
            this.isMd = window.innerWidth >= 768
            this.is1650 = window.innerWidth >= 1650
            this.applyClassConditionally()
        },

        applyClassConditionally() {
            if (this.isMd && ! this.is1650) {
                if (this.isCollapsed) {
                    setTimeout(() => {
                        this.delayedClass =
                            'md:px-0 md:mx-3 md:max-w-[95vw] lg:max-w-[90vw] xl:max-w-[92vw] 2xl:max-w-[93vw]'
                    }, 200)
                } else {
                    this.delayedClass =
                        'md:px-0 md:mx-3 md:max-w-[95vw] lg:max-w-[74vw] xl:max-w-[78vw] 2xl:max-w-[81vw]'
                }
            } else {
                this.delayedClass = ''
            }
        },
    }"
    x-init="
        updateSize()
        window.addEventListener('resize', () => updateSize())
    "
    x-effect="
        isCollapsed = $store.navbar.isCollapsed
        applyClassConditionally()
    "
    :class="delayedClass"
    class="bpHeight-6 w-full overflow-auto px-3 pt-1"
>
    <table
        x-data="{
            isMd: false,
            is1650: false,
            updateSize() {
                this.isMd = window.innerWidth >= 768
                this.is1650 = window.innerWidth >= 1650
            },
        }"
        x-init="
            updateSize()
            window.addEventListener('resize', () => updateSize())
        "
        :class="isMd && !is1650 ? 'md:w-max' : 'table-fixed'"
        id="commercial-invoice-table"
        class="table-data"
    >
        <thead>
            <tr>
                <th :class="{'md:w-full': is1650}" class="pr-5">Quote Type</th>
                <th :class="{'md:w-full': is1650}" class="pr-5">Shipment Number</th>
                <th :class="{'md:w-full': is1650}" class="pr-5">Shipment Date</th>
                <th :class="{'md:w-full': is1650}" class="pr-5">Quote Number</th>
                <th :class="{'md:w-full': is1650}" class="pr-5">Quote Date</th>
                <th :class="{'md:w-[70%]': is1650}" class="pr-5">Type of Trade</th>
                <th :class="{'md:w-full': is1650}" class="pr-5">Invoice</th>
                <th :class="{'md:w-full': is1650}" class="pr-5">Status</th>
                <th :class="{'md:w-full': is1650}">#</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>

    {{-- upload invoice --}}
    <div
        x-show="showUploadInvoice"
        x-cloak
        x-transition:enter="transition duration-800 ease-out"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition duration-800 ease-in"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-99999999 grid h-screen w-full place-items-center bg-[rgba(0,0,0,0.6)] p-2"
    >
        <form
            x-data="{
                invoiceFile: false,
                checkInvoiceFile(event) {
                    this.invoiceFile = event.target.files.length > 0
                },
            }"
            x-show="showUploadInvoice"
            x-cloak
            x-transition:enter="transition duration-800 ease-out"
            x-transition:enter-start="-translate-y-[100%] opacity-0"
            x-transition:enter-end="translate-y-0 opacity-100"
            x-transition:leave="transition duration-800 ease-in"
            x-transition:leave-start="translate-y-0 opacity-100"
            x-transition:leave-end="-translate-y-[100%] opacity-0"
            :action="invoiceURL"
            method="POST"
            enctype="multipart/form-data"
            class="w-full max-w-[40rem] rounded-sm bg-white font-medium shadow-[0_0_4px_0.4px_rgba(0,0,0,0.5)]"
        >
            @csrf
            <div
                class="m-3 flex items-center justify-between text-sm text-stone-700 bp400:text-base bp575:text-lg xl:text-xl 2xl:text-2xl"
            >
                <legend>Upload Invoicing</legend>
                <button
                    type="button"
                    x-on:click="closeUploadInvoice"
                    class="cursor-pointer text-[1.5em] transition-all duration-300 ease-in-out hover:text-stone-500"
                >
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
            <hr class="border-t-[1.5px] text-stone-300" />
            <div class="m-3 flex flex-col gap-2 text-xs bp400:text-sm bp575:text-base xl:text-lg 2xl:text-xl">
                <label for="upload-invoicing" class="text-stone-700">Upload Invoicing</label>
                <input
                    type="file"
                    id="upload-invoicing"
                    name="upload-invoicing"
                    x-on:change="checkInvoiceFile"
                    :class="invoiceFile ? 'outline-warnaBiruTua' : 'outline-transparent'"
                    class="input-file bg-white text-stone-700 shadow-[0_0_2px_0.1px_rgba(0,0,0,0.5)] file:p-[6px]"
                />
            </div>
            <div
                class="m-3 flex flex-col gap-2 text-xs text-stone-700 bp400:text-sm bp575:text-base xl:text-lg 2xl:text-xl"
            >
                <label for="rule">Rule</label>
                <select
                    id="rule"
                    name="rule"
                    class="w-full appearance-none rounded-sm p-[6px] shadow-[0_0_2px_0.1px_rgba(0,0,0,0.5)] outline-2 outline-transparent transition-all duration-300 ease-in-out focus:outline-warnaBiruTua"
                >
                    <option class="checked:bg-warnaBiruTua checked:text-white">- Choose -</option>
                    <option class="checked:bg-warnaBiruTua checked:text-white" value="partial_payment">
                        Partial Payment (Sebagian diawal sebagian diakhir)
                    </option>
                    <option class="checked:bg-warnaBiruTua checked:text-white" value="termin">
                        Termin (+7 hari atau +30 hari setelah kerjaan selesai)
                    </option>
                    <option class="checked:bg-warnaBiruTua checked:text-white" value="cash_in_advance">
                        Cash In Advance (100% diawal)
                    </option>
                </select>
            </div>
            <div
                class="m-3 mb-6 flex flex-col gap-2 text-xs text-stone-700 bp400:text-sm bp575:text-base xl:text-lg 2xl:text-xl"
            >
                <label for="remark">Remark</label>
                <input
                    type="text"
                    id="remark"
                    name="remark"
                    class="shadow-input w-full rounded-sm p-[6px] outline-2 outline-transparent transition-all duration-300 ease-in-out focus:outline-warnaBiruTua"
                />
            </div>
            <hr class="border-t-[1.5px] text-stone-300" />
            <div
                class="m-3 flex justify-end gap-2 text-xs text-white bp400:text-sm bp575:text-base xl:text-lg 2xl:text-xl"
            >
                <button
                    type="button"
                    x-on:click="closeUploadInvoice"
                    class="cursor-pointer rounded-sm bg-warnaAbu3 px-3 py-1 transition-all duration-300 ease-in-out hover:bg-stone-400"
                >
                    Close
                </button>
                <button
                    class="cursor-pointer rounded-sm bg-warnaBiruTua px-3 py-1 transition-all duration-300 ease-in-out hover:bg-blue-500"
                    type="submit"
                >
                    Upload
                </button>
            </div>
        </form>
    </div>
</div>
<!-- Pagination -->
<div
    class="mx-3 flex flex-col items-center justify-between gap-2 py-2 text-[.65rem] bp360:text-[.7rem] bp400:text-xs md:flex-row xl:text-sm 2xl:text-base"
>
    <div id="custom-info" class="text-stone-700"></div>
    <div id="custom-pagination" class="flex items-center gap-2"></div>
</div>

<script defer>
    // Fungsi debounce untuk membatasi pemanggilan event
    function debounce(func, wait) {
        let timeout;
        return function executedFunction(...args) {
            const context = this; // Simpan konteks this
            const later = () => {
                clearTimeout(timeout);
                func.apply(context, args); // Gunakan apply untuk mempertahankan this
            };
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
        };
    }

    document.addEventListener('DOMContentLoaded', function () {
        $(document).ready(function () {
            // Inisialisasi Alpine.js untuk size handling
            Alpine.data('sizeHandler', () => ({
                isMd: false,
                is1650: false,
                updateSize() {
                    this.isMd = window.innerWidth >= 768;
                    this.is1650 = window.innerWidth >= 1650;
                },
                init() {
                    this.updateSize();
                    window.addEventListener(
                        'resize',
                        debounce(() => this.updateSize(), 100),
                    );
                },
            }));

            if ($('#commercial-invoice-table').length) {
                const initialPageLength = parseInt($('#custom-length').val()) || 10; // Fallback jika #custom-length tidak ada
                const table = $('#commercial-invoice-table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url: '{{ route('commercial-invoice.data') }}',
                        type: 'POST', // Ubah ke POST
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'), // Sertakan CSRF token
                        },
                    },
                    columns: [
                        { data: 'quoteType', name: 'quoteType' },
                        { data: 'shipmentNumber', name: 'shipmentNumber' },
                        { data: 'shipmentDate', name: 'shipmentDate' },
                        { data: 'quoteNumber', name: 'quoteNumber' },
                        { data: 'quoteDate', name: 'quoteDate' },
                        { data: 'typeOfTrade', name: 'typeOfTrade' },
                        { data: 'invoice', name: 'invoice' },
                        {
                            data: 'status',
                            name: 'status',
                            createdCell: function (td, cellData, rowData, row, col) {
                                $(td).addClass('flex flex-wrap md:table-cell');
                            },
                        },
                        {
                            data: 'actions',
                            name: 'actions',
                            orderable: false,
                            searchable: false,
                            createdCell: function (td, cellData, rowData, row, col) {
                                $(td).addClass('flex flex-wrap gap-1 md:table-cell');
                            },
                        },
                    ],
                    dom: 't',
                    paging: true,
                    searching: true,
                    pageLength: initialPageLength,
                    info: true,
                    autoWidth: false,
                    deferRender: true,
                    responsive: false,
                    scrollX: false,
                    ordering: true,
                    lengthChange: false,

                    createdRow: function (row, data, dataIndex) {
                        const headers = $('#commercial-invoice-table thead th')
                            .map(function () {
                                return $(this).text().trim();
                            })
                            .get();

                        $(row)
                            .find('td')
                            .each(function (index) {
                                $(this).attr('data-cell', headers[index]);
                            });
                    },

                    drawCallback: function (settings) {
                        const info = table.page.info();
                        $('#custom-info').text(
                            `Showing ${info.start + 1} to ${info.end} of ${info.recordsTotal} entries`,
                        );

                        const $pagination = $('#custom-pagination');
                        $pagination.empty();

                        if (info.pages <= 1) {
                            $pagination.hide();
                        } else {
                            $pagination.show();

                            const $prev = $('<button>')
                                .text('Previous')
                                .addClass(
                                    !info.page
                                        ? 'inline-flex cursor-not-allowed items-center font-medium text-stone-500'
                                        : 'inline-flex cursor-pointer items-center font-medium text-stone-700 transition-all duration-300 ease-in-out hover:text-stone-400',
                                )
                                .prop('disabled', !info.page)
                                .on('click', function () {
                                    if (info.page > 0) {
                                        table.page('previous').draw('page');
                                    }
                                });
                            $pagination.append($prev);

                            const $pageButtonsContainer = $('<div>').addClass('flex gap-1');

                            const maxButtons = 2;
                            const currentPage = info.page + 1;
                            const totalPages = info.pages;
                            const halfButtons = Math.floor(maxButtons / 2);

                            let startPage, endPage;

                            if (totalPages <= maxButtons) {
                                startPage = 1;
                                endPage = totalPages;
                            } else {
                                if (currentPage <= halfButtons + 1) {
                                    startPage = 1;
                                    endPage = maxButtons - 1;
                                } else if (currentPage >= totalPages - halfButtons) {
                                    startPage = totalPages - (maxButtons - 2);
                                    endPage = totalPages;
                                } else {
                                    startPage = currentPage - halfButtons;
                                    endPage = currentPage + halfButtons - 1;
                                }
                            }

                            if (startPage > 1) {
                                const $firstPage = $('<button>')
                                    .text(1)
                                    .addClass(
                                        'inline-flex items-center rounded-xs px-[10px] py-[1px] font-medium ' +
                                            (currentPage === 1
                                                ? 'bg-stone-400 text-stone-900 shadow-[0_0_3px_0.4px_rgba(0,0,0,0.6)]'
                                                : 'bg-white cursor-pointer text-stone-700 shadow-[0_0_3px_0.4px_rgba(0,0,0,0.6)] transition-all duration-300 ease-in-out hover:bg-stone-400'),
                                    )
                                    .on('click', function () {
                                        table.page(0).draw('page');
                                    });
                                $pageButtonsContainer.append($firstPage);

                                if (startPage > 2) {
                                    $pageButtonsContainer.append(
                                        $('<span>').text('...').addClass('inline-flex items-center text-stone-700'),
                                    );
                                }
                            }

                            for (let i = startPage; i <= endPage; i++) {
                                const $page = $('<button>')
                                    .text(i)
                                    .addClass(
                                        'inline-flex items-center rounded-xs px-[10px] py-[1px] font-medium ' +
                                            (currentPage === i
                                                ? 'bg-stone-400 text-stone-900 shadow-[0_0_3px_0.4px_rgba(0,0,0,0.6)]'
                                                : 'bg-white cursor-pointer text-stone-700 shadow-[0_0_3px_0.4px_rgba(0,0,0,0.6)] transition-all duration-300 ease-in-out hover:bg-stone-400'),
                                    )
                                    .on('click', function () {
                                        table.page(i - 1).draw('page');
                                    });
                                $pageButtonsContainer.append($page);
                            }

                            if (endPage < totalPages) {
                                if (endPage < totalPages - 1) {
                                    $pageButtonsContainer.append(
                                        $('<span>').text('...').addClass('inline-flex items-center text-stone-700'),
                                    );
                                }

                                const $lastPage = $('<button>')
                                    .text(totalPages)
                                    .addClass(
                                        'inline-flex items-center rounded-xs px-[10px] py-[1px] font-medium ' +
                                            (currentPage === totalPages
                                                ? 'bg-stone-400 text-stone-900 shadow-[0_0_3px_0.4px_rgba(0,0,0,0.6)]'
                                                : 'bg-white cursor-pointer text-stone-700 shadow-[0_0_3px_0.4px_rgba(0,0,0,0.6)] transition-all duration-300 ease-in-out hover:bg-stone-400'),
                                    )
                                    .on('click', function () {
                                        table.page(totalPages - 1).draw('page');
                                    });
                                $pageButtonsContainer.append($lastPage);
                            }

                            $pagination.append($pageButtonsContainer);

                            const $next = $('<button>')
                                .text('Next')
                                .addClass(
                                    info.page >= info.pages - 1
                                        ? 'inline-flex cursor-not-allowed items-center font-medium text-stone-500'
                                        : 'inline-flex cursor-pointer items-center font-medium text-stone-700 transition-all duration-300 ease-in-out hover:text-stone-400',
                                )
                                .prop('disabled', info.page >= info.pages - 1)
                                .on('click', function () {
                                    if (info.page < info.pages - 1) {
                                        table.page('next').draw('page');
                                    }
                                });
                            $pagination.append($next);
                        }

                        if (table.rows({ search: 'applied' }).count() === 0) {
                            const $tbody = $('#commercial-invoice-table tbody');
                            $tbody.empty();
                            $tbody.append(
                                $('<tr>').append(
                                    $('<td>')
                                        .attr('colspan', table.columns().count())
                                        .attr('data-cell', 'No Data')
                                        .text('No Data To Showing'),
                                ),
                            );
                        }
                    },
                    initComplete: function () {
                        $('table#commercial-invoice-table colgroup').remove();
                        $('#commercial-invoice-table_wrapper #commercial-invoice-table_processing').remove();

                        if (table.rows().count() === 0) {
                            const $tbody = $('#commercial-invoice-table tbody');
                            $tbody.empty();
                            $tbody.append(
                                $('<tr>').append(
                                    $('<td>')
                                        .attr('colspan', table.columns().count())
                                        .attr('data-cell', 'No Data')
                                        .text('No Data To Showing'),
                                ),
                            );
                        }
                    },
                });

                // Pastikan elemen #custom-search ada sebelum mengikat event
                const $customSearch = $('#custom-search');
                if ($customSearch.length) {
                    $customSearch.on(
                        'input',
                        debounce(function () {
                            const searchValue = $(this).val() || ''; // Fallback ke string kosong jika undefined
                            table.search(searchValue).draw();
                        }, 300),
                    );
                } else {
                    console.warn('Element #custom-search not found in DOM');
                }

                // Pastikan elemen #custom-length ada sebelum mengikat event
                const $customLength = $('#custom-length');
                if ($customLength.length) {
                    $customLength.on('change', function () {
                        const length = parseInt($(this).val()) || 10; // Fallback ke 10 jika undefined
                        table.page.len(length).draw();
                    });
                } else {
                    console.warn('Element #custom-length not found in DOM');
                }
            }
        });
    });
</script>
