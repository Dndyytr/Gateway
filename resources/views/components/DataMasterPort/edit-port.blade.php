<form
    x-data="mapComponent"
    data-latitude="{{ $port['latitude'] }}"
    data-longitude="{{ $port['longitude'] }}"
    data-country="{{ $port['country'] }}"
    data-country-code="{{ $port['country_code'] }}"
    data-city="{{ $port['city'] }}"
    data-address="{{ $port['address'] }}"
    action="{{ route('dm-port.update', ['slug' => $port['slug']]) }}"
    method="post"
    class="bpHeight-3 flex w-full flex-col gap-3 overflow-y-auto px-3 pb-3"
>
    @csrf
    @method('PUT')
    <div class="grid w-full grid-cols-1 gap-3 bp575:grid-cols-[1fr_0.85fr]">
        <div class="flex w-full flex-col gap-2">
            <div
                class="flex w-full flex-col gap-1 text-[.7rem] font-medium text-stone-700 bp360:text-xs bp400:text-[.8rem] bp575:text-sm xl:text-base 2xl:text-lg"
            >
                <label for="port_name">PORT NAME</label>
                <input
                    class="{{ $errors->has('port_name') ? 'outline-red-400' : 'outline-transparent' }} shadow-input w-full rounded-sm p-[6px] outline-2 transition-all duration-300 ease-in-out focus:outline-warnaBiruTua"
                    type="text"
                    name="port_name"
                    id="port_name"
                    placeholder="Input Port Name"
                    value="{{ old('port_name', $port['port_name']) }}"
                    required
                />
            </div>
            <div
                class="flex w-full flex-col gap-1 text-[.7rem] font-medium text-stone-700 bp360:text-xs bp400:text-[.8rem] bp575:text-sm xl:text-base 2xl:text-lg"
            >
                <label for="type">TYPE</label>
                <select
                    name="type"
                    id="type"
                    required
                    class="{{ $errors->has('type') ? 'outline-red-400' : 'outline-transparent' }} w-full cursor-pointer appearance-none rounded-sm p-[6px] shadow-[0_0_2px_0.1px_rgba(0,0,0,0.5)] outline-2 transition-all duration-300 ease-in-out focus:outline-warnaBiruTua"
                >
                    <option
                        {{ old('type', $port['type'] ?? '') == '' ? 'selected' : '' }}
                        class="transition-all duration-300 ease-in-out checked:bg-warnaBiruTua checked:text-white"
                    >
                        - Choose -
                    </option>
                    <option
                        value="sea_freight"
                        {{ old('type', $port['type'] ?? '') == 'sea_freight' ? 'selected' : '' }}
                        class="transition-all duration-300 ease-in-out checked:bg-warnaBiruTua checked:text-white"
                    >
                        SEA FREIGHT
                    </option>
                    <option
                        value="air_freight"
                        {{ old('type', $port['type'] ?? '') == 'air_freight' ? 'selected' : '' }}
                        class="transition-all duration-300 ease-in-out checked:bg-warnaBiruTua checked:text-white"
                    >
                        AIR FREIGHT
                    </option>
                </select>
            </div>
            <div
                class="flex w-full flex-col gap-2 text-[.7rem] font-medium text-stone-700 bp360:text-xs bp400:text-[.8rem] bp575:flex-row bp575:text-sm xl:text-base 2xl:text-lg"
            >
                <div class="flex w-full flex-col gap-1">
                    <label for="country">COUNTRY</label>
                    <input
                        x-model="country"
                        class="{{ $errors->has('country') ? 'outline-red-400' : 'outline-transparent' }} shadow-input w-full rounded-sm p-[6px] outline-2 transition-all duration-300 ease-in-out focus:outline-warnaBiruTua"
                        type="text"
                        name="country"
                        id="country"
                        placeholder="Input Country"
                    />
                </div>
                <div class="flex w-full flex-col gap-1">
                    <label for="country_code">COUNTRY CODE</label>
                    <input
                        x-model="countryCode"
                        class="{{ $errors->has('country_code') ? 'outline-red-400' : 'outline-transparent' }} shadow-input w-full rounded-sm p-[6px] outline-2 transition-all duration-300 ease-in-out focus:outline-warnaBiruTua"
                        type="text"
                        name="country_code"
                        id="country_code"
                        placeholder="Input Country Code"
                    />
                </div>
                <div class="flex w-full flex-col gap-1">
                    <label for="city">CITY</label>
                    <input
                        x-model="city"
                        class="{{ $errors->has('city') ? 'outline-red-400' : 'outline-transparent' }} shadow-input w-full rounded-sm p-[6px] outline-2 transition-all duration-300 ease-in-out focus:outline-warnaBiruTua"
                        type="text"
                        name="city"
                        id="city"
                        placeholder="Input City"
                    />
                </div>
            </div>
            <div
                class="flex h-full w-full flex-col gap-1 text-[.7rem] font-medium text-stone-700 bp360:text-xs bp400:text-[.8rem] bp575:text-sm xl:text-base 2xl:text-lg"
            >
                <label for="address">ADDRESS</label>
                <textarea
                    x-model="address"
                    class="{{ $errors->has('address') ? 'outline-red-400' : 'outline-transparent' }} shadow-input h-full w-full rounded-sm p-[6px] outline-2 transition-all duration-300 ease-in-out focus:outline-warnaBiruTua"
                    name="address"
                    id="address"
                    placeholder="Input Address"
                    rows="5"
                    cols="50"
                    required
                ></textarea>
            </div>

            <div
                class="flex w-full flex-col gap-2 text-[.7rem] font-medium text-stone-700 bp360:text-xs bp400:text-[.8rem] bp575:flex-row bp575:text-sm xl:text-base 2xl:text-lg"
            >
                <div class="flex w-full flex-col gap-1">
                    <label for="latitude">LATITUDE</label>
                    <input
                        x-model="latitude"
                        class="{{ $errors->has('latitude') ? 'outline-red-400' : 'outline-transparent' }} shadow-input w-full rounded-sm p-[6px] outline-2 transition-all duration-300 ease-in-out focus:outline-warnaBiruTua"
                        type="text"
                        name="latitude"
                        id="latitude"
                        placeholder="Input Latitude"
                        readonly
                        required
                    />
                </div>
                <div class="flex w-full flex-col gap-1">
                    <label for="longitude">LONGITUDE</label>
                    <input
                        x-model="longitude"
                        class="{{ $errors->has('longitude') ? 'outline-red-400' : 'outline-transparent' }} shadow-input w-full rounded-sm p-[6px] outline-2 transition-all duration-300 ease-in-out focus:outline-warnaBiruTua"
                        type="text"
                        name="longitude"
                        id="longitude"
                        placeholder="Input Longitude"
                        readonly
                        required
                    />
                </div>
            </div>
        </div>

        <div class="h-[13rem] w-full bp400:h-[16rem] bp575:h-full">
            <!-- Selalu render div#map, tetapi sembunyikan jika ada error -->
            <div id="map" class="h-full w-full" x-bind:class="{ 'hidden': mapError }"></div>
            <!-- Tampilkan pesan error jika mapError true -->
            <div
                x-show="mapError"
                class="place-self-center rounded-xs bg-warnaKuning p-4 text-xs text-warnaBiruTua bp400:text-sm bp575:text-base xl:text-lg 2xl:text-xl"
                x-cloak
            >
                <span x-text="errorMessage"></span>
            </div>
        </div>
    </div>

    <div
        class="mt-1 mb-3 flex gap-2 text-xs font-medium text-white bp400:text-sm bp575:text-base xl:text-lg 2xl:text-xl"
    >
        <a
            class="cursor-pointer rounded-sm bg-warnaAbu3 px-3 py-1 transition-all duration-300 ease-in-out hover:bg-stone-400"
            href="/dm-port"
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
