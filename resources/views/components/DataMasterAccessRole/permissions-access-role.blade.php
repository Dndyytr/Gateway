<div class="bpHeight-3 overflow-y-auto p-3">
    <table
        class="w-full table-auto text-left text-[.7rem] text-stone-700 bp360:text-xs bp400:text-sm bp575:text-[.95rem] xl:text-base 2xl:text-lg"
    >
        <thead>
            <tr class="border-b-[1.5px] border-stone-300">
                <th class="hidden w-full px-2 pt-1 pb-2 font-medium bp575:table-cell bp575:w-[10%]">TCODE</th>
                <th class="hidden w-full px-2 pt-1 pb-2 font-medium bp575:table-cell bp575:w-[35%]">MENU</th>
                <th class="hidden w-full px-2 pt-1 pb-2 font-medium bp575:table-cell">ACTIONS</th>
            </tr>
        </thead>
        <tbody class="table-set-access w-full">
            @foreach ($menuMap as $tcode => $menu)
                @if (in_array($menu, ['Cargo', 'Location', 'Shipper', 'Consignee', 'Notify Party', 'Air Port', 'FCL - Full Container Load', 'LCL - Less Container Load', 'Non Container Shipment', 'Air Freight Shipment', 'Charter Full Truck', 'Less Truck Load', 'Custom Only', 'List SI', 'List Order', 'Fleet History', 'Bill of Lading', 'Airway Bill', 'PEB (Export Declaration)', 'PIB (Import Declaration)']))
                    <tr class="w-full">
                        <td
                            class="hidden px-2 pt-1 pb-2 before:bg-transparent before:content-[''] bp575:table-cell"
                        ></td>
                        <td
                            colspan="2"
                            class="block w-full border-b-[1.5px] border-stone-300 before:bg-transparent before:content-[''] bp575:table-cell"
                        >
                            <table class="w-full table-auto text-left">
                                <thead class="border-b-[1.5px] border-stone-300">
                                    <tr>
                                        <th
                                            class="hidden w-full px-2 pt-1 pb-2 font-medium bp575:table-cell bp575:w-[10%]"
                                        >
                                            TCODE
                                        </th>
                                        <th
                                            class="hidden w-full px-2 pt-1 pb-2 font-medium bp575:table-cell bp575:w-[30%]"
                                        >
                                            MENU
                                        </th>
                                        <th class="hidden w-full px-2 pt-1 pb-2 font-medium bp575:table-cell">
                                            ACTIONS
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="table-set-access">
                                    <tr>
                                        <td data-cell="TCODE" class="block px-2 pt-1 pb-2 font-bold bp575:table-cell">
                                            {{ $tcode }}
                                        </td>
                                        <td data-cell="MENU" class="block px-2 pt-1 pb-2 font-bold bp575:table-cell">
                                            {{ $menu }}
                                        </td>
                                        <td
                                            data-cell="ACTIONS"
                                            class="block px-2 pt-1 pb-2 font-medium bp575:table-cell"
                                        >
                                            <div class="mt-1 flex flex-wrap gap-3 bp575:mt-0">
                                                @foreach (['view', 'create', 'edit', 'delete'] as $action)
                                                    <label class="flex items-center gap-1 capitalize">
                                                        <input
                                                            type="checkbox"
                                                            class="permission-checkbox h-[13px] w-[13px] cursor-pointer transition-all duration-300 ease-in-out bp360:h-[14px] bp360:w-[14px] bp400:h-[15px] bp400:w-[15px] bp575:h-[16px] bp575:w-[16px] 2xl:h-[17px] 2xl:w-[17px]"
                                                            data-tcode="{{ $tcode }}"
                                                            data-action="{{ $action }}"
                                                            {{ $permissions[$tcode][$action] ? 'checked' : '' }}
                                                        />
                                                        {{ $action }}
                                                    </label>
                                                @endforeach
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                @else
                    <tr class="w-full border-b-[1.5px] border-stone-300">
                        <td data-cell="TCODE" class="block px-2 pt-1 pb-2 font-bold bp575:table-cell">{{ $tcode }}</td>
                        <td data-cell="MENU" class="block px-2 pt-1 pb-2 font-bold bp575:table-cell">{{ $menu }}</td>

                        <td data-cell="ACTIONS" class="block px-2 pt-1 pb-2 font-medium bp575:table-cell">
                            <div class="mt-1 flex flex-wrap gap-3 bp575:mt-0">
                                @foreach (['view', 'create', 'edit', 'delete'] as $action)
                                    <label class="flex items-center gap-1 capitalize">
                                        <input
                                            type="checkbox"
                                            class="permission-checkbox h-[13px] w-[13px] cursor-pointer transition-all duration-300 ease-in-out bp360:h-[14px] bp360:w-[14px] bp400:h-[15px] bp400:w-[15px] bp575:h-[16px] bp575:w-[16px] 2xl:h-[17px] 2xl:w-[17px]"
                                            data-tcode="{{ $tcode }}"
                                            data-action="{{ $action }}"
                                            {{ $permissions[$tcode][$action] ? 'checked' : '' }}
                                        />
                                        {{ $action }}
                                    </label>
                                @endforeach
                            </div>
                        </td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>

    <a
        class="mt-2 inline-block cursor-pointer rounded-sm bg-warnaAbu3 px-3 py-1 text-xs font-medium text-white transition-all duration-300 ease-in-out hover:bg-stone-400 bp400:text-sm bp575:text-base xl:text-lg 2xl:text-xl"
        href="/dm-access-role"
    >
        ❮ Return
    </a>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        $(document).ready(function () {
            $('.permission-checkbox').on('change', function () {
                const tcode = $(this).data('tcode');
                const action = $(this).data('action');
                const permission = `${tcode}_${action}`;
                const slug = '{{ $role['slug'] }}';
                const isChecked = $(this).is(':checked');

                $.ajax({
                    url: '/dm-access-role/' + slug + '/update-permissions',
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        permissions: [permission],
                        checked: isChecked,
                    },
                    success: function (response) {
                        if (response.success) {
                            console.log('Permission updated at ' + response.message); // "15/05/2025 19:00"
                        }
                    },
                    error: function (xhr) {
                        console.error('Error updating permission:', xhr.responseText);
                    },
                });
            });
        });
    });
</script>
