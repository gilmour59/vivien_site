{{-- @if ($paginator->hasPages())
    <ul class="pagination" role="navigation">
        <!-- Previous Page Link -->
        @if ($paginator->onFirstPage())
            <li class="page-item disabled" aria-disabled="true">
                <span class="page-link">@lang('pagination.previous')</span>
            </li>
        @else
            <li class="page-item">
                <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev">@lang('pagination.previous')</a>
            </li>
        @endif

        <!-- Next Page Link -->
        @if ($paginator->hasMorePages())
            <li class="page-item">
                <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">@lang('pagination.next')</a>
            </li>
        @else
            <li class="page-item disabled" aria-disabled="true">
                <span class="page-link">@lang('pagination.next')</span>
            </li>
        @endif
    </ul>
@endif --}}

@if ($paginator->hasPages())
    <nav class="blog-pagination justify-content-center d-flex">
        <ul class="pagination" role="navigation">
            
            <!-- Previous Page Link -->
            @if ($paginator->onFirstPage())
                <li class="page-item disabled">
                    <a href="" class="page-link">
                        <span class="lnr lnr-chevron-left"></span>
                    </a>
                </li>
            @else
                <li class="page-item">
                    <a href="{{ $paginator->previousPageUrl() }}" class="page-link" aria-label="Previous">
                        <span class="lnr lnr-chevron-left"></span>
                    </a>
                </li>                
            @endif

            <!-- Next Page Link -->
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a href="{{ $paginator->nextPageUrl() }}" class="page-link" aria-label="Previous">
                        <span class="lnr lnr-chevron-right"></span>
                    </a>
                </li>  
            @else
                <li class="page-item disabled">
                    <a href="" class="page-link">
                        <span class="lnr lnr-chevron-right"></span>
                    </a>
                </li>       
            @endif
        </ul>
    </nav>
@endif
