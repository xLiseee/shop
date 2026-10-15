@props(['stock'])

<span class="inline-flex shrink-0 items-center gap-1.5 rounded-full px-2.5 py-1.5 text-[11px] font-semibold {{ $stock > 0 ? 'bg-green-50 text-green-800' : 'bg-amber-50 text-amber-800' }}">
    <span class="size-1.5 rounded-full {{ $stock > 0 ? 'bg-green-600' : 'bg-amber-500' }}"></span>
    {{ $stock > 0 ? $stock . ' in stock' : 'Sold out' }}
</span>
