@if ($paginator->hasPages())
    <nav class="flex items-center gap-2" aria-label="Pagination">
        <!-- Previous Button -->
        <div>
            @if ($paginator->onFirstPage())
                <span class="inline-flex cursor-not-allowed items-center font-medium text-stone-500">Previous</span>
            @else
                <a
                    href="{{ $paginator->previousPageUrl() }}"
                    class="inline-flex items-center font-medium text-stone-700 transition-all duration-300 ease-in-out hover:text-stone-400"
                >
                    Previous
                </a>
            @endif
        </div>

        <!-- Page Numbers -->
        <div class="flex gap-1">
            @foreach ($elements as $element)
                <!-- "Three Dots" (Ellipsis) -->
                @if (is_string($element))
                    <span class="inline-flex items-center font-medium text-stone-700">
                        {{ $element }}
                    </span>
                @endif

                <!-- Array of Links -->
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <span
                                class="inline-flex items-center rounded-xs bg-stone-400 px-3 py-1 font-medium text-stone-900 shadow-[0_0_3px_0.4px_rgba(0,0,0,0.6)]"
                            >
                                {{ $page }}
                            </span>
                        @else
                            <a
                                href="{{ $url }}"
                                class="inline-flex items-center rounded-xs bg-white px-3 py-1 font-medium text-stone-700 shadow-[0_0_3px_0.4px_rgba(0,0,0,0.6)] transition-all duration-300 ease-in-out hover:bg-stone-400"
                            >
                                {{ $page }}
                            </a>
                        @endif
                    @endforeach
                @endif
            @endforeach
        </div>

        <!-- Next Button -->
        <div>
            @if ($paginator->hasMorePages())
                <a
                    href="{{ $paginator->nextPageUrl() }}"
                    class="inline-flex items-center font-medium text-stone-700 transition-all duration-300 ease-in-out hover:text-stone-400"
                >
                    Next
                </a>
            @else
                <span class="inline-flex cursor-not-allowed items-center font-medium text-stone-500">Next</span>
            @endif
        </div>
    </nav>
@endif
