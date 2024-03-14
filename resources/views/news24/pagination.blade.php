<div class="row mx-0 animate-box" data-animate-effect="fadeInUp">
     <div class="col-12 text-center pb-4 pt-4">
         @if ($paginator->hasPages())
                 @if ($paginator->onFirstPage())
                     <a class="btn_mange_pagging">
                         <i class="fa fa-long-arrow-left"></i>&nbsp;&nbsp; Previous
                     </a>
                 @else
                     <a href="{{ $paginator->previousPageUrl() }}" class="btn_mange_pagging">
                         <i class="fa fa-long-arrow-left"></i>&nbsp;&nbsp; Previous
                     </a>
                 @endif

                 @foreach ($elements as $element)
                     @if (is_string($element))
                             <a class="btn_pagging">{{ $element }}</a>
                     @endif

                     @if (is_array($element))
                         @foreach ($element as $page => $url)
                             @if ($page == $paginator->currentPage())
                                     <a class="btn_pagging">{{ $page }}</a>
                             @else
                                     <a href="{{ $url }}" class="btn_pagging">{{ $page }}</a>
                             @endif
                         @endforeach
                     @endif
                 @endforeach

                 @if ($paginator->hasMorePages())
                     <a href="{{ $paginator->nextPageUrl() }}" class="btn_mange_pagging">Next
                         <i class="fa fa-long-arrow-right"></i>&nbsp;&nbsp;
                     </a>
                 @else
                     <a class="btn_mange_pagging">Next
                         <i class="fa fa-long-arrow-right"></i>&nbsp;&nbsp;
                     </a>
                 @endif
         @endif
     </div>
</div>
