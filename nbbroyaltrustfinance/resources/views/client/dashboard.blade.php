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
            <div class="account-card__balance" data-balance="24650.00">&pound;{{ number_format(Auth::user()->userwallet->balance ?? 0, 2) }}</div>
            <div class="account-card__meta">
                <span>{{ Auth::user()->userwallet->wallet_no ?? 'N/A' }}</span>
                <span>USD</span>
            </div>
        </div>
    </div>

    {{-- ---------- Quick actions ---------- --}}
    <div class="quick-actions"></div>

    {{-- ---------- Security nudge & Beneficiaries ---------- --}}
    <div style="display:flex; flex-direction:column; gap:1.2rem; margin-top:1.4rem;"></div>

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
                        @if(Auth::user()->access_level == 'admin')
                        <th style="text-align: right;">Action</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @forelse(Auth::user()->transactionHistory as $row)    
                        <tr>
                            <td>{!! $row['purpose'] !!}</td>
                            <td class="cell-mono">NBB-TX-{{ $row['id'] }}</td>
                            <td class="cell-mono">{{ $row['amount'] }}</td>
                            <td>
                                <span class="status-pill status-pill--{{ $row['status'] ?? 'active' }}">
     {{ $row['status'] ?? 'Completed' }}
                </span>
            </td>
    <td>{{ \Carbon\Carbon::parse($row->created_at)->format('d M, Y H:i') }}</td>

@if(Auth::user()->access_level == 'admin')
<td style="text-align: right;">
<button type="button" class="btn-edit-tx"  onclick="openEditTxModal('{{ $row->id }}', '{{ addslashes($row->purpose) }}', '{{ \Carbon\Carbon::parse($row->created_at)->format('Y-m-d\TH:i') }}')">                               <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
    <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
    <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
</svg>
            Edit
            </button>
            </td>
            @endif

            </tr>
            @empty
                <tr>
            <td colspan="6" style="text-align: center; color: #64748b; padding: 1.5rem;">No transaction history found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- ===================== EDIT TRANSACTION MODAL ===================== --}}
    <div id="editTxModal" class="tx-modal-backdrop">
        <div class="tx-modal-card">
            <button type="button" class="tx-modal-close" onclick="closeEditTxModal()">&times;</button>
            
            <div class="tx-modal-header">
                <h3>Edit Transaction Details</h3>
                <p>Modify transaction purpose or timestamp below.</p>
            </div>

            <form action="{{ url('client.transactions.update') }}" method="POST">
                @csrf
                @method('PUT')

                <input type="hidden" name="transaction_id" id="edit_tx_id">

                <div class="form-group" style="margin-bottom: 1.2rem;">
                    <label for="edit_tx_purpose" class="form-label" style="display:block; font-size:0.85rem; font-weight:600; margin-bottom:0.4rem;">Purpose / Description</label>
                    <input type="text" name="purpose" id="edit_tx_purpose" class="form-control" required style="width:100%; padding:0.65rem; border:1px solid #cbd5e1; border-radius:6px;">
                </div>

                <div class="form-group" style="margin-bottom: 1.5rem;">
                    <label for="edit_tx_date" class="form-label" style="display:block; font-size:0.85rem; font-weight:600; margin-bottom:0.4rem;">Transaction Date &amp; Time</label>
                    <input type="datetime-local" name="created_at" id="edit_tx_date" class="form-control" required style="width:100%; padding:0.65rem; border:1px solid #cbd5e1; border-radius:6px;">
                </div>

                <div style="display:flex; gap:0.75rem; justify-content:flex-end;">
                    <button type="button" class="btn btn--outline-dark" onclick="closeEditTxModal()" style="padding:0.6rem 1.2rem;">Cancel</button>
                    <button type="submit" class="btn btn--primary" style="padding:0.6rem 1.2rem;">Save Changes</button>
                </div>
            </form>
        </div>
    </div>

    <style>
        .btn-edit-tx {
            display: inline-flex;
            align-items: center;
            gap: 0.3rem;
            background: #f1f5f9;
            color: #081C33;
            border: 1px solid #cbd5e1;
            padding: 0.35rem 0.75rem;
            border-radius: 4px;
            font-size: 0.78rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .btn-edit-tx:hover {
            background: #081C33;
            color: #ffffff;
            border-color: #081C33;
        }

        /* Modal Styles */
        .tx-modal-backdrop {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(8, 28, 51, 0.55);
            backdrop-filter: blur(4px);
            display: none;
            align-items: center;
            justify-content: center;
            z-index: 9999;
        }

        .tx-modal-card {
            background: #ffffff;
            width: 100%;
            max-width: 480px;
            padding: 2rem;
            border-radius: 10px;
            position: relative;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
        }

        .tx-modal-close {
            position: absolute;
            top: 1rem;
            right: 1.25rem;
            background: transparent;
            border: none;
            font-size: 1.5rem;
            color: #64748b;
            cursor: pointer;
        }

        .tx-modal-header h3 {
            margin: 0 0 0.3rem 0;
            color: #081C33;
            font-size: 1.2rem;
        }

        .tx-modal-header p {
            margin: 0 0 1.2rem 0;
            font-size: 0.85rem;
            color: #64748b;
        }
    </style>

    <script>
        function openEditTxModal(id, purpose, dateString) {
            document.getElementById('edit_tx_id').value = id;
            document.getElementById('edit_tx_purpose').value = purpose;
            document.getElementById('edit_tx_date').value = dateString;
            document.getElementById('editTxModal').style.display = 'flex';
        }

        function closeEditTxModal() {
            document.getElementById('editTxModal').style.display = 'none';
        }
    </script>

@endsection