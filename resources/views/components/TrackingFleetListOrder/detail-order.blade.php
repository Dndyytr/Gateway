<div class="bpHeight-7 overflow-y-auto">
    <div
        class="grid gap-2 text-[.65rem] font-medium text-stone-700 bp360:text-[.7rem] bp400:text-[.73rem] bp575:text-xs md:grid-cols-4 xl:text-[13px] 2xl:text-sm"
    >
        {{-- name --}}
        <div class="shadow-card col-span-2 flex flex-col gap-1 rounded-sm bg-white p-3">
            <div class="w-full border-b-2 border-warnaBiruTuaTombol">
                <h1 class="w-[max-content] rounded-tl-sm rounded-tr-sm bg-warnaBiruTuaTombol px-2 py-1 text-white">
                    Name
                </h1>
            </div>

            <div class="flex w-full flex-col gap-2 md:flex-row">
                {{-- customer name --}}
                <div class="flex w-full flex-col gap-1">
                    <label class="whitespace-nowrap" for="customer_name">Customer Name</label>
                    <input
                        value="{{ $orders['customer_name'] }}"
                        type="text"
                        name="customer_name"
                        id="customer_name"
                        readonly
                        class="w-full cursor-default truncate rounded-xs bg-warnaDasarBackground px-2 py-1 shadow-[0_0_2px_0.1px_rgba(0,0,0,0.5)] outline-none"
                    />
                </div>
                {{-- driver --}}
                <div class="flex w-full flex-col gap-1">
                    <label class="whitespace-nowrap" for="driver">Driver Name</label>
                    <input
                        value="{{ $orders['driver'] }}"
                        type="text"
                        name="driver"
                        id="driver"
                        readonly
                        class="w-full cursor-default truncate rounded-xs bg-warnaDasarBackground px-2 py-1 shadow-[0_0_2px_0.1px_rgba(0,0,0,0.5)] outline-none"
                    />
                </div>
            </div>

            <div class="flex w-full flex-col gap-2 md:flex-row">
                {{-- license plate --}}
                <div class="flex w-full flex-col gap-1">
                    <label class="whitespace-nowrap" for="plate_no">License Plate</label>
                    <input
                        value="{{ $orders['plate_no'] }}"
                        type="text"
                        name="plate_no"
                        id="plate_no"
                        readonly
                        class="w-full cursor-default truncate rounded-xs bg-warnaDasarBackground px-2 py-1 shadow-[0_0_2px_0.1px_rgba(0,0,0,0.5)] outline-none"
                    />
                </div>
                {{-- marketing name --}}
                <div class="flex w-full flex-col gap-1">
                    <label class="whitespace-nowrap" for="marketing_name">Marketing Name</label>
                    <input
                        value="{{ $orders['marketing_name'] }}"
                        type="text"
                        name="marketing_name"
                        id="marketing_name"
                        readonly
                        class="w-full cursor-default truncate rounded-xs bg-warnaDasarBackground px-2 py-1 shadow-[0_0_2px_0.1px_rgba(0,0,0,0.5)] outline-none"
                    />
                </div>
            </div>

            <div class="flex w-full flex-col gap-2 md:flex-row">
                {{-- temperature max --}}
                <div class="flex w-full flex-col gap-1">
                    <label class="whitespace-nowrap" for="temperature_max" class="whitespace-nowrap">
                        Temperature Max
                    </label>
                    <input
                        value="{{ $orders['temperature_max'] }}"
                        type="text"
                        name="temperature_max"
                        id="temperature_max"
                        readonly
                        class="w-full cursor-default truncate rounded-xs bg-warnaDasarBackground px-2 py-1 shadow-[0_0_2px_0.1px_rgba(0,0,0,0.5)] outline-none"
                    />
                </div>
                {{-- temperature min --}}
                <div class="flex w-full flex-col gap-1">
                    <label class="whitespace-nowrap" for="temperature_min" class="whitespace-nowrap">
                        Temperature Min
                    </label>
                    <input
                        value="{{ $orders['temperature_min'] }}"
                        type="text"
                        name="temperature_min"
                        id="temperature_min"
                        readonly
                        class="w-full cursor-default truncate rounded-xs bg-warnaDasarBackground px-2 py-1 shadow-[0_0_2px_0.1px_rgba(0,0,0,0.5)] outline-none"
                    />
                </div>
                {{-- end time --}}
                <div class="flex w-full flex-col gap-1">
                    <label class="whitespace-nowrap" for="end-time" class="whitespace-nowrap">End Time</label>
                    <input
                        value="{{ $orders['end_time'] }}"
                        type="text"
                        name="end_time"
                        id="end_time"
                        readonly
                        class="w-full cursor-default truncate rounded-xs bg-warnaDasarBackground px-2 py-1 shadow-[0_0_2px_0.1px_rgba(0,0,0,0.5)] outline-none"
                    />
                </div>
                {{-- start time --}}
                <div class="flex w-full flex-col gap-1">
                    <label class="whitespace-nowrap" for="start_time" class="whitespace-nowrap">Start Time</label>
                    <input
                        value="{{ $orders['start_time'] }}"
                        type="text"
                        name="start_time"
                        id="start_time"
                        readonly
                        class="w-full cursor-default truncate rounded-xs bg-warnaDasarBackground px-2 py-1 shadow-[0_0_2px_0.1px_rgba(0,0,0,0.5)] outline-none"
                    />
                </div>
            </div>
        </div>

        {{-- shipment --}}
        <div class="shadow-card col-span-2 flex flex-col gap-1 rounded-sm bg-white p-3">
            <div class="w-full border-b-2 border-warnaBiruTuaTombol">
                <h1 class="w-[max-content] rounded-tl-sm rounded-tr-sm bg-warnaBiruTuaTombol px-2 py-1 text-white">
                    Shipment
                </h1>
            </div>

            <div class="flex w-full flex-col gap-2 md:flex-row">
                {{-- order no --}}
                <div class="flex w-full flex-col gap-1">
                    <label class="whitespace-nowrap" for="order_no">Order No</label>
                    <input
                        value="{{ $orders['do_number'] }}"
                        type="text"
                        name="do_number"
                        id="do_number"
                        readonly
                        class="w-full cursor-default truncate rounded-xs bg-warnaDasarBackground px-2 py-1 shadow-[0_0_2px_0.1px_rgba(0,0,0,0.5)] outline-none"
                    />
                </div>
                {{-- shipment no --}}
                <div class="flex w-full flex-col gap-1">
                    <label class="whitespace-nowrap" for="shipment_no">Shipment No</label>
                    <input
                        value="{{ $orders['shipment_no'] }}"
                        type="text"
                        name="shipment_no"
                        id="shipment_no"
                        readonly
                        class="w-full cursor-default truncate rounded-xs bg-warnaDasarBackground px-2 py-1 shadow-[0_0_2px_0.1px_rgba(0,0,0,0.5)] outline-none"
                    />
                </div>
            </div>

            <div class="flex w-full flex-col gap-2 md:flex-row">
                {{-- departure date --}}
                <div class="flex w-full flex-col gap-1">
                    <label class="whitespace-nowrap" for="departure_date">Departure Date</label>
                    <input
                        value="{{ $orders['departure_date'] }}"
                        type="text"
                        name="departure_date"
                        id="departure_date"
                        readonly
                        class="w-full cursor-default truncate rounded-xs bg-warnaDasarBackground px-2 py-1 shadow-[0_0_2px_0.1px_rgba(0,0,0,0.5)] outline-none"
                    />
                </div>
                {{-- status --}}
                <div class="flex w-full flex-col gap-1">
                    <label class="whitespace-nowrap" for="status">Status</label>
                    <input
                        value="{{ $orders['status'] }}"
                        type="text"
                        name="status"
                        id="status"
                        readonly
                        class="w-full cursor-default truncate rounded-xs bg-warnaDasarBackground px-2 py-1 shadow-[0_0_2px_0.1px_rgba(0,0,0,0.5)] outline-none"
                    />
                </div>
            </div>

            {{-- note --}}
            <div class="flex w-full flex-col gap-1 md:w-1/2">
                <label class="whitespace-nowrap" for="note">Note</label>
                <input
                    value="{{ $orders['note'] }}"
                    type="text"
                    name="note"
                    id="note"
                    readonly
                    class="w-full cursor-default truncate rounded-xs bg-warnaDasarBackground px-2 py-1 shadow-[0_0_2px_0.1px_rgba(0,0,0,0.5)] outline-none"
                />
            </div>
        </div>

        {{-- origins and destinations --}}

        {{-- origin location --}}
        <div
            class="shadow-card col-span-2 col-start-1 flex w-full flex-col gap-1 rounded-sm bg-white p-3 md:col-span-1"
        >
            <div class="w-full border-b-2 border-warnaBiruTuaTombol">
                <h1 class="w-[max-content] rounded-tl-sm rounded-tr-sm bg-warnaBiruTuaTombol px-2 py-1 text-white">
                    Origins
                </h1>
            </div>
            <label class="whitespace-nowrap" for="origin">Origin Location</label>
            <input
                value=" {{ $orders['origin'] }}"
                type="text"
                name="origin"
                id="origin"
                readonly
                class="w-full cursor-default truncate rounded-xs bg-warnaDasarBackground px-2 py-1 shadow-[0_0_2px_0.1px_rgba(0,0,0,0.5)] outline-none"
            />
        </div>
        {{-- destination --}}
        <div
            class="shadow-card col-span-2 col-start-1 flex w-full flex-col gap-1 rounded-sm bg-white p-3 md:col-span-1 md:col-start-2"
        >
            <div class="w-full border-b-2 border-warnaBiruTuaTombol">
                <h1 class="w-[max-content] rounded-tl-sm rounded-tr-sm bg-warnaBiruTuaTombol px-2 py-1 text-white">
                    Destinations
                </h1>
            </div>
            <label class="whitespace-nowrap" for="destination">Destination Location</label>
            <input
                value="{{ $orders['destination'] }}"
                type="text"
                name="destinationn"
                id="destintaion"
                readonly
                class="w-full cursor-default truncate rounded-xs bg-warnaDasarBackground px-2 py-1 shadow-[0_0_2px_0.1px_rgba(0,0,0,0.5)] outline-none"
            />
        </div>

        {{-- fleet --}}
        <div class="shadow-card col-span-2 flex w-full flex-col gap-1 rounded-sm bg-white p-3">
            <div class="w-full border-b-2 border-warnaBiruTuaTombol">
                <h1 class="w-[max-content] rounded-tl-sm rounded-tr-sm bg-warnaBiruTuaTombol px-2 py-1 text-white">
                    Fleet
                </h1>
            </div>
            <div class="flex w-full flex-col gap-2 md:flex-row">
                {{-- fleet category --}}
                <div class="flex w-full flex-col gap-1">
                    <label class="whitespace-nowrap" for="fleet_category">Fleet Category</label>
                    <input
                        value="{{ $orders['fleet_category'] }}"
                        type="text"
                        name="fleet_category"
                        id="fleet_category"
                        readonly
                        class="w-full cursor-default truncate rounded-xs bg-warnaDasarBackground px-2 py-1 shadow-[0_0_2px_0.1px_rgba(0,0,0,0.5)] outline-none"
                    />
                </div>
                {{-- fleet type --}}
                <div class="flex w-full flex-col gap-1">
                    <label class="whitespace-nowrap" for="fleet_type">Fleet Type</label>
                    <input
                        value="{{ $orders['fleet_type'] }}"
                        type="text"
                        name="fleet_type"
                        id="fleet_type"
                        readonly
                        class="w-full cursor-default truncate rounded-xs bg-warnaDasarBackground px-2 py-1 shadow-[0_0_2px_0.1px_rgba(0,0,0,0.5)] outline-none"
                    />
                </div>
            </div>
        </div>
    </div>

    {{-- goods --}}
    <div
        class="mt-1 mb-3 bg-white p-3 text-[.65rem] shadow-[0_0_2px_rgba(0,0,0,0.5)] bp360:text-[.7rem] bp400:text-[.73rem] bp575:text-xs xl:text-[13px] 2xl:text-sm"
    >
        <div class="w-full border-b-2 border-warnaBiruTuaTombol">
            <h1
                class="w-[max-content] rounded-tl-sm rounded-tr-sm bg-warnaBiruTuaTombol px-2 py-1 font-medium text-white"
            >
                Goods
            </h1>
        </div>

        <table class="mt-1 w-full table-fixed text-left">
            <thead class="bg-warnaKuning text-stone-700">
                <tr>
                    <th class="hidden border-l-[1.8px] border-warnaKuning px-3 py-1 font-semibold bp400:table-cell">
                        Name
                    </th>
                    <th
                        class="hidden border-r-[1.8px] border-l-[1.8px] border-white px-3 py-1 font-semibold bp400:table-cell"
                    >
                        Qty
                    </th>
                    <th class="hidden border-r-[1.8px] border-white px-3 py-1 font-semibold bp400:table-cell">
                        Volume
                    </th>
                    <th class="hidden border-r-[1.8px] border-warnaKuning px-3 py-1 font-semibold bp400:table-cell">
                        Weight
                    </th>
                </tr>
            </thead>
            <tbody class="table-detail-order text-stone-700">
                <tr>
                    <td data-cell="Name" class="block px-3 py-1 font-medium bp400:table-cell">
                        {{ $orders['name'] }}
                    </td>
                    <td data-cell="Qty" class="block px-3 py-1 font-medium bp400:table-cell">
                        {{ $orders['qty'] }}
                    </td>
                    <td data-cell="Volume" class="block px-3 py-1 font-medium bp400:table-cell">
                        {{ $orders['volume'] }}
                    </td>
                    <td data-cell="Weight" class="block px-3 py-1 font-medium bp400:table-cell">
                        {{ $orders['weight'] }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<div class="mx-3 pb-3 text-[.65rem] bp360:text-[.7rem] bp400:text-xs bp575:text-sm xl:text-base 2xl:text-lg">
    <a
        class="cursor-pointer rounded-sm bg-warnaAbu3 px-3 py-1 font-medium text-white transition-all duration-300 ease-in-out hover:bg-stone-400"
        href="/tf-list-order"
    >
        ❮ Return
    </a>
</div>
