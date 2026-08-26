<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class ZeptoMailService
{
    public static function send(string $toEmail, string $toName, string $subject, string $htmlBody): array
    {
        $response = Http::withHeaders([
            'Authorization' => env('ZEPTOMAIL_TOKEN'),
            'Content-Type' => 'application/json',
        ])->post(env('ZEPTOMAIL_URL'), [
            'from' => [
                'address' => env('ZEPTOMAIL_FROM'),
                'name' => env('ZEPTOMAIL_FROM_NAME'),
            ],
            'to' => [[
                'email_address' => ['address' => $toEmail, 'name' => $toName],
            ]],
            'subject' => $subject,
            'htmlbody' => $htmlBody,
        ]);

        return ['success' => $response->successful(), 'status' => $response->status(), 'body' => $response->json()];
    }
}