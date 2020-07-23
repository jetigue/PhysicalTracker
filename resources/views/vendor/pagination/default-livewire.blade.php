@if ($paginator->hasPages())
    <ul role="navigation"
        aria-label="Pagination Navigation"
        class="flex items-center font-semibold text-gray-800 py-2 text-lg">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="px-2" aria-disabled="true" aria-label="@lang('pagination.previous')">
                <span class="opacity-0" aria-hidden="true">
                    <i class="fas fa-angle-double-left"></i>
                </span>
            </li>
        @else
            <li class="px-2">
                <button type="button" class="" wire:click="previousPage" rel="prev" aria-label="@lang('pagination.previous')">
                    <i class="fas fa-angle-double-left"></i>
                </button>
            </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="px-2" aria-disabled="true"><span class="">{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="flex px-2 border-b-2 border-blue-800 font-bold" aria-current="page"><span class="">{{ $page }}</span></li>
                    @else
                        <li class="flex px-2"><button type="button" class="" wire:click="gotoPage({{ $page }})">{{ $page }}</button></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="flex px-2">
                <button type="button" class="" wire:click="nextPage" rel="next" aria-label="@lang('pagination.next')">
                    <i class="fas fa-angle-double-right"></i>
                </button>
            </li>
        @else
            <li class="opacity-0 px-2" aria-disabled="true" aria-label="@lang('pagination.next')">
                <span class="" aria-hidden="true">
                    <i class="fas fa-angle-double-right"></i>
                </span>
            </li>
        @endif
    </ul>
@endif