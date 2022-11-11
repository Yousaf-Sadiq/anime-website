@if ($paginator->hasPages())
<div class="d-none flex-sm-fill d-sm-flex align-items-sm-center justify-content-sm-between">
<div>
    <p class="small text-muted ">
        {!! __('Showing') !!}
        <span class="fw-semibold">{{ $paginator->firstItem() }}</span>
        {!! __('to') !!}
        <span class="fw-semibold">{{ $paginator->lastItem() }}</span>
        {!! __('of') !!}
        <span class="fw-semibold">{{ $paginator->total() }}</span>
        {!! __('results') !!}
    </p>
</div>
<div class="product__pagination">

    @if ($paginator->onFirstPage())
    {{-- <li class="disabled"><span>← Previous</span></li> --}}
    <a  class="disabled"><i class="fa fa-angle-double-left"></i></a>
@else
<?php
        if (Session::has("search")) {
          $session_page= Session::get("search");

        ?>
         <a href="{{ $paginator->previousPageUrl()."&search=".$session_page  }}" rel="prev"><i class="fa fa-angle-double-left"></i></a>

         <?php
        }
        elseif (Session::has("episode")) {
          $episode=Session::get("episode")
         ?>


          <a href="{{ $paginator->previousPageUrl()."&Ep=".$episode  }}" rel="prev"><i class="fa fa-angle-double-left"></i></a>

      <?php
      }else{


        ?>
        <a href="{{ $paginator->previousPageUrl() }}" rel="prev"><i class="fa fa-angle-double-left"></i></a>

        <?php
        }
        ?>
   @endif

@foreach ($elements as $element)

@if (is_string($element))
    <a class="disabled"><span>{{ $element }}</span></a>
@endif



@if (is_array($element))
    @foreach ($element as $page => $url)
        @if ($page == $paginator->currentPage())
            <a class="current-page"><span>{{ $page }}</span></a>
        @else
        <?php
        if (Session::has("search")) {
          $session_page= Session::get("search");

        ?>
        <a href="{{ $url."&search=".$session_page }}">{{ $page }}</a>
        <?php
  }
  elseif (Session::has("episode")) {
    $episode=Session::get("episode")
   ?>

    <a href="{{ $url."&Ep=".$episode }}">{{ $page }}</a>
<?php
}else{


        ?>
        <a href="{{ $url }}">{{ $page }}</a>
        <?php
        }
        ?>
        @endif
    @endforeach
@endif
@endforeach



@if ($paginator->hasMorePages())
<?php
if (Session::has("search")) {
    $session_page= Session::get("search");

  ?>
   <a href="{{ $paginator->nextPageUrl()."&search=".$session_page  }}" rel="next"><i class="fa fa-angle-double-right"></i></a>


  <?php
  }
  elseif (Session::has("episode")) {
    $episode=Session::get("episode")
   ?>


    <a href="{{ $paginator->nextPageUrl()."&Ep=".$episode  }}" rel="next"><i class="fa fa-angle-double-right"></i></a>

<?php
}
  else{


  ?>
 <a  href="{{ $paginator->nextPageUrl() }}" rel="next"><i class="fa fa-angle-double-right"></i></a>

  <?php
  }
  ?>
{{-- <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a> --}}

@else
<a class="disabled"><i class="fa fa-angle-double-right"></i></a>
@endif
</div>
</div>
@endif
