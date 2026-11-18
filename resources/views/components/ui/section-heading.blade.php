@props(['eyebrow' => null, 'title' => null, 'description' => null, 'align' => 'center', 'id' => null])

<div {{ $attributes->class(['mx-auto max-w-2xl text-center' => $align === 'center', 'max-w-2xl' => $align !== 'center']) }}>
    @if ($eyebrow)
        <p class="eyebrow">{{ $eyebrow }}</p>
    @endif
    <h2 @if ($id) id="{{ $id }}" @endif class="mt-4 text-3xl font-semibold text-slate-950 sm:text-4xl lg:text-[2.75rem] lg:leading-tight dark:text-white">{{ $title ?? '' }}{{ $heading ?? '' }}</h2>
    @if ($description || isset($body))
        <p class="mt-5 text-base leading-relaxed text-muted sm:text-lg">{{ $description }}{{ $body ?? '' }}</p>
    @endif
</div>
