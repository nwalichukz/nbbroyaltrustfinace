@extends('layouts.client')

@php($activeNav = 'statements')
@section('title', 'Statement Display | Nbb Trust Kapital')

@section('content')

    <div class="db-page-head">
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
                                <td><code>{{ $history->reference ?? $history->id }}</code></td>
                                <td>{{ $history->description ?? 'System Transaction Entry' }}</td>
                                <td>
                                    <span class="badge badge-{{ strtolower($history->type) }}">
                                        {{ ucfirst($history->type) }}
                                    </span>
                                </td>
                                <td class="text-right amount-cell {{ strtolower($history->type) == 'credit' ? 'text-success' : 'text-danger' }}">
                                    {{ strtolower($history->type) == 'credit' ? '+' : '-' }}${{ number_format($history->amount, 2) }}
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
    </style>

@endsection
