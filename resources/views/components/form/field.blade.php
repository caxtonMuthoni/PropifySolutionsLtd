@props(['name', 'label', 'type' => 'text', 'model' => null])

<div {{ $attributes->only('class') }}>
    <label for="{{ $name }}" class="mb-2 block text-sm font-medium">{{ $label }}</label>
    <input
        id="{{ $name }}"
        name="{{ $name }}"
        type="{{ $type }}"
        wire:model="{{ $model ?? $name }}"
        aria-describedby="{{ $name }}-error"
        @error($model ?? $name) aria-invalid="true" @enderror
        {{ $attributes->except('class')->merge(['class' => 'form-input']) }}
    >
    @error($model ?? $name)
        <p id="{{ $name }}-error" class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
    @enderror
</div>
