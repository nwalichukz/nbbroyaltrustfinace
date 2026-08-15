<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\View;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    /**
     * Locales this site supports, keyed by locale code.
     * Add a country/language here and it appears automatically
     * in the language switcher on every page.
     */
    public static array $supported = [
        'en'    => ['label' => 'English',   'country' => 'United Kingdom', 'flag' => '🇬🇧', 'dir' => 'ltr'],
        'en-us' => ['label' => 'English',   'country' => 'United States',  'flag' => '🇺🇸', 'dir' => 'ltr'],
        'fr'    => ['label' => 'Français',  'country' => 'France',         'flag' => '🇫🇷', 'dir' => 'ltr'],
        'de'    => ['label' => 'Deutsch',   'country' => 'Germany',        'flag' => '🇩🇪', 'dir' => 'ltr'],
        'es'    => ['label' => 'Español',   'country' => 'Spain',          'flag' => '🇪🇸', 'dir' => 'ltr'],
        'ar'    => ['label' => 'العربية',    'country' => 'United Arab Emirates', 'flag' => '🇦🇪', 'dir' => 'rtl'],
    ];

    public function handle(Request $request, Closure $next): Response
    {
        $locale = $request->route('locale') ?? session('locale', config('app.fallback_locale'));

        if (! array_key_exists($locale, self::$supported)) {
            $locale = config('app.fallback_locale');
        }

        App::setLocale($locale);
        session(['locale' => $locale]);

        View::share('activeLocale', $locale);
        View::share('locales', self::$supported);
        View::share('textDirection', self::$supported[$locale]['dir']);

        return $next($request);
    }
}
