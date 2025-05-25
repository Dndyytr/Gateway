<form
    action="{{ route('dm-depot-container.update', ['slug' => $depot['slug']]) }}"
    method="post"
    class="bpHeight-3 flex w-full flex-col gap-3 overflow-y-auto px-3 pb-3"
>
    @csrf
    @method('PUT')
    <div class="flex w-full flex-col gap-3">
        <div class="flex w-full flex-col gap-3 bp575:flex-row">
            <div
                class="flex w-full flex-col gap-1 text-[.7rem] font-medium text-stone-700 bp360:text-xs bp400:text-[.8rem] bp575:text-sm xl:text-base 2xl:text-lg"
            >
                <label for="depot_name">DEPOT NAME</label>
                <input
                    class="{{ $errors->has('depot_name') ? 'outline-red-400' : 'outline-transparent' }} shadow-input w-full rounded-sm p-[6px] outline-2 transition-all duration-300 ease-in-out focus:outline-warnaBiruTua"
                    type="text"
                    name="depot_name"
                    id="depot_name"
                    placeholder="Input Depot Name"
                    value="{{ old('depoy_name', $depot['depot_name']) }}"
                    required
                />
            </div>
            <div
                class="flex w-full flex-col gap-1 text-[.7rem] font-medium text-stone-700 bp360:text-xs bp400:text-[.8rem] bp575:text-sm xl:text-base 2xl:text-lg"
            >
                <label for="city">CITY</label>
                <input
                    class="{{ $errors->has('city') ? 'outline-red-400' : 'outline-transparent' }} shadow-input w-full rounded-sm p-[6px] outline-2 transition-all duration-300 ease-in-out focus:outline-warnaBiruTua"
                    type="text"
                    name="city"
                    id="city"
                    placeholder="Input City"
                    value="{{ old('city', $depot['city']) }}"
                    required
                />
            </div>
        </div>

        <div
            class="flex h-full w-full flex-col gap-1 text-[.7rem] font-medium text-stone-700 bp360:text-xs bp400:text-[.8rem] bp575:text-sm xl:text-base 2xl:text-lg"
        >
            <label for="address">ADDRESS</label>
            <textarea
                class="{{ $errors->has('address') ? 'outline-red-400' : 'outline-transparent' }} shadow-input h-full w-full rounded-sm p-[6px] outline-2 transition-all duration-300 ease-in-out focus:outline-warnaBiruTua"
                name="address"
                id="address"
                placeholder="Input Address"
                rows="10"
                cols="100"
                required
            >
{{ old('address', $depot['address']) }}</textarea
            >
        </div>
    </div>

    <div
        class="mt-1 mb-3 flex gap-2 text-xs font-medium text-white bp400:text-sm bp575:text-base xl:text-lg 2xl:text-xl"
    >
        <a
            class="cursor-pointer rounded-sm bg-warnaAbu3 px-3 py-1 transition-all duration-300 ease-in-out hover:bg-stone-400"
            href="/dm-depot-container"
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
