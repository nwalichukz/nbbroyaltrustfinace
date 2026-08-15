@extends('layouts.client')

@php($activeNav = 'accounts')
@section('title', 'My Accounts | Nbb Trust Kapital')

@section('content')

    <div class="db-page-head">
        <div>
            <div class="breadcrumb"><a href="{{ url('/client/dashboard') }}">Client Area</a> <span>/</span> <span>My Accounts</span></div>
            <h1>My Accounts</h1>
            <p class="lede">View balances and management options for every account you hold with Nbb Trust Kapital.</p>
        </div>
        <a href="{{ url('/client/transfers') }}" class="btn-brand">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 5v14M5 12h14"/></svg>
            Transfer Funds
        </a>
    </div>

    <!-- Total Portfolio Summary -->
    <div class="db-card balance-summary-card">
        <div class="summary-meta">
            <span class="summary-label">Total Portfolio Net Worth</span>
            <h2 class="summary-amount">$428,950.00</h2>
        </div>
        <div class="summary-pills">
            <div class="pill">
                <span class="pill-dot active"></span>
                <span>3 Active Accounts</span>
            </div>
            <div class="pill">
                <span class="pill-label">Primary Currency:</span>
                <strong>USD ($)</strong>
            </div>
        </div>
    </div>

    <!-- Accounts List (Hardcoded static cards) -->
    <div class="accounts-grid">

        <!-- Account 1 -->
        <div class="db-card account-card">
            <div class="account-card__head">
                <div class="account-type-group">
                    <h3>Private Reserve Checking</h3>
                    <span class="account-num">•••• 3001</span>
                </div>
                <span class="acc-badge">Primary</span>
            </div>

            <div class="account-card__body">
                <span class="balance-label">Available Balance</span>
                <div class="balance-value">$124,500.00</div>
            </div>

            <div class="account-card__foot">
                <div class="status-indicator">
                    <span class="status-dot active"></span>
                    <span>Active</span>
                </div>
                <div class="account-actions">
                    <a href="{{ url('/client/statements') }}" class="btn-sm-outline">Statements</a>
                    <a href="{{ url('/client/transfers') }}" class="btn-sm-brand">Send</a>
                </div>
            </div>
        </div>

        <!-- Account 2 -->
        <div class="db-card account-card">
            <div class="account-card__head">
                <div class="account-type-group">
                    <h3>High-Yield Savings</h3>
                    <span class="account-num">•••• 7742</span>
                </div>
                <span class="acc-badge">3.85% APY</span>
            </div>

            <div class="account-card__body">
                <span class="balance-label">Available Balance</span>
                <div class="balance-value">$254,450.00</div>
            </div>

            <div class="account-card__foot">
                <div class="status-indicator">
                    <span class="status-dot active"></span>
                    <span>Active</span>
                </div>
                <div class="account-actions">
                    <a href="{{ url('/client/statements') }}" class="btn-sm-outline">Statements</a>
                    <a href="{{ url('/client/transfers') }}" class="btn-sm-brand">Send</a>
                </div>
            </div>
        </div>

        <!-- Account 3 -->
        <div class="db-card account-card">
            <div class="account-card__head">
                <div class="account-type-group">
                    <h3>Global Investment Vault</h3>
                    <span class="account-num">•••• 9904</span>
                </div>
                <span class="acc-badge">Term Deposit</span>
            </div>

            <div class="account-card__body">
                <span class="balance-label">Available Balance</span>
                <div class="balance-value">$50,000.00</div>
            </div>

            <div class="account-card__foot">
                <div class="status-indicator">
                    <span class="status-dot locked"></span>
                    <span>Locked</span>
                </div>
                <div class="account-actions">
                    <a href="{{ url('/client/statements') }}" class="btn-sm-outline">Statements</a>
                    <a href="{{ url('/client/transfers') }}" class="btn-sm-brand">Send</a>
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
        }

        .db-page-head {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            margin-bottom: 1.5rem;
        }

        .balance-summary-card {
            background: linear-gradient(135deg, var(--color-brand) 0%, #102a48 100%);
            color: #ffffff;
            padding: 1.75rem 2rem;
            border-radius: 12px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            box-shadow: 0 4px 12px rgba(8, 28, 51, 0.15);
        }

        .summary-label {
            font-size: 0.85rem;
            color: #94a3b8;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            font-weight: 600;
        }

        .summary-amount {
            font-size: 2.2rem;
            font-weight: 700;
            margin: 0.25rem 0 0 0;
            color: #ffffff;
            font-family: 'IBM Plex Mono', monospace;
        }

        .summary-pills {
            display: flex;
            gap: 1rem;
        }

        .pill {
            background: rgba(255, 255, 255, 0.1);
            padding: 0.5rem 0.85rem;
            border-radius: 8px;
            font-size: 0.825rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            backdrop-filter: blur(4px);
        }

        .pill-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: #22c55e;
        }

        .pill-label {
            color: #94a3b8;
        }

        .accounts-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 1.5rem;
        }

        .account-card {
            background: #ffffff;
            border: 1px solid var(--color-border);
            border-radius: 12px;
            padding: 1.5rem;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .account-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.06);
        }

        .account-card__head {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 1.25rem;
        }

        .account-type-group h3 {
            font-size: 1.05rem;
            font-weight: 700;
            color: var(--color-brand);
            margin: 0 0 0.25rem 0;
        }

        .account-num {
            font-size: 0.85rem;
            color: var(--color-ink-soft);
            font-family: 'IBM Plex Mono', monospace;
        }

        .acc-badge {
            background: var(--color-brand-subtle);
            color: var(--color-brand);
            font-size: 0.75rem;
            font-weight: 600;
            padding: 0.25rem 0.6rem;
            border-radius: 6px;
        }

        .account-card__body {
            margin-bottom: 1.5rem;
        }

        .balance-label {
            font-size: 0.8rem;
            color: var(--color-ink-soft);
            display: block;
            margin-bottom: 0.25rem;
        }

        .balance-value {
            font-size: 1.6rem;
            font-weight: 700;
            color: var(--color-ink);
            font-family: 'IBM Plex Mono', monospace;
        }

        .account-card__foot {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 1rem;
            border-top: 1px solid #f1f5f9;
        }

        .status-indicator {
            display: flex;
            align-items: center;
            gap: 0.4rem;
            font-size: 0.8rem;
            font-weight: 500;
            color: var(--color-ink-soft);
        }

        .status-dot {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: #94a3b8;
        }

        .status-dot.active { background: #16a34a; }
        .status-dot.locked { background: #dc2626; }

        .account-actions {
            display: flex;
            gap: 0.5rem;
        }

        .btn-brand {
            background: var(--color-brand);
            color: #ffffff;
            padding: 0.65rem 1.2rem;
            border-radius: 8px;
            font-weight: 600;
            font-size: 0.875rem;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            transition: background 0.2s;
        }

        .btn-brand:hover {
            background: var(--color-brand-hover);
        }

        .btn-sm-brand {
            background: var(--color-brand);
            color: #ffffff;
            padding: 0.4rem 0.85rem;
            border-radius: 6px;
            font-size: 0.8rem;
            font-weight: 600;
            text-decoration: none;
            transition: background 0.2s;
        }

        .btn-sm-brand:hover {
            background: var(--color-brand-hover);
        }

        .btn-sm-outline {
            border: 1px solid var(--color-border);
            color: var(--color-ink);
            padding: 0.4rem 0.85rem;
            border-radius: 6px;
            font-size: 0.8rem;
            font-weight: 500;
            text-decoration: none;
            transition: background 0.2s;
        }

        .btn-sm-outline:hover {
            background: #f8fafc;
        }

        @media (max-width: 768px) {
            .db-page-head {
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
            }

            .balance-summary-card {
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
            }
        }
    </style>

@endsection