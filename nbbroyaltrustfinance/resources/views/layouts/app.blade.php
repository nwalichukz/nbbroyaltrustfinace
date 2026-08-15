<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <meta name="robots" content="index, follow">
    <meta name="theme-color" content="#0B2545">

    <title>@yield('title', 'Nbb Trust Kapital | International Private Banking &amp; Wealth Management')</title>
    <meta name="description" content="@yield('meta_description', 'Nbb Trust Kapital is a UK-based international finance institution providing private banking, wealth management and corporate banking services with governance you can rely on.')">

    {{-- Canonical --}}
    <link rel="canonical" href="{{ url()->current() }}">

    {{-- Open Graph --}}
    <meta property="og:site_name" content="Nbb Trust Kapital">
    <meta property="og:title" content="@yield('title', 'Nbb Trust Kapital | International Private Banking & Wealth Management')">
    <meta property="og:description" content="@yield('meta_description', 'A UK-based international finance institution built on trust, discretion and global reach.')">
    <meta property="og:type" content="website">
    <meta property="og:image" content="{{ asset('images/og-cover.jpg') }}">

    {{-- Favicon --}}
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Serif+4:opsz,wght@8..60,400;8..60,600;8..60,700&family=Public+Sans:wght@300;400;500;600;700&family=IBM+Plex+Mono:wght@400;500&display=swap" rel="stylesheet">

    {{-- Styles --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @stack('styles')
</head>
<body class="notranslate" translate="no">

    <a href="#main-content" class="skip-link">Skip to main content</a>

    {{-- =========================================================
         Top utility bar — contact, client login, language switcher
         ========================================================= --}}
    <div class="topbar">
        <div class="container topbar__inner">
            <div class="topbar__left">
                <a href="tel:+442012345678">+44 20 1234 5678</a>
                <span class="topbar__divider" aria-hidden="true"></span>
                <a href="mailto:enquiries@nbbtrustkapital.com">enquiries@nbbtrustkapital.com</a>
                <span class="topbar__divider" aria-hidden="true"></span>
                <span>London &middot; United Kingdom</span>
            </div>
            <div class="topbar__right">
                <a href="{{ url('/login') }}">Client Login</a>
                <span class="topbar__divider" aria-hidden="true"></span>

                @include('partials.language-switcher')
            </div>
        </div>
    </div>

    {{-- =========================================================
         Primary navigation
         ========================================================= --}}
    <header class="site-header" id="site-header">
        <nav class="container nav" aria-label="Primary">
            <a href="{{ url('/') }}" class="brand">
                <span class="brand__mark" aria-hidden="true"></span>
                <span class="brand__text">
                    <span class="brand__name">Nbb Trust Kapital</span>
                    <span class="brand__tag">Private &amp; International Banking</span>
                </span>
            </a>

            <ul class="nav__links">
                <li><a href="{{ url('/private-banking') }}">Private Banking</a></li>
                <li><a href="{{ url('/corporate-institutional') }}">Corporate &amp; Institutional</a></li>
                <li><a href="{{ url('/wealth-management') }}">Wealth Management</a></li>
                <li><a href="{{ url('/about') }}">About</a></li>
                <li><a href="{{ url('/insights') }}">Insights</a></li>
                <li><a href="{{ url('/contact') }}">Contact</a></li>
            </ul>

            <div class="nav__cta">
                <a href="{{ url('/login') }}" class="btn btn--outline-dark">Client Login</a>
                <a href="{{ url('/register') }}" class="btn btn--primary">Open an Account</a>
            </div>

            <button class="nav__toggle" id="nav-toggle" aria-expanded="false" aria-controls="nav-drawer" aria-label="Open menu">
                <span></span><span></span><span></span>
            </button>
        </nav>
    </header>

    {{-- Mobile drawer --}}
    <div class="nav-scrim" id="nav-scrim"></div>
    <aside class="nav-drawer" id="nav-drawer" aria-hidden="true">
        <div class="nav-drawer__head">
            <span class="brand__name" style="color:#fff;">Menu</span>
            <button class="nav-drawer__close" id="nav-drawer-close" aria-label="Close menu">&times;</button>
        </div>
        <ul class="nav-drawer__links">
            <li><a href="{{ url('/private-banking') }}">Private Banking</a></li>
            <li><a href="{{ url('/corporate-institutional') }}">Corporate &amp; Institutional</a></li>
            <li><a href="{{ url('/wealth-management') }}">Wealth Management</a></li>
            <li><a href="{{ url('/about') }}">About</a></li>
            <li><a href="{{ url('/insights') }}">Insights</a></li>
            <li><a href="{{ url('/contact') }}">Contact</a></li>
        </ul>
        <div class="nav-drawer__foot">
            <a href="{{ url('/client-login') }}" class="btn btn--outline-light btn--block">Client Login</a>
            <a href="{{ url('/open-account') }}" class="btn btn--primary btn--block">Open an Account</a>
        </div>
    </aside>

    {{-- =========================================================
         Page content — every static page injects here
         ========================================================= --}}
    <main id="main-content">
        @yield('content')
    </main>

    {{-- =========================================================
         Footer
         ========================================================= --}}
    <footer class="site-footer">
        <div class="container footer-top">
            <div class="footer-grid">
                <div class="footer-brand">
                    <a href="{{ url('/') }}" class="brand">
                        <span class="brand__mark" aria-hidden="true" style="border-color:#fff;"></span>
                        <span class="brand__text">
                            <span class="brand__name" style="color:#fff;">Nbb Trust Kapital</span>
                            <span class="brand__tag">Private &amp; International Banking</span>
                        </span>
                    </a>
                    <p>An international finance institution headquartered in the United Kingdom, serving private, corporate and institutional clients across Europe, the Middle East, Africa, Asia-Pacific and the Americas.</p>
                    <div class="footer-social">
                        <a href="#" aria-label="LinkedIn">in</a>
                        <a href="#" aria-label="X (Twitter)">X</a>
                        <a href="#" aria-label="YouTube">▶</a>
                    </div>
                </div>

                <div class="footer-col">
                    <h4>Services</h4>
                    <ul>
                        <li><a href="{{ url('/private-banking') }}">Private Banking</a></li>
                        <li><a href="{{ url('/corporate-institutional') }}">Corporate &amp; Institutional</a></li>
                        <li><a href="{{ url('/wealth-management') }}">Wealth Management</a></li>
                        <li><a href="{{ url('/international-payments') }}">International Payments</a></li>
                    </ul>
                </div>

                <div class="footer-col">
                    <h4>Institution</h4>
                    <ul>
                        <li><a href="{{ url('/about') }}">About Us</a></li>
                        <li><a href="{{ url('/governance') }}">Governance &amp; Compliance</a></li>
                        <li><a href="{{ url('/insights') }}">Insights &amp; Research</a></li>
                        <li><a href="{{ url('/careers') }}">Careers</a></li>
                        <li><a href="{{ url('/contact') }}">Contact</a></li>
                    </ul>
                </div>

                <div class="footer-col">
                    <h4>Support</h4>
                    <ul>
                        <li><a href="{{ url('/security') }}">Security Centre</a></li>
                        <li><a href="{{ url('/faqs') }}">FAQs</a></li>
                        <li><a href="{{ url('/complaints') }}">Complaints Procedure</a></li>
                        <li><a href="{{ url('/client-login') }}">Client Login</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="container footer-legal">
            <p>
                Nbb Trust Kapital is a trading name of Nbb Trust Kapital Limited, a company registered in England and Wales
                under company number [COMPANY NUMBER]. Registered office: [REGISTERED ADDRESS], United Kingdom.
                Nbb Trust Kapital Limited is authorised and regulated by the Financial Conduct Authority under
                firm reference number [FCA FRN] &mdash; <em>replace with your genuine registration details before publishing.</em>
            </p>
            <p>
                Eligible deposits held with Nbb Trust Kapital are protected by the Financial Services Compensation
                Scheme (FSCS) up to the applicable limit. Capital is at risk with investment and wealth management
                products, which are not covered by the FSCS. Past performance is not a reliable indicator of future results.
            </p>
            <div class="footer-legal__bottom">
                <span>&copy; {{ date('Y') }} Nbb Trust Kapital Limited. All rights reserved.</span>
                <div class="footer-legal__links">
                    <a href="{{ url('/privacy-policy') }}">Privacy Policy</a>
                    <a href="{{ url('/cookie-policy') }}">Cookie Policy</a>
                    <a href="{{ url('/terms-of-use') }}">Terms of Use</a>
                    <a href="{{ url('/modern-slavery-statement') }}">Modern Slavery Statement</a>
                </div>
            </div>
        </div>
    </footer>

    <button class="to-top" id="to-top" aria-label="Back to top">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 19V5M5 12l7-7 7 7"/></svg>
    </button>

    <script src="{{ asset('js/app.js') }}" defer></script>
    @stack('scripts')
</body>
</html>