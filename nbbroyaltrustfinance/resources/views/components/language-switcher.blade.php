{{--
    Language / country switcher.
    Reads $locales and $activeLocale, shared by SetLocale middleware —
    nothing to pass in manually. Toggling handled by public/js/site.js
    via [data-locale-toggle] / [data-locale-menu] hooks.
--}}
<div class="locale-switcher" data-locale-switcher>
    <button
        type="button"
        class="locale-switcher__button"
        data-locale-toggle
        aria-expanded="false"
        aria-haspopup="listbox"
    >
        <span class="locale-switcher__flag" aria-hidden="true">{{ $locales[$activeLocale]['flag'] }}</span>
        <span>{{ $locales[$activeLocale]['label'] }} ({{ $locales[$activeLocale]['country'] }})</span>
        <span class="locale-switcher__caret" aria-hidden="true">▾</span>
    </button>

    <ul
        class="locale-switcher__menu"
        data-locale-menu
        role="listbox"
        aria-label="{{ __('Choose your language and country') }}"
    >
        @foreach ($locales as $code => $meta)
            <li role="option" aria-current="{{ $code === $activeLocale ? 'true' : 'false' }}">
                <a
                    class="locale-switcher__item"
                    href="{{ route('locale.switch', $code) }}"
                    aria-current="{{ $code === $activeLocale ? 'true' : 'false' }}"
                >
                    <span aria-hidden="true">{{ $meta['flag'] }}</span>
                    <span>
                        {{ $meta['label'] }}
                        <small>{{ $meta['country'] }}</small>
                    </span>
                </a>
            </li>
        @endforeach
    </ul>
</div>
