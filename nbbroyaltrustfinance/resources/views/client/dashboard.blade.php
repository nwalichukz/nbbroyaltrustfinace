@extends('layouts.client')

@php($activeNav = 'overview')
@section('title', 'My Banking | Nbb Trust Kapital')

@section('content')

    <div class="welcome-banner">
        <div>
            <h1>Welcome back, {{ Auth::user()->name }}</h1>
            <p>Here's a snapshot of your account and recent activity.</p>
        </div>
        <div class="welcome-banner__actions">
            <a href="{{ url('client/transfers') ?? url('/client/transfers') }}" class="btn btn--primary">Send Money</a>
            <a href="{{ url('client/accounts') ?? url('/client/accounts') }}" class="btn btn--outline-light">View Accounts</a>
        </div>
    </div>

    {{-- ---------- Single Account Card ---------- --}}
    <div class="account-grid" style="grid-template-columns: 1fr; max-width: 450px; margin-bottom: 1.5rem;">
        <div class="account-card" data-balance-card>
            <div class="account-card__top">
                <span class="account-card__label">Savings Account</span>
                <button class="account-card__eye" type="button" data-balance-toggle aria-label="Show or hide balance">
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7-10-7-10-7z"/><circle cx="12" cy="12" r="3"/></svg>
                </button>
            </div>
            <div class="account-card__balance" data-balance="24650.00">&dollar;{{ Auth::user()->userwallet->balance }}</div>
            <div class="account-card__meta">
                <span>{{ Auth::user()->userwallet->wallet_no }}</span>
                <span>USD</span>
            </div>
        </div>
    </div>

    {{-- ---------- Quick actions with Custom Icons ---------- --}}
    <div class="quick-actions">
        {{-- Send Money --}}
        <a href="{{ url('client.transfers') ?? url('/client/transfers') }}" class="quick-action">
            <span class="quick-action__icon">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><line x1="22" y1="2" x2="11" y2="13"></line><polygon points="22 2 15 22 11 13 2 9 22 2"></polygon></svg>
            </span>
            <span>Send Money</span>
        </a>

        {{-- Add Money --}}
        <a href="{{ url('client.accounts') ?? url('/client/accounts') }}" class="quick-action">
            <span class="quick-action__icon">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg>
            </span>
            <span>Add Money</span>
        </a>

        {{-- Request Statement --}}
        <a href="{{ url('client.statements') ?? url('/client/statements') }}" class="quick-action">
            <span class="quick-action__icon">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line></svg>
            </span>
            <span>Request Statement</span>
        </a>

        {{-- Pay Abroad --}}
        <a href="{{ url('client/international-payments') ?? url('/client/international-payments') }}" class="quick-action">
            <span class="quick-action__icon">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>
            </span>
            <span>Pay Abroad</span>
        </a>
    </div>

    {{-- ---------- Security nudge & Beneficiaries ---------- --}}
    <div style="display:flex; flex-direction:column; gap:1.2rem; margin-top:1.4rem;">
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