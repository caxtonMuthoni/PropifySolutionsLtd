<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class TurnstileService
{
    protected string $verifyUrl = 'https://challenges.cloudflare.com/turnstile/v0/siteverify';

    /**
     * Validate Turnstile token from Cloudflare
     */
    public function validate(?string $token, ?string $remoteIp = null): array
    {
        if (!$token) {
            return ['success' => false, 'error-codes' => ['missing-token']];
        }

        $response = Http::asForm()->post($this->verifyUrl, [
            'secret' => config('services.turnstile.secret'),
            'response' => $token,
            'remoteip' => $remoteIp,
        ]);

        if ($response->failed()) {
            return ['success' => false, 'error-codes' => ['internal-error']];
        }

        return $response->json();
    }
}
