<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>Gateway</title>

        {{-- fonts awesome icons --}}
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
            integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        />

        {{-- Vite --}}
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <style>
        html,
        body {
            background-color: #eaeff7;
            overflow-x: hidden;
            font-family: 'Poppins', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            height: 100%;
        }
    </style>

    <body class="relative grid place-items-center">
        @if (session()->has('error'))
            <div
                x-data="{ show: true, loading: false }"
                x-show="show"
                x-cloak
                x-init="
                    setTimeout(() => (show = false), 3000)
                    setTimeout(() => (loading = true), 1)
                "
                x-transition:enter="transition duration-500 ease-out"
                x-transition:enter-start="-translate-y-full transform"
                x-transition:enter-end="translate-y-0 transform"
                x-transition:leave="transition duration-450 ease-in"
                x-transition:leave-start="translate-y-0 transform"
                x-transition:leave-end="-translate-y-full transform"
                class="fixed top-0 z-99999999 w-[80%] max-w-[35rem] overflow-hidden rounded-sm bg-white text-xs shadow-[0_0_4px_0.4px_rgba(0,0,0,0.5)] bp360:text-sm bp400:text-[.9rem] bp575:text-[.95rem] md:w-[60%] xl:text-base 2xl:text-lg"
            >
                <div class="bg-warnaMerahTombol pr-2">
                    <button
                        x-on:click="show = false"
                        class="ml-auto block cursor-pointer text-[1.5em] text-white transition-all duration-300 ease-in-out hover:text-stone-300"
                    >
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <div
                    x-bind:class="loading ? 'w-0' : 'w-full'"
                    class="h-[6px] bg-gradient-to-r from-red-400 to-red-600 transition-all duration-3000 ease-linear"
                ></div>
                <div class="my-2 flex flex-col items-center gap-1 text-center text-stone-700">
                    <i
                        class="fa-solid fa-triangle-exclamation animate-exclamation text-[2.5em] text-warnaMerahTombol"
                    ></i>
                    <p class="px-3 font-medium">Error Login, {{ session('error') }}</p>
                </div>
            </div>
        @endif

        <main class="grid h-full w-full place-items-center px-3 py-5">
            <div
                class="flex w-full max-w-[40rem] flex-col overflow-hidden rounded-sm shadow-[0_0_6px_0.2px_rgba(0,0,0,0.5)] bp575:flex-row lg:max-w-[46rem] xl:max-w-[50rem]"
            >
                <div
                    class="login-background relative z-9 flex w-full basis-[70%] flex-col items-center justify-between bg-warnaBiruTua p-3 text-center text-xs text-white bp360:text-sm bp400:text-[.9rem] bp575:text-[.95rem] lg:p-7 xl:text-base 2xl:text-lg"
                >
                    <div class="z-9 flex flex-col items-center">
                        <figure class="w-full border-b-[1.8px] border-white">
                            <img
                                class="mx-auto mb-3 w-[50%] border-b-[1.8px] border-white bp575:w-[70%]"
                                src="/img/logo.png"
                                alt="gateway logo"
                            />
                        </figure>
                        <h1 class="mt-1 font-bold">Welcome to Customer Portal</h1>
                        <p class="font-medium text-stone-200">The Place to Order Freight Forwarding & more</p>
                    </div>
                    <div class="z-9 flex flex-col gap-1">
                        <p>Have an account?</p>
                        <a
                            class="w-max self-center rounded-sm border-[1.3px] border-white px-7 py-1 font-medium transition-all duration-300 ease-in-out hover:bg-white hover:text-warnaBiruTua"
                            href="/login"
                        >
                            Login
                        </a>
                    </div>
                </div>
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
                    action="{{ route('register.store') }}"
                    method="POST"
                    enctype="multipart/form-data"
                    class="flex w-full basis-full flex-col gap-2 bg-white px-3 py-3 text-xs font-medium text-warnaAbu2 bp360:text-sm bp400:text-[.9rem] bp575:py-12 bp575:text-[.95rem] lg:px-9 xl:text-base 2xl:text-lg"
                >
                    @csrf
                    <legend class="text-[1.5em] font-semibold text-warnaAbu1">Register</legend>
                    {{-- company name --}}
                    <label for="company_name">Company Name</label>
                    <input
                        class="shadow-input {{ $errors->has('company_name') ? 'outline-red-400' : 'outline-transparent' }} w-full rounded-sm bg-warnaAbuInput px-2 py-[6px] text-warnaAbu1 outline-2 transition-all duration-400 ease-in-out focus:outline-warnaBiruTua"
                        type="text"
                        name="company_name"
                        id="company_name"
                        title="Company Name"
                        required
                        placeholder="Enter Company Name"
                    />
                    {{-- person in charge --}}
                    <label for="person_in_charge">Person in Charge</label>
                    <input
                        class="shadow-input {{ $errors->has('person_in_charge') ? 'outline-red-400' : 'outline-transparent' }} w-full rounded-sm bg-warnaAbuInput px-2 py-[6px] text-warnaAbu1 outline-2 transition-all duration-400 ease-in-out focus:outline-warnaBiruTua"
                        type="text"
                        name="person_in_charge"
                        id="person_in_charge"
                        title="Person in Charge"
                        required
                        placeholder="Enter Person in Charge"
                    />
                    {{-- npwp --}}
                    <label for="npwp">NPWP</label>

                    <input
                        type="file"
                        name="npwp"
                        id="npwp"
                        x-on:change="checkNpwpFile"
                        required
                        :class="hasNpwpFile ? 'outline-warnaBiruTua' : 'outline-transparent'"
                        class="{{ $errors->has('npwp') ? 'text-red-400' : 'text-warnaAbu1' }} input-file bg-warnaAbuInput shadow-[0_0_3px_0.1px_rgba(0,0,0,0.5)] file:px-2 file:py-[6px]"
                    />
                    {{-- nib --}}
                    <label for="company_legality">COMPANY LEGALITY (NIB)</label>
                    <input
                        type="file"
                        name="company_legality"
                        id="company_legality"
                        x-on:change="checkNibFile"
                        required
                        :class="hasNibFile ? 'outline-warnaBiruTua' : 'outline-transparent'"
                        class="{{ $errors->has('company_legality') ? 'text-red-400' : 'text-warnaAbu1' }} input-file bg-warnaAbuInput shadow-[0_0_3px_0.1px_rgba(0,0,0,0.5)] file:px-2 file:py-[6px]"
                    />
                    {{-- email --}}
                    <label for="email_address">Email Address</label>
                    <input
                        type="email"
                        id="email_address"
                        name="email_address"
                        title="Email Address"
                        required
                        autocomplete="email"
                        placeholder="Enter Email Address"
                        class="shadow-input {{ $errors->has('email_address') ? 'outline-red-400' : 'outline-transparent' }} w-full rounded-sm bg-warnaAbuInput px-2 py-[6px] text-warnaAbu1 outline-2 transition-all duration-400 ease-in-out focus:outline-warnaBiruTua"
                    />
                    {{-- password --}}
                    <div class="flex w-full gap-2">
                        <fieldset class="flex w-full flex-col gap-1">
                            <label for="password">Password</label>
                            <input
                                type="password"
                                id="password"
                                name="password"
                                title="Password"
                                required
                                autocomplete="new-password"
                                placeholder="Enter Password"
                                class="shadow-input {{ $errors->has('password') ? 'outline-red-400' : 'outline-transparent' }} w-full rounded-sm bg-warnaAbuInput px-2 py-[6px] text-warnaAbu1 outline-2 transition-all duration-400 ease-in-out focus:outline-warnaBiruTua"
                            />
                        </fieldset>
                        <fieldset class="flex w-full flex-col gap-1">
                            <label for="confirm_password" class="whitespace-nowrap">Confirm Password</label>
                            <input
                                type="password"
                                id="confirm_password"
                                name="confirm_password"
                                title="Confirm Password"
                                required
                                autocomplete="new-password"
                                placeholder="Confirm Password"
                                class="shadow-input {{ $errors->has('confirm_password') ? 'outline-red-400' : 'outline-transparent' }} w-full rounded-sm bg-warnaAbuInput px-2 py-[6px] text-warnaAbu1 outline-2 transition-all duration-400 ease-in-out focus:outline-warnaBiruTua"
                            />
                        </fieldset>
                    </div>
                    <button
                        class="mt-2 cursor-pointer rounded-sm bg-warnaBiruTua py-[6px] text-white transition-all duration-300 ease-in-out hover:bg-warnaBiruHover"
                        type="submit"
                    >
                        Register
                    </button>
                </form>
            </div>
        </main>
    </body>
</html>
