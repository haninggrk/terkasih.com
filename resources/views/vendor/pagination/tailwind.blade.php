@if ($paginator->hasPages())
    <nav class="pg-wrap" aria-label="Navigasi halaman">
        @if ($paginator->onFirstPage())
            <span class="pg-btn pg-disabled">← Sebelumnya</span>
        @else
            <a class="pg-btn" href="{{ $paginator->previousPageUrl() }}#memories" rel="prev">← Sebelumnya</a>
        @endif

        <span class="pg-info">Halaman {{ $paginator->currentPage() }} dari {{ $paginator->lastPage() }}</span>

        @if ($paginator->hasMorePages())
            <a class="pg-btn" href="{{ $paginator->nextPageUrl() }}#memories" rel="next">Selanjutnya →</a>
        @else
            <span class="pg-btn pg-disabled">Selanjutnya →</span>
        @endif
    </nav>
@endif
