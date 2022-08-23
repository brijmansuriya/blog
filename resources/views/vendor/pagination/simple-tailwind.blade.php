@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex justify-between">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 rounded-md">
                {{-- {!! __('pagination.previous') !!} --}}
                <i class="fas fa-angle-left" style="font-size: 18px;"></i><i class="fas fa-angle-left" style="font-size: 18px;"></i> &nbsp; Previous
            </span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                {{-- {!! __('pagination.previous') !!}222222 --}}
                <i class="fas fa-angle-left" style="font-size: 18px;"></i><i class="fas fa-angle-left" style="font-size: 18px;"></i> &nbsp; Previous
            </a>
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                {{-- {!! __('pagination.next') !!}333333 --}}
                Next  &nbsp; <i class="fas fa-angle-right" style="font-size: 18px;"></i><i class="fas fa-angle-right" style="font-size: 18px;"></i>
            </a>
        @else
            <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 rounded-md">
                {{-- {!! __('pagination.next') !!}444444444 --}}
                Next  &nbsp; <i class="fas fa-angle-right" style="font-size: 18px;"></i><i class="fas fa-angle-right" style="font-size: 18px;"></i>
            </span>
        @endif
    </nav>
@endif
