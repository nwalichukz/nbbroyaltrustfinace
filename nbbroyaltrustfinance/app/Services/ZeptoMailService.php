<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ZeptoMailService
{
    public static $token = "Zoho-enczapikey wSsVR61+8xDyB659z2GlcbttnQkHAFP/ERt/3FT0vX+tHKzDpcc+wkDPDAGkGPkfRGc9EGEWrbksmxhShmcPhtgrzFAHWyiF9mqRe1U4J3x17qnvhDzDXmlblheKLosBxQ5immJjE84r+g==";
    public static $url = "https://api.zeptomail.com/v1.1/email";
    public static $from = "hello@kuritr.com";
    public static $from_name = "NbbTrustKapital";

    /**
     * Send a branded Nbb Trust Kapital email. Fires and forgets — logs failures internally,
     * does not return anything for the caller to check.
     */
    public static function send(
        string $to,
        string $name,
        string $subject,
        string $message
    ): void {
        $html = self::buildHtml($subject, $name, $message);

        try {
            Http::withHeaders([
                'Authorization' => self::$token,
                'Content-Type' => 'application/json',
            ])->post(self::$url, [
                'from' => [
                    'address' => self::$from,
                    'name' => self::$from_name,
                ],
                'to' => [[
                    'email_address' => ['address' => $to, 'name' => $name],
                ]],
                'subject' => $subject,
                'htmlbody' => $html,
            ])->throw();

        } catch (\Throwable $e) {
            Log::error('ZeptoMail send failed: ' . $e->getMessage());
        }
    }

    /**
     * Consumes send() — call this from anywhere in the app.
     *
     * Usage:
     * ZeptoMailService::notify('chukznwali@gmail.com', 'Chukwuma', 'Payment Received', 'We received your payment of ₦50,000.');
     */
    public static function notify(string $to, string $name, string $subject, string $message): void
    {
        self::send($to, $name, $subject, $message);
    }

    /**
     * Builds the branded HTML. Subject line doubles as the on-page heading.
     */
    private static function buildHtml(string $heading, string $name, string $message): string
    {
        $year = date('Y');

        return <<<HTML
        <!DOCTYPE html>
        <html>
        <body style="margin:0; padding:0; background-color:#f2f3f5; font-family:Arial, Helvetica, sans-serif;">
            <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background-color:#f2f3f5; padding:32px 0;">
                <tr>
                    <td align="center">
                        <table role="presentation" width="600" cellpadding="0" cellspacing="0" style="width:600px; max-width:600px; background-color:#ffffff; border-radius:8px; overflow:hidden;">
                            <tr>
                                <td style="background-color:#0a1f44; padding:28px 40px; text-align:center;">
                                    <span style="font-size:22px; font-weight:bold; color:#c9a24b; letter-spacing:0.5px;">NBB TRUST KAPITAL</span>
                                </td>
                            </tr>
                            <tr>
                                <td style="background-color:#c9a24b; height:4px; line-height:4px; font-size:0;">&nbsp;</td>
                            </tr>
                            <tr>
                                <td style="padding:40px;">
                                    <h1 style="margin:0 0 16px 0; font-size:20px; color:#0a1f44;">{$heading}</h1>
                                    <p style="margin:0 0 16px 0; font-size:15px; line-height:1.6; color:#333333;">Hi {$name},</p>
                                    <p style="margin:0 0 16px 0; font-size:15px; line-height:1.6; color:#333333;">{$message}</p>
                                    <p style="margin:24px 0 0 0; font-size:15px; line-height:1.6; color:#333333;">
                                        Regards,<br>
                                        <strong style="color:#0a1f44;">The Nbb Trust Kapital Team</strong>
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding:0 40px;"><div style="border-top:1px solid #e5e5e5;"></div></td>
                            </tr>
                            <tr>
                                <td style="padding:24px 40px 32px 40px; text-align:center;">
                                    <p style="margin:0; font-size:12px; color:#999999;">&copy; {$year} Nbb Trust Kapital. All rights reserved.</p>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </body>
        </html>
        HTML;
    }
}