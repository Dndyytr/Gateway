<form
    action="{{ route('dm-truck.update', ['slug' => $truck['slug']]) }}"
    method="post"
    class="bpHeight-3 flex w-full flex-col gap-3 overflow-y-auto px-3 pb-3"
>
    @csrf
    @method('PUT')
    <div class="flex w-full flex-col gap-3 bp575:flex-row">
        <div
            class="flex w-full flex-col gap-1 text-[.7rem] font-medium text-stone-700 bp360:text-xs bp400:text-[.8rem] bp575:text-sm xl:text-base 2xl:text-lg"
        >
            <label for="truck_name">TRUCK NAME</label>
            <input
                class="{{ $errors->has('truck_name') ? 'outline-red-400' : 'outline-transparent' }} shadow-input w-full rounded-sm p-[6px] outline-2 transition-all duration-300 ease-in-out focus:outline-warnaBiruTua"
                type="text"
                name="truck_name"
                id="truck_name"
                placeholder="Input Truck Name"
                value="{{ old('truck_name', $truck['truck_name']) }}"
                required
            />
        </div>
        <div
            class="flex w-full flex-col gap-1 text-[.7rem] font-medium text-stone-700 bp360:text-xs bp400:text-[.8rem] bp575:text-sm xl:text-base 2xl:text-lg"
        >
            <label for="truck_type">TRUCK TYPE</label>
            <input
                class="{{ $errors->has('truck_type') ? 'outline-red-400' : 'outline-transparent' }} shadow-input w-full rounded-sm p-[6px] outline-2 transition-all duration-300 ease-in-out focus:outline-warnaBiruTua"
                type="text"
                name="truck_type"
                id="truck_type"
                placeholder="Input Truck Type"
                value="{{ old('truck_type', $truck['truck_type']) }}"
                required
            />
        </div>
    </div>

    <div
        class="mt-1 mb-3 flex gap-2 text-xs font-medium text-white bp400:text-sm bp575:text-base xl:text-lg 2xl:text-xl"
    >
        <a
            class="cursor-pointer rounded-sm bg-warnaAbu3 px-3 py-1 transition-all duration-300 ease-in-out hover:bg-stone-400"
            href="/dm-truck"
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
