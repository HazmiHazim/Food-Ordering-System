<!-- Custom Pagination -->

@if ($paginator->hasPages())
    <nav>
        <div class="pagination-number">
            {{-- Previous Page Link --}}
            <div class="page">
                @if ($paginator->onFirstPage())
                    <li class="disabled"><i class='bx bx-chevrons-left'></i>prev</li>
                @else
                    <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev"><i
                                class='bx bx-chevrons-left'></i>prev</a></li>
                @endif
            </div>

            {{-- Pagination Elements --}}
            <div class="page-number">
                @foreach ($elements as $element)
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($element))
                        <li class="disabled"><span>{{ $element }}</span></li>
                    @endif

                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li class="active"><span>{{ $page }}</span></li>
                            @else
                                <li><a href="{{ $url }}">{{ $page }}</a></li>
                            @endif
                        @endforeach
                    @endif
                @endforeach
            </div>


            {{-- Next Page Link --}}
            <div class="page">
                @if ($paginator->hasMorePages())
                    <li><a href="{{ $paginator->nextPageUrl() }}" rel="next">next<i
                                class='bx bx-chevrons-right'></i></a></li>
                @else
                    <li class="disabled">next<i class='bx bx-chevrons-right'></i></li>
                @endif
            </div>

        </div>
    </nav>
@endif
