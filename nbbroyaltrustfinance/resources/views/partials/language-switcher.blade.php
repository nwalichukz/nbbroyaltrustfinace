{{--
    Reusable, self-contained language switcher.
    Include with: @include('partials.language-switcher')

    WHY THIS FIX WORKS:
    The stock Google Translate "gadget" is fragile — it renders inside an
    iframe/select that Google restyles unpredictably, and CSS tricks to hide
    its branding often hide the whole control by accident (font-size:0 /
    color:transparent on a parent element hides children too). That's the
    most common reason people find "Google Translate isn't working."

    Instead: we let Google inject its real <select class="goog-te-combo">
    into a visually hidden container (.gt-hidden — clipped, not display:none,
    which Google's script can dislike), and we drive that hidden select from
    our OWN visible, fully-styled dropdown. Selecting a language sets the
    hidden select's value and fires a native "change" event, which is exactly
    what the Google widget listens for. If the hidden select isn't ready yet
    (the external script can take a moment to load), we retry briefly instead
    of failing silently.

    PERSISTENCE FIX (this is the part that was actually broken):
    This dashboard is a normal multi-page Laravel app — every sidebar link is
    a full page load, not an SPA route. The select-and-dispatch trick above
    only affects the CURRENT page; it has no memory. So a user could pick
    "French" on Overview, click "My Accounts," and land back on English with
    no indication anything failed. Google's widget itself reads a "googtrans"
    cookie on init and auto-translates to whatever language it names — so we
    write that cookie (and mirror the choice in localStorage, purely to
    restore the visible button label instantly on load, before Google's
    script has even downloaded). The cookie is set synchronously, at the top
    of this script, before the async Google <script> tag below it starts
    loading — so translation is already decided by the time that script runs
    on every subsequent page.
--}}
<div class="lang-switcher" id="lang-switcher">
    <button type="button" class="lang-switcher__btn" id="lang-switcher-btn" aria-haspopup="true" aria-expanded="false">
        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><circle cx="12" cy="12" r="9"/><path d="M3 12h18M12 3a15 15 0 010 18M12 3a15 15 0 000 18"/></svg>
        <span id="lang-switcher-current">English</span>
        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 9l6 6 6-6"/></svg>
    </button>

    <div class="lang-switcher__menu" id="lang-switcher-menu" role="menu" aria-label="Choose a language">
                        <button type="button" data-lang="en" data-label="English" aria-current="true">English</button>
                        <button type="button" data-lang="af" data-label="Afrikaans">Afrikaans</button>
                        <button type="button" data-lang="sq" data-label="Albanian">Albanian</button>
                        <button type="button" data-lang="am" data-label="Amharic">Amharic</button>
                        <button type="button" data-lang="ar" data-label="Arabic">Arabic</button>
                        <button type="button" data-lang="hy" data-label="Armenian">Armenian</button>
                        <button type="button" data-lang="az" data-label="Azerbaijani">Azerbaijani</button>
                        <button type="button" data-lang="eu" data-label="Basque">Basque</button>
                        <button type="button" data-lang="be" data-label="Belarusian">Belarusian</button>
                        <button type="button" data-lang="bn" data-label="Bengali">Bengali</button>
                        <button type="button" data-lang="bs" data-label="Bosnian">Bosnian</button>
                        <button type="button" data-lang="bg" data-label="Bulgarian">Bulgarian</button>
                        <button type="button" data-lang="ca" data-label="Catalan">Catalan</button>
                        <button type="button" data-lang="ceb" data-label="Cebuano">Cebuano</button>
                        <button type="button" data-lang="zh-CN" data-label="Chinese (Simplified)">Chinese (Simplified)</button>
                        <button type="button" data-lang="zh-TW" data-label="Chinese (Traditional)">Chinese (Traditional)</button>
                        <button type="button" data-lang="co" data-label="Corsican">Corsican</button>
                        <button type="button" data-lang="hr" data-label="Croatian">Croatian</button>
                        <button type="button" data-lang="cs" data-label="Czech">Czech</button>
                        <button type="button" data-lang="da" data-label="Danish">Danish</button>
                        <button type="button" data-lang="nl" data-label="Dutch">Dutch</button>
                        <button type="button" data-lang="eo" data-label="Esperanto">Esperanto</button>
                        <button type="button" data-lang="et" data-label="Estonian">Estonian</button>
                        <button type="button" data-lang="fi" data-label="Finnish">Finnish</button>
                        <button type="button" data-lang="fr" data-label="French">French</button>
                        <button type="button" data-lang="fy" data-label="Frisian">Frisian</button>
                        <button type="button" data-lang="gl" data-label="Galician">Galician</button>
                        <button type="button" data-lang="ka" data-label="Georgian">Georgian</button>
                        <button type="button" data-lang="de" data-label="German">German</button>
                        <button type="button" data-lang="el" data-label="Greek">Greek</button>
                        <button type="button" data-lang="gu" data-label="Gujarati">Gujarati</button>
                        <button type="button" data-lang="ht" data-label="Haitian Creole">Haitian Creole</button>
                        <button type="button" data-lang="ha" data-label="Hausa">Hausa</button>
                        <button type="button" data-lang="he" data-label="Hebrew">Hebrew</button>
                        <button type="button" data-lang="hi" data-label="Hindi">Hindi</button>
                        <button type="button" data-lang="hu" data-label="Hungarian">Hungarian</button>
                        <button type="button" data-lang="is" data-label="Icelandic">Icelandic</button>
                        <button type="button" data-lang="ig" data-label="Igbo">Igbo</button>
                        <button type="button" data-lang="id" data-label="Indonesian">Indonesian</button>
                        <button type="button" data-lang="ga" data-label="Irish">Irish</button>
                        <button type="button" data-lang="it" data-label="Italian">Italian</button>
                        <button type="button" data-lang="ja" data-label="Japanese">Japanese</button>
                        <button type="button" data-lang="jw" data-label="Javanese">Javanese</button>
                        <button type="button" data-lang="kn" data-label="Kannada">Kannada</button>
                        <button type="button" data-lang="kk" data-label="Kazakh">Kazakh</button>
                        <button type="button" data-lang="km" data-label="Khmer">Khmer</button>
                        <button type="button" data-lang="rw" data-label="Kinyarwanda">Kinyarwanda</button>
                        <button type="button" data-lang="ko" data-label="Korean">Korean</button>
                        <button type="button" data-lang="ku" data-label="Kurdish">Kurdish</button>
                        <button type="button" data-lang="ky" data-label="Kyrgyz">Kyrgyz</button>
                        <button type="button" data-lang="lo" data-label="Lao">Lao</button>
                        <button type="button" data-lang="la" data-label="Latin">Latin</button>
                        <button type="button" data-lang="lv" data-label="Latvian">Latvian</button>
                        <button type="button" data-lang="lt" data-label="Lithuanian">Lithuanian</button>
                        <button type="button" data-lang="lb" data-label="Luxembourgish">Luxembourgish</button>
                        <button type="button" data-lang="mk" data-label="Macedonian">Macedonian</button>
                        <button type="button" data-lang="mg" data-label="Malagasy">Malagasy</button>
                        <button type="button" data-lang="ms" data-label="Malay">Malay</button>
                        <button type="button" data-lang="ml" data-label="Malayalam">Malayalam</button>
                        <button type="button" data-lang="mt" data-label="Maltese">Maltese</button>
                        <button type="button" data-lang="mi" data-label="Maori">Maori</button>
                        <button type="button" data-lang="mr" data-label="Marathi">Marathi</button>
                        <button type="button" data-lang="mn" data-label="Mongolian">Mongolian</button>
                        <button type="button" data-lang="my" data-label="Myanmar (Burmese)">Myanmar (Burmese)</button>
                        <button type="button" data-lang="ne" data-label="Nepali">Nepali</button>
                        <button type="button" data-lang="no" data-label="Norwegian">Norwegian</button>
                        <button type="button" data-lang="ny" data-label="Nyanja (Chichewa)">Nyanja (Chichewa)</button>
                        <button type="button" data-lang="or" data-label="Odia">Odia</button>
                        <button type="button" data-lang="ps" data-label="Pashto">Pashto</button>
                        <button type="button" data-lang="fa" data-label="Persian">Persian</button>
                        <button type="button" data-lang="pl" data-label="Polish">Polish</button>
                        <button type="button" data-lang="pt" data-label="Portuguese">Portuguese</button>
                        <button type="button" data-lang="pa" data-label="Punjabi">Punjabi</button>
                        <button type="button" data-lang="ro" data-label="Romanian">Romanian</button>
                        <button type="button" data-lang="ru" data-label="Russian">Russian</button>
                        <button type="button" data-lang="sm" data-label="Samoan">Samoan</button>
                        <button type="button" data-lang="gd" data-label="Scots Gaelic">Scots Gaelic</button>
                        <button type="button" data-lang="sr" data-label="Serbian">Serbian</button>
                        <button type="button" data-lang="st" data-label="Sesotho">Sesotho</button>
                        <button type="button" data-lang="sn" data-label="Shona">Shona</button>
                        <button type="button" data-lang="sd" data-label="Sindhi">Sindhi</button>
                        <button type="button" data-lang="si" data-label="Sinhala">Sinhala</button>
                        <button type="button" data-lang="sk" data-label="Slovak">Slovak</button>
                        <button type="button" data-lang="sl" data-label="Slovenian">Slovenian</button>
                        <button type="button" data-lang="so" data-label="Somali">Somali</button>
                        <button type="button" data-lang="es" data-label="Spanish">Spanish</button>
                        <button type="button" data-lang="su" data-label="Sundanese">Sundanese</button>
                        <button type="button" data-lang="sw" data-label="Swahili">Swahili</button>
                        <button type="button" data-lang="sv" data-label="Swedish">Swedish</button>
                        <button type="button" data-lang="tl" data-label="Tagalog">Tagalog</button>
                        <button type="button" data-lang="tg" data-label="Tajik">Tajik</button>
                        <button type="button" data-lang="ta" data-label="Tamil">Tamil</button>
                        <button type="button" data-lang="tt" data-label="Tatar">Tatar</button>
                        <button type="button" data-lang="te" data-label="Telugu">Telugu</button>
                        <button type="button" data-lang="th" data-label="Thai">Thai</button>
                        <button type="button" data-lang="tr" data-label="Turkish">Turkish</button>
                        <button type="button" data-lang="tk" data-label="Turkmen">Turkmen</button>
                        <button type="button" data-lang="uk" data-label="Ukrainian">Ukrainian</button>
                        <button type="button" data-lang="ur" data-label="Urdu">Urdu</button>
                        <button type="button" data-lang="ug" data-label="Uyghur">Uyghur</button>
                        <button type="button" data-lang="uz" data-label="Uzbek">Uzbek</button>
                        <button type="button" data-lang="vi" data-label="Vietnamese">Vietnamese</button>
                        <button type="button" data-lang="cy" data-label="Welsh">Welsh</button>
                        <button type="button" data-lang="xh" data-label="Xhosa">Xhosa</button>
                        <button type="button" data-lang="yi" data-label="Yiddish">Yiddish</button>
                        <button type="button" data-lang="yo" data-label="Yoruba">Yoruba</button>
                        <button type="button" data-lang="zu" data-label="Zulu">Zulu</button>    </div>

    {{-- Hidden — Google injects its real <select> here. Not display:none;
         visually clipped only, so Google's own script can still measure it. --}}
    <div id="google_translate_element" class="gt-hidden" aria-hidden="true"></div>
</div>

{{-- Inline by design: this is the control logic for the translator and is
     kept in the page rather than an external JS file. --}}
<script>
(function () {
    'use strict';

    var COOKIE_NAME = 'googtrans';
    var STORAGE_KEY = 'nbb_lang';

    // --- cookie helpers -----------------------------------------------
    function setCookie(value) {
        var expires = 'expires=Fri, 31 Dec 9999 23:59:59 GMT';
        // Host-only cookie, no explicit domain — safest across environments
        // (a wrong/mismatched domain attribute is a classic reason this
        // silently fails). Set on both "/" and current path for reliability.
        document.cookie = COOKIE_NAME + '=' + value + '; path=/; ' + expires;
    }
    function clearCookie() {
        document.cookie = COOKIE_NAME + '=; path=/; expires=Thu, 01 Jan 1970 00:00:00 GMT';
    }

    // --- restore choice BEFORE Google's script runs --------------------
    // This must happen synchronously, at the top of the file, so the
    // googtrans cookie is already in place before the async Google
    // <script> tag below starts executing on this and every future page.
    var saved = null;
    try { saved = JSON.parse(localStorage.getItem(STORAGE_KEY) || 'null'); } catch (e) { saved = null; }

    if (saved && saved.code && saved.code !== 'en') {
        setCookie('/en/' + saved.code);
    } else {
        clearCookie();
    }

    // Called by Google's own script once it loads (see the src tag below).
    window.googleTranslateElementInit = function () {
        new google.translate.TranslateElement(
            {
                pageLanguage: 'en',
                layout: google.translate.TranslateElement.InlineLayout.SIMPLE,
                autoDisplay: false
                // No includedLanguages set on purpose — that's what gives us
                // the full language list rather than a restricted subset.
            },
            'google_translate_element'
        );
    };

    function findHiddenSelect() {
        return document.querySelector('#google_translate_element select.goog-te-combo');
    }

    function applyLanguage(code, label, attempt) {
        attempt = attempt || 0;
        var select = findHiddenSelect();

        if (!select) {
            // Google's widget script can take a beat to inject its <select>.
            // Retry for up to ~5 seconds before giving up quietly.
            if (attempt < 20) {
                setTimeout(function () { applyLanguage(code, label, attempt + 1); }, 250);
            }
            return;
        }

        select.value = code;
        select.dispatchEvent(new Event('change'));

        var currentLabel = document.getElementById('lang-switcher-current');
        if (currentLabel) currentLabel.textContent = label;

        document.querySelectorAll('#lang-switcher-menu button[aria-current]').forEach(function (btn) {
            btn.removeAttribute('aria-current');
        });
        var active = document.querySelector('#lang-switcher-menu button[data-lang="' + code + '"]');
        if (active) active.setAttribute('aria-current', 'true');
    }

    document.addEventListener('DOMContentLoaded', function () {
        var wrap = document.getElementById('lang-switcher');
        var btn = document.getElementById('lang-switcher-btn');
        var menu = document.getElementById('lang-switcher-menu');
        if (!wrap || !btn || !menu) return;

        // Reflect the previously-saved language in the button label right
        // away, without waiting on Google's script — so the UI is honest
        // about the current state from the first paint.
        if (saved && saved.code && saved.code !== 'en') {
            var label = document.getElementById('lang-switcher-current');
            if (label) label.textContent = saved.label;
            menu.querySelectorAll('button[aria-current]').forEach(function (b) { b.removeAttribute('aria-current'); });
            var active = menu.querySelector('button[data-lang="' + saved.code + '"]');
            if (active) active.setAttribute('aria-current', 'true');
        }

        btn.addEventListener('click', function (e) {
            e.stopPropagation();
            var open = menu.classList.toggle('is-open');
            wrap.classList.toggle('is-open', open);
            btn.setAttribute('aria-expanded', open ? 'true' : 'false');
        });

        document.addEventListener('click', function () {
            menu.classList.remove('is-open');
            wrap.classList.remove('is-open');
            btn.setAttribute('aria-expanded', 'false');
        });

        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape') {
                menu.classList.remove('is-open');
                wrap.classList.remove('is-open');
                btn.setAttribute('aria-expanded', 'false');
            }
        });

        menu.querySelectorAll('button[data-lang]').forEach(function (item) {
            item.addEventListener('click', function (e) {
                e.stopPropagation();
                var code = item.getAttribute('data-lang');
                var label = item.getAttribute('data-label');

                // Persist the choice so it survives the next full page load.
                if (code === 'en') {
                    clearCookie();
                    try { localStorage.removeItem(STORAGE_KEY); } catch (err) {}
                } else {
                    setCookie('/en/' + code);
                    try { localStorage.setItem(STORAGE_KEY, JSON.stringify({ code: code, label: label })); } catch (err) {}
                }

                applyLanguage(code, label);
                menu.classList.remove('is-open');
                wrap.classList.remove('is-open');
                btn.setAttribute('aria-expanded', 'false');
            });
        });
    });
})();
</script>
<script src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit" async></script>