<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <meta name="robots" content="noindex, nofollow">
    <meta name="theme-color" content="#081C33">

    <title>@yield('title', 'My Banking | Nbb Trust Kapital')</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Serif+4:opsz,wght@8..60,400;8..60,600;8..60,700&family=Public+Sans:wght@300;400;500;600;700&family=IBM+Plex+Mono:wght@400;500&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('nbb/css/dashboard.css') }}">
    @stack('styles')
</head>
<body class="db-body notranslate" translate="no">

    <a href="#db-main-content" class="skip-link">Skip to main content</a>

    <div class="db-shell">

        {{-- =========================================================
             Sidebar — Client Area only. This is a separate console from
             the admin dashboard (resources/views/layouts/dashboard.blade.php)
             with its own nav, not a merged/shared one.
             ========================================================= --}}
        <div class="db-scrim" id="db-scrim"></div>
        <aside class="db-sidebar" id="db-sidebar" aria-label="Client navigation">
            <div class="db-sidebar__brand">
                <span class="brand__mark" aria-hidden="true" style="border-color:#fff;"></span>
                <span class="brand__text">
                    <span class="brand__name">Nbb Trust Kapital</span>
                    <span class="brand__tag">Client Area</span>
                </span>
                <button class="db-sidebar__close" id="db-sidebar-close" aria-label="Close menu">&times;</button>
            </div>

            <nav class="db-nav" aria-label="Client sections">

                <div class="db-nav__area"><span>Client Area</span></div>

                <span class="db-nav__label">Accounts</span>
                <a href="{{ url('client/dashboard') ?? url('/client/dashboard') }}" @if(($activeNav ?? '') === 'overview') aria-current="page" @endif>
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="3" y="3" width="7" height="9" rx="1"/><rect x="14" y="3" width="7" height="5" rx="1"/><rect x="14" y="12" width="7" height="9" rx="1"/><rect x="3" y="16" width="7" height="5" rx="1"/></svg>
                    Overview
                </a>
                <a href="{{ url('client/accounts') ?? url('/client/accounts') }}" @if(($activeNav ?? '') === 'accounts') aria-current="page" @endif>
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="3" y="6" width="18" height="13" rx="2"/><path d="M3 10h18"/></svg>
                    My Accounts
                </a>
                <a href="{{ url('client/statements') ?? url('/client/statements') }}" @if(($activeNav ?? '') === 'statements') aria-current="page" @endif>
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M6 3h9l5 5v13a1 1 0 01-1 1H6a1 1 0 01-1-1V4a1 1 0 011-1z"/><path d="M9 12h6M9 16h6"/></svg>
                    Statements
                </a>

                <span class="db-nav__label">Payments</span>
                <a href="{{ url('client/transfers') ?? url('/client/transfers') }}" @if(($activeNav ?? '') === 'transfers') aria-current="page" @endif>
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M4 12h16M14 6l6 6-6 6"/></svg>
                    Send Money
                </a>
                <a href="{{ url('client/international-payments') ?? url('/client/international-payments') }}" @if(($activeNav ?? '') === 'international') aria-current="page" @endif>
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M2 12h20M12 2c2.5 3 4 7 4 10s-1.5 7-4 10c-2.5-3-4-7-4-10s1.5-7 4-10z"/></svg>
                    International Payments
                </a>
                <a href="{{ url('client/beneficiaries') ?? url('/client/beneficiaries') }}" @if(($activeNav ?? '') === 'beneficiaries') aria-current="page" @endif>
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><circle cx="9" cy="8" r="3.2"/><path d="M3 20c0-3.3 2.7-6 6-6s6 2.7 6 6"/><path d="M16 8h4M18 6v4"/></svg>
                    Beneficiaries
                </a>

                <span class="db-nav__label">Cards</span>
                <a href="{{ url('client/cards') ?? url('/client/cards') }}" @if(($activeNav ?? '') === 'cards') aria-current="page" @endif>
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="3" y="5" width="18" height="14" rx="2"/><path d="M3 10h18"/></svg>
                    My Cards
                </a>

                <span class="db-nav__label">Support</span>
                <a href="{{ url('client/profile') ?? url('/client/profile') }}" @if(($activeNav ?? '') === 'profile') aria-current="page" @endif>
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><circle cx="12" cy="8" r="4"/><path d="M4 20c0-4 3.6-7 8-7s8 3 8 7"/></svg>
                    Profile &amp; Security
                </a>
                <a href="{{ url('client/support') ?? url('/client/support') }}" @if(($activeNav ?? '') === 'support') aria-current="page" @endif>
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><circle cx="12" cy="12" r="9"/><path d="M9.5 9a2.5 2.5 0 015 0c0 1.7-2.5 2-2.5 3.5M12 17h.01"/></svg>
                    Help Centre
                </a>
            </nav>

            <div class="db-sidebar__foot">
                <strong>Signed in as</strong>
                {{ $clientName ?? 'Amara Chukwu' }} &middot; NBB-GB-38820
            </div>
        </aside>

        {{-- =========================================================
             Main column
             ========================================================= --}}
        <div class="db-main">

            <header class="db-topbar">
                <button class="db-topbar__menu" id="db-sidebar-toggle" aria-label="Open menu" aria-expanded="false" aria-controls="db-sidebar">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 7h16M4 12h16M4 17h16"/></svg>
                </button>

                <div class="db-search">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="7"/><path d="M21 21l-4.3-4.3"/></svg>
                    <input type="search" placeholder="Search transactions, payees, statements&hellip;" aria-label="Search">
                </div>

                <div class="db-topbar__right">
                    @include('partials.language-switcher')

                    <span class="db-topbar__divider" aria-hidden="true"></span>

                    <button class="db-bell" aria-label="Notifications">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M6 8a6 6 0 1112 0c0 4 1.5 5.5 2 6H4c.5-.5 2-2 2-6z"/><path d="M9.5 19a2.5 2.5 0 005 0"/></svg>
                        <span class="db-bell__dot" aria-hidden="true"></span>
                    </button>

                    <div class="db-profile" id="db-profile">
                        <button class="db-profile__btn" id="db-profile-toggle" aria-expanded="false" aria-haspopup="true">
                            <span class="avatar">{{ $clientInitials ?? 'AC' }}</span>
                            <span class="db-profile__meta">
                                <strong>{{ $clientName ?? 'Amara Chukwu' }}</strong>
                                <span>Private Client</span>
                            </span>
                        </button>
                        <div class="dropdown-menu" id="db-profile-menu">
                            <a href="{{ url('client/profile') ?? url('/client/profile') }}"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><circle cx="12" cy="8" r="4"/><path d="M4 20c0-4 3.6-7 8-7s8 3 8 7"/></svg> My Profile</a>
                            <a href="#"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="4" y="10" width="16" height="10" rx="2"/><path d="M8 10V7a4 4 0 018 0v3"/></svg> Security</a>
                            <a href="{{ url('client/support') ?? url('/client/support') }}"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><circle cx="12" cy="12" r="9"/><path d="M9.5 9a2.5 2.5 0 015 0c0 1.7-2.5 2-2.5 3.5M12 17h.01"/></svg> Help Centre</a>
                            <hr>
                            <a href="{{ url('/') }}" class="danger"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M9 21H5a2 2 0 01-2-2V5a2 2 0 012-2h4"/><path d="M16 17l5-5-5-5M21 12H9"/></svg> Sign Out</a>
                        </div>
                    </div>
                </div>
            </header>

            <main id="db-main-content" class="db-content">
                @yield('content')
            </main>
        </div>
    </div>

    <div class="modal-scrim" id="confirm-modal">
        <div class="modal-box" role="dialog" aria-modal="true" aria-labelledby="confirm-modal-title">
            <h3 id="confirm-modal-title">Confirm action</h3>
            <p id="confirm-modal-body">Are you sure you want to proceed?</p>
            <div class="modal-box__actions">
                <button class="btn btn--outline-dark btn--block" id="confirm-modal-cancel">Cancel</button>
                <button class="btn btn--danger btn--block" id="confirm-modal-confirm">Confirm</button>
            </div>
        </div>
    </div>

    <div class="toast" id="db-toast">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 12l6 6L20 6"/></svg>
        <span id="db-toast-text">Action completed.</span>
    </div>

    <script src="{{ asset('nbb/js/app.js') }}" defer></script>
    <script src="{{ asset('nbb/js/dashboard.js') }}" defer></script>
    @stack('scripts')
</body>
</html>
