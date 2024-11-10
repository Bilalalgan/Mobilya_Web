@if ($paginator->hasPages())
<nav aria-label="...">
  <ul class="pagination justify-content-center">
    <!-- Geriye butonu -->
    <li class="page-item {{ $paginator->onFirstPage() ? 'disabled' : '' }}">
      <a class="page-link" href="{{ $paginator->previousPageUrl() }}" tabindex="-1">
        <span class="material-icons">keyboard_arrow_left</span>
        <span class="sr-only">Previous</span>
      </a>
    </li>

    <!-- Sayfa numaraları -->
    @foreach ($elements as $element)
        @if (is_string($element))
            <li class="page-item disabled"><span class="page-link">{{ $element }}</span></li>
        @endif

        @if (is_array($element))
            @foreach ($element as $page => $url)
                <li class="page-item {{ $page == $paginator->currentPage() ? 'active' : '' }}">
                    <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                </li>
            @endforeach
        @endif
    @endforeach

    <!-- İleri butonu -->
    <li class="page-item {{ $paginator->hasMorePages() ? '' : 'disabled' }}">
      <a class="page-link" href="{{ $paginator->nextPageUrl() }}">
        <span class="material-icons">keyboard_arrow_right</span>
        <span class="sr-only">Next</span>
      </a>
    </li>
  </ul>
</nav>
@endif
