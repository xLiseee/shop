@props(['categories'])

<div class="flex flex-wrap gap-2">
    @foreach ($categories as $category)
        <span class="gradient rounded-full border border-white/70 bg-category px-3 py-1.5 text-xs font-semibold text-primary shadow-sm backdrop-blur">
            {{ $category->name }}
        </span>
    @endforeach
</div>
