<div class="bpHeight-7 overflow-y-auto">
    <div
        class="grid gap-2 text-[.65rem] font-medium text-stone-700 bp360:text-[.7rem] bp400:text-[.73rem] bp575:text-xs md:grid-cols-4 xl:text-[13px] 2xl:text-sm"
    >
        {{-- driver --}}
        <div class="shadow-card col-span-2 flex flex-col gap-1 rounded-sm bg-white p-3">
            <div class="w-full border-b-2 border-warnaBiruTuaTombol">
                <h1 class="w-[max-content] rounded-tl-sm rounded-tr-sm bg-warnaBiruTuaTombol px-2 py-1 text-white">
                    Driver
                </h1>
            </div>

            <div class="flex w-full flex-col gap-2 md:flex-row">
                {{-- driver name --}}
                <div class="flex w-full flex-col gap-1">
                    <label class="whitespace-nowrap" for="driver_name">Name</label>
                    <input
                        value="{{ $fleets['driver_name'] }}"
                        type="text"
                        name="driver_name"
                        id="driver_name"
                        readonly
                        class="w-full cursor-default truncate rounded-xs bg-warnaDasarBackground px-2 py-1 shadow-[0_0_2px_0.1px_rgba(0,0,0,0.5)] outline-none"
                    />
                </div>
                {{-- driver --}}
                <div class="flex w-full flex-col gap-1">
                    <label class="whitespace-nowrap" for="license">License</label>
                    <input
                        value="{{ $fleets['license_plate_name'] }}"
                        type="text"
                        name="license"
                        id="license"
                        readonly
                        class="w-full cursor-default truncate rounded-xs bg-warnaDasarBackground px-2 py-1 shadow-[0_0_2px_0.1px_rgba(0,0,0,0.5)] outline-none"
                    />
                </div>
            </div>

            <div class="flex w-full flex-col gap-2 md:flex-row">
                {{-- start time --}}
                <div class="flex w-full flex-col gap-1">
                    <label for="start_time" class="whitespace-nowrap">Start Time</label>
                    <input
                        value="{{ $fleets['start_time'] }}"
                        type="text"
                        name="start_time"
                        id="start_time"
                        readonly
                        class="w-full cursor-default truncate rounded-xs bg-warnaDasarBackground px-2 py-1 shadow-[0_0_2px_0.1px_rgba(0,0,0,0.5)] outline-none"
                    />
                </div>

                {{-- end time --}}
                <div class="flex w-full flex-col gap-1">
                    <label for="end_time" class="whitespace-nowrap">End Time</label>
                    <input
                        value="{{ $fleets['end_time'] }}"
                        type="text"
                        name="end_time"
                        id="end_time"
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
                {{-- ship from --}}
                <div class="flex w-full flex-col gap-1">
                    <label class="whitespace-nowrap" for="order_no">Ship From</label>
                    <input
                        value=" {{ $fleets['ship_from'] }}"
                        type="text"
                        name="order_no"
                        id="order_no"
                        readonly
                        class="w-full cursor-default truncate rounded-xs bg-warnaDasarBackground px-2 py-1 shadow-[0_0_2px_0.1px_rgba(0,0,0,0.5)] outline-none"
                    />
                </div>
                {{-- status shipment --}}
                <div class="flex w-full flex-col gap-1">
                    <label class="whitespace-nowrap" for="status_shipment">Status</label>
                    <input
                        value="{{ $fleets['status_shipment'] }}"
                        type="text"
                        name="status_shipment"
                        id="status_shipment"
                        readonly
                        class="w-full cursor-default truncate rounded-xs bg-warnaDasarBackground px-2 py-1 shadow-[0_0_2px_0.1px_rgba(0,0,0,0.5)] outline-none"
                    />
                </div>
            </div>

            <div class="flex w-full flex-col gap-2 md:flex-row">
                {{-- volume --}}
                <div class="flex w-full flex-col gap-1">
                    <label class="whitespace-nowrap" for="volume">Volume</label>
                    <input
                        value="{{ $fleets['volume'] }}"
                        type="text"
                        name="volume"
                        id="volume"
                        readonly
                        class="w-full cursor-default truncate rounded-xs bg-warnaDasarBackground px-2 py-1 shadow-[0_0_2px_0.1px_rgba(0,0,0,0.5)] outline-none"
                    />
                </div>
                {{-- weight --}}
                <div class="flex w-full flex-col gap-1">
                    <label class="whitespace-nowrap" for="weight">Weight</label>
                    <input
                        value="{{ $fleets['weight'] }}"
                        type="text"
                        name="weight"
                        id="weight"
                        readonly
                        class="w-full cursor-default truncate rounded-xs bg-warnaDasarBackground px-2 py-1 shadow-[0_0_2px_0.1px_rgba(0,0,0,0.5)] outline-none"
                    />
                </div>
            </div>
        </div>

        {{-- order deliver --}}
        <div
            class="shadow-card col-span-2 col-start-1 flex w-full flex-col gap-1 rounded-sm bg-white p-3 md:col-span-1"
        >
            <div class="w-full border-b-2 border-warnaBiruTuaTombol">
                <h1 class="w-[max-content] rounded-tl-sm rounded-tr-sm bg-warnaBiruTuaTombol px-2 py-1 text-white">
                    Order Deliver
                </h1>
            </div>
            <label class="whitespace-nowrap" for="customer">Customer</label>
            <input
                value="{{ $fleets['customer'] }}"
                type="text"
                name="customer"
                id="customer"
                readonly
                class="w-full cursor-default truncate rounded-xs bg-warnaDasarBackground px-2 py-1 shadow-[0_0_2px_0.1px_rgba(0,0,0,0.5)] outline-none"
            />
        </div>
        {{-- order no --}}
        <div
            class="shadow-card col-span-2 col-start-1 flex w-full flex-col gap-1 rounded-sm bg-white p-3 md:col-span-1 md:col-start-2"
        >
            <div class="w-full border-b-2 border-warnaBiruTuaTombol">
                <h1 class="w-[max-content] rounded-tl-sm rounded-tr-sm bg-warnaBiruTuaTombol px-2 py-1 text-white">
                    Order No
                </h1>
            </div>
            <label class="whitespace-nowrap" for="order_no">Order No</label>
            <input
                value="{{ $fleets['order_no'] }}"
                type="text"
                name="order_no"
                id="order_no"
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
                        value="{{ $fleets['fleet_category'] }}"
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
                        value="{{ $fleets['fleet_type'] }}"
                        type="text"
                        name="fleet_type"
                        id="fleet_type"
                        readonly
                        class="w-full cursor-default truncate rounded-xs bg-warnaDasarBackground px-2 py-1 shadow-[0_0_2px_0.1px_rgba(0,0,0,0.5)] outline-none"
                    />
                </div>
                {{-- fleet number --}}
                <div class="flex w-full flex-col gap-1">
                    <label class="whitespace-nowrap" for="fleet_number">Fleet Number</label>
                    <input
                        value="{{ $fleets['fleet_number'] }}"
                        type="text"
                        name="fleet_number"
                        id="fleet_number"
                        readonly
                        class="w-full cursor-default truncate rounded-xs bg-warnaDasarBackground px-2 py-1 shadow-[0_0_2px_0.1px_rgba(0,0,0,0.5)] outline-none"
                    />
                </div>
            </div>
        </div>
    </div>

    {{-- order list --}}
    <div
        class="mt-1 mb-3 bg-white p-3 text-[.65rem] shadow-[0_0_2px_rgba(0,0,0,0.5)] bp360:text-[.7rem] bp400:text-[.73rem] bp575:text-xs xl:text-[13px] 2xl:text-sm"
    >
        <div class="w-full border-b-2 border-warnaBiruTuaTombol">
            <h1
                class="w-[max-content] rounded-tl-sm rounded-tr-sm bg-warnaBiruTuaTombol px-2 py-1 font-medium text-white"
            >
                Order List
            </h1>
        </div>

        <div
            x-data="{
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
                                    'md:max-w-[95vw] lg:max-w-[90vw] xl:max-w-[92vw] 2xl:max-w-[93vw]'
                            }, 200)
                        } else {
                            this.delayedClass =
                                'md:max-w-[95vw] lg:max-w-[74vw] xl:max-w-[77vw] 2xl:max-w-[81vw]'
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
            class="w-full max-w-full overflow-auto"
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
                :class="{ 'md:w-max': isMd && !is1650 }"
                class="mt-1 w-full table-fixed text-left shadow-[0_0_2px_rgba(0,0,0,0.5)]"
            >
                <thead class="bg-warnaKuning text-stone-700">
                    <tr>
                        <th
                            :class="{'w-[40%]' :is1650}"
                            class="hidden border-l-[1.8px] border-warnaKuning px-3 py-1 font-semibold md:table-cell"
                        >
                            Seq
                        </th>
                        <th
                            :class="{'w-[80%]' :is1650}"
                            class="hidden border-r-[1.8px] border-l-[1.8px] border-white px-3 py-1 font-semibold md:table-cell"
                        >
                            Address
                        </th>
                        <th
                            :class="{'w-full' :is1650}"
                            class="hidden border-r-[1.8px] border-white px-3 py-1 font-semibold md:table-cell"
                        >
                            App Status
                        </th>
                        <th
                            :class="{'w-full' :is1650}"
                            class="hidden border-r-[1.8px] border-white px-3 py-1 font-semibold md:table-cell"
                        >
                            Arrived Time
                        </th>
                        <th
                            :class="{'w-full' :is1650}"
                            class="hidden border-r-[1.8px] border-white px-3 py-1 font-semibold md:table-cell"
                        >
                            Departed Time
                        </th>
                        <th
                            :class="{'w-full' :is1650}"
                            class="hidden border-r-[1.8px] border-white px-3 py-1 font-semibold md:table-cell"
                        >
                            ETA
                        </th>
                        <th
                            :class="{'w-full' :is1650}"
                            class="hidden border-r-[1.8px] border-white px-3 py-1 font-semibold md:table-cell"
                        >
                            Mileage
                        </th>
                        <th
                            :class="{'w-full' :is1650}"
                            class="hidden border-r-[1.8px] border-white px-3 py-1 font-semibold md:table-cell"
                        >
                            Receiver Name
                        </th>
                        <th
                            :class="{'w-full' :is1650}"
                            class="hidden border-r-[1.8px] border-white px-3 py-1 font-semibold md:table-cell"
                        >
                            Rejection Reason
                        </th>
                        <th
                            :class="{'w-[70%]' :is1650}"
                            class="hidden border-r-[1.8px] border-white px-3 py-1 font-semibold md:table-cell"
                        >
                            Status
                        </th>
                        <th
                            :class="{'w-full' :is1650}"
                            class="hidden border-r-[1.8px] border-white px-3 py-1 font-semibold md:table-cell"
                        >
                            Time app Update
                        </th>
                        <th
                            :class="{'w-[70%]' :is1650}"
                            class="hidden border-r-[1.8px] border-warnaKuning px-3 py-1 font-semibold md:table-cell"
                        >
                            Type
                        </th>
                    </tr>
                </thead>
                <tbody class="table-detail-fleet text-stone-700">
                    <tr>
                        <td data-cell="Seq" class="block px-3 py-1 font-medium md:table-cell">1</td>
                        <td data-cell="Address" class="block px-3 py-1 font-medium md:table-cell">
                            {{ $fleets['address'] }}
                        </td>
                        <td data-cell="App Status" class="block px-3 py-1 font-medium md:table-cell">
                            {{ $fleets['status_order'] }}
                        </td>
                        <td data-cell="Arrived Time" class="block px-3 py-1 font-medium md:table-cell">
                            {{ $fleets['arrived_time'] }}
                        </td>
                        <td data-cell="Departed Time" class="block px-3 py-1 font-medium md:table-cell">
                            {{ $fleets['departed_time'] }}
                        </td>
                        <td data-cell="ETA" class="block px-3 py-1 font-medium md:table-cell">
                            {{ $fleets['eta'] }}
                        </td>
                        <td data-cell="Mileage" class="block px-3 py-1 font-medium md:table-cell">
                            {{ $fleets['mileage'] }}
                        </td>
                        <td data-cell="Receiver Name" class="block px-3 py-1 font-medium md:table-cell">
                            {{ $fleets['receiver_name'] }}
                        </td>
                        <td data-cell="Rejection Reason" class="block px-3 py-1 font-medium md:table-cell">
                            {{ $fleets['rejection_reason'] }}
                        </td>
                        <td data-cell="Status" class="block px-3 py-1 font-medium md:table-cell">
                            {{ $fleets['status_order'] }}
                        </td>
                        <td data-cell="Time app Update" class="block px-3 py-1 font-medium md:table-cell">
                            {{ $fleets['time_app_update'] }}
                        </td>
                        <td data-cell="Type" class="block px-3 py-1 font-medium md:table-cell">
                            {{ $fleets['type'] }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
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
