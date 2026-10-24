@extends('layouts.client')

@php($activeNav = 'statements')
@section('title', 'Statement Display | Nbb Trust Kapital')

@section('content')

    <div class="db-page-head no-print">
        <div>
            <div class="breadcrumb">
                <a href="{{ url('/client/dashboard') }}">Client Area</a> 
                <span>/</span> <a href="{{ url('/client/statements') }}">Statements</a> 
                <span>/</span> <span>Display</span>
            </div>
            <h1>Account Statement</h1>
            <p class="lede">Generated ledger records for <strong>{{ $user->name }}</strong> ({{ $user->email }})</p>
        </div>
    </div>

    <!-- Print Header (Hidden on screen, visible only when printed) -->
    <div class="print-only-header">
        <h2>Nbb Trust Kapital</h2>
        <p><strong>Official Account Statement</strong></p>
        <p>Account Holder: {{ $user->name }} ({{ $user->email }})</p>
        <p>Issued Date: {{ now()->format('M d, Y H:i') }}</p>
        <hr style="border: 0; border-top: 1px solid #e2e8f0; margin: 1.5rem 0;">
    </div>

    <!-- Action Bar Panel -->
    <div class="db-card action-card no-print">
        <div class="action-buttons">
            <button onclick="window.print();" class="btn-action">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 6 2 18 2 18 9"/><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"/><rect x="6" y="14" width="12" height="8"/></svg>
                Print Document
            </button>
            <button onclick="downloadAsPDF();" class="btn-action">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
                Download PDF
            </button>
            <button onclick="shareStatement();" class="btn-action">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="18" cy="5" r="3"/><circle cx="6" cy="12" r="3"/><circle cx="18" cy="19" r="3"/><line x1="8.59" y1="13.51" x2="15.42" y2="17.49"/><line x1="15.41" y1="6.51" x2="8.59" y2="10.49"/></svg>
                Share Statement
            </button>
        </div>
    </div>

    <!-- Summary Metrics Card -->
    <div class="db-card summary-card">
        <div class="summary-grid">
            <div>
                <span class="summary-label">Statement Window</span>
                <strong class="summary-value">
                    {{ \Carbon\Carbon::parse($request->start_date)->format('M d, Y') }} 
                    to 
                    {{ \Carbon\Carbon::parse($request->end_date)->format('M d, Y') }}
                </strong>
            </div>
            <div>
                <span class="summary-label">Historical Records Located</span>
                <strong class="summary-value">{{ $transactions->count() }} Entries</strong>
            </div>
        </div>
    </div>

    <!-- Transaction History Table Card -->
    <div class="db-card table-card">
        @if($transactions->isEmpty())
            <div class="empty-state">
                <p>No transaction history records found matching this specified timeline range.</p>
            </div>
        @else
            <div class="table-responsive">
                <table class="statement-table">
                    <thead>
                        <tr>
                            <th>Date Processed</th>
                            <th>Transaction Ref</th>
                            <th>Description</th>
                            <th>Status/Type</th>
                            <th class="text-right">Transaction Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($transactions as $history)
                            <tr>
                                <td>{{ $history->created_at->format('M d, Y H:i') }}</td>
                                <td><code>NBB-TX-{{ $history->id }}</code></td>
                                <td>{{ $history->purpose ?? 'System Transaction Entry' }}</td>
                                <td>
                                    <span class="badge badge-{{ strtolower($history->transaction_type) }}">
                                        {{ ucfirst($history->transaction_type) }}
                                    </span>
                                </td>
                                <td class="text-right amount-cell {{ strtolower($history->transaction_type) == 'credit' ? 'text-success' : 'text-danger' }}">
                                    {{ strtolower($history->transaction_type) == 'credit' ? '+' : '-' }}${{ number_format($history->amount, 2) }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>

    <style>
        :root {
            --color-brand: #081C33;
            --color-brand-hover: #0b2545;
            --color-border: #e2e8f0;
            --color-ink: #0f172a;
            --color-ink-soft: #64748b;
            --color-success: #16a34a;
            --color-danger: #dc2626;
        }

        .db-page-head { margin-bottom: 1.5rem; }
        
        .db-card {
            background: #ffffff;
            border: 1px solid var(--color-border);
            border-radius: 12px;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
        }

        /* Action card styles */
        .action-buttons {
            display: flex;
            gap: 0.75rem;
            flex-wrap: wrap;
        }

        .btn-action {
            background: #ffffff;
            color: var(--color-ink);
            border: 1px solid var(--color-border);
            height: 38px;
            padding: 0 1rem;
            border-radius: 8px;
            font-weight: 600;
            font-size: 0.85rem;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.2s;
        }

        .btn-action:hover {
            background: var(--color-border);
            color: var(--color-brand);
        }

        .summary-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1.5rem;
        }
        .summary-label {
            display: block;
            font-size: 0.8rem;
            color: var(--color-ink-soft);
            text-transform: uppercase;
            margin-bottom: 0.25rem;
        }
        .summary-value {
            font-size: 1.15rem;
            color: var(--color-brand);
        }

        .table-responsive {
            width: 100%;
            overflow-x: auto;
        }
        .statement-table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
            font-size: 0.9rem;
        }
        .statement-table th {
            padding: 0.75rem 1rem;
            border-bottom: 2px solid var(--color-border);
            color: var(--color-ink);
            font-weight: 600;
        }
        .statement-table td {
            padding: 1rem;
            border-bottom: 1px solid var(--color-border);
            color: var(--color-ink-soft);
        }
        .text-right { text-align: right; }
        .amount-cell { font-weight: 600; font-family: monospace; font-size: 0.95rem;}
        .text-success { color: var(--color-success); }
        .text-danger { color: var(--color-danger); }
        
        .badge {
            display: inline-block;
            padding: 0.25rem 0.5rem;
            border-radius: 4px;
            font-size: 0.75rem;
            font-weight: 600;
        }
        .badge-credit { background: #dcfce7; color: var(--color-success); }
        .badge-debit { background: #fee2e2; color: var(--color-danger); }
        
        .empty-state {
            text-align: center;
            padding: 2rem;
            color: var(--color-ink-soft);
        }

        /* Print Specific Overrides */
        .print-only-header { display: none; }

        @media print {
            body { background: #ffffff; color: #000000; }
            .no-print, nav, sidebar, header, .navbar, .sidebar, footer { display: none !important; }
            .db-card { border: none; padding: 0; margin-bottom: 2rem; }
            .print-only-header { display: block; }
            .statement-table th { border-bottom: 2px solid #000000; color: #000000; }
            .statement-table td { border-bottom: 1px solid #e2e8f0; }
        }
    </style>

    <script>
        // Native Web Share API integration
        function shareStatement() {
            if (navigator.share) {
                navigator.share({
                    title: 'Account Statement - Nbb Trust Kapital',
                    text: 'View account statement timeline records for {{ $user->name }}.',
                    url: window.location.href
                }).catch(console.error);
            } else {
                alert('Sharing is not natively supported on this browser device. You can copy the URL instead.');
            }
        }

        // Direct Download helper utilizing print workflows
        function downloadAsPDF() {
            window.print();
        }
    </script>

@endsection
