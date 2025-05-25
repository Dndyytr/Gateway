<form
    x-data="{
        hasNpwpFile: false,
        hasNibFile: false,
        checkNpwpFile(event) {
            this.hasNpwpFile = event.target.files.length > 0
        },
        checkNibFile(event) {
            this.hasNibFile = event.target.files.length > 0
        },
    }"
    action="{{ route('dm-users.store') }}"
    method="post"
    enctype="multipart/form-data"
    class="bpHeight-3 m-3 flex flex-col gap-2 overflow-y-auto"
>
    @csrf
    <div class="flex w-full flex-col gap-2 sm:flex-row">
        <div
            class="flex h-[max-content] w-full flex-col gap-1 rounded-sm bg-warnaKuning px-3 pt-3 pb-4 font-medium text-stone-700"
        >
            <h3 class="text-sm bp575:text-base xl:text-lg 2xl:text-xl">Info Company</h3>
            {{-- company name --}}
            <label for="company_name" class="text-xs bp575:text-sm 2xl:text-base">COMPANY NAME</label>
            <input
                class="{{ $errors->has('company_name') ? 'outline-red-400' : 'outline-transparent' }} w-full rounded-sm bg-white px-2 py-[6px] text-xs outline-2 transition-all duration-300 ease-in-out focus:outline-warnaBiruTua bp575:text-sm 2xl:text-base"
                type="text"
                name="company_name"
                id="company_name"
                placeholder="Input Company Name"
                required
            />
            {{-- person in charge --}}
            <label for="person_in_charge" class="text-xs bp575:text-sm 2xl:text-base">PERSON IN CHARGE</label>
            <input
                class="{{ $errors->has('person_in_charge') ? 'outline-red-400' : 'outline-transparent' }} w-full rounded-sm bg-white px-2 py-[6px] text-xs outline-2 transition-all duration-300 ease-in-out focus:outline-warnaBiruTua bp575:text-sm 2xl:text-base"
                type="text"
                name="person_in_charge"
                id="person_in_charge"
                placeholder="Input Person In Charge"
                required
            />
            {{-- email address --}}
            <label for="email_address" class="text-xs bp575:text-sm 2xl:text-base">EMAIL ADDRESS</label>
            <input
                class="{{ $errors->has('email_address') ? 'outline-red-400' : 'outline-transparent' }} w-full rounded-sm bg-white px-2 py-[6px] text-xs outline-2 transition-all duration-300 ease-in-out focus:outline-warnaBiruTua bp575:text-sm 2xl:text-base"
                type="email"
                name="email_address"
                id="email_address"
                placeholder="Input Email Address"
                required
            />
            {{-- npwp --}}
            <label for="npwp" class="text-xs bp575:text-sm 2xl:text-base">NPWP</label>
            <input
                class="{{ $errors->has('npwp') ? 'outline-red-400' : 'outline-transparent' }} w-full rounded-sm bg-white px-2 py-[6px] text-xs outline-2 transition-all duration-300 ease-in-out focus:outline-warnaBiruTua bp575:text-sm 2xl:text-base"
                type="text"
                name="npwp"
                id="npwp"
                placeholder="Input NPWP"
                required
            />
            {{-- nib number --}}
            <label for="nib_number" class="text-xs bp575:text-sm 2xl:text-base">NIB NUMBER</label>
            <input
                class="{{ $errors->has('nib_number') ? 'outline-red-400' : 'outline-transparent' }} w-full rounded-sm bg-white px-2 py-[6px] text-xs outline-2 transition-all duration-300 ease-in-out focus:outline-warnaBiruTua bp575:text-sm 2xl:text-base"
                type="number"
                name="nib_number"
                id="nib_number"
                placeholder="Input NIB Number"
            />
            {{-- photo of npwp --}}
            <label for="photo_of_npwp" class="text-xs bp575:text-sm 2xl:text-base">PHOTO OF NPWP</label>
            <input
                type="file"
                id="photo_of_npwp"
                name="photo_of_npwp"
                accept="image/*"
                x-on:change="checkNpwpFile($event)"
                :class="hasNpwpFile ? 'outline-warnaBiruTua' : 'outline-transparent'"
                class="input-file {{ $errors->has('photo_of_npwp') ? 'text-red-400' : 'text-stone-700' }} bg-white text-xs font-medium file:px-2 file:py-[6px] bp575:text-sm 2xl:text-base"
            />

            {{-- photo of legality --}}
            <label for="company_legality" class="text-xs bp575:text-sm 2xl:text-base">COMPANY LEGALITY (NIB)</label>
            <input
                type="file"
                id="company_legality"
                name="company_legality"
                accept="image/*"
                x-on:change="checkNibFile($event)"
                :class="hasNibFile ? 'outline-warnaBiruTua' : 'outline-transparent'"
                class="input-file {{ $errors->has('company_legality') ? 'text-red-400' : 'text-stone-700' }} bg-white text-xs font-medium file:px-2 file:py-[6px] bp575:text-sm 2xl:text-base"
            />
        </div>
        <div
            class="flex h-[max-content] w-full basis-full flex-col gap-1 rounded-sm bg-warnaBiruTua px-3 pt-3 pb-4 font-medium text-white"
        >
            <h3 class="text-sm bp575:text-base xl:text-lg 2xl:text-xl">Info Access</h3>
            {{-- password --}}
            <label for="password" class="text-xs bp575:text-sm 2xl:text-base">PASSWORD</label>
            <input
                class="{{ $errors->has('password') ? 'outline-red-400' : 'outline-transparent' }} w-full rounded-sm bg-white px-2 py-[6px] text-xs text-stone-700 outline-2 transition-all duration-300 ease-in-out focus:outline-warnaKuning bp575:text-sm 2xl:text-base"
                type="password"
                name="password"
                id="password"
                placeholder="Input Password"
                required
            />
            {{-- confirm password --}}
            <label for="confirm_password" class="text-xs bp575:text-sm 2xl:text-base">CONFIRM PASSWORD</label>
            <input
                class="{{ $errors->has('confirm_password') ? 'outline-red-400' : 'outline-transparent' }} w-full rounded-sm bg-white px-2 py-[6px] text-xs text-stone-700 outline-2 transition-all duration-300 ease-in-out focus:outline-warnaKuning bp575:text-sm 2xl:text-base"
                type="password"
                name="confirm_password"
                id="confirm_password"
                placeholder="Input Confirm Password"
                required
            />
        </div>
    </div>

    <div
        class="mt-1 mb-3 flex gap-2 text-xs font-medium text-white bp400:text-sm bp575:text-base xl:text-lg 2xl:text-xl"
    >
        <a
            class="cursor-pointer rounded-sm bg-warnaAbu3 px-3 py-1 transition-all duration-300 ease-in-out hover:bg-stone-400"
            href="/dm-users"
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
