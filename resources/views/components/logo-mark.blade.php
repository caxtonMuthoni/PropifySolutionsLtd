@php($uid = 'pm'.\Illuminate\Support\Str::random(8))
<svg viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false" {{ $attributes }}>
    <defs>
        <linearGradient id="{{ $uid }}g" x1="6" y1="4" x2="58" y2="60" gradientUnits="userSpaceOnUse">
            <stop offset="0" stop-color="#3B9BFF" />
            <stop offset=".55" stop-color="#1F5FF0" />
            <stop offset="1" stop-color="#0B2FA8" />
        </linearGradient>
        <radialGradient id="{{ $uid }}s" cx="18" cy="10" r="40" gradientUnits="userSpaceOnUse">
            <stop offset="0" stop-color="#fff" stop-opacity=".35" />
            <stop offset="1" stop-color="#fff" stop-opacity="0" />
        </radialGradient>
    </defs>
    <rect width="64" height="64" rx="18" fill="url(#{{ $uid }}g)" />
    <rect width="64" height="64" rx="18" fill="url(#{{ $uid }}s)" />
    <path d="M22 47V19h11.5a10 10 0 0 1 0 20H22" fill="none" stroke="#fff" stroke-width="7.5" stroke-linecap="round" stroke-linejoin="round" />
    <rect x="41.5" y="43.5" width="9" height="9" rx="2.5" transform="rotate(45 46 48)" fill="#7DE3FF" />
</svg>
