<form
    action="{{ route('dm-size-container.update', ['slug' => $size['slug']]) }}"
    method="post"
    class="bpHeight-3 flex w-full flex-col gap-3 overflow-y-auto px-3 pb-3"
>
    @csrf
    @method('PUT')
    <div class="flex w-full flex-col gap-3 bp575:flex-row">
        <div
            class="flex w-full flex-col gap-1 text-[.7rem] font-medium text-stone-700 bp360:text-xs bp400:text-[.8rem] bp575:text-sm xl:text-base 2xl:text-lg"
        >
            <label for="value">VALUE</label>
            <input
                class="{{ $errors->has('code') ? 'outline-red-400' : 'outline-transparent' }} shadow-input w-full rounded-sm p-[6px] outline-2 transition-all duration-300 ease-in-out focus:outline-warnaBiruTua"
                type="text"
                name="value"
                id="value"
                placeholder="Input Value"
                value="{{ old('value', $size['value']) }}"
                required
            />
        </div>
        <div
            class="flex w-full flex-col gap-1 text-[.7rem] font-medium text-stone-700 bp360:text-xs bp400:text-[.8rem] bp575:text-sm xl:text-base 2xl:text-lg"
        >
            <label for="display">DISPLAY</label>
            <input
                class="{{ $errors->has('title') ? 'outline-red-400' : 'outline-transparent' }} shadow-input w-full rounded-sm p-[6px] outline-2 transition-all duration-300 ease-in-out focus:outline-warnaBiruTua"
                type="text"
                name="display"
                id="display"
                placeholder="Input Display"
                value="{{ old('display', $size['display']) }}"
                required
            />
        </div>
    </div>

    <div
        class="mt-1 mb-3 flex gap-2 text-xs font-medium text-white bp400:text-sm bp575:text-base xl:text-lg 2xl:text-xl"
    >
        <a
            class="cursor-pointer rounded-sm bg-warnaAbu3 px-3 py-1 transition-all duration-300 ease-in-out hover:bg-stone-400"
            href="/dm-size-container"
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
