<header
    class="sticky top-0 z-999999 flex w-full flex-col items-start justify-between gap-1 bg-[rgba(234,239,247,0.7)] px-3 py-1 backdrop-blur-sm sm:flex-row sm:items-center"
>
    <div class="flex items-center gap-3">
        <button
            title="Toggle Navigation"
            x-on:click="$store.navbar.toggleOpenNav()"
            class="group flex cursor-pointer flex-col gap-[5px] md:gap-1.5 lg:hidden"
        >
            <span
                class="hamburger group-active:shadow-[0_0_15px_7px_rgba(92,119,219,0.5)]"
                :class="{ 'origin-top-left rotate-43 bp400:rotate-42 sm:rotate-40 md:rotate-41 lg:rotate-36': $store.navbar?.openNav ?? false }"
            ></span>
            <span
                class="hamburger group-active:shadow-[0_0_15px_7px_rgba(92,119,219,0.5)]"
                :class="{ 'origin-left scale-0': $store.navbar?.openNav ?? false }"
            ></span>
            <span
                class="hamburger group-active:shadow-[0_0_15px_7px_rgba(92,119,219,0.5)]"
                :class="{ 'origin-bottom-left -rotate-43 bp400:-rotate-42 sm:-rotate-40 md:-rotate-41 lg:-rotate-36': $store.navbar?.openNav ?? false }"
            ></span>
        </button>
        <button
            title="Toggle Navigation"
            x-on:click="$store.navbar.toggleCollapse()"
            class="group relative hidden cursor-pointer flex-col gap-[5px] lg:flex lg:gap-[6px] 2xl:gap-[7px]"
        >
            <span class="hamburger group-active:shadow-[0_0_15px_7px_rgba(92,119,219,0.5)]"></span>
            <span
                class="hamburger group-active:shadow-[0_0_15px_7px_rgba(92,119,219,0.5)]"
                :class="{'w-5 shadow-2xl': $store.navbar?.isCollapsed ?? false }"
            ></span>
            <span
                class="hamburger group-active:shadow-[0_0_15px_7px_rgba(92,119,219,0.5)]"
                :class="{'w-3 shadow-2xl': $store.navbar?.isCollapsed ?? false }"
            ></span>
        </button>
        <figure class="w-25 bp400:w-30 bp575:w-35 xl:w-38 2xl:w-40">
            <img src="/img/logo.png" alt="gateway logo" />
        </figure>
        <p
            class="rounded-4xl bg-warnaBiruTua px-2 py-1 text-[.6rem] font-medium text-white bp360:text-[.65rem] bp400:text-[.7rem] sm:text-xs xl:text-[.82rem] 2xl:text-sm"
        >
            Administrator Panel
        </p>
    </div>

    <div class="flex items-center gap-2 self-end sm:self-center">
        <div x-data="{ openNotif: false }" class="relative">
            <button x-on:click="openNotif = !openNotif" class="notifPreferences cursor-pointer">
                <i class="fa-regular fa-bell mr-1"></i>
                NOTIFICATIONS
            </button>

            <div
                x-show="openNotif"
                x-on:click.outside="openNotif = false"
                x-cloak
                x-transition:enter="transition duration-300 ease-out"
                x-transition:enter-start="transform opacity-0"
                x-transition:enter-end="transform opacity-100"
                x-transition:leave="transition duration-300 ease-in"
                x-transition:leave-start="transform opacity-100"
                x-transition:leave-end="transform opacity-0"
                class="arrow-box absolute top-[110%] -right-9 z-5 rounded-md bg-white shadow-[0_0_4px_0.4px_rgba(0,0,0,0.5)] bp575:right-0"
            >
                <div
                    class="w-full rounded-tl-md rounded-tr-md bg-warnaBiruTua px-4 py-1 text-[.65rem] font-medium text-white bp360:text-[.7rem] bp400:text-xs bp575:text-[.8rem] lg:text-sm xl:text-base 2xl:text-lg"
                >
                    <h3>NOTIFICATIONS</h3>
                </div>
                <div
                    class="border-b-[1.8px] border-stone-300 p-1 px-4 text-[.65rem] font-semibold text-stone-500 bp360:text-[.7rem] bp400:text-xs bp575:text-[.8rem] lg:text-sm xl:text-base 2xl:text-lg"
                >
                    NEW
                </div>
                <div
                    class="flex flex-col bg-warnaDasarBackground px-3 py-3 text-[.6rem] transition-all duration-300 ease-in-out hover:bg-slate-300 bp360:text-[.7rem] bp400:text-[.65rem] bp575:text-[.7rem] lg:text-xs xl:text-sm 2xl:text-base"
                >
                    <a href="" class="flex font-medium">
                        <div class="w-[max-content] min-w-[max-content] text-stone-700">
                            <p>
                                Your Request List with Number
                                <br />
                                <strong class="font-[600] text-stone-800">RL0001001</strong>
                                &nbsp;has been approved
                            </p>
                            <span class="text-stone-500">
                                <i class="fa-solid fa-clock"></i>
                                &nbsp;Just Now
                            </span>
                        </div>
                        <div class="w-full">
                            <div class="w-10 bp400:w-15 bp575:w-20 lg:w-25 xl:w-30"></div>
                        </div>
                    </a>
                </div>
                <div
                    class="w-full rounded-br-md rounded-bl-md bg-warnaBiruTua text-center text-[.65rem] font-medium text-white hover:text-stone-300 bp360:text-[.7rem] bp400:text-xs bp575:text-[.8rem] lg:text-sm xl:text-base 2xl:text-lg"
                >
                    <a href="" class="inline-block w-full py-2">VIEW ALL</a>
                </div>
            </div>
        </div>

        <div x-data="{ openPref: false }" class="relative">
            <button x-on:click="openPref = !openPref" class="notifPreferences cursor-pointer">
                <i class="fa-regular fa-address-card mr-1"></i>
                PREFERENCES
            </button>

            <div
                x-show="openPref"
                x-on:click.outside="openPref = false"
                x-cloak
                x-transition:enter="transition duration-300 ease-out"
                x-transition:enter-start="transform opacity-0"
                x-transition:enter-end="transform opacity-100"
                x-transition:leave="transition duration-300 ease-in"
                x-transition:leave-start="transform opacity-100"
                x-transition:leave-end="transform opacity-0"
                class="arrow-box absolute top-[110%] right-0 z-5 rounded-md bg-white text-[.7rem] font-medium text-stone-700 shadow-[0_0_4px_0.4px_rgba(0,0,0,0.5)] bp360:text-xs bp400:text-[.8rem] bp575:text-sm xl:text-base 2xl:text-lg"
            >
                <a
                    href=""
                    class="inline-block w-full rounded-tl-md rounded-tr-md bg-white py-2 pr-15 pl-4 transition-all duration-300 ease-in-out hover:bg-warnaDasarBackground bp575:py-3 bp575:pr-20"
                >
                    Settings
                </a>
                <hr class="border-t-[1.8px] text-stone-300" />
                <a
                    href="/login"
                    class="inline-block w-full rounded-br-md rounded-bl-md bg-white py-2 pr-15 pl-4 transition-all duration-300 ease-in-out hover:bg-warnaDasarBackground bp575:py-3 bp575:pr-20"
                >
                    Logout
                </a>
            </div>
        </div>
    </div>
</header>
