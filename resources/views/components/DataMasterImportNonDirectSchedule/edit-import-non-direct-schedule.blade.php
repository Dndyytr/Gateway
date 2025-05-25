<form
    action="{{ route('dm-import-non-direct-schedule.update', ['slug' => $importNon['slug']]) }}"
    method="post"
    class="bpHeight-3 flex w-full flex-col gap-3 overflow-y-auto px-3 pb-3"
>
    @csrf
    @method('PUT')
    <div class="flex w-full flex-col gap-3 bp575:flex-row">
        <div class="flex w-full flex-col gap-3">
            <div
                class="flex w-full flex-col gap-1 text-[.7rem] font-medium text-stone-700 bp360:text-xs bp400:text-[.8rem] bp575:text-sm xl:text-base 2xl:text-lg"
            >
                <label for="destination">DESTINATION</label>
                <input
                    class="{{ $errors->has('destination') ? 'outline-red-400' : 'outline-transparent' }} shadow-input w-full rounded-sm p-[6px] outline-2 focus:outline-warnaBiruTua"
                    type="text"
                    name="destination"
                    id="destination"
                    placeholder="Input Destination"
                    value="{{ old('destination', $importNon['destination']) }}"
                    required
                />
            </div>
            <div
                class="flex w-full flex-col gap-1 text-[.7rem] font-medium text-stone-700 bp360:text-xs bp400:text-[.8rem] bp575:text-sm xl:text-base 2xl:text-lg"
            >
                <label for="voyage">VOYAGE</label>
                <input
                    class="{{ $errors->has('voyage') ? 'outline-red-400' : 'outline-transparent' }} shadow-input w-full rounded-sm p-[6px] outline-2 focus:outline-warnaBiruTua"
                    type="text"
                    name="voyage"
                    id="voyage"
                    placeholder="Input Voyage"
                    value="{{ old('voyage', $importNon['voyage']) }}"
                    required
                />
            </div>
            <div
                class="flex w-full flex-col gap-1 text-[.7rem] font-medium text-stone-700 bp360:text-xs bp400:text-[.8rem] bp575:text-sm xl:text-base 2xl:text-lg"
            >
                <label for="etd_origin">ETD ORIGIN</label>
                <input
                    class="{{ $errors->has('etd_origin') ? 'outline-red-400' : 'outline-transparent' }} w-full rounded-sm p-[6px] shadow-[0_0_2px_rgba(0,0,0,0.5)] outline-2 focus:outline-warnaBiruTua"
                    type="date"
                    name="etd_origin"
                    id="etd_origin"
                    value="{{ old('etd_origin', $importNon['etd_origin']) }}"
                    required
                />
            </div>
            <div
                class="flex w-full flex-col gap-1 text-[.7rem] font-medium text-stone-700 bp360:text-xs bp400:text-[.8rem] bp575:text-sm xl:text-base 2xl:text-lg"
            >
                <label for="ves_connecting">VES CONNECTING</label>
                <input
                    class="{{ $errors->has('ves_connecting') ? 'outline-red-400' : 'outline-transparent' }} shadow-input w-full rounded-sm p-[6px] outline-2 focus:outline-warnaBiruTua"
                    type="text"
                    name="ves_connecting"
                    id="ves_connecting"
                    placeholder="Input Ves Connecting"
                    value="{{ old('ves_connecting', $importNon['ves_connecting']) }}"
                    required
                />
            </div>
            <div
                class="flex w-full flex-col gap-1 text-[.7rem] font-medium text-stone-700 bp360:text-xs bp400:text-[.8rem] bp575:text-sm xl:text-base 2xl:text-lg"
            >
                <label for="connecting_city">CONNECTING CITY</label>
                <input
                    class="{{ $errors->has('connecting_city') ? 'outline-red-400' : 'outline-transparent' }} shadow-input w-full rounded-sm p-[6px] outline-2 focus:outline-warnaBiruTua"
                    type="text"
                    name="connecting_city"
                    id="connecting_city"
                    placeholder="Input Connecting City"
                    value="{{ old('connecting_city', $importNon['connecting_city']) }}"
                    required
                />
            </div>
        </div>

        <div class="flex w-full flex-col gap-3">
            <div
                class="flex w-full flex-col gap-1 text-[.7rem] font-medium text-stone-700 bp360:text-xs bp400:text-[.8rem] bp575:text-sm xl:text-base 2xl:text-lg"
            >
                <label for="vessel">VESSEL</label>
                <input
                    class="{{ $errors->has('vessel') ? 'outline-red-400' : 'outline-transparent' }} shadow-input w-full rounded-sm p-[6px] outline-2 focus:outline-warnaBiruTua"
                    type="text"
                    name="vessel"
                    id="vessel"
                    placeholder="Input Vessel"
                    value="{{ old('vessel', $importNon['vessel']) }}"
                    required
                />
            </div>
            <div
                class="flex w-full flex-col gap-1 text-[.7rem] font-medium text-stone-700 bp360:text-xs bp400:text-[.8rem] bp575:text-sm xl:text-base 2xl:text-lg"
            >
                <label for="stf/cls">STF/CLS</label>
                <input
                    class="{{ $errors->has('stf/cls') ? 'outline-red-400' : 'outline-transparent' }} w-full rounded-sm p-[6px] shadow-[0_0_2px_rgba(0,0,0,0.5)] outline-2 focus:outline-warnaBiruTua"
                    type="date"
                    name="stf/cls"
                    id="stf/cls"
                    value="{{ old('stf/cls', $importNon['stf/cls']) }}"
                    required
                />
            </div>
            <div
                class="flex w-full flex-col gap-1 text-[.7rem] font-medium text-stone-700 bp360:text-xs bp400:text-[.8rem] bp575:text-sm xl:text-base 2xl:text-lg"
            >
                <label for="eta_destination">ETA DESTINATION</label>
                <input
                    class="{{ $errors->has('eta_destination') ? 'outline-red-400' : 'outline-transparent' }} w-full rounded-sm p-[6px] shadow-[0_0_2px_rgba(0,0,0,0.5)] outline-2 focus:outline-warnaBiruTua"
                    type="date"
                    name="eta_destination"
                    id="eta_destination"
                    value="{{ old('eta_destination', $importNon['eta_destination']) }}"
                    required
                />
            </div>
            <div
                class="flex w-full flex-col gap-1 text-[.7rem] font-medium text-stone-700 bp360:text-xs bp400:text-[.8rem] bp575:text-sm xl:text-base 2xl:text-lg"
            >
                <label for="voy_connecting">VOY CONNECTING</label>
                <input
                    class="{{ $errors->has('voy_connecting') ? 'outline-red-400' : 'outline-transparent' }} shadow-input w-full rounded-sm p-[6px] outline-2 focus:outline-warnaBiruTua"
                    type="text"
                    name="voy_connecting"
                    id="voy_connecting"
                    placeholder="Input Voy Connecting"
                    value="{{ old('voy_connecting', $importNon['voy_connecting']) }}"
                    required
                />
            </div>
            <div
                class="flex w-full flex-col gap-1 text-[.7rem] font-medium text-stone-700 bp360:text-xs bp400:text-[.8rem] bp575:text-sm xl:text-base 2xl:text-lg"
            >
                <label for="etd_destination">ETD DESTINATION</label>
                <input
                    class="{{ $errors->has('etd_destination') ? 'outline-red-400' : 'outline-transparent' }} w-full rounded-sm p-[6px] shadow-[0_0_2px_rgba(0,0,0,0.5)] outline-2 focus:outline-warnaBiruTua"
                    type="date"
                    name="etd_destination"
                    id="etd_destination"
                    value="{{ old('etd_destination', $importNon['etd_destination']) }}"
                    required
                />
            </div>
        </div>
    </div>

    <div
        class="mt-1 mb-3 flex gap-2 text-xs font-medium text-white bp400:text-sm bp575:text-base xl:text-lg 2xl:text-xl"
    >
        <a
            class="cursor-pointer rounded-sm bg-warnaAbu3 px-3 py-1 transition-all duration-300 ease-in-out hover:bg-stone-400"
            href="/dm-import-non-direct-schedule"
        >
            ❮ Return
        </a>
        <button
            class="cursor-pointer rounded-sm bg-warnaKuningTombol px-3 py-1 transition-all duration-300 ease-in-out hover:bg-warnaKuning"
            type="submit"
        >
            Update
        </button>
    </div>
</form>
