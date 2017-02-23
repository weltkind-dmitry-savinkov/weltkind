@if ($paginator->hasPages())
<!--noindex-->
    <nav>
        <ul class="paginator">
            @if (!$paginator->onFirstPage())
            <li class="paginator__item">
                <a class="paginator__link paginator__link_button" href="{{ $paginator->previousPageUrl() }}">&larr;</a>
            </li>
            @endif
            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="paginator__separator"><span>...</span></li>
                @endif
                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="paginator__item">
                                <span class="paginator__link paginator__link_active">{{ $page }}</span>
                            </li>
                        @else
                            <li class="paginator__item">
                                <a class="paginator__link" href="{{ $url }}">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach
            @if ($paginator->hasMorePages())
            <li class="paginator__item">
                <a class="paginator__link paginator__link_button" href="{{ $paginator->nextPageUrl() }}">&rarr;</a>
            </li>
            @endif
        </ul>
    </nav>
<!--/noindex-->
@endif
