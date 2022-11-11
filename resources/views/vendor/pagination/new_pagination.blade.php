<style>
    .product__pagination a {
    display: inline-block !important;
    font-size: 15px !important;
    color: #b7b7b7 !important;
    font-weight: 600 !important;
    height: 50px !important;
    width: 50px !important;
    border: 1px solid transparent !important;
    border-radius: 50% !important;
    line-height: 48px !important;
    text-align: center !important;
    -webkit-transition: all, 0.3s !important;
    -o-transition: all, 0.3s !important;
    transition: all, 0.3s !important;
}
</style>

@if ($paginator->hasPages())
    {{-- <nav class="d-flex justify-items-center justify-content-between"> --}}
        <div class="d-flex justify-content-between flex-fill d-sm-none">
            <div class="product__pagination">
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <a class="page-item disabled" aria-disabled="true">
                        <span class="page-link">@lang('pagination.previous')</span>
                    </a>
                @else
                    <a class="page-item">
                        <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev">@lang('pagination.previous')</a>
                    </a>
                @endif

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <a class="page-item">
                        <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">@lang('pagination.next')</a>
                    </a>
                @else
                    <a class="page-item disabled" aria-disabled="true">
                        <span class="page-link">@lang('pagination.next')</span>
                    </a>
                @endif
            </div>
        </div>

        <div class="d-none flex-sm-fill d-sm-flex align-items-sm-center justify-content-sm-between">
            <div>
                <p class="small text-muted">
                    {!! __('Showing') !!}
                    <span class="fw-semibold">{{ $paginator->firstItem() }}</span>
                    {!! __('to') !!}
                    <span class="fw-semibold">{{ $paginator->lastItem() }}</span>
                    {!! __('of') !!}
                    <span class="fw-semibold">{{ $paginator->total() }}</span>
                    {!! __('results') !!}
                </p>
            </div>

            <div>
                <div class="pagination">
                    {{-- Previous Page Link --}}
                    @if ($paginator->onFirstPage())
                        <a class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                            <span class="page-link" aria-hidden="true">&lsaquo;</span>
                        </a>
                    @else
                        <a class="page-item">
                            <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
                        </a>
                    @endif

                    {{-- Pagination Elements --}}
                    @foreach ($elements as $element)
                        {{-- "Three Dots" Separator --}}
                        @if (is_string($element))
                            <a class="page-item disabled" aria-disabled="true"><span class="page-link">{{ $element }}</span></a>
                        @endif

                        {{-- Array Of Links --}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <a class="current-page"  aria-current="page"><span class="page-link">{{ $page }}</span></a>
                                @else
                                    <li class=""><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($paginator->hasMorePages())
                        <a class="page-item">
                            <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
                        </a>
                    @else
                        <a class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                            <span class="page-link" aria-hidden="true">&rsaquo;</span>
                        </a>
                    @endif
                </div>
            </div>
        </div>
    {{-- </nav> --}}
@endif


<div class="product__pagination">
    <a href="#" >1</a>
    <a href="#">2</a>
    <a href="#">3</a>
    <a href="#">4</a>
    <a href="#">5</a>
    <a href="#"><i class="fa fa-angle-double-right"></i></a>
</div>
