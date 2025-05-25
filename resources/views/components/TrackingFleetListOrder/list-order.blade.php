<form
    id="date-range-form"
    class="flex flex-col gap-3 text-[.65rem] font-medium text-stone-700 bp360:text-[.7rem] bp400:text-[.73rem] bp575:text-xs xl:text-sm 2xl:text-base"
>
    <div class="flex w-full flex-col gap-2 px-2 bp575:w-1/2 bp575:flex-row">
        <div class="flex w-full gap-2">
            <div class="flex w-full flex-col gap-2">
                <label for="from">From</label>
                <input
                    type="date"
                    name="from"
                    id="from"
                    class="w-full rounded-xs px-2 py-1 shadow-[0_0_2px_rgba(0,0,0,0.5)] focus:outline-warnaBiruTua"
                />
            </div>
            <div class="flex w-full flex-col gap-2">
                <label for="to">To</label>
                <input
                    type="date"
                    name="to"
                    id="to"
                    class="w-full rounded-xs px-2 py-1 shadow-[0_0_2px_rgba(0,0,0,0.5)] focus:outline-warnaBiruTua"
                />
            </div>
        </div>
        <div class="self-end">
            <button
                type="submit"
                class="cursor-pointer rounded-sm bg-warnaBiruTua px-3 py-1 text-white transition-all duration-300 ease-in-out hover:bg-warnaBiruHover"
            >
                Search
            </button>
        </div>
    </div>

    <div class="items-left flex w-full justify-between gap-2 px-3">
        <div class="flex items-center gap-1">
            <label for="custom-length">Show</label>
            <select
                name="custom-length"
                id="custom-length"
                class="cursor-pointer rounded-xs px-2 py-1 shadow-[0_0_2px_rgba(0,0,0,0.5)] transition-all duration-300 ease-in-out focus:outline-warnaBiruTua"
            >
                <option
                    class="transition-all duration-300 ease-in-out checked:bg-warnaBiruTua checked:text-white"
                    value="2"
                >
                    2
                </option>
                <option
                    class="transition-all duration-300 ease-in-out checked:bg-warnaBiruTua checked:text-white"
                    value="5"
                    selected
                >
                    5
                </option>
                <option
                    class="transition-all duration-300 ease-in-out checked:bg-warnaBiruTua checked:text-white"
                    value="10"
                >
                    10
                </option>
                <option
                    class="transition-all duration-300 ease-in-out checked:bg-warnaBiruTua checked:text-white"
                    value="15"
                >
                    15
                </option>
                <option
                    class="transition-all duration-300 ease-in-out checked:bg-warnaBiruTua checked:text-white"
                    value="20"
                >
                    20
                </option>
                <option
                    class="transition-all duration-300 ease-in-out checked:bg-warnaBiruTua checked:text-white"
                    value="25"
                >
                    25
                </option>
            </select>
            <span>entries</span>
        </div>

        <div class="flex items-center gap-1">
            <label for="custom-search">Search:</label>
            <input
                type="search"
                name="custom-search"
                id="custom-search"
                placeholder="Search..."
                class="shadow-input w-full rounded-xs px-2 py-1 outline-2 outline-transparent transition-all duration-300 ease-in-out focus:outline-warnaBiruTua"
            />
        </div>
    </div>
</form>

<div
    x-data="{
        isMd: false,
        is1750: false,
        isCollapsed: $store.navbar.isCollapsed,
        delayedClass: '',
        updateSize() {
            this.isMd = window.innerWidth >= 768
            this.is1750 = window.innerWidth >= 1750
            this.applyClassConditionally()
        },

        applyClassConditionally() {
            if (this.isMd && ! this.is1750) {
                if (this.isCollapsed) {
                    setTimeout(() => {
                        this.delayedClass =
                            'md:px-0 md:mx-3 md:max-w-[95vw] lg:max-w-[90vw] xl:max-w-[92vw] 2xl:max-w-[93vw]'
                    }, 200)
                } else {
                    this.delayedClass =
                        'md:px-0 md:mx-3 md:max-w-[95vw] lg:max-w-[74vw] xl:max-w-[77vw] 2xl:max-w-[81vw]'
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
    class="bpHeight-5 mt-3 w-full overflow-auto px-3"
>
    <table
        x-data="{
            isMd: false,
            is1750: false,
            updateSize() {
                this.isMd = window.innerWidth >= 768
                this.is1750 = window.innerWidth >= 1750
            },
        }"
        x-init="
            updateSize()
            window.addEventListener('resize', () => updateSize())
        "
        :class="isMd && !is1750 ? 'md:w-max' : 'table-fixed'"
        class="table-data border-b-2 border-stone-400"
        id="tf-list-order-table"
    >
        <thead class="text-left">
            <tr>
                <th :class="{'md:w-[60%]': is1750}" class="md:text-center">Actions</th>
                <th :class="{'md:w-full': is1750}" class="pr-5">Do Number</th>
                <th :class="{'md:w-full': is1750}" class="pr-5">Shipment No</th>
                <th :class="{'md:w-full': is1750}" class="pr-5">Departure Date</th>
                <th :class="{'md:w-full': is1750}" class="pr-5">Customer Name</th>
                <th :class="{'md:w-full': is1750}" class="pr-5">Origin</th>
                <th :class="{'md:w-full': is1750}" class="pr-5">Destination</th>
                <th :class="{'md:w-full': is1750}" class="pr-5">Fleet Category</th>
                <th :class="{'md:w-full': is1750}" class="pr-5">Fleet Type</th>
                <th :class="{'md:w-full': is1750}" class="pr-5">Plate No</th>
                <th :class="{'md:w-full': is1750}" class="pr-5">Driver</th>
                <th :class="{'md:w-full': is1750}" class="pr-5">Status</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
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
                is1750: false,
                updateSize() {
                    this.isMd = window.innerWidth >= 768;
                    this.is1750 = window.innerWidth >= 1750;
                },
                init() {
                    this.updateSize();
                    window.addEventListener(
                        'resize',
                        debounce(() => this.updateSize(), 100),
                    );
                },
            }));

            if ($('#tf-list-order-table').length) {
                const initialPageLength = parseInt($('#custom-length').val()) || 10;

                // Fungsi untuk mendapatkan parameter tambahan (from dan to)
                const getDateRangeParams = function () {
                    return {
                        from: $('#from').val(),
                        to: $('#to').val(),
                    };
                };

                const table = $('#tf-list-order-table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url: '{{ route('tf-list-order.data') }}',
                        type: 'POST', // Ubah ke POST
                        data: function (d) {
                            Object.assign(d, getDateRangeParams());
                        },
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'), // Sertakan CSRF token
                        },
                    },
                    columns: [
                        {
                            data: 'actions',
                            name: 'actions',
                            orderable: false,
                            searchable: false,
                            createdCell: function (td, cellData, rowData, row, col) {
                                $(td).addClass('md:text-right'); // Tambahkan class hanya pada <td>
                            },
                        },
                        { data: 'do_number', name: 'do_number' },
                        { data: 'shipment_no', name: 'shipment_no' },
                        { data: 'departure_date', name: 'departure_date' },
                        { data: 'customer_name', name: 'customer_name' },
                        { data: 'origin', name: 'origin' },
                        { data: 'destination', name: 'destination' },
                        { data: 'fleet_category', name: 'fleet_category' },
                        { data: 'fleet_type', name: 'fleet_type' },
                        { data: 'plate_no', name: 'plate_no' },
                        { data: 'driver', name: 'driver' },
                        { data: 'status', name: 'status' },
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
                        const headers = $('#tf-list-order-table thead th')
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
                            const $tbody = $('#tf-list-order-table tbody');
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
                        $('table#tf-list-order-table colgroup').remove();
                        $('#tf-list-order-table_wrapper #tf-list-order-table_processing').remove();

                        if (table.rows().count() === 0) {
                            const $tbody = $('#tf-list-order-table tbody');
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

                // Tangani pencarian berdasarkan rentang tanggal
                $('#date-range-form').on('submit', function (e) {
                    e.preventDefault();
                    table.draw(); // Refresh tabel dengan parameter from dan to
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
