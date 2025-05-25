@extends('dashboard')
@section('content')
    @php
        $showNotification = session('success') ? 'success' : (session('error') ? 'error' : null);
    @endphp

    <div
        x-data="{ showNotif: {{ $showNotification ? 'true' : 'false' }} }"
        class="shadow-card w-full rounded-sm bg-white"
    >
        <div>
            <h1
                class="relative z-9 mb-3 w-full rounded-tl-sm rounded-tr-sm bg-warnaBiruTua p-3 text-[.65rem] font-semibold text-warnaKuning bp360:text-xs bp400:text-sm xl:text-base 2xl:text-lg"
            >
                Draft Document
            </h1>

            @if ($showNotification)
                <div
                    x-show="showNotif"
                    x-cloak
                    x-init="setTimeout(() => (showNotif = false), 2000)"
                    x-transition:enter="transition duration-350 ease-out"
                    x-transition:enter-start="-translate-y-[113%]"
                    x-transition:enter-end="translate-y-0"
                    x-transition:leave="transition duration-350 ease-in"
                    x-transition:leave-start="translate-y-0"
                    x-transition:leave-end="-translate-y-[113%]"
                    role="alert"
                    class="{{ $showNotification === 'success' ? 'animation-notif border-blue-300 bg-blue-200 text-blue-600' : 'animation-notif border-red-400 bg-red-300 text-red-600' }} relative z-1 mx-3 mb-2 flex items-center justify-between rounded-sm border-3 p-3 text-[.65rem] font-semibold bp400:text-xs bp575:mb-3 bp575:text-sm xl:text-base 2xl:text-lg"
                >
                    <div class="flex items-center gap-2">
                        <svg
                            class="w-8 bp400:w-9 bp575:w-10 lg:w-11 2xl:w-12"
                            fill="{{ $showNotification === 'success' ? '#3babdb' : '#fb2c36' }}"
                            version="1.1"
                            id="Capa_1"
                            xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink"
                            viewBox="0 0 490 490"
                            xml:space="preserve"
                            stroke="{{ $showNotification === 'success' ? '#3babdb' : '#fb2c36' }}"
                        >
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <g>
                                    <g>
                                        <g>
                                            <!-- Lingkaran luar biru -->
                                            <circle
                                                cx="245"
                                                cy="245"
                                                r="245"
                                                fill="{{ $showNotification === 'success' ? '#3babdb' : '#fb2c36' }}"
                                            />

                                            <!-- Lingkaran putih mengisi bagian dalam -->
                                            <circle cx="245" cy="245" r="183" fill="white" />
                                        </g>
                                        <g>
                                            <g>
                                                <!-- Lingkaran kecil di atas -->
                                                <circle
                                                    cx="241.3"
                                                    cy="159.2"
                                                    r="29.1"
                                                    fill="{{ $showNotification === 'success' ? '#3babdb' : '#fb2c36' }}"
                                                ></circle>
                                            </g>
                                            <g>
                                                <!-- Bentuk persegi panjang di bawah -->
                                                <polygon
                                                    fill="{{ $showNotification === 'success' ? '#3babdb' : '#fb2c36' }}"
                                                    points="285.1,359.9 270.4,359.9 219.6,359.9 204.9,359.9 204.9,321
                            219.6,321 219.6,254.8 205.1,254.8 205.1,215.9 219.6,215.9 263.1,215.9
                            270.4,215.9 270.4,321 285.1,321 "
                                                ></polygon>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </svg>

                        <span>
                            @if ($showNotification === 'success')
                                {{ session('success') }}
                            @elseif ($showNotification === 'error')
                                {{ session('error') }}
                            @endif
                        </span>
                    </div>
                    <button
                        type="button"
                        class="{{ $showNotification === 'success' ? 'hover:text-blue-400' : 'hover:text-red-400' }} ml-[4px] cursor-pointer text-xl transition-all duration-300 ease-in-out bp400:text-2xl lg:text-3xl 2xl:text-4xl"
                        x-on:click="showNotif = false"
                    >
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
            @endif
        </div>

        @if (request()->is('draft-document') || (request()->is('draft-document/upload-invoice') && request()->has('shipmentNumber')))
            <x-DraftDocument.draft-document :draftDocuments="$draftDocuments"></x-DraftDocument.draft-document>
        @endif
    </div>
@endsection
