<div class="w-full px-3">
    <div
        class="flex w-full overflow-x-auto rounded-[3px] text-center text-[.7rem] font-semibold shadow-[0_0_3px_0.3px_rgba(0,0,0,0.5)] bp400:text-xs bp575:text-sm 2xl:text-base"
    >
        <a
            class="w-full rounded-[3px] bg-warnaKuning px-3 py-1 text-warnaBiruTua transition-all duration-300 ease-in-out hover:bg-warnaBiruTua hover:text-white"
            href="/manage-shipment/pending"
        >
            PENDING
        </a>

        <a
            class="w-full rounded-[3px] bg-warnaKuning px-3 py-1 text-nowrap text-warnaBiruTua transition-all duration-300 ease-in-out hover:bg-warnaBiruTua hover:text-white"
            href="/manage-shipment/on-progress"
        >
            ON PROGRESS
        </a>

        <a
            class="w-full rounded-[3px] bg-warnaKuning px-3 py-1 text-nowrap text-warnaBiruTua transition-all duration-300 ease-in-out hover:bg-warnaBiruTua hover:text-white"
            href="/manage-shipment/completed"
        >
            COMPLETED
        </a>

        <a
            class="w-full rounded-[3px] bg-warnaKuning px-3 py-1 text-nowrap text-warnaBiruTua transition-all duration-300 ease-in-out hover:bg-warnaBiruTua hover:text-white"
            href="/manage-shipment/rejected"
        >
            REJECTED
        </a>
        <a
            class="w-full rounded-[3px] bg-warnaBiruTua px-3 py-1 text-nowrap text-white transition-all duration-300 ease-in-out hover:bg-warnaBiruTua hover:text-white"
            href=""
        >
            CANCEL
        </a>
    </div>
</div>

<div class="m-3 rounded-[3px] border-[1.5px] border-stone-300 px-3 py-2 font-medium">
    <div
        class="mb-4 flex justify-between gap-1 text-[.65rem] bp360:text-[.7rem] bp400:text-[.73rem] bp575:gap-[30%] bp575:text-xs xl:text-sm 2xl:text-base"
    >
        <div class="flex w-full flex-col gap-1 text-stone-700">
            <label for="type-of-quotation">Type of Quotation</label>
            <select
                class="w-full cursor-pointer rounded-xs px-1 py-[2px] shadow-[0_0_2px_rgba(0,0,0,0.5)] transition-all duration-300 ease-in-out focus:outline-warnaBiruTua"
                name="type-of-quotation"
                id="type-of-quotation"
            >
                <option class="checked:bg-warnaBiruTua checked:text-white" value="all">ALL</option>
                <option class="checked:bg-warnaBiruTua checked:text-white" value="full-container-load">
                    Full Container Load
                </option>
                <option class="checked:bg-warnaBiruTua checked:text-white" value="less-container-load">
                    Less Container Load
                </option>
                <option class="checked:bg-warnaBiruTua checked:text-white" value="non-container-shipment">
                    Non Container Shipment
                </option>
                <option class="checked:bg-warnaBiruTua checked:text-white" value="air-freight-shipment">
                    Air Freight Shipment
                </option>
                <option class="checked:bg-warnaBiruTua checked:text-white" value="charter-full-truck">
                    Charter Full Truck
                </option>
                <option class="checked:bg-warnaBiruTua checked:text-white" value="less-truck-load">
                    Less Truck Load
                </option>
                <option class="checked:bg-warnaBiruTua checked:text-white" value="custom-only">Custom Only</option>
            </select>
        </div>
        <div class="flex w-full flex-col gap-1 text-stone-700">
            <label for="custom-search">Search</label>
            <input
                class="shadow-input rounded-xs px-1 py-[2px] outline-2 outline-transparent transition-all duration-300 ease-in-out focus:outline-warnaBiruTua"
                type="search"
                name="custom-search"
                id="custom-search"
                placeholder="Search"
            />
        </div>
    </div>

    <div
        x-data="{
            showDeleteModal: false,
            deleteUrl: '',
            openDeleteModal(url) {
                this.deleteUrl = url
                this.showDeleteModal = true
            },
            closeDeleteModal() {
                this.showDeleteModal = false
                this.deleteUrl = ''
            },

            isMd: false,
            is2150: false,
            isCollapsed: $store.navbar.isCollapsed,
            delayedClass: '',
            updateSize() {
                this.isMd = window.innerWidth >= 768
                this.is2150 = window.innerWidth >= 2150
                this.applyClassConditionally()
            },

            applyClassConditionally() {
                if (this.isMd && ! this.is2150) {
                    if (this.isCollapsed) {
                        setTimeout(() => {
                            this.delayedClass =
                                'md:max-w-[95vw] lg:max-w-[88vw] xl:max-w-[90vw] 2xl:max-w-[91.5vw]'
                        }, 200)
                    } else {
                        this.delayedClass =
                            'md:max-w-[95vw] lg:max-w-[71vw] xl:max-w-[77vw] 2xl:max-w-[80vw]'
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
        class="bpHeight-4 w-full overflow-auto"
    >
        <table
            x-data="{
                isMd: false,
                is2150: false,
                updateSize() {
                    this.isMd = window.innerWidth >= 768
                    this.is2150 = window.innerWidth >= 2150
                },
            }"
            x-init="
                updateSize()
                window.addEventListener('resize', () => updateSize())
            "
            :class="isMd && !is2150 ? 'md:w-max' : 'table-fixed'"
            class="table-data"
            id="manage-shipment-cancel-table"
        >
            <thead>
                <tr>
                    <th :class="{'w-full': is2150}" class="pr-5">Quote Number</th>
                    <th :class="{'w-full': is2150}" class="pr-5">Quote Type</th>
                    <th :class="{'w-full': is2150}" class="pr-5">Quote Date</th>
                    <th :class="{'w-[70%]': is2150}" class="pr-5">Type of Trade</th>
                    <th :class="{'w-full': is2150}" class="pr-5">Origin Country</th>
                    <th :class="{'w-full': is2150}" class="pr-5">Origin City</th>
                    <th :class="{'w-full': is2150}" class="pr-5">Destination Country</th>
                    <th :class="{'w-full': is2150}" class="pr-5">Destination City</th>
                    <th :class="{'w-full': is2150}" class="pr-5">Shipping Instruction</th>
                    <th :class="{'w-full': is2150}" class="text-left">Actions</th>
                    <th :class="{'w-[80%]': is2150}" class="pr-5">Status</th>
                    <th :class="{'w-full': is2150}" class="pr-5">Reason</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>

        <!-- Modal Konfirmasi Delete -->
        <div
            x-show="showDeleteModal"
            x-cloak
            x-transition:enter="transition duration-400 ease-out"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition duration-400 ease-in"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="fixed inset-0 z-99999999 grid h-screen w-full place-items-center bg-[rgba(0,0,0,0.6)] p-2"
        >
            <div
                x-show="showDeleteModal"
                x-cloak
                x-transition:enter="transition duration-400 ease-out"
                x-transition:enter-start="scale-0"
                x-transition:enter-end="scale-100"
                x-transition:leave="transition duration-400 ease-in"
                x-transition:leave-start="scale-100"
                x-transition:leave-end="scale-0"
                class="w-full max-w-[90%] rounded-sm bg-white shadow-[0_0_5px_0.6px_rgba(0,0,0,0.5)] sm:max-w-[75%] md:max-w-[65%] lg:max-w-[50%]"
            >
                <div
                    class="flex items-center justify-between rounded-tl-sm rounded-tr-sm bg-warnaMerahTombol p-3 text-sm bp400:text-base bp575:text-lg xl:text-xl 2xl:text-2xl"
                >
                    <h3 class="font-semibold text-white">Confirm Deletion</h3>
                    <button
                        x-on:click="closeDeleteModal"
                        class="cursor-pointer text-[1.5em] text-white transition-all duration-300 ease-in-out hover:text-stone-400"
                    >
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <div
                    class="mx-auto my-3 flex w-[90%] flex-col items-center gap-2 text-xs bp400:text-sm bp575:text-base md:w-[70%] xl:text-lg 2xl:text-xl"
                >
                    <i
                        class="fa-solid fa-triangle-exclamation animate-exclamation text-[4em] text-warnaMerahTombol bp575:text-[5em]"
                    ></i>
                    <p class="text-center font-medium text-stone-700">
                        Are you sure you want to delete this Manage Shipment Pending? This action cannot be undone.
                    </p>
                </div>
                <div
                    class="flex justify-end gap-2 rounded-br-sm rounded-bl-sm bg-red-100 p-3 text-xs bp400:text-sm bp575:text-base xl:text-lg 2xl:text-xl"
                >
                    <button
                        x-on:click="closeDeleteModal"
                        class="cursor-pointer rounded-sm bg-warnaAbuTombol px-2 py-1 text-white transition-all duration-300 ease-in-out hover:bg-stone-400"
                    >
                        Cancel
                    </button>
                    <form :action="deleteUrl" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button
                            type="submit"
                            class="cursor-pointer rounded-sm bg-warnaMerahTombol px-2 py-1 text-white transition-all duration-300 ease-in-out hover:bg-red-300"
                        >
                            <i class="fa-solid fa-trash-can mr-1"></i>
                            Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <!-- Modal Konfirmasi Delete -->
    </div>

    <!-- Pagination -->
    <div
        class="flex flex-col items-center justify-between gap-2 text-[.65rem] bp360:text-[.7rem] bp400:text-xs md:flex-row xl:text-sm 2xl:text-base"
    >
        <div id="custom-info" class="text-stone-700"></div>
        <div id="custom-pagination" class="flex items-center gap-2"></div>
    </div>
</div>

<script>
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
                is2150: false,
                updateSize() {
                    this.isMd = window.innerWidth >= 768;
                    this.is2150 = window.innerWidth >= 2150;
                },
                init() {
                    this.updateSize();
                    window.addEventListener(
                        'resize',
                        debounce(() => this.updateSize(), 100),
                    );
                },
            }));

            if ($('#manage-shipment-cancel-table').length) {
                // Fungsi untuk mendapatkan parameter filter
                function getFilterParams() {
                    return {
                        'type-of-quotation': $('#type-of-quotation').val() || 'all',
                    };
                }
                const initialPageLength = 7; // Fallback jika #custom-length tidak ada
                const table = $('#manage-shipment-cancel-table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url: '{{ route('manage-shipment.cancel.data') }}',
                        type: 'POST', // Ubah ke POST
                        data: function (d) {
                            Object.assign(d, getFilterParams());
                        },
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'), // Sertakan CSRF token
                        },
                    },
                    columns: [
                        { data: 'quote_number', name: 'quote_number' },
                        { data: 'quote_type', name: 'quote_type' },
                        { data: 'quote_date', name: 'quote_date' },
                        { data: 'type_of_trade', name: 'type_of_trade' },
                        { data: 'origin_country', name: 'origin_country' },
                        { data: 'origin_city', name: 'origin_city' },
                        { data: 'destination_country', name: 'destination_country' },
                        { data: 'destination_city', name: 'destination_city' },
                        { data: 'shipping_instruction', name: 'shipping_instruction' },
                        {
                            data: 'actions',
                            name: 'actions',
                            orderable: false,
                            searchable: false,
                            createdCell: function (td, cellData, rowData, row, col) {
                                $(td).addClass('flex flex-wrap gap-1 md:table-cell'); // Tambahkan class hanya pada <td>
                            },
                        },
                        { data: 'status', name: 'status' },
                        { data: 'reason', name: 'reason' },
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
                        const headers = $('#manage-shipment-cancel-table thead th')
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
                        $('#custom-info').text(`${info.start + 1} to ${info.end} of ${info.recordsTotal}`);

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
                            const $tbody = $('#manage-shipment-cancel-table tbody');
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
                        $('table#manage-shipment-cancel-table colgroup').remove();
                        $('#manage-shipment-cancel-table_wrapper #manage-shipment-cancel-table_processing').remove();

                        if (table.rows().count() === 0) {
                            const $tbody = $('#manage-shipment-cancel-table tbody');
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

                // Event untuk perubahan pada type-of-quotation (real-time)
                const $typeOfQuotation = $('#type-of-quotation');
                if ($typeOfQuotation.length) {
                    $typeOfQuotation.on('change', function () {
                        table.ajax.reload();
                    });
                } else {
                    console.warn('Element #type-of-quotation not found in DOM');
                }
            }
        });
    });
</script>
