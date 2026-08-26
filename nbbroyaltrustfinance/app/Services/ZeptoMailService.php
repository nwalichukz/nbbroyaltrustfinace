<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class ZeptoMailService
{
    public static $token = "Zoho-enczapikey wSsVR61+8xDyB659z2GlcbttnQkHAFP/ERt/3FT0vX+tHKzDpcc+wkDPDAGkGPkfRGc9EGEWrbksmxhShmcPhtgrzFAHWyiF9mqRe1U4J3x17qnvhDzDXmlblheKLosBxQ5immJjE84r+g==";
    public static $url = "https://api.zeptomail.com/v1.1/email";
    public static $from = "hello@kuritr.com";
    public static $from_name = "NbbTrustKapital";

    public static function send(string $toEmail, string $toName, string $subject, string $htmlBody): array
    {
        $response = Http::withHeaders([
            'Authorization' => self::$token,
            'Content-Type' => 'application/json',
        ])->post(self::$url, [
            'from' => [
                'address' => self::$from,
                'name' => self::$from_name,
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