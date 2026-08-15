<?php

namespace App\Http\Controllers\Index;

use App\Http\Middleware\SetLocale;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class LocaleController extends Controller
{
    public function switch(string $locale, Request $request): RedirectResponse
    {
        if (! array_key_exists($locale, SetLocale::$supported)) {
            abort(404);
        }

        session(['locale' => $locale]);

        $previous = url()->previous();
        $path = trim(parse_url($previous, PHP_URL_PATH) ?? '/', '/');

        $segments = array_filter(explode('/', $path));
        if (($segments[0] ?? null) && array_key_exists($segments[0], SetLocale::$supported)) {
            array_shift($segments);
        }

        $rest = implode('/', $segments);

        return redirect('/'.$locale.($rest ? '/'.$rest : ''));
    }
}
