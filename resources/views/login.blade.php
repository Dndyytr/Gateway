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
                class="fixed top-0 z-9999999 w-[80%] max-w-[35rem] overflow-hidden rounded-sm bg-white text-xs shadow-[0_0_4px_0.4px_rgba(0,0,0,0.5)] bp360:text-sm bp400:text-[.9rem] bp575:text-[.95rem] md:w-[60%] xl:text-base 2xl:text-lg"
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
                class="flex w-full max-w-[38rem] flex-col overflow-hidden rounded-sm shadow-[0_0_6px_0.2px_rgba(0,0,0,0.5)] bp575:flex-row lg:max-w-[41rem] xl:max-w-[45rem]"
            >
                <div
                    class="login-background relative z-9 flex basis-[70%] flex-col items-center justify-between bg-warnaBiruTua p-3 text-center text-xs text-white bp360:text-sm bp400:text-[.9rem] bp575:text-[.95rem] lg:p-7 xl:text-base 2xl:text-lg"
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
                        <p class="font-medium text-stone-200">The Place to Order Shipment For Our Customers</p>
                    </div>
                    <div class="z-9">
                        <p>Don't have an account?</p>
                        <a
                            class="underline transition-all duration-300 ease-in-out hover:text-stone-300 hover:no-underline"
                            href="/register"
                        >
                            Get started!
                        </a>
                    </div>
                </div>
                <form
                    action="{{ route('login.store') }}"
                    method="POST"
                    class="flex basis-full flex-col gap-2 bg-white px-3 py-3 text-xs font-medium text-warnaAbu2 bp360:text-sm bp400:text-[.9rem] bp575:py-12 bp575:text-[.95rem] lg:px-9 xl:text-base 2xl:text-lg"
                >
                    @csrf
                    <legend class="text-[1.5em] font-semibold text-warnaAbu1">Account Login</legend>
                    <label for="email">Email</label>
                    <input
                        class="shadow-input {{ $errors->has('email') ? 'outline-red-400' : 'outline-transparent' }} rounded-sm bg-warnaAbuInput px-2 py-[6px] text-warnaAbu1 outline-2 transition-all duration-400 ease-in-out focus:outline-warnaBiruTua"
                        type="email"
                        name="email"
                        id="email"
                        required
                        title="Email Address"
                        autocomplete="username"
                        placeholder="Enter Email"
                    />
                    <label for="password">Password</label>
                    <div
                        x-data="{ isVisible: false }"
                        class="shadow-input {{ $errors->has('password') ? 'outline-red-400' : 'outline-transparent' }} flex items-center gap-1 rounded-sm bg-warnaAbuInput px-2 py-[6px] text-warnaAbu1 outline-2 transition-all duration-400 ease-in-out focus-within:outline-warnaBiruTua"
                    >
                        <input
                            class="w-full outline-none"
                            x-bind:type="isVisible ? 'text' : 'password'"
                            type="password"
                            name="password"
                            id="password"
                            required
                            autocomplete="current-password"
                            title="Password"
                            placeholder="Enter Password"
                        />
                        <i
                            x-bind:class="isVisible ? 'fa-solid fa-eye' : 'fa-solid fa-eye-slash'"
                            x-on:click="isVisible = !isVisible"
                            class="fa-solid fa-eye-slash w-[10%] cursor-pointer text-center text-[1.3em] transition-all duration-300 ease-in-out hover:text-slate-500 bp575:text-[1.1em]"
                        ></i>
                    </div>
                    <div class="flex items-center gap-2" title="Remember Me">
                        <input
                            name="remember"
                            id="remember"
                            type="checkbox"
                            class="h-[13px] w-[13px] cursor-pointer transition-all duration-300 ease-in-out bp360:h-[14px] bp360:w-[14px] bp400:h-[15px] bp400:w-[15px] bp575:h-[16px] bp575:w-[16px] 2xl:h-[17px] 2xl:w-[17px]"
                        />
                        <label for="remember">Remember Me</label>
                    </div>
                    <a
                        title="Forgot Password?"
                        href=""
                        class="text-blue-600 transition-all duration-300 ease-in-out hover:text-blue-500 hover:underline"
                    >
                        Forgot Password?
                    </a>
                    <button
                        class="cursor-pointer rounded-sm bg-warnaBiruTua py-[6px] text-white transition-all duration-300 ease-in-out hover:bg-warnaBiruHover"
                        type="submit"
                    >
                        Login
                    </button>
                </form>
            </div>
        </main>
    </body>
</html>
