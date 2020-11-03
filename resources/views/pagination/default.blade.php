
<!-- Pagination -->
<span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
@if ($paginator->lastPage() > 1)
<nav aria-label="Table navigation">
    <ul class="inline-flex items-center">
        <li>
            <a class="{{ ($paginator->currentPage() == 1) ? ' disabled' : '' }} px-3 py-1 rounded-md rounded-l-lg focus:outline-none focus:shadow-outline-purple" aria-label="Previous" href="{{ $paginator->url(1) }}">
                <svg class="w-4 h-4 fill-current" aria-hidden="true" viewBox="0 0 20 20">
                    <path d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" fill-rule="evenodd"></path>
                </svg>
            </a>
        </li>
        @for ($i = 1; $i <= $paginator->lastPage(); $i++)
        <li>
            <a class="{{ ($paginator->currentPage() == $i) ? 'text-white transition-colors duration-150 bg-purple-600 border border-r-0 border-purple-600 rounded-md focus:outline-none' : '' }} px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple" href="{{ $paginator->url($i) }}">
                {{ $i }}
            </a>
        </li>
        @endfor
        <li>
            <a class="{{ ($paginator->currentPage() == $paginator->lastPage()) ? ' disabled' : '' }} px-3 py-1 rounded-md rounded-r-lg focus:outline-none focus:shadow-outline-purple" aria-label="Next" href="{{ $paginator->url($paginator->currentPage()+1) }}">
                <svg class="w-4 h-4 fill-current" aria-hidden="true" viewBox="0 0 20 20">
                    <path d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" fill-rule="evenodd"></path>
                </svg>
            </a>
        </li>
    </ul>
</nav>
@endif
</span>