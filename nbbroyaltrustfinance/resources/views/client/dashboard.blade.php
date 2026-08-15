@extends('layouts.client')

@php($activeNav = 'overview')
@section('title', 'My Banking | Nbb Trust Kapital')

@section('content')

    <div class="welcome-banner">
        <div>
            <h1>Welcome back, {{ $clientName ?? 'Amara' }}</h1>
            <p>Here's a snapshot of your accounts and recent activity.</p>
        </div>
        <div class="welcome-banner__actions">
            <a href="{{ url('client/transfers') ?? url('/client/transfers') }}" class="btn btn--primary">Send Money</a>
            <a href="{{ url('client/accounts') ?? url('/client/accounts') }}" class="btn btn--outline-light">View Accounts</a>
        </div>
    </div>

    {{-- ---------- Account cards ---------- --}}
    <div class="account-grid">
        <div class="account-card" data-balance-card>
            <div class="account-card__top">
                <span class="account-card__label">Current Account</span>
                <button class="account-card__eye" type="button" data-balance-toggle aria-label="Show or hide balance">
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7-10-7-10-7z"/><circle cx="12" cy="12" r="3"/></svg>
                </button>
            </div>
            <div class="account-card__balance" data-balance="24650.00">&pound;24,650.00</div>
            <div class="account-card__meta">
                <span>NBB-GB-38820</span>
                <span>GBP</span>
            </div>
        </div>

        <div class="account-card variant-blue" data-balance-card>
            <div class="account-card__top">
                <span class="account-card__label">Savings Account</span>
                <button class="account-card__eye" type="button" data-balance-toggle aria-label="Show or hide balance">
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7-10-7-10-7z"/><circle cx="12" cy="12" r="3"/></svg>
                </button>
            </div>
            <div class="account-card__balance" data-balance="58200.00">&pound;58,200.00</div>
            <div class="account-card__meta">
                <span>NBB-GB-38821</span>
                <span>GBP &middot; 3.4% AER</span>
            </div>
        </div>

        <div class="account-card variant-orange" data-balance-card>
            <div class="account-card__top">
                <span class="account-card__label">Multi-Currency Account</span>
                <button class="account-card__eye" type="button" data-balance-toggle aria-label="Show or hide balance">
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7-10-7-10-7z"/><circle cx="12" cy="12" r="3"/></svg>
                </button>
            </div>
            <div class="account-card__balance" data-balance="9840.00">$9,840.00</div>
            <div class="account-card__meta">
                <span>NBB-GB-38822</span>
                <span>USD &middot; EUR</span>
            </div>
        </div>
    </div>

    {{-- ---------- Quick actions ---------- --}}
    <div class="quick-actions">
        <a href="{{ url('client.transfers') ?? url('/client/transfers') }}" class="quick-action">
            <span class="quick-action__icon"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M4 12h16M14 6l6 6-6 6"/></svg></span>
            <span>Send Money</span>
        </a>
        <a href="{{ url('client.accounts') ?? url('/client/accounts') }}" class="quick-action">
            <span class="quick-action__icon"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><circle cx="12" cy="12" r="9"/><path d="M12 8v8M8 12h8"/></svg></span>
            <span>Add Money</span>
        </a>
        <a href="{{ url('client.statements') ?? url('/client/statements') }}" class="quick-action">
            <span class="quick-action__icon"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M6 3h9l5 5v13a1 1 0 01-1 1H6a1 1 0 01-1-1V4a1 1 0 011-1z"/><path d="M9 12h6M9 16h6"/></svg></span>
            <span>Request Statement</span>
        </a>
        <a href="{{ url('client/international-payments') ?? url('/client/international-payments') }}" class="quick-action">
            <span class="quick-action__icon"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M2 12h20M12 2c2.5 3 4 7 4 10s-1.5 7-4 10c-2.5-3-4-7-4-10s1.5-7 4-10z"/></svg></span>
            <span>Pay Abroad</span>
        </a>
    </div>

    <div class="db-form-grid db-form-grid--split">

        {{-- ---------- Spending chart ---------- --}}
        <div class="db-card">
            <div class="db-card__head">
                <div>
                    <span class="u-eyebrow">Last 7 days</span>
                    <h2 style="margin-top:0.4rem;">Money in vs. money out</h2>
                </div>
            </div>
            <div class="bar-chart" role="img" aria-label="Bar chart of money in versus money out over the last seven days">
                @php($days = ['Mon' => [30,58], 'Tue' => [42,64], 'Wed' => [55,40], 'Thu' => [28,70], 'Fri' => [66,82], 'Sat' => [90,35], 'Sun' => [20,18]])
                @foreach($days as $day => $vals)
                    <div class="bar-chart__col">
                        <div style="display:flex; align-items:flex-end; gap:4px; height:120px;">
                            <div class="bar-chart__bar" style="height:{{ $vals[0] }}%;" title="In"></div>
                            <div class="bar-chart__bar is-accent" style="height:{{ $vals[1] }}%;" title="Out"></div>
                        </div>
                        <span class="bar-chart__label">{{ $day }}</span>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- ---------- Security nudge ---------- --}}
        <div style="display:flex; flex-direction:column; gap:1.2rem;">
            <div class="nudge-card">
                <span class="nudge-card__icon"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="4" y="10" width="16" height="10" rx="2"/><path d="M8 10V7a4 4 0 018 0v3"/></svg></span>
                <div>
                    <h3>Turn on two-factor authentication</h3>
                    <p>Add an extra layer of protection to your account in under a minute.</p>
                    <a href="{{ url('client/profile') ?? url('/client/profile') }}" class="btn btn--outline-dark" style="font-size:0.78rem; padding:0.55rem 1rem;">Set up now</a>
                </div>
            </div>

            <div class="db-card">
                <div class="db-card__head"><h2>Your beneficiaries</h2></div>
                <div style="display:flex; flex-direction:column; gap:0.8rem;">
                    <div class="client-card">
                        <span class="avatar">JW</span>
                        <div class="client-card__meta"><strong>James Whitfield</strong><span>NBB-GB-38712 &middot; GBP</span></div>
                    </div>
                    <div class="client-card">
                        <span class="avatar">PN</span>
                        <div class="client-card__meta"><strong>Priya Nair</strong><span>NBB-GB-39044 &middot; GBP</span></div>
                    </div>
                </div>
                <a href="{{ url('client/beneficiaries') ?? url('/client/beneficiaries') }}" class="btn btn--ghost" style="margin-top:1rem;">Manage beneficiaries</a>
            </div>
        </div>
    </div>

    {{-- ---------- Recent transactions ---------- --}}
    <div class="db-card" style="margin-top:1.4rem;">
        <div class="db-card__head">
            <div>
                <span class="u-eyebrow">Latest activity</span>
                <h2 style="margin-top:0.4rem;">Recent transactions</h2>
            </div>
            <a href="{{ url('client/statements') ?? url('/client/statements') }}" class="btn btn--ghost">View all</a>
        </div>

        <div class="table-wrap" style="border:1px solid var(--color-line);">
            <table class="db-table">
                <thead>
                    <tr>
                        <th>Description</th>
                        <th>Reference</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    @php($rows = [
                        ['desc' => 'Transfer to James Whitfield', 'ref' => 'NBB-TX-88213', 'amount' => '-£1,200.00', 'status' => 'active', 'label' => 'Completed', 'date' => '13 Aug 2026'],
                        ['desc' => 'Salary credit', 'ref' => 'NBB-TX-88190', 'amount' => '+£4,500.00', 'status' => 'active', 'label' => 'Completed', 'date' => '11 Aug 2026'],
                        ['desc' => 'International transfer to Singapore', 'ref' => 'NBB-TX-88176', 'amount' => '-£860.00', 'status' => 'pending', 'label' => 'Processing', 'date' => '10 Aug 2026'],
                        ['desc' => 'Card payment &mdash; Utility bill', 'ref' => 'NBB-TX-88150', 'amount' => '-£142.30', 'status' => 'active', 'label' => 'Completed', 'date' => '08 Aug 2026'],
                    ])
                    @foreach($rows as $row)
                        <tr>
                            <td>{!! $row['desc'] !!}</td>
                            <td class="cell-mono">{{ $row['ref'] }}</td>
                            <td class="cell-mono">{{ $row['amount'] }}</td>
                            <td><span class="status-pill status-pill--{{ $row['status'] }}">{{ $row['label'] }}</span></td>
                            <td>{{ $row['date'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
