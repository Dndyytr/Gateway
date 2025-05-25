<form
    x-data="{
        hasFile: false,
        checkFile() {
            this.hasFile = event.target.files.length > 0
        },
    }"
    action="{{ route('dm-import-non-direct-schedule.import-store') }}"
    method="post"
    enctype="multipart/form-data"
    class="bpHeight-3 flex w-full flex-col gap-3 overflow-y-auto px-3 pb-3"
>
    @csrf
    <div class="flex w-full flex-col gap-5">
        <a
            href=""
            class="h-max w-max cursor-pointer rounded-sm bg-warnaBiruTua px-3 py-1 text-xs font-medium text-white transition-all duration-300 ease-in-out hover:bg-warnaBiruHover bp400:text-sm bp575:text-base xl:text-lg 2xl:text-xl"
        >
            Download Example
        </a>

        <div class="flex w-full flex-col gap-5 bp575:flex-row">
            <div
                class="flex w-full flex-col gap-1 text-[.7rem] font-medium text-stone-700 bp360:text-xs bp400:text-[.8rem] bp575:text-sm xl:text-base 2xl:text-lg"
            >
                <label for="file">FILE</label>
                <input
                    type="file"
                    name="file"
                    id="file"
                    x-on:change="checkFile"
                    required
                    :class="hasFile ? 'outline-warnaBiruTua' : 'outline-transparent'"
                    class="{{ $errors->has('file') ? 'text-red-400' : 'text-warnaAbu1' }} input-file shadow-[0_0_3px_0.1px_rgba(0,0,0,0.5)] file:px-2 file:py-[6px]"
                />
            </div>

            <div
                class="flex w-full gap-2 text-xs font-medium text-white bp400:text-sm bp575:self-end bp575:text-base xl:text-lg 2xl:text-xl"
            >
                <a
                    class="h-max w-max cursor-pointer rounded-sm bg-warnaAbu3 px-3 py-1 transition-all duration-300 ease-in-out hover:bg-stone-400"
                    href="/dm-import-non-direct-schedule"
                >
                    ❮ Return
                </a>
                <button
                    class="h-max w-max cursor-pointer rounded-sm bg-warnaBiruTua px-3 py-1 transition-all duration-300 ease-in-out hover:bg-warnaBiruHover"
                    type="submit"
                >
                    Save
                </button>
            </div>
        </div>
    </div>
</form>
