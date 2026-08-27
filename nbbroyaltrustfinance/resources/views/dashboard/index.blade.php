@extends('layouts.dashboard')

@php($activeNav = 'overview')
@section('title', 'Dashboard Overview | Nbb Trust Kapital Admin')

@section('content')

    <div class="db-page-head">
        <div>
            <div class="breadcrumb"><a href="{{ url('/dashboard') }}">{{Auth::user()->access_level}}</a> <span>/</span> <span>Overview</span></div>
            <h1>Good day, {{ Auth::user()->name }}</h1>
            <p class="lede">Here's what's happening across Nbb Trust Kapital client accounts today.</p>
        </div>
        <div class="db-page-head__actions">
            <a href="{{ url('#') }}" class="btn btn--outline-dark">Add Funds</a>
            <a href="#" class="btn btn--primary">Review Pending Users</a>
        </div>
    </div>

    {{-- ---------- Stat cards ---------- --}}
    <div class="stat-grid">
        <div class="stat-card">
            <div class="stat-card__top">
                <span class="stat-card__icon"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><circle cx="9" cy="8" r="3.2"/><path d="M3 20c0-3.3 2.7-6 6-6s6 2.7 6 6"/><circle cx="18" cy="8" r="2.6"/><path d="M15.5 14.2c2.6.4 4.5 2.6 4.5 5.3"/></svg></span>
                <span class="stat-card__trend up"> </span>
            </div>
            <div class="stat-card__value">{{$userCount}}</div>
            <div class="stat-card__label">Total clients</div>
        </div>

        <div class="stat-card">
            <div class="stat-card__top">
                <span class="stat-card__icon"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><circle cx="12" cy="12" r="9"/><path d="M9 12h6M12 9v6"/></svg></span>
                <span class="stat-card__trend up"> </span>
            </div>
            <div class="stat-card__value">£{{number_format($totalWallet)}}</div>
            <div class="stat-card__label">Total client balances</div>
        </div>

        {{--<div class="stat-card">
            <div class="stat-card__top">
                <span class="stat-card__icon"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 3"/></svg></span>
                <span class="stat-card__trend down">Needs review</span>
            </div>
            <div class="stat-card__value">17</div>
            <div class="stat-card__label">Pending approvals</div>
        </div>--}}

        {{--<div class="stat-card">
            <div class="stat-card__top">
                <span class="stat-card__icon"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M12 2l8 4v6c0 5-3.5 8.5-8 10-4.5-1.5-8-5-8-10V6l8-4z"/></svg></span>
                <span class="stat-card__trend down">3 flagged</span>
            </div>
            <div class="stat-card__value">6</div>
            <div class="stat-card__label">Suspended accounts</div>
        </div>--}}
    </div>

    <div class="db-form-grid db-form-grid--split">
        {{-- ---------- Funding activity chart ---------- --}}
        {{--<div class="db-card">
            <div class="db-card__head">
                <div>
                    <span class="u-eyebrow">Last 7 days</span>
                    <h2 style="margin-top:0.4rem;">Funds added vs. withdrawn</h2>
                </div>
            </div>--}}
            {{--<div class="bar-chart" role="img" aria-label="Bar chart of funds added versus withdrawn over the last seven days">
                @php($days = ['Mon' => [62,38], 'Tue' => [74,41], 'Wed' => [58,52], 'Thu' => [88,34], 'Fri' => [96,60], 'Sat' => [40,20], 'Sun' => [33,18]])
                @foreach($days as $day => $vals)
                    <div class="bar-chart__col">
                        <div style="display:flex; align-items:flex-end; gap:4px; height:120px;">
                            <div class="bar-chart__bar" style="height:{{ $vals[0] }}%;" title="Added"></div>
                            <div class="bar-chart__bar is-accent" style="height:{{ $vals[1] }}%;" title="Withdrawn"></div>
                        </div>
                        <span class="bar-chart__label">{{ $day }}</span>
                    </div>
                @endforeach
            </div>
        </div>--}}

        {{-- ---------- Pending approvals widget ---------- --}}
        {{--<div class="db-card">
            <div class="db-card__head">
                <div>
                    <span class="u-eyebrow">Action needed</span>
                    <h2 style="margin-top:0.4rem;">Pending client approvals</h2>
                </div>
            </div>
            <div style="display:flex; flex-direction:column; gap:0.8rem;">
                @foreach([
                    ['name' => 'Daniel Owusu', 'country' => 'Ghana', 'initials' => 'DO'],
                    ['name' => 'Fatima Al-Sayed', 'country' => 'UAE', 'initials' => 'FA'],
                    ['name' => 'Chen Wei', 'country' => 'Singapore', 'initials' => 'CW'],
                ] as $client)
                    <div class="client-card">
                        <span class="avatar">{{ $client['initials'] }}</span>
                        <div class="client-card__meta" style="flex:1;">
                            <strong>{{ $client['name'] }}</strong>
                            <span>{{ $client['country'] }} &middot; Awaiting KYC review</span>
                        </div>
                        <button class="icon-btn approve" aria-label="Approve {{ $client['name'] }}"
                            data-confirm
                            data-confirm-title="Approve client?"
                            data-confirm-body="<strong>{{ $client['name'] }}</strong> will be granted an active account and full banking access."
                            data-confirm-label="Approve client"
                            data-confirm-style="primary"
                            data-success-message="{{ $client['name'] }} approved.">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 12l6 6L20 6"/></svg>
                        </button>
                    </div>
                @endforeach
            </div>
            <a href="{{ url('dashboard.users') ?? url('/dashboard/users') }}" class="btn btn--ghost" style="margin-top:1.1rem;">View all pending clients</a>
        </div>--}}
    </div>

    {{-- ---------- Recent transactions ---------- --}}
    <div class="db-card" style="margin-top:1.4rem;">
        <div class="db-card__head">
            <div>
                <span class="u-eyebrow">Latest activity</span>
                <h2 style="margin-top:0.4rem;">Recent Transactions</h2>
            </div>
            <a href="#" class="btn btn--ghost">View all</a>
        </div>

        <div class="table-wrap" style="border:1px solid var(--color-line);">
            <table class="db-table">
                <thead>
                    <tr>
                        <th>Client</th>
                        <th>Reference</th>
                        <th>Type</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    @php($rows = [
                        ['name' => 'Amara Chukwu', 'initials' => 'AC', 'ref' => 'NBB-TX-88213', 'type' => 'Funds added', 'amount' => '+£12,500.00', 'status' => 'active', 'label' => 'Completed', 'date' => '13 Aug 2026'],
                        ['name' => 'James Whitfield', 'initials' => 'JW', 'ref' => 'NBB-TX-88207', 'type' => 'International transfer', 'amount' => '-£3,200.00', 'status' => 'pending', 'label' => 'Processing', 'date' => '13 Aug 2026'],
                        ['name' => 'Priya Nair', 'initials' => 'PN', 'ref' => 'NBB-TX-88198', 'type' => 'Funds added', 'amount' => '+£860.00', 'status' => 'active', 'label' => 'Completed', 'date' => '12 Aug 2026'],
                        ['name' => 'Olumide Bakare', 'initials' => 'OB', 'ref' => 'NBB-TX-88184', 'type' => 'Withdrawal', 'amount' => '-£5,000.00', 'status' => 'suspended', 'label' => 'Flagged', 'date' => '12 Aug 2026'],
                    ])
                    @foreach($transactions as $row)
                        <tr>
                            <td>
                                <div class="cell-user">
                                    <span class="avatar">{{ strtoupper(substr($row->user->name, 0, 2)) }}</span>
                                    <div class="cell-user__meta"><strong>{{ $row->user->name }}</strong></div>
                                </div>
                            </td>
                            <td class="cell-mono">NBB-TX-{{ $row['id'] }}</td>
                            <td>{{ $row['transaction_type'] }}</td>
                            <td class="cell-mono">{{ number_format($row['amount']) }}</td>
                            <td><span class="status-pill status-pill--{{ $row['status'] }}">{{ $row['status'] }}</span></td>
                            <td>{{ $row->created_at->format('d M Y') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
