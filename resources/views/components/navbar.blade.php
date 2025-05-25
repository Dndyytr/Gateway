<ul class="mb-5 flex flex-col gap-3 whitespace-nowrap">
    <li
        class="text-xs font-semibold text-white transition-all duration-300 ease-in-out hover:text-warnaBiruHover bp360:text-[.8rem] bp400:text-sm xl:text-[.9rem] 2xl:text-base"
    >
        <a href="/">
            <i class="fa-solid fa-chart-pie w-[21px]"></i>
            <span
                x-data="{ isTextHidden: $store.navbar.isCollapsed }"
                x-init="
                    $watch('$store.navbar.isCollapsed', (newValue) => {
                        if (newValue) {
                            // Saat mengecil, segera sembunyikan teks
                            isTextHidden = true
                        } else {
                            // Saat melebar, tunggu 2 detik sebelum menampilkan teks
                            setTimeout(() => {
                                isTextHidden = false
                            }, 200)
                        }
                    })
                "
                :class="{ 'hidden lg:hidden': isTextHidden }"
            >
                Dashboard
            </span>
        </a>
    </li>
    <li x-data="{ openDM: false }">
        <div
            x-on:click="openDM = !openDM"
            class="flex cursor-pointer items-center justify-between text-xs font-semibold text-white transition-all duration-300 ease-in-out hover:text-warnaBiruHover bp360:text-[.8rem] bp400:text-sm xl:text-[.9rem] 2xl:text-base"
        >
            <p>
                <i class="fa-regular fa-hard-drive w-[21px]"></i>
                <span
                    x-data="{ isTextHidden: $store.navbar.isCollapsed }"
                    x-init="
                        $watch('$store.navbar.isCollapsed', (newValue) => {
                            if (newValue) {
                                // Saat mengecil, segera sembunyikan teks
                                isTextHidden = true
                            } else {
                                // Saat melebar, tunggu 2 detik sebelum menampilkan teks
                                setTimeout(() => {
                                    isTextHidden = false
                                }, 200)
                            }
                        })
                    "
                    :class="{ 'hidden lg:hidden': isTextHidden }"
                >
                    Data Master
                </span>
            </p>

            <span :class="{ 'hidden lg:hidden': $store.navbar.isCollapsed }">
                <i
                    class="fa-solid fa-angle-down transition-transform duration-300"
                    :class="{ 'rotate-180': openDM}"
                ></i>
            </span>
        </div>
        <ul
            class="flex flex-col gap-[.3rem] text-[.6rem] font-semibold text-white bp360:text-[.65rem] bp400:text-[.68rem] xl:text-[.73rem] 2xl:text-xs"
            x-show="openDM && !$store.navbar.isCollapsed"
            x-cloak
            x-transition:enter="transition duration-450 ease-out"
            x-transition:enter-start="-translate-y-4 transform opacity-0"
            x-transition:enter-end="translate-y-0 transform opacity-100"
            x-transition:leave="transition duration-450 ease-in"
            x-transition:leave-start="translate-y-0 transform opacity-100"
            x-transition:leave-end="-translate-y-4 transform opacity-0"
        >
            <li class="transition-all duration-300 ease-in-out hover:text-warnaBiruHover">
                <a href="/dm-access-role">— Access Role</a>
            </li>
            <li class="transition-all duration-300 ease-in-out hover:text-warnaBiruHover">
                <a href="/dm-users">— Users</a>
            </li>
            <li class="transition-all duration-300 ease-in-out hover:text-warnaBiruHover">
                <a href="/dm-banner">— Banner</a>
            </li>
            <li class="transition-all duration-300 ease-in-out hover:text-warnaBiruHover">
                <a href="/dm-size-container">— Size Container</a>
            </li>
            <li class="transition-all duration-300 ease-in-out hover:text-warnaBiruHover">
                <a href="/dm-type-container">— Type Container</a>
            </li>
            <li class="transition-all duration-300 ease-in-out hover:text-warnaBiruHover">
                <a href="/dm-depot-container">— Depot Container</a>
            </li>
            <li class="transition-all duration-300 ease-in-out hover:text-warnaBiruHover">
                <a href="/dm-truck">— Truck</a>
            </li>
            <li class="transition-all duration-300 ease-in-out hover:text-warnaBiruHover">
                <a href="/dm-port">— Port</a>
            </li>
            <li class="transition-all duration-300 ease-in-out hover:text-warnaBiruHover">
                <a href="/dm-export-direct-schedule">— Export Direct Schedule</a>
            </li>
            <li class="transition-all duration-300 ease-in-out hover:text-warnaBiruHover">
                <a href="/dm-export-non-direct-schedule">— Export Non Direct Schedule</a>
            </li>
            <li class="transition-all duration-300 ease-in-out hover:text-warnaBiruHover">
                <a href="/dm-import-direct-schedule">— Import Direct Schedule</a>
            </li>
            <li class="transition-all duration-300 ease-in-out hover:text-warnaBiruHover">
                <a href="/dm-import-non-direct-schedule">— Import Non Direct Schedule</a>
            </li>
        </ul>
    </li>
    <li
        class="my-[.1rem] flex items-center text-[.65rem] font-bold bp360:text-[.8rem] bp400:text-xs xl:text-sm 2xl:text-base"
    >
        <p
            x-data="{ isTextHidden: $store.navbar.isCollapsed }"
            x-init="
                $watch('$store.navbar.isCollapsed', (newValue) => {
                    if (newValue) {
                        // Saat mengecil, segera sembunyikan teks
                        isTextHidden = true
                    } else {
                        // Saat melebar, tunggu 2 detik sebelum menampilkan teks
                        setTimeout(() => {
                            isTextHidden = false
                        }, 200)
                    }
                })
            "
            :class="{ 'hidden lg:hidden': isTextHidden }"
            class="mr-5 text-warnaKuning"
        >
            App
        </p>
        <p class="h-[2.23px] w-full rounded-xs bg-warnaKuning"></p>
    </li>
    <li x-data="{ openMS: false }">
        <div
            x-on:click="openMS = !openMS"
            class="flex cursor-pointer items-center justify-between text-xs font-semibold text-white transition-all duration-300 ease-in-out hover:text-warnaBiruHover bp360:text-[.8rem] bp400:text-sm xl:text-[.9rem] 2xl:text-base"
        >
            <p class="mr-5">
                <i class="fa-solid fa-clipboard-list w-[21px]"></i>
                <span
                    x-data="{ isTextHidden: $store.navbar.isCollapsed }"
                    x-init="
                        $watch('$store.navbar.isCollapsed', (newValue) => {
                            if (newValue) {
                                // Saat mengecil, segera sembunyikan teks
                                isTextHidden = true
                            } else {
                                // Saat melebar, tunggu 2 detik sebelum menampilkan teks
                                setTimeout(() => {
                                    isTextHidden = false
                                }, 200)
                            }
                        })
                    "
                    :class="{ 'hidden lg:hidden': isTextHidden }"
                >
                    Manage Shipment
                </span>
            </p>
            <span :class="{ 'hidden lg:hidden': $store.navbar.isCollapsed }">
                <i
                    class="fa-solid fa-angle-down transition-transform duration-300"
                    :class="{ 'rotate-180': openMS}"
                ></i>
            </span>
        </div>

        <ul
            class="mt-1 flex flex-col gap-[.3rem] text-[.6rem] font-semibold text-white bp360:text-[.65rem] bp400:text-[.68rem] xl:text-[.73rem] 2xl:text-xs"
            x-show="openMS && !$store.navbar.isCollapsed"
            x-cloak
            x-transition:enter="transition duration-400 ease-out"
            x-transition:enter-start="-translate-y-5 transform opacity-0"
            x-transition:enter-end="translate-y-0 transform opacity-100"
            x-transition:leave="transition duration-400 ease-in"
            x-transition:leave-start="translate-y-0 transform opacity-100"
            x-transition:leave-end="-translate-y-5 transform opacity-0"
        >
            <li class="transition-all duration-300 ease-in-out hover:text-warnaBiruHover">
                <a href="/manage-shipment/pending">— List Shipment</a>
            </li>
        </ul>
    </li>
    <li x-data="{ openDD: false }">
        <div
            x-on:click="openDD = !openDD"
            class="flex cursor-pointer items-center justify-between text-xs font-semibold text-white transition-all duration-300 ease-in-out hover:text-warnaBiruHover bp360:text-[.8rem] bp400:text-sm xl:text-[.9rem] 2xl:text-base"
        >
            <p>
                <i class="fa-solid fa-bars w-[21px]"></i>
                <span
                    x-data="{ isTextHidden: $store.navbar.isCollapsed }"
                    x-init="
                        $watch('$store.navbar.isCollapsed', (newValue) => {
                            if (newValue) {
                                // Saat mengecil, segera sembunyikan teks
                                isTextHidden = true
                            } else {
                                // Saat melebar, tunggu 2 detik sebelum menampilkan teks
                                setTimeout(() => {
                                    isTextHidden = false
                                }, 200)
                            }
                        })
                    "
                    :class="{ 'hidden lg:hidden': isTextHidden }"
                >
                    Draft Document
                </span>
            </p>
            <span :class="{ 'hidden lg:hidden': $store.navbar.isCollapsed }">
                <i
                    class="fa-solid fa-angle-down transition-transform duration-300"
                    :class="{ 'rotate-180': openDD}"
                ></i>
            </span>
        </div>

        <ul
            class="mt-1 flex flex-col gap-[.3rem] text-[.6rem] font-semibold text-white bp360:text-[.65rem] bp400:text-[.68rem] xl:text-[.73rem] 2xl:text-xs"
            x-show="openDD && !$store.navbar.isCollapsed"
            x-cloak
            x-transition:enter="transition duration-400 ease-out"
            x-transition:enter-start="-translate-y-5 transform opacity-0"
            x-transition:enter-end="translate-y-0 transform opacity-100"
            x-transition:leave="transition duration-400 ease-in"
            x-transition:leave-start="translate-y-0 transform opacity-100"
            x-transition:leave-end="-translate-y-5 transform opacity-0"
        >
            <li class="transition-all duration-300 ease-in-out hover:text-warnaBiruHover">
                <a href="/draft-document">— List Draft Document</a>
            </li>
        </ul>
    </li>
    <li
        class="text-xs font-semibold text-white transition-all duration-300 ease-in-out hover:text-warnaBiruHover bp360:text-[.8rem] bp400:text-sm xl:text-[.9rem] 2xl:text-base"
    >
        <a href="/commercial-invoice">
            <i class="fa-regular fa-file-lines w-5"></i>
            <span
                x-data="{ isTextHidden: $store.navbar.isCollapsed }"
                x-init="
                    $watch('$store.navbar.isCollapsed', (newValue) => {
                        if (newValue) {
                            // Saat mengecil, segera sembunyikan teks
                            isTextHidden = true
                        } else {
                            // Saat melebar, tunggu 2 detik sebelum menampilkan teks
                            setTimeout(() => {
                                isTextHidden = false
                            }, 200)
                        }
                    })
                "
                :class="{ 'hidden lg:hidden': isTextHidden }"
            >
                Commercial Invoice
            </span>
        </a>
    </li>
    <li
        class="flex cursor-pointer items-center justify-between text-xs font-semibold text-white transition-all duration-300 ease-in-out hover:text-warnaBiruHover bp360:text-[.8rem] bp400:text-sm xl:text-[.9rem] 2xl:text-base"
    >
        <a href="/list-tracking">
            <i class="fa-solid fa-magnifying-glass w-[21px]"></i>
            <span
                x-data="{ isTextHidden: $store.navbar.isCollapsed }"
                x-init="
                    $watch('$store.navbar.isCollapsed', (newValue) => {
                        if (newValue) {
                            // Saat mengecil, segera sembunyikan teks
                            isTextHidden = true
                        } else {
                            // Saat melebar, tunggu 2 detik sebelum menampilkan teks
                            setTimeout(() => {
                                isTextHidden = false
                            }, 200)
                        }
                    })
                "
                :class="{ 'hidden lg:hidden': isTextHidden }"
            >
                Tracking
            </span>
        </a>
    </li>

    <li x-data="{ openTF: false }">
        <div
            x-on:click="openTF = !openTF"
            class="flex cursor-pointer items-center justify-between text-xs font-semibold text-white transition-all duration-300 ease-in-out hover:text-warnaBiruHover bp360:text-[.8rem] bp400:text-sm xl:text-[.9rem] 2xl:text-base"
        >
            <p>
                <i class="fa-solid fa-plane w-[21px]"></i>
                <span
                    x-data="{ isTextHidden: $store.navbar.isCollapsed }"
                    x-init="
                        $watch('$store.navbar.isCollapsed', (newValue) => {
                            if (newValue) {
                                // Saat mengecil, segera sembunyikan teks
                                isTextHidden = true
                            } else {
                                // Saat melebar, tunggu 2 detik sebelum menampilkan teks
                                setTimeout(() => {
                                    isTextHidden = false
                                }, 200)
                            }
                        })
                    "
                    :class="{ 'hidden lg:hidden': isTextHidden }"
                >
                    Tracking Fleet
                </span>
            </p>
            <span :class="{ 'hidden lg:hidden': $store.navbar.isCollapsed }">
                <i
                    class="fa-solid fa-angle-down transition-transform duration-300"
                    :class="{ 'rotate-180' : openTF}"
                ></i>
            </span>
        </div>

        <ul
            class="flex flex-col gap-[.3rem] text-[.6rem] font-semibold text-white bp360:text-[.65rem] bp400:text-[.68rem] xl:text-[.73rem] 2xl:text-xs"
            x-show="openTF && !$store.navbar.isCollapsed"
            x-cloak
            x-transition:enter="transition duration-400 ease-out"
            x-transition:enter-start="-translate-y-5 transform opacity-0"
            x-transition:enter-end="translate-y-0 transform opacity-100"
            x-transition:leave="transition duration-400 ease-in"
            x-transition:leave-start="translate-y-0 transform opacity-100"
            x-transition:leave-end="-translate-y-5 transform opacity-0"
        >
            <li class="transition-all duration-300 ease-in-out hover:text-warnaBiruHover">
                <a href="/tf-list-order">— List Order</a>
            </li>
            <li class="transition-all duration-300 ease-in-out hover:text-warnaBiruHover">
                <a href="/tf-fleet-history">— Fleet History</a>
            </li>
        </ul>
    </li>

    <li
        class="my-[.1rem] flex items-center text-[.65rem] font-bold bp360:text-[.8rem] bp400:text-xs xl:text-sm 2xl:text-base"
    >
        <p
            x-data="{ isTextHidden: $store.navbar.isCollapsed }"
            x-init="
                $watch('$store.navbar.isCollapsed', (newValue) => {
                    if (newValue) {
                        // Saat mengecil, segera sembunyikan teks
                        isTextHidden = true
                    } else {
                        // Saat melebar, tunggu 2 detik sebelum menampilkan teks
                        setTimeout(() => {
                            isTextHidden = false
                        }, 200)
                    }
                })
            "
            :class="{ 'hidden lg:hidden': isTextHidden }"
            class="w-full text-warnaKuning"
        >
            Help Center
        </p>
        <p class="h-[2.23px] w-full rounded-xs bg-warnaKuning"></p>
    </li>
    <li
        class="text-xs font-semibold text-white transition-all duration-300 ease-in-out hover:text-warnaBiruHover bp360:text-[.8rem] bp400:text-sm xl:text-[.9rem] 2xl:text-base"
    >
        <a href="/ot-open-ticket">
            <i class="fa-solid fa-ticket w-[21px]"></i>
            <span
                x-data="{ isTextHidden: $store.navbar.isCollapsed }"
                x-init="
                    $watch('$store.navbar.isCollapsed', (newValue) => {
                        if (newValue) {
                            // Saat mengecil, segera sembunyikan teks
                            isTextHidden = true
                        } else {
                            // Saat melebar, tunggu 2 detik sebelum menampilkan teks
                            setTimeout(() => {
                                isTextHidden = false
                            }, 200)
                        }
                    })
                "
                :class="{ 'hidden lg:hidden': isTextHidden }"
            >
                Open Ticket
            </span>
        </a>
    </li>
    <li
        class="text-xs font-semibold text-white transition-all duration-300 ease-in-out hover:text-warnaBiruHover bp360:text-[.8rem] bp400:text-sm xl:text-[.9rem] 2xl:text-base"
    >
        <a href="">
            <i class="fa-solid fa-book-open w-[21px]"></i>
            <span
                x-data="{ isTextHidden: $store.navbar.isCollapsed }"
                x-init="
                    $watch('$store.navbar.isCollapsed', (newValue) => {
                        if (newValue) {
                            // Saat mengecil, segera sembunyikan teks
                            isTextHidden = true
                        } else {
                            // Saat melebar, tunggu 2 detik sebelum menampilkan teks
                            setTimeout(() => {
                                isTextHidden = false
                            }, 200)
                        }
                    })
                "
                :class="{ 'hidden lg:hidden': isTextHidden }"
            >
                Tutorial
            </span>
        </a>
    </li>
</ul>
