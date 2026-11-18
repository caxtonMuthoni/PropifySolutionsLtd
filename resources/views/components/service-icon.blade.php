@props(['name'])

@php
    $map = [
        'building' => 'building-2',
        'eye' => 'eye',
        'cloud' => 'cloud',
        'code' => 'code',
        'gem' => 'gem',
        'globe' => 'globe',
        'graduation-cap' => 'graduation-cap',
        'heart-pulse' => 'heart-pulse',
        'hotel' => 'hotel',
        'pen-tool' => 'pen-tool',
        'plug' => 'plug',
        'server' => 'server',
        'shield' => 'shield',
        'shopping-bag' => 'shopping-bag',
        'smartphone' => 'smartphone',
        'sparkles' => 'sparkles',
        'sprout' => 'sprout',
        'target' => 'target',
        'truck' => 'truck',
        'wallet' => 'wallet',
    ];
@endphp

<x-icon :name="$map[$name] ?? 'sparkles'" {{ $attributes }} />
