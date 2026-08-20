@extends('layouts.dashboard')

@php($activeNav = 'all-transactions')
@section('title', 'All Transactions | Admin Console')

@section('content')

    <div class="welcome-banner" style="margin-bottom: 1.5rem;">
        <div>
            <h1>Transaction History</h1>
            <p>Monitor, search, and review all financial activities across client accounts.</p>
        </div>
        <div class="welcome-banner__actions">
            <a href="{{ url('/admin/all-users') ?? url('/admin/all-users') }}" class="btn btn--primary">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M12 8v8M8 12h8"/></svg>
                All Users
            </a>
        </div>
    </div>

    {{-- ---------- Transactions Table Card ---------- --}}
    <div class="db-card">
        <div class="db-card__head">
            <div>
                <span class="u-eyebrow">System Ledger</span>
                <h2 style="margin-top:0.4rem;">All Transactions</h2>
            </div>
            <div style="display: flex; gap: 0.5rem; align-items: center;">
                <input type="search" placeholder="Filter transactions..." aria-label="Filter transactions" style="padding: 0.4rem 0.8rem; border-radius: 4px; border: 1px solid var(--color-line); font-size: 0.85rem; background: var(--color-surface, #fff);">
            </div>
        </div>

        <div class="table-wrap" style="border:1px solid var(--color-line); border-radius: 6px; overflow: hidden;">
            <table class="db-table">
                <thead>
                    <tr>
                        <th>Client</th>
                        <th>Description</th>
                        <th>Reference</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($transactions ?? [] as $tx)
                        <tr>
                            <td>
                                <strong>{{ $tx->user->name ?? 'N/A' }}</strong>
                                <br><span style="font-size: 0.75rem; color: var(--color-muted);">{{ $tx->user->email ?? '' }}</span>
                            </td>
                            <td>{!! $tx->purpose ?? 'Transfer' !!}</td>
                            <td class="cell-mono">NBB-TX-{{ $tx->id ?? 'NBB-TX-00000' }}</td>
                            <td class="cell-mono" style="font-weight: 600;">
                                {{ $tx->amount ?? '$0.00' }}
                            </td>
                            <td>
                                <span class="status-pill status-pill--{{ $tx->status ?? 'active' }}">
                                    {{ ucfirst($tx->status ?? 'Completed') }}
                                </span>
                            </td>
                            <td>{{ $tx->created_at ? $tx->created_at->format('d M Y, H:i') : '13 Aug 2026' }}</td>
                        </tr>
                    @empty
                        {{-- Sample fallback data mimicking your UI design if no collection is passed yet --}}
                        <tr>
                            <td>
                                <strong>James Whitfield</strong>
                                <br><span style="font-size: 0.75rem; color: var(--color-muted);">james@nbb.com</span>
                            </td>
                            <td>Transfer to external account</td>
                            <td class="cell-mono">NBB-TX-88213</td>
                            <td class="cell-mono" style="font-weight: 600;">-£1,200.00</td>
                            <td><span class="status-pill status-pill--active">Completed</span></td>
                            <td>13 Aug 2026, 14:20</td>
                        </tr>
                        <tr>
                            <td>
                                <strong>Priya Nair</strong>
                                <br><span style="font-size: 0.75rem; color: var(--color-muted);">priya@nbb.com</span>
                            </td>
                            <td>Salary credit</td>
                            <td class="cell-mono">NBB-TX-88190</td>
                            <td class="cell-mono" style="font-weight: 600;">+£4,500.00</td>
                            <td><span class="status-pill status-pill--active">Completed</span></td>
                            <td>11 Aug 2026, 09:15</td>
                        </tr>
                        <tr>
                            <td>
                                <strong>Daniel Owusu</strong>
                                <br><span style="font-size: 0.75rem; color: var(--color-muted);">daniel@nbb.com</span>
                            </td>
                            <td>International transfer to Singapore</td>
                            <td class="cell-mono">NBB-TX-88176</td>
                            <td class="cell-mono" style="font-weight: 600;">-£860.00</td>
                            <td><span class="status-pill status-pill--pending">Processing</span></td>
                            <td>10 Aug 2026, 16:45</td>
                        </tr>
                        <tr>
                            <td>
                                <strong>Sarah Jenkins</strong>
                                <br><span style="font-size: 0.75rem; color: var(--color-muted);">sarah@nbb.com</span>
                            </td>
                            <td>Card payment &mdash; Utility bill</td>
                            <td class="cell-mono">NBB-TX-88150</td>
                            <td class="cell-mono" style="font-weight: 600;">-£142.30</td>
                            <td><span class="status-pill status-pill--active">Completed</span></td>
                            <td>08 Aug 2026, 11:30</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Laravel Pagination links support --}}
        @if(isset($transactions) && method_exists($transactions, 'links'))
            <div style="margin-top: 1rem;">
                {{ $transactions->links() }}
            </div>
        @endif
    </div>

@endsection