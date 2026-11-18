@props(['person', 'size' => 'md'])

@php
    $hasPhoto = ! empty($person['photo']) && is_file(public_path(ltrim($person['photo'], '/')));
    $isPlaceholder = str_starts_with($person['name'], '[');
    $initials = collect(explode(' ', $isPlaceholder ? $person['role'] : $person['name']))
        ->filter(fn (string $word): bool => (bool) preg_match('/^\p{L}/u', $word))
        ->map(fn (string $word): string => mb_substr($word, 0, 1))
        ->take(2)
        ->implode('');
@endphp

@if ($hasPhoto)
    <img src="{{ $person['photo'] }}" alt="{{ $isPlaceholder ? $person['role'] : $person['name'].', '.$person['role'] }} at Propify Solutions" loading="lazy" decoding="async" width="800" height="800" {{ $attributes->merge(['class' => 'object-cover']) }}>
@else
    <div {{ $attributes->merge(['class' => 'flex items-center justify-center bg-gradient-to-br from-primary-500 via-primary-600 to-ink-900 font-semibold text-white']) }} aria-hidden="true">
        <span @class(['text-6xl' => $size === 'lg', 'text-2xl' => $size === 'md'])>{{ strtoupper($initials) }}</span>
    </div>
@endif
