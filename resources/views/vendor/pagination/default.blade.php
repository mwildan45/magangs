@if ($paginator->hasPages())
    <ul class="pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li><a class="btn-prev" style="cursor: not-allowed;">Prev</a></li>
        @else
            <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="btn-prev">Prev</a></li>
        @endif

        @if($paginator->currentPage() > 2)
            <li><a href="{{ $paginator->url(1) }}">1</a></li>
        @endif
        @if($paginator->currentPage() > 3)
            <li><a class="btn-next">...</a></li>
        @endif
        @foreach(range(1, $paginator->lastPage()) as $i)
            @if($i >= $paginator->currentPage() - 1 && $i <= $paginator->currentPage() + 1)
                @if ($i == $paginator->currentPage())
                    <li><a class="btn-prev" style="cursor: not-allowed;">{{ $i }}</a></li>
                @else
                    <li><a href="{{ $paginator->url($i) }}">{{ $i }}</a></li>
                @endif
            @endif
        @endforeach
        @if($paginator->currentPage() < $paginator->lastPage() - 2)
            <li><a class="btn-prev">...</a></li>
        @endif
        @if($paginator->currentPage() < $paginator->lastPage() - 1)
            <li><a href="{{ $paginator->url($paginator->lastPage()) }}">{{ $paginator->lastPage() }}</a></li>
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li><a href="{{ $paginator->nextPageUrl() }}" rel="next" class="btn-next">Next</a></li>
        @else
            <li><a class="btn-next" style="cursor: not-allowed;">Next</a></li>
        @endif
    </ul>
@endif

<!-- <ul class="pagination">
<li class="active"><a href="#" class="btn-prev"><i class="lni-angle-left"></i> prev</a></li>
<li><a href="#">1</a></li>
<li><a href="#">2</a></li>
<li><a href="#">3</a></li>
<li><a href="#">4</a></li>
<li><a href="#">5</a></li>
<li class="active"><a href="#" class="btn-next">Next <i class="lni-angle-right"></i></a></li>
</ul>
 -->