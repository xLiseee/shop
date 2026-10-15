@props(['paginator'])

@if ($paginator->hasPages())
    <nav aria-label="Shop pagination" class="flex items-center gap-2">
            @if ($paginator->onFirstPage())
                <span class="cursor-not-allowed rounded-lg border border-gray-200 px-3 py-2 text-sm text-gray-400">Previous</span>
            @else
                <button type="button" class="rounded-lg border border-gray-300 px-3 py-2 text-sm text-gray-700 hover:bg-gray-50" wire:click="previousPage">Previous</button>
            @endif

            @foreach ($paginator->getUrlRange(1, $paginator->lastPage()) as $page => $url)
                <button type="button" aria-current="{{ $page == $paginator->currentPage() ? 'page' : 'false' }}" class="rounded-lg border px-3 py-2 text-sm {{ $page == $paginator->currentPage() ? 'border-green-700 bg-green-700 text-white' : 'border-gray-300 text-gray-700 hover:bg-gray-50' }}" wire:click="gotoPage({{ $page }})">{{ $page }}</button>
            @endforeach

            @if ($paginator->hasMorePages())
                <button type="button" class="rounded-lg border border-gray-300 px-3 py-2 text-sm text-gray-700 hover:bg-gray-50" wire:click="nextPage">Next</button>
            @else
                <span class="cursor-not-allowed rounded-lg border border-gray-200 px-3 py-2 text-sm text-gray-400">Next</span>
            @endif
    </nav>
@endif
