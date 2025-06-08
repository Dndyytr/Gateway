<div
    class="w-full rounded-sm bg-warnaBiruTua px-3 py-2 text-[.63rem] text-white bp360:text-[.65rem] bp400:text-[.7rem] bp575:text-xs lg:text-sm xl:text-base 2xl:text-lg"
>
    <h1 class="text-[1.5em] font-semibold">Hello, FMS Testing!</h1>
    <p class="font-medium">Here's what happening with your Gateway Customer Portal System Today</p>
    <hr class="mt-2 mb-1 rounded-xs border-t-[1.5px] text-warnaKuning" />
</div>
<hr class="my-2 rounded-xs border-t-1 text-stone-300" />
<div class="bpHeight-2 flex w-full flex-col gap-3 overflow-y-auto pt-[4px] pr-[4px] pb-2 pl-[4px]">
    <div class="grid w-full grid-cols-1 gap-3 bp575:grid-cols-2 md:grid-cols-3">
        @foreach ($dataDashboard as $index => $data)
            <div
                @php
                    $total = count($dataDashboard);
                    $isSecondLastAndEven = $total % 2 === 0 && $index === $total - 2;
                    $isLast = $loop->last;

                    $colSpan = $isSecondLastAndEven || $isLast ? "col-span-full md:col-span-1" : "col-span-1";
                @endphp
                class="shadow-card {{ $colSpan }} relative w-full min-w-[max-content] rounded-md bg-white p-3"
            >
                <div class="absolute top-0 right-0 z-0 h-full overflow-hidden rounded-md">
                    @if ($data["title"] === "Quote on Going")
                        <svg
                            id="visual"
                            viewBox="0 0 900 600"
                            width="100%"
                            height="100%"
                            xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink"
                            version="1.1"
                        >
                            <path
                                d="M494 600L492.3 587.5C490.7 575 487.3 550 498.2 525C509 500 534 475 535 450C536 425 513 400 500.2 375C487.3 350 484.7 325 492.7 300C500.7 275 519.3 250 522 225C524.7 200 511.3 175 500.5 150C489.7 125 481.3 100 486.5 75C491.7 50 510.3 25 519.7 12.5L529 0L900 0L900 12.5C900 25 900 50 900 75C900 100 900 125 900 150C900 175 900 200 900 225C900 250 900 275 900 300C900 325 900 350 900 375C900 400 900 425 900 450C900 475 900 500 900 525C900 550 900 575 900 587.5L900 600Z"
                                fill="#ebfcff"
                            ></path>
                            <path
                                d="M550 600L558.7 587.5C567.3 575 584.7 550 592.2 525C599.7 500 597.3 475 595.8 450C594.3 425 593.7 400 585.7 375C577.7 350 562.3 325 557.5 300C552.7 275 558.3 250 561.2 225C564 200 564 175 569.8 150C575.7 125 587.3 100 584.5 75C581.7 50 564.3 25 555.7 12.5L547 0L900 0L900 12.5C900 25 900 50 900 75C900 100 900 125 900 150C900 175 900 200 900 225C900 250 900 275 900 300C900 325 900 350 900 375C900 400 900 425 900 450C900 475 900 500 900 525C900 550 900 575 900 587.5L900 600Z"
                                fill="#e4fbfd"
                            ></path>
                            <path
                                d="M618 600L622.2 587.5C626.3 575 634.7 550 640.2 525C645.7 500 648.3 475 648.5 450C648.7 425 646.3 400 647.2 375C648 350 652 325 652 300C652 275 648 250 641.3 225C634.7 200 625.3 175 629.2 150C633 125 650 100 657.5 75C665 50 663 25 662 12.5L661 0L900 0L900 12.5C900 25 900 50 900 75C900 100 900 125 900 150C900 175 900 200 900 225C900 250 900 275 900 300C900 325 900 350 900 375C900 400 900 425 900 450C900 475 900 500 900 525C900 550 900 575 900 587.5L900 600Z"
                                fill="#defafa"
                            ></path>
                            <path
                                d="M690 600L691.2 587.5C692.3 575 694.7 550 698.5 525C702.3 500 707.7 475 706.5 450C705.3 425 697.7 400 700 375C702.3 350 714.7 325 714.7 300C714.7 275 702.3 250 696.8 225C691.3 200 692.7 175 694.8 150C697 125 700 100 700 75C700 50 697 25 695.5 12.5L694 0L900 0L900 12.5C900 25 900 50 900 75C900 100 900 125 900 150C900 175 900 200 900 225C900 250 900 275 900 300C900 325 900 350 900 375C900 400 900 425 900 450C900 475 900 500 900 525C900 550 900 575 900 587.5L900 600Z"
                                fill="#d8f9f6"
                            ></path>
                            <path
                                d="M764 600L765.3 587.5C766.7 575 769.3 550 770.2 525C771 500 770 475 765.2 450C760.3 425 751.7 400 753.7 375C755.7 350 768.3 325 773.2 300C778 275 775 250 768.3 225C761.7 200 751.3 175 750.2 150C749 125 757 100 756.3 75C755.7 50 746.3 25 741.7 12.5L737 0L900 0L900 12.5C900 25 900 50 900 75C900 100 900 125 900 150C900 175 900 200 900 225C900 250 900 275 900 300C900 325 900 350 900 375C900 400 900 425 900 450C900 475 900 500 900 525C900 550 900 575 900 587.5L900 600Z"
                                fill="#d4f8f1"
                            ></path>
                            <path
                                d="M816 600L816.7 587.5C817.3 575 818.7 550 823.5 525C828.3 500 836.7 475 836.7 450C836.7 425 828.3 400 825.5 375C822.7 350 825.3 325 828.5 300C831.7 275 835.3 250 832 225C828.7 200 818.3 175 812.7 150C807 125 806 100 810 75C814 50 823 25 827.5 12.5L832 0L900 0L900 12.5C900 25 900 50 900 75C900 100 900 125 900 150C900 175 900 200 900 225C900 250 900 275 900 300C900 325 900 350 900 375C900 400 900 425 900 450C900 475 900 500 900 525C900 550 900 575 900 587.5L900 600Z"
                                fill="#d0f7eb"
                            ></path>
                        </svg>
                    @elseif ($data["title"] === "Shipment on Going")
                        <svg
                            viewBox="0 0 900 600"
                            width="100%"
                            height="100%"
                            xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink"
                            version="1.1"
                        >
                            <!-- Hijau muda -->
                            <circle r="30" cx="850" cy="150" opacity="0.5" fill="#ddfafb" />
                            <circle r="70" cx="850" cy="150" opacity="0.5" fill="#ddfafb" />
                            <circle r="110" cx="850" cy="150" opacity="0.5" fill="#ddfafb" />
                            <circle r="160" cx="850" cy="150" opacity="0.5" fill="#ddfafb" />
                            <circle r="210" cx="850" cy="150" opacity="0.5" fill="#ddfafb" />

                            <!-- Putih kehijauan -->
                            <circle r="30" cx="700" cy="450" opacity="0.5" fill="#d0f7eb" />
                            <circle r="70" cx="700" cy="450" opacity="0.5" fill="#d0f7eb" />
                            <circle r="110" cx="700" cy="450" opacity="0.5" fill="#d0f7eb" />
                            <circle r="160" cx="700" cy="450" opacity="0.5" fill="#d0f7eb" />
                            <circle r="210" cx="700" cy="450" opacity="0.5" fill="#d0f7eb" />
                        </svg>
                    @elseif ($data["title"] === "Shipment Completed")
                        <svg
                            id="visual"
                            viewBox="0 0 960 540"
                            width="100%"
                            height="100%"
                            xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink"
                            version="1.1"
                        >
                            <path
                                d="M676 540L578 463L682 386L703 309L632 231L600 154L569 77L701 0L960 0L960 77L960 154L960 231L960 309L960 386L960 463L960 540Z"
                                fill="#ddfafb"
                            ></path>
                            <path
                                d="M666 540L655 463L732 386L747 309L691 231L691 154L695 77L658 0L960 0L960 77L960 154L960 231L960 309L960 386L960 463L960 540Z"
                                fill="#d9faf8"
                            ></path>
                            <path
                                d="M701 540L798 463L736 386L778 309L787 231L811 154L800 77L734 0L960 0L960 77L960 154L960 231L960 309L960 386L960 463L960 540Z"
                                fill="#d5f9f4"
                            ></path>
                            <path
                                d="M802 540L814 463L849 386L817 309L851 231L871 154L799 77L811 0L960 0L960 77L960 154L960 231L960 309L960 386L960 463L960 540Z"
                                fill="#d2f8f0"
                            ></path>
                            <path
                                d="M850 540L900 463L895 386L855 309L921 231L863 154L876 77L871 0L960 0L960 77L960 154L960 231L960 309L960 386L960 463L960 540Z"
                                fill="#d0f7eb"
                            ></path>
                        </svg>
                    @endif
                </div>
                <p
                    class="relative z-1 text-xs font-semibold text-stone-800 bp360:text-[.8rem] bp400:text-sm bp575:text-base lg:text-lg 2xl:text-xl"
                >
                    {{ $data["title"] }}
                </p>
                <div
                    x-data="countUp({ target: {{ $data["amount_data"] }} })"
                    x-init="start(90, 1)"
                    @if ($data["title"] === "Quote on Going")
                        class="relative z-1 w-[max-content] text-xl font-semibold text-orange-500 bp400:text-2xl bp575:text-3xl lg:text-[1.9rem] 2xl:text-4xl"
                    @elseif ($data["title"] === "Shipment on Going")
                        class="relative z-1 w-[max-content] text-xl font-semibold text-blue-400 bp400:text-2xl bp575:text-3xl lg:text-[1.9rem] 2xl:text-4xl"
                    @elseif ($data["title"] === "Shipment Completed")
                        class="relative z-1 w-[max-content] text-xl font-semibold text-stone-700 bp400:text-2xl bp575:text-3xl lg:text-[1.9rem] 2xl:text-4xl"
                    @endif
                >
                    <p x-text="count">0</p>
                </div>
                <a
                    class="relative z-1 text-[.65rem] font-medium text-blue-700 transition-all duration-300 ease-in-out hover:text-blue-500 bp360:text-[.7rem] bp400:text-xs bp575:text-sm lg:text-base 2xl:text-lg"
                    href=""
                >
                    See all &#x276F;
                </a>
            </div>
        @endforeach
    </div>
    <div class="grid w-full grid-cols-1 gap-3 md:grid-cols-2">
        @foreach (array_keys($chartData) as $key)
            <div
                x-data="countUp({
                            target: {{ isset($chartData[$key]) ? collect($chartData[$key])->sum("value") : 0 }},
                        })"
                x-init="start(33, 1)"
                class="shadow-card w-full min-w-[max-content] rounded-md bg-white"
            >
                <!-- Header -->
                <div
                    class="mb-4 flex items-center justify-between rounded-tl-md rounded-tr-md bg-warnaDasarBackground p-3"
                >
                    <h2
                        class="text-xs font-semibold text-stone-800 bp360:text-[.8rem] bp400:text-sm bp575:text-base lg:text-lg 2xl:text-xl"
                    >
                        Top {{ ucwords($key) }}
                    </h2>
                    <div class="relative">
                        <select
                            name="mounth"
                            class="cursor-pointer rounded-sm bg-white px-1 py-[.2rem] text-[.65rem] font-medium text-stone-700 shadow-[0_0_2px_0.3px_rgba(0,0,0,0.5)] outline-2 outline-transparent transition-all duration-300 ease-in-out hover:bg-gray-400 hover:text-white focus:outline-warnaBiruTua bp360:text-[.7rem] bp400:text-xs bp575:text-sm lg:text-base 2xl:text-lg"
                        >
                            <option class="checked:bg-blue-700 checked:text-white" value="january">Jan</option>
                            <option class="checked:bg-blue-700 checked:text-white" value="february">Feb</option>
                            <option class="checked:bg-blue-700 checked:text-white" value="march">Mar</option>
                            <option class="checked:bg-blue-700 checked:text-white" value="April">Apr</option>
                            <option class="checked:bg-blue-700 checked:text-white" value="May">May</option>
                            <option class="checked:bg-blue-700 checked:text-white" value="June">Jun</option>
                            <option class="checked:bg-blue-700 checked:text-white" value="July">Jul</option>
                            <option class="checked:bg-blue-700 checked:text-white" value="August">Aug</option>
                            <option class="checked:bg-blue-700 checked:text-white" value="September">Sep</option>
                            <option class="checked:bg-blue-700 checked:text-white" value="October">Oct</option>
                            <option class="checked:bg-blue-700 checked:text-white" value="November">Nov</option>
                            <option class="checked:bg-blue-700 checked:text-white" value="December">Dec</option>
                        </select>
                    </div>
                </div>

                <!-- Content -->
                <div class="mx-3 flex items-center justify-between">
                    <!-- List -->
                    <div>
                        @if (isset($chartData[$key]) && ! empty($chartData[$key]))
                            @foreach ($chartData[$key] as $index => $item)
                                <div class="flex items-center">
                                    <span
                                        class="mr-2 h-2 w-2 rounded-full bp360:h-[9px] bp360:w-[9px] bp400:h-[10px] bp400:w-[10px] bp575:h-[11px] bp575:w-[11px] lg:h-[12px] lg:w-[12px] 2xl:h-[13px] 2xl:w-[13px]"
                                        style="background-color: {{ $colorPalette[$index % count($colorPalette)] }}"
                                    ></span>
                                    <p
                                        class="text-[.65rem] font-medium text-stone-700 bp360:text-[.7rem] bp400:text-xs bp575:text-sm lg:text-base 2xl:text-lg"
                                    >
                                        {{ $item["name"] }}
                                    </p>
                                </div>
                            @endforeach
                        @else
                            <p
                                class="text-[.65rem] font-medium text-stone-700 bp360:text-[.7rem] bp400:text-xs bp575:text-sm lg:text-base 2xl:text-lg"
                            >
                                No data available.
                            </p>
                        @endif
                    </div>

                    <!-- Chart -->
                    <div
                        x-data
                        x-init="renderPieChart('chart_{{ $key }}', chartData.{{ $key }})"
                        class="relative h-[60px] w-[60px] bp360:h-[67px] bp360:w-[67px] bp400:h-[75px] bp400:w-[75px] bp575:h-[90px] bp575:w-[90px] lg:h-[105px] lg:w-[105px] 2xl:h-[120px] 2xl:w-[120px]"
                    >
                        <div id="chart_{{ $key }}" class="h-full w-full"></div>
                        <div
                            class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 text-base font-semibold text-warnaBiruTua bp360:text-[17px] bp400:text-lg bp575:text-2xl lg:text-3xl 2xl:text-4xl"
                            x-text="count"
                        >
                            0
                        </div>
                    </div>
                </div>

                <!-- Footer -->
                <div class="mt-4 flex justify-between rounded-br-md rounded-bl-md bg-warnaDasarBackground p-3">
                    <div class="relative">
                        <select
                            class="cursor-pointer rounded-sm bg-white px-1 py-[.2rem] text-[.65rem] font-medium text-stone-700 shadow-[0_0_2px_0.3px_rgba(0,0,0,0.5)] outline-2 outline-transparent transition-all duration-300 ease-in-out hover:bg-gray-400 hover:text-white focus:outline-warnaBiruTua bp360:text-[.7rem] bp400:text-xs bp575:text-sm lg:text-base 2xl:text-lg"
                        >
                            <option class="checked:bg-blue-700 checked:text-white" value="export">Export</option>
                        </select>
                    </div>
                    <div class="relative">
                        <select
                            class="cursor-pointer rounded-sm bg-white px-1 py-[.2rem] text-[.65rem] font-medium text-stone-700 shadow-[0_0_2px_0.3px_rgba(0,0,0,0.5)] outline-2 outline-transparent transition-all duration-300 ease-in-out hover:bg-gray-400 hover:text-white focus:outline-warnaBiruTua bp360:text-[.7rem] bp400:text-xs bp575:text-sm lg:text-base 2xl:text-lg"
                        >
                            <option class="checked:bg-blue-700 checked:text-white" value="fullContainerLoad">
                                Full Container Load
                            </option>
                        </select>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<!-- ECharts Script -->
<script>
    // echarts
    const chartData = @json($chartData);

    function renderPieChart(id, data) {
        const chartDom = document.getElementById(id);
        const myChart = echarts.init(chartDom);

        const colorPalette = @json($colorPalette);

        const option = {
            tooltip: { trigger: 'item' },
            series: [
                {
                    name: 'Data',
                    type: 'pie',
                    radius: ['73%', '100%'],
                    avoidLabelOverlap: false,
                    label: { show: false },
                    labelLine: { show: false },
                    animation: true,
                    animationDuration: 1300,
                    animationEasing: 'cubicOut',
                    startAngle: 90,
                    data: data.map((item, index) => ({
                        value: item.value,
                        name: item.name,
                        itemStyle: { color: colorPalette[index % colorPalette.length] },
                    })),
                },
            ],
        };

        myChart.setOption(option);
    }

    // count data
    document.addEventListener('alpine:init', () => {
        Alpine.data('countUp', ({ target }) => ({
            count: 0,
            start(time, increment) {
                let interval = setInterval(() => {
                    if (this.count < target) {
                        this.count += increment;
                    } else {
                        clearInterval(interval);
                    }
                }, time);
            },
        }));
    });
</script>
