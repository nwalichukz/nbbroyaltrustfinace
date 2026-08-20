@extends('layouts.client')

@php($activeNav = 'cards')
@section('title', 'My Cards | Nbb Trust Kapital')

@section('content')

    <div class="db-page-head">
        <div>
            <div class="breadcrumb"><a href="{{ url('/client/dashboard') }}">Client Area</a> <span>/</span> <span>My Cards</span></div>
            <h1>My Cards</h1>
            <p class="lede">View, freeze, or manage settings for your Nbb Trust Kapital debit and virtual cards.</p>
        </div>
        <button class="btn-brand" onclick="alert('Card creation modal or flow trigger');">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
            Request New Card
        </button>
    </div>

    <div class="cards-layout-grid">

        <!-- Left Column: Visual Card Swiper & Quick Actions -->
        <div class="cards-primary-col">

            <!-- Card Showcase Section -->
            <div class="db-card card-showcase-card">
                <div class="card-carousel-nav">
                    <span class="card-status-badge active"><span class="status-dot"></span> Active</span>
                    <div class="carousel-indicators">
                        <span class="dot active"></span>
                        <span class="dot"></span>
                    </div>
                </div>

                <!-- Virtual Credit Card Rendering -->
                <div class="virtual-card visa-gold">
                    <div class="vcard-top">
                        <div class="vcard-chip"></div>
                        <span class="vcard-brand-logo">Nbb Trust</span>
                    </div>
                    <div class="vcard-number">
                        •••• &nbsp; •••• &nbsp; •••• &nbsp; 4892
                    </div>
                    <div class="vcard-bottom">
                        <div class="vcard-holder">
                            <span class="vcard-label">CARDHOLDER</span>
                            <span class="vcard-val">{{Auth::user()->name}}</span>
                        </div>
                        <div class="vcard-expiry">
                            <span class="vcard-label">EXPIRES</span>
                            <span class="vcard-val">09/29</span>
                        </div>
                        <div class="vcard-type">
                            <span class="visa-logo">VISA</span>
                        </div>
                    </div>
                </div>

                <!-- Quick Toggle Controls -->
                <div class="card-quick-actions">
                    <button class="action-btn">
                        <div class="action-icon">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                        </div>
                        <span>Show Details</span>
                    </button>
                    <button class="action-btn danger">
                        <div class="action-icon">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                        </div>
                        <span>Freeze Card</span>
                    </button>
                    <button class="action-btn">
                        <div class="action-icon">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 2l-2 2m-7.61 7.61a5.5 5.5 0 1 1-7.778 7.778 5.5 5.5 0 0 1 7.777-7.777zm0 0L15.5 7.5m0 0l3 3L22 7l-3-3m-3.5 3.5L19 4"/></svg>
                        </div>
                        <span>View PIN</span>
                    </button>
                    <button class="action-btn">
                        <div class="action-icon">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"/></svg>
                        </div>
                        <span>Settings</span>
                    </button>
                </div>
            </div>

            <!-- Card Security & Controls -->
            <div class="db-card">
                <h3 class="card-section-title">Card Security & Spending Controls</h3>

                <div class="control-toggle-list">
                    <div class="control-item">
                        <div class="control-info">
                            <span class="control-title">Online Payments</span>
                            <span class="control-desc">Allow transactions on e-commerce sites and digital subscriptions.</span>
                        </div>
                        <label class="switch">
                            <input type="checkbox" checked>
                            <span class="slider"></span>
                        </label>
                    </div>

                    <div class="control-item">
                        <div class="control-info">
                            <span class="control-title">ATM Withdrawals</span>
                            <span class="control-desc">Permit cash withdrawals at physical ATM terminals worldwide.</span>
                        </div>
                        <label class="switch">
                            <input type="checkbox" checked>
                            <span class="slider"></span>
                        </label>
                    </div>

                    <div class="control-item">
                        <div class="control-info">
                            <span class="control-title">International Transactions</span>
                            <span class="control-desc">Enable POS and web purchases outside your primary account region.</span>
                        </div>
                        <label class="switch">
                            <input type="checkbox">
                            <span class="slider"></span>
                        </label>
                    </div>

                    <div class="control-item">
                        <div class="control-info">
                            <span class="control-title">Contactless Payments</span>
                            <span class="control-desc">Allow tap-to-pay purchases on physical card terminals.</span>
                        </div>
                        <label class="switch">
                            <input type="checkbox" checked>
                            <span class="slider"></span>
                        </label>
                    </div>
                </div>
            </div>

        </div>

        <!-- Right Column: Spending Limits & Recent Activity -->
        <div class="cards-secondary-col">

            <!-- Card Limits -->
            <div class="db-card">
                <h3 class="card-section-title">Monthly Spending Limit</h3>

                <div class="limit-status">
                    <div class="limit-amounts">
                        <span class="spent-val">$3,420.00 spent</span>
                        <span class="total-val">of $10,000.00 limit</span>
                    </div>
                    <div class="limit-progress-bar">
                        <div class="progress-fill" style="width: 34.2%;"></div>
                    </div>
                    <p class="limit-reset-note">Resets on the 1st of next month.</p>
                </div>

                <div class="limit-actions">
                    <button class="btn-outline-brand w-100">Adjust Spending Limit</button>
                </div>
            </div>

            <!-- Card Specific Activity -->
            <div class="db-card">
                <div class="card-header-inline">
                    <h3 class="card-section-title" style="margin:0;">Card Activity</h3>
                    <a href="{{ url('/client/transactions') }}" class="view-all-link">View All</a>
                </div>

                <div class="card-activity-list">
                    <div class="activity-item">
                        <div class="activity-icon">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"/><line x1="3" y1="6" x2="21" y2="6"/><path d="M16 10a4 4 0 0 1-8 0"/></svg>
                        </div>
                        <div class="activity-details">
                            <span class="activity-title">AWS Cloud Services</span>
                            <span class="activity-date">Aug 14, 2026</span>
                        </div>
                        <span class="activity-amount">-$124.50</span>
                    </div>

                    <div class="activity-item">
                        <div class="activity-icon">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M8 14s1.5 2 4 2 4-2 4-2"/><line x1="9" y1="9" x2="9.01" y2="9"/><line x1="15" y1="9" x2="15.01" y2="9"/></svg>
                        </div>
                        <div class="activity-details">
                            <span class="activity-title">GitHub Pro Subscription</span>
                            <span class="activity-date">Aug 10, 2026</span>
                        </div>
                        <span class="activity-amount">-$21.00</span>
                    </div>

                    <div class="activity-item">
                        <div class="activity-icon">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                        </div>
                        <div class="activity-details">
                            <span class="activity-title">Uber Technologies</span>
                            <span class="activity-date">Aug 08, 2026</span>
                        </div>
                        <span class="activity-amount">-$18.75</span>
                    </div>

                    <div class="activity-item">
                        <div class="activity-icon">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>
                        </div>
                        <div class="activity-details">
                            <span class="activity-title">Figma Enterprise</span>
                            <span class="activity-date">Aug 01, 2026</span>
                        </div>
                        <span class="activity-amount">-$45.00</span>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <style>
        :root {
            --color-brand: #081C33;
            --color-brand-hover: #0b2545;
            --color-brand-subtle: #f0f4f8;
            --color-border: #e2e8f0;
            --color-ink: #0f172a;
            --color-ink-soft: #64748b;
            --color-danger: #ef4444;
        }

        .db-page-head {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            margin-bottom: 1.5rem;
        }

        .db-card {
            background: #ffffff;
            border: 1px solid var(--color-border);
            border-radius: 12px;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
        }

        .card-section-title {
            font-size: 1.05rem;
            font-weight: 700;
            color: var(--color-brand);
            margin: 0 0 1.25rem 0;
        }

        /* Layout Grid */
        .cards-layout-grid {
            display: grid;
            grid-template-columns: 1.5fr 1fr;
            gap: 1.5rem;
        }

        /* Virtual Card Component */
        .card-showcase-card {
            background: linear-gradient(180deg, #ffffff 0%, #f8fafc 100%);
        }

        .card-carousel-nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.25rem;
        }

        .card-status-badge {
            font-size: 0.75rem;
            font-weight: 600;
            color: #166534;
            background: #dcfce7;
            padding: 0.25rem 0.65rem;
            border-radius: 20px;
            display: inline-flex;
            align-items: center;
            gap: 0.35rem;
        }

        .status-dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: #22c55e;
        }

        .carousel-indicators {
            display: flex;
            gap: 0.4rem;
        }

        .carousel-indicators .dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: #cbd5e1;
            cursor: pointer;
        }

        .carousel-indicators .dot.active {
            background: var(--color-brand);
            width: 18px;
            border-radius: 4px;
        }

        .virtual-card {
            width: 100%;
            max-width: 400px;
            height: 240px;
            margin: 0 auto 1.5rem auto;
            border-radius: 16px;
            padding: 1.5rem;
            color: #ffffff;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            box-shadow: 0 12px 24px rgba(8, 28, 51, 0.22);
            position: relative;
            overflow: hidden;
            background: linear-gradient(135deg, #0b2545 0%, #134074 50%, #8da9c4 100%);
        }

        .virtual-card::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -20%;
            width: 250px;
            height: 250px;
            background: rgba(255, 255, 255, 0.06);
            border-radius: 50%;
            pointer-events: none;
        }

        .vcard-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .vcard-chip {
            width: 42px;
            height: 30px;
            background: linear-gradient(135deg, #ffe259 0%, #ffa751 100%);
            border-radius: 6px;
        }

        .vcard-brand-logo {
            font-weight: 800;
            font-size: 1.1rem;
            letter-spacing: 0.5px;
        }

        .vcard-number {
            font-family: 'IBM Plex Mono', monospace;
            font-size: 1.25rem;
            letter-spacing: 2px;
            font-weight: 600;
            text-shadow: 0 2px 4px rgba(0,0,0,0.2);
        }

        .vcard-bottom {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
        }

        .vcard-label {
            display: block;
            font-size: 0.6rem;
            opacity: 0.75;
            letter-spacing: 1px;
            margin-bottom: 0.15rem;
        }

        .vcard-val {
            font-size: 0.85rem;
            font-weight: 600;
            letter-spacing: 0.5px;
        }

        .visa-logo {
            font-weight: 900;
            font-style: italic;
            font-size: 1.3rem;
            letter-spacing: 1px;
        }

        /* Quick Action Buttons */
        .card-quick-actions {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 0.75rem;
        }

        .action-btn {
            background: #ffffff;
            border: 1px solid var(--color-border);
            border-radius: 8px;
            padding: 0.85rem 0.5rem;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 0.4rem;
            cursor: pointer;
            transition: all 0.2s;
        }

        .action-btn:hover {
            border-color: var(--color-brand);
            background: var(--color-brand-subtle);
        }

        .action-btn.danger:hover {
            border-color: var(--color-danger);
            background: #fef2f2;
            color: var(--color-danger);
        }

        .action-icon {
            color: var(--color-brand);
        }

        .action-btn.danger .action-icon {
            color: var(--color-danger);
        }

        .action-btn span {
            font-size: 0.75rem;
            font-weight: 600;
            color: var(--color-ink);
        }

        /* Toggle Switches */
        .control-toggle-list {
            display: flex;
            flex-direction: column;
            gap: 1.25rem;
        }

        .control-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-bottom: 1rem;
            border-bottom: 1px solid #f1f5f9;
        }

        .control-item:last-child {
            padding-bottom: 0;
            border-bottom: none;
        }

        .control-title {
            display: block;
            font-weight: 600;
            font-size: 0.9rem;
            color: var(--color-ink);
            margin-bottom: 0.15rem;
        }

        .control-desc {
            display: block;
            font-size: 0.8rem;
            color: var(--color-ink-soft);
        }

        .switch {
            position: relative;
            display: inline-block;
            width: 44px;
            height: 24px;
            flex-shrink: 0;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0; left: 0; right: 0; bottom: 0;
            background-color: #cbd5e1;
            transition: .3s;
            border-radius: 24px;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 18px;
            width: 18px;
            left: 3px;
            bottom: 3px;
            background-color: white;
            transition: .3s;
            border-radius: 50%;
        }

        input:checked + .slider {
            background-color: var(--color-brand);
        }

        input:checked + .slider:before {
            transform: translateX(20px);
        }

        /* Right Column Components */
        .limit-amounts {
            display: flex;
            justify-content: space-between;
            font-size: 0.85rem;
            margin-bottom: 0.5rem;
        }

        .spent-val {
            font-weight: 700;
            color: var(--color-ink);
        }

        .total-val {
            color: var(--color-ink-soft);
        }

        .limit-progress-bar {
            height: 8px;
            background: #e2e8f0;
            border-radius: 4px;
            overflow: hidden;
            margin-bottom: 0.5rem;
        }

        .progress-fill {
            height: 100%;
            background: var(--color-brand);
            border-radius: 4px;
        }

        .limit-reset-note {
            font-size: 0.775rem;
            color: var(--color-ink-soft);
            margin: 0 0 1.25rem 0;
        }

        .card-header-inline {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.25rem;
        }

        .view-all-link {
            font-size: 0.825rem;
            font-weight: 600;
            color: var(--color-brand);
            text-decoration: none;
        }

        .card-activity-list {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .activity-item {
            display: flex;
            align-items: center;
            gap: 0.85rem;
        }

        .activity-icon {
            width: 36px;
            height: 36px;
            border-radius: 8px;
            background: var(--color-brand-subtle);
            color: var(--color-brand);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .activity-details {
            flex: 1;
            min-width: 0;
        }

        .activity-title {
            display: block;
            font-size: 0.875rem;
            font-weight: 600;
            color: var(--color-ink);
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .activity-date {
            display: block;
            font-size: 0.775rem;
            color: var(--color-ink-soft);
        }

        .activity-amount {
            font-size: 0.875rem;
            font-weight: 600;
            color: var(--color-ink);
            font-family: 'IBM Plex Mono', monospace;
        }

        .btn-brand {
            background: var(--color-brand);
            color: #ffffff;
            height: 42px;
            padding: 0 1.2rem;
            border-radius: 8px;
            font-weight: 600;
            font-size: 0.875rem;
            border: none;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            transition: background 0.2s;
        }

        .btn-brand:hover {
            background: var(--color-brand-hover);
        }

        .btn-outline-brand {
            background: transparent;
            border: 1px solid var(--color-brand);
            color: var(--color-brand);
            height: 38px;
            border-radius: 6px;
            font-size: 0.85rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s;
        }

        .btn-outline-brand:hover {
            background: var(--color-brand-subtle);
        }

        .w-100 {
            width: 100%;
        }

        @media (max-width: 992px) {
            .cards-layout-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 576px) {
            .db-page-head {
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
            }

            .card-quick-actions {
                grid-template-columns: repeat(2, 1fr);
            }
        }
    </style>

@endsection