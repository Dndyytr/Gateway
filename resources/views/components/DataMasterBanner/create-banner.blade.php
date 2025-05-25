<form
    x-data="{
        hasBannerFile: false,
        checkBannerFile() {
            this.hasBannerFile = event.target.files.length > 0
        },
    }"
    action="{{ route('dm-banner.store') }}"
    method="post"
    enctype="multipart/form-data"
    class="bpHeight-3 flex w-full flex-col gap-3 overflow-y-auto px-3 pb-3"
>
    @csrf
    <div class="flex w-full flex-col gap-3 bp575:flex-row">
        <div
            class="flex w-full flex-col gap-1 text-[.7rem] font-medium text-stone-700 bp360:text-xs bp400:text-[.8rem] bp575:text-sm xl:text-base 2xl:text-lg"
        >
            <label for="banner">BANNER</label>
            <input
                type="file"
                name="banner"
                id="banner"
                x-on:change="checkBannerFile"
                required
                accept="image/*"
                :class="hasBannerFile ? 'outline-warnaBiruTua' : 'outline-transparent'"
                class="{{ $errors->has('banner') ? 'text-red-400' : 'text-warnaAbu1' }} input-file shadow-[0_0_3px_0.1px_rgba(0,0,0,0.5)] file:px-2 file:py-[6px]"
            />
        </div>
        <div
            class="flex w-full flex-col gap-1 text-[.7rem] font-medium text-stone-700 bp360:text-xs bp400:text-[.8rem] bp575:text-sm xl:text-base 2xl:text-lg"
        >
            <label for="title">TITLE</label>
            <input
                class="{{ $errors->has('title') ? 'outline-red-400' : 'outline-transparent' }} shadow-input w-full rounded-sm p-[6px] outline-2 transition-all duration-300 ease-in-out focus:outline-warnaBiruTua"
                type="text"
                name="title"
                id="title"
                placeholder="Input title"
                required
            />
        </div>
    </div>

    <div
        class="mt-1 mb-3 flex gap-2 text-xs font-medium text-white bp400:text-sm bp575:text-base xl:text-lg 2xl:text-xl"
    >
        <a
            class="cursor-pointer rounded-sm bg-warnaAbu3 px-3 py-1 transition-all duration-300 ease-in-out hover:bg-stone-400"
            href="/dm-banner"
        >
            ❮ Return
        </a>
        <button
            class="cursor-pointer rounded-sm bg-warnaBiruTua px-3 py-1 transition-all duration-300 ease-in-out hover:bg-warnaBiruHover"
            type="submit"
        >
            Save
        </button>
    </div>
</form>
