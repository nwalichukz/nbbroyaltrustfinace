<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <meta name="robots" content="noindex, nofollow">
    <meta name="theme-color" content="#081C33">

    <title>@yield('title', 'Admin Console | Nbb Trust Kapital')</title>

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
             Sidebar — Admin Area / Client Area kept visibly separate
             ========================================================= --}}
        <div class="db-scrim" id="db-scrim"></div>
        <aside class="db-sidebar" id="db-sidebar" aria-label="Admin navigation">
            <div class="db-sidebar__brand">
                <span class="brand__mark" aria-hidden="true" style="border-color:#fff;"></span>
                <span class="brand__text">
                    <span class="brand__name">Nbb Trust Kapital</span>
                    <span class="brand__tag">Admin Console</span>
                </span>
                <button class="db-sidebar__close" id="db-sidebar-close" aria-label="Close menu">&times;</button>
            </div>

            <nav class="db-nav" aria-label="Dashboard sections">

                <div class="db-nav__area"><span>Admin Area</span></div>

                <span class="db-nav__label">Overview</span>
                <a href="{{ url('admin/dashboard') ?? url('/admin/dashboard') }}" @if(($activeNav ?? '') === 'overview') aria-current="page" @endif>
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="3" y="3" width="7" height="9" rx="1"/><rect x="14" y="3" width="7" height="5" rx="1"/><rect x="14" y="12" width="7" height="9" rx="1"/><rect x="3" y="16" width="7" height="5" rx="1"/></svg>
                    Dashboard
                </a>

                <span class="db-nav__label">Clients</span>
                <a href="{{ url('/admin/all-users') ?? url('/admin/all-users') }}" @if(($activeNav ?? '') === 'users') aria-current="page" @endif>
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><circle cx="9" cy="8" r="3.2"/><path d="M3 20c0-3.3 2.7-6 6-6s6 2.7 6 6"/><circle cx="18" cy="8" r="2.6"/><path d="M15.5 14.2c2.6.4 4.5 2.6 4.5 5.3"/></svg>
                    View Users
                    <span class="badge-count">12</span>
                </a>
                <a href="{{url('/admin/get-user-page')}}">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M12 2l8 4v6c0 5-3.5 8.5-8 10-4.5-1.5-8-5-8-10V6l8-4z"/></svg>
                    Add User
                </a>

                <span class="db-nav__label">
                Transactions</span>
                {{--<a href="{{ url('/dashboard/add-funds') ?? url('/dashboard/add-funds') }}" @if(($activeNav ?? '') === 'add-funds') aria-current="page" @endif>
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><circle cx="12" cy="12" r="9"/><path d="M12 8v8M8 12h8"/></svg>
                    Add Funds
                </a>
                <a href="#">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M4 12h16M4 12l5-5M4 12l5 5"/></svg>
                    Withdrawals
                </a>--}}
                <a href="{{url('/admin/all-transactions')}}">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="3" y="5" width="18" height="14" rx="2"/><path d="M3 10h18"/></svg>
                    All Transactions
                </a>

                <span class="db-nav__label">Institution</span>
                <a href="#">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M4 19V9M10 19V5M16 19v-7M4 19h16"/></svg>
                    Reports
                </a>
                <a href="#">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.7 1.7 0 00.34 1.87l.06.06a2 2 0 11-2.83 2.83l-.06-.06a1.7 1.7 0 00-1.87-.34 1.7 1.7 0 00-1 1.55V21a2 2 0 11-4 0v-.09a1.7 1.7 0 00-1-1.55 1.7 1.7 0 00-1.87.34l-.06.06a2 2 0 11-2.83-2.83l.06-.06a1.7 1.7 0 00.34-1.87 1.7 1.7 0 00-1.55-1H3a2 2 0 110-4h.09a1.7 1.7 0 001.55-1 1.7 1.7 0 00-.34-1.87l-.06-.06a2 2 0 112.83-2.83l.06.06a1.7 1.7 0 001.87.34H9a1.7 1.7 0 001-1.55V3a2 2 0 114 0v.09a1.7 1.7 0 001 1.55 1.7 1.7 0 001.87-.34l.06-.06a2 2 0 112.83 2.83l-.06.06a1.7 1.7 0 00-.34 1.87V9a1.7 1.7 0 001.55 1H21a2 2 0 110 4h-.09a1.7 1.7 0 00-1.55 1z"/></svg>
                    Settings
                </a>
                <a href="#">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><circle cx="12" cy="12" r="9"/><path d="M9.5 9a2.5 2.5 0 015 0c0 1.7-2.5 2-2.5 3.5M12 17h.01"/></svg>
                    Support
                </a>

                <div class="db-nav__area"><span>Client Area</span></div>
            </nav>

            {{-- Clearly-separated quick switch into the client-facing console --}}
            <div class="sidebar-switch">
                <span class="sidebar-switch__icon">
                    <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><circle cx="12" cy="8" r="4"/><path d="M4 20c0-4 3.6-7 8-7s8 3 8 7"/></svg>
                </span>
                <div class="sidebar-switch__meta">
                    <strong>Client Console</strong>
                    <span>Preview the client-facing dashboard</span>
                    <a href="{{ url('client/dashboard') ?? url('/client/dashboard') }}">
                        Open Client Area
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
                    </a>
                </div>
            </div>

            <div class="db-sidebar__foot">
                <strong>Signed in as</strong>
                {{ Auth::user()->name }} &middot; {{ Auth::user()->access_level }}
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
                    <input type="search" placeholder="Search clients, transactions, references&hellip;" aria-label="Search">
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
                            <span class="avatar">{{ strtoupper(substr(Auth::user()->name, 0, 2))}}</span>
                            <span class="db-profile__meta">
                                <strong>{{ Auth::user()->name}}</strong>
                                <span>{{ Auth::user()->access_level}}</span>
                            </span>
                        </button>
                        <div class="dropdown-menu" id="db-profile-menu">
                            {{-- <a href="#"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><circle cx="12" cy="8" r="4"/><path d="M4 20c0-4 3.6-7 8-7s8 3 8 7"/></svg> My Profile</a>
                            <a href="#"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="4" y="10" width="16" height="10" rx="2"/><path d="M8 10V7a4 4 0 018 0v3"/></svg> Security</a>
                            <a href="#"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M12 2l8 4v6c0 5-3.5 8.5-8 10-4.5-1.5-8-5-8-10V6l8-4z"/></svg> Audit Log</a> --}}
                            <hr>
                            <a href="{{ url('/logout') }}" class="danger"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M9 21H5a2 2 0 01-2-2V5a2 2 0 012-2h4"/><path d="M16 17l5-5-5-5M21 12H9"/></svg> Sign Out</a>
                        </div>
                    </div>
                </div>
            </header>

            <main id="db-main-content" class="db-content">
                @yield('content')
            </main>
        </div>
    </div>

    {{-- =========================================================
         Confirm modal shell — reused by Suspend / Remove / Approve actions
         ========================================================= --}}
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
