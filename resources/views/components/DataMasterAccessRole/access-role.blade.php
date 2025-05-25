<div class="flex w-full items-center justify-between gap-2 px-3">
    <div class="whitespace-nowrap">
        <a
            class="rounded-xs bg-warnaBiruTuaTombol px-2 py-[.2rem] text-[.65rem] font-medium text-white transition-all duration-300 ease-in-out hover:bg-slate-600 bp360:text-[.7rem] bp400:text-xs bp575:text-sm xl:text-base 2xl:text-lg"
            href="/dm-access-role/create"
            title="Create Access Role"
        >
            + New
        </a>
    </div>

    <div
        class="flex items-center gap-1 text-[.65rem] font-medium text-stone-700 bp360:text-[.7rem] bp400:text-xs bp575:text-sm xl:text-base 2xl:text-lg"
    >
        <label for="custom-search">Search:</label>
        <input
            type="search"
            id="custom-search"
            name="custom-search"
            placeholder="Search..."
            class="shadow-input w-full rounded-xs bg-white px-2 py-[.2rem] outline-2 outline-transparent transition-all duration-300 ease-in-out focus:outline-warnaBiruTua"
        />
    </div>
</div>

<hr class="mx-3 my-3 rounded-xs border-t-[1.5px] text-stone-300" />

<div
    x-data="{
        showDeleteModal: false,
        deleteUrl: 'dm-access-role.destroy',
        openDeleteModal(url) {
            this.deleteUrl = url
            this.showDeleteModal = true
        },
        closeDeleteModal() {
            this.showDeleteModal = false
            this.deleteUrl = ''
        },
    }"
    class="bpHeight-1 w-full overflow-y-auto px-3"
>
    <table class="table-data table-fixed" id="dm-access-role-table">
        <thead>
            <tr>
                <th class="pr-5 md:w-[23%]">Access Code</th>
                <th class="pr-5 md:w-[23%]">Access Title</th>
                <th class="pr-5 md:w-[20%]">Created At</th>
                <th class="text-center">Actions</th>
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
                    Are you sure you want to delete this Access Role? This action cannot be undone.
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
            if ($('#dm-access-role-table').length) {
                const table = $('#dm-access-role-table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url: '{{ route('dm-access-role.data') }}',
                        type: 'POST', // Ubah ke POST
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'), // Sertakan CSRF token
                        },
                    },
                    columns: [
                        { data: 'code', name: 'code' },
                        { data: 'title', name: 'title' },
                        { data: 'created_at', name: 'created_at' },
                        {
                            data: 'actions',
                            name: 'actions',
                            orderable: false,
                            searchable: false,
                            createdCell: function (td, cellData, rowData, row, col) {
                                $(td).addClass('flex flex-wrap gap-1 md:table-cell'); // Tambahkan class hanya pada <td>
                            },
                        },
                    ],
                    dom: 't',
                    paging: true,
                    searching: true,
                    pageLength: 9,
                    info: true,
                    autoWidth: false,
                    deferRender: true,
                    responsive: false,
                    scrollX: false,
                    ordering: true,
                    lengthChange: false,
                    createdRow: function (row, data, dataIndex) {
                        const headers = $('#dm-access-role-table thead th')
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
                            const $tbody = $('#dm-access-role-table tbody');
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
                        $('table#dm-access-role-table colgroup').remove();
                        $('#dm-access-role-table_wrapper #dm-access-role-table_processing').remove();

                        if (table.rows().count() === 0) {
                            const $tbody = $('#dm-access-role-table tbody');
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
            }
        });
    });
</script>
