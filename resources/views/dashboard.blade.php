<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title>Gateway</title>

        {{-- fonts awesome icons --}}
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
            integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        />

        <!-- Definisi Alpine.store('navbar') -->
        <script>
            document.addEventListener('alpine:init', () => {
                Alpine.store('navbar', {
                    openNav: window.innerWidth < 1024 ? false : true, // Default: tertutup di mobile, terbuka di desktop
                    isCollapsed: false, // Default: navbar tidak mengecil di desktop
                    updateStateOnResize() {
                        this.openNav = window.innerWidth < 1024 ? false : true;
                    },

                    toggleOpenNav() {
                        this.openNav = !this.openNav;
                    },
                    toggleCollapse() {
                        this.isCollapsed = !this.isCollapsed;
                    },
                });

                // Responsif terhadap resize
                window.addEventListener('resize', () => {
                    Alpine.store('navbar').updateStateOnResize();
                });
            });
        </script>

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

    <body>
        <section class="relative z-1 pb-2 lg:pb-0" x-data="{ openNav: window.innerWidth < 1024 ? false : null }">
            {{-- Header --}}
            <x-header></x-header>
            {{-- header --}}

            <div class="mx-2 flex gap-2">
                {{-- navbar --}}
                <nav
                    x-data
                    x-init="
                        $nextTick(() => {
                            document.addEventListener('click', (e) => {
                                const header = document.querySelector('header')
                                const nav = $el
                                if (
                                    $store.navbar.openNav &&
                                    ! header.contains(e.target) &&
                                    window.innerWidth < 1024 &&
                                    ! nav.contains(e.target)
                                ) {
                                    $store.navbar.openNav = false
                                }
                            })
                        })
                    "
                    class="fixed top-18 z-99999 h-[90vh] min-w-[max-content] overflow-y-auto rounded-sm bg-warnaBiruTua px-3 pt-3 pb-6 transition-all duration-330 ease-in-out bp360:pb-4 bp400:top-19 sm:top-13 sm:pb-3 lg:sticky lg:bottom-0 lg:min-w-0 2xl:h-[95vh]"
                    :class="{
                        'lg:w-[280px] 2xl:w-[284px]': !($store.navbar?.isCollapsed ?? false),
                        'lg:w-[45px]': $store.navbar?.isCollapsed ?? false,

                    }"
                    x-show="$store.navbar.openNav"
                    x-cloak
                    x-transition:enter="transition duration-400 ease-out"
                    x-transition:enter-start="-translate-x-[100%] transform"
                    x-transition:enter-end="translate-x-0 transform"
                    x-transition:leave="transition duration-350 ease-in"
                    x-transition:leave-start="translate-x-0 transform"
                    x-transition:leave-end="-translate-x-[100%] transform"
                >
                    <x-navbar></x-navbar>
                </nav>
                {{-- navbar --}}
                {{-- main --}}

                <main
                    class="w-full"
                    x-data="{
                        animate:
                            sessionStorage.getItem('lastPath') &&
                            sessionStorage.getItem('lastPath') !== window.location.pathname,
                    }"
                    x-init="sessionStorage.setItem('lastPath', window.location.pathname)"
                    x-bind:class="{ 'animate-fade-in': animate }"
                >
                    @php
                        $routesMain = [
                            'dm-access-role',
                            'dm-users',
                            'dm-banner',
                            'dm-size-container',
                            'dm-type-container',
                            'dm-depot-container',
                            'dm-truck',
                            'dm-port',
                            'dm-export-direct-schedule',
                            'dm-export-non-direct-schedule',
                            'dm-import-direct-schedule',
                            'dm-import-non-direct-schedule',
                            'manage-shipment',
                            'commercial-invoice',
                            'tf-list-order',
                            'tf-fleet-history',
                            'ot-open-ticket',
                            'draft-document',
                            'list-tracking',
                        ];
                        $currentPath = request()->path();
                        $isRouteMain = collect($routesMain)->contains(fn ($route) => str_starts_with($currentPath, str_replace('/*', '', $route)));
                    @endphp

                    @if ($isRouteMain)
                        @yield('content')
                    @elseif (request()->is('/'))
                        <x-mainDashboard.main-dashboard
                            :chartData="$chartData"
                            :dataDashboard="$dataDashboard"
                            :colorPalette="$colorPalette"
                        ></x-mainDashboard.main-dashboard>
                    @endif
                </main>

                {{-- main --}}
            </div>
        </section>

        <!-- Script untuk Inisialisasi Peta -->
        <script>
            if (window.innerWidth >= 1024) {
                document.querySelector('nav').removeAttribute('x-cloak');
            }

            document.addEventListener('alpine:init', () => {
                Alpine.data('mapComponent', () => ({
                    latitude: '',
                    longitude: '',
                    country: '',
                    countryCode: '',
                    city: '',
                    address: '',
                    currentMarker: null,
                    map: null,
                    geocodeTimeout: null,
                    errorMessage: '', // Untuk notifikasi global
                    mapError: false, // Untuk menandai error khusus elemen peta

                    init() {
                        if (!document.getElementById('map')) {
                            this.mapError = true; // Tandai bahwa ada error peta
                            this.errorMessage =
                                'Map element not found. Please ensure the map container is present in the page.';
                            return;
                        }

                        try {
                            // Atur path ikon default ke CDN Leaflet
                            L.Icon.Default.imagePath = 'https://unpkg.com/leaflet@1.9.4/dist/images/';
                            this.latitude = this.$el.dataset.latitude || '';
                            this.longitude = this.$el.dataset.longitude || '';
                            this.country = this.$el.dataset.country || '';
                            this.countryCode = this.$el.dataset.countryCode || '';
                            this.city = this.$el.dataset.city || '';
                            this.address = this.$el.dataset.address || '';

                            const initialLat = this.latitude || -6.2088;
                            const initialLng = this.longitude || 106.8456;

                            this.map = L.map('map').setView([initialLat, initialLng], 13);
                            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                attribution:
                                    '© <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
                            }).addTo(this.map);

                            if (this.latitude && this.longitude) {
                                this.currentMarker = L.marker([this.latitude, this.longitude])
                                    .addTo(this.map)
                                    .bindPopup('Initial Location')
                                    .openPopup();
                            }

                            this.map.on('click', (e) => {
                                const lat = e.latlng.lat;
                                const lng = e.latlng.lng;

                                if (this.currentMarker) {
                                    this.map.removeLayer(this.currentMarker);
                                }

                                this.currentMarker = L.marker([lat, lng])
                                    .addTo(this.map)
                                    .bindPopup(`Lat: ${lat}, Lng: ${lng}`)
                                    .openPopup();

                                this.latitude = lat;
                                this.longitude = lng;

                                if (this.geocodeTimeout) {
                                    clearTimeout(this.geocodeTimeout);
                                }
                                this.geocodeTimeout = setTimeout(() => {
                                    this.reverseGeocode(lat, lng);
                                }, 1000);
                            });
                        } catch (error) {
                            this.mapError = true; // Tandai error peta
                            this.errorMessage = 'Failed to initialize map: ' + error.message;
                        }
                    },

                    async reverseGeocode(lat, lng) {
                        try {
                            const response = await fetch(
                                `https://nominatim.openstreetmap.org/reverse?format=json&lat=${lat}&lon=${lng}&zoom=18&addressdetails=1`,
                            );
                            const data = await response.json();

                            if (data && data.address) {
                                this.country = data.address.country || '';
                                this.countryCode = data.address.country_code
                                    ? data.address.country_code.toUpperCase()
                                    : '';
                                this.city = data.address.city || data.address.town || data.address.village || '';
                                this.address = data.display_name || '';
                            } else {
                                this.errorMessage = 'No address details found for the selected location.';
                                this.country = '';
                                this.countryCode = '';
                                this.city = '';
                                this.address = '';
                            }
                        } catch (error) {
                            this.errorMessage = 'Failed to fetch location details: ' + error.message;
                            this.country = '';
                            this.countryCode = '';
                            this.city = '';
                            this.address = '';
                        }
                    },

                    setErrorMessage(message) {
                        this.errorMessage = message;
                        setTimeout(() => {
                            this.clearErrorMessage();
                        }, 5000);
                    },

                    clearErrorMessage() {
                        this.errorMessage = '';
                    },
                }));
            });
        </script>
    </body>
</html>
