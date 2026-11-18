@props(['items' => []])

<nav aria-label="Breadcrumb" {{ $attributes }}>
    <ol class="flex flex-wrap items-center gap-1.5 text-sm text-muted">
        <li><a href="{{ route('home') }}" class="hover:text-primary-600">Home</a></li>
        @foreach ($items as $item)
            <li class="flex items-center gap-1.5">
                <x-icon name="chevron-right" class="h-3.5 w-3.5 text-slate-400" />
                @if (! empty($item['href']) && ! $loop->last)
                    <a href="{{ $item['href'] }}" class="hover:text-primary-600">{{ $item['label'] }}</a>
                @else
                    <span aria-current="page" class="font-medium text-slate-900 dark:text-white">{{ $item['label'] }}</span>
                @endif
            </li>
        @endforeach
    </ol>
</nav>
