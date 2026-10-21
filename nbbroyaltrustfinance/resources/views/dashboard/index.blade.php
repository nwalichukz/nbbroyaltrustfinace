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
    </div>

    <div class="db-form-grid db-form-grid--split"></div>

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
                        <th style="text-align: right;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($transactions as $row)
                        <tr>
                            <td>
                                <div class="cell-user">
                                    <span class="avatar">{{ strtoupper(substr($row->user->name ?? 'NA', 0, 2)) }}</span>
                                    <div class="cell-user__meta"><strong>{{ $row->user->name ?? 'N/A' }}</strong></div>
                                </div>
                            </td>
                            <td class="cell-mono">NBB-TX-{{ $row['id'] }}</td>
                            <td>{{ $row['transaction_type'] }}</td>
                            <td class="cell-mono">{{ number_format($row['amount']) }}</td>
                            <td><span class="status-pill status-pill--{{ $row['status'] ?? 'active' }}">{{ $row['status'] ?? 'Completed' }}</span></td>

                            <td>{{ \Carbon\Carbon::parse($row->created_at)->format('d M Y H:i') }}</td>
                            <td style="text-align: right;">
<button type="button" class="admin-edit-btn"
    data-id="{{ $row->id }}"
    data-purpose="{{ $row->purpose }}"
    data-date="{{ \Carbon\Carbon::parse($row->created_at)->format('Y-m-d\TH:i') }}"
    onclick="openAdminEditModal(this)">
    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
    Edit
</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- ===================== ADMIN EDIT TRANSACTION MODAL ===================== --}}
    <div id="adminEditTxModal" class="admin-modal-backdrop">
        <div class="admin-modal-card">
            <button type="button" class="admin-modal-close" onclick="closeAdminEditModal()">&times;</button>
            
            <div class="admin-modal-header">
    <h3>Edit Transaction Details</h3>
    <p>Editing <strong id="admin_edit_tx_ref" class="cell-mono">NBB-TX-</strong>. Modify the purpose or timestamp for auditing purposes.</p>
</div>

   <form action="{{ url('/update/transaction') }}" method="POST">
    @csrf
    <input type="hidden" name="transaction_id" id="admin_edit_tx_id">

                <div class="form-group" style="margin-bottom: 1.2rem;">
                    <label for="admin_edit_tx_purpose" class="form-label" style="display:block; font-size:0.85rem; font-weight:600; margin-bottom:0.4rem; color: #081C33;">Purpose / Description</label>
                    <input type="text" name="purpose" id="admin_edit_tx_purpose" class="form-control" required style="width:100%; padding:0.65rem; border:1px solid #cbd5e1; border-radius:6px; font-size:0.9rem;">
                </div>

                <div class="form-group" style="margin-bottom: 1.5rem;">
                    <label for="admin_edit_tx_date" class="form-label" style="display:block; font-size:0.85rem; font-weight:600; margin-bottom:0.4rem; color: #081C33;">Transaction Date &amp; Time</label>
                    <input type="datetime-local" name="created_at" id="admin_edit_tx_date" class="form-control" required style="width:100%; padding:0.65rem; border:1px solid #cbd5e1; border-radius:6px; font-size:0.9rem;">
                </div>

                <div style="display:flex; gap:0.75rem; justify-content:flex-end;">
                    <button type="button" class="btn btn--outline-dark" onclick="closeAdminEditModal()" style="padding:0.6rem 1.2rem;">Cancel</button>
                    <button type="submit" class="btn btn--primary" style="padding:0.6rem 1.2rem;">Save Changes</button>
                </div>
            </form>
        </div>
    </div>

    <style>
        .admin-edit-btn {
            display: inline-flex;
            align-items: center;
            gap: 0.3rem;
            background: #ffffff;
            color: #081C33;
            border: 1px solid #cbd5e1;
            padding: 0.35rem 0.75rem;
            border-radius: 4px;
            font-size: 0.78rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .admin-edit-btn:hover {
            background: #081C33;
            color: #ffffff;
            border-color: #081C33;
        }

        /* Modal Styles */
        .admin-modal-backdrop {
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

        .admin-modal-card {
            background: #ffffff;
            width: 100%;
            max-width: 480px;
            padding: 2rem;
            border-radius: 10px;
            position: relative;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
        }

        .admin-modal-close {
            position: absolute;
            top: 1rem;
            right: 1.25rem;
            background: transparent;
            border: none;
            font-size: 1.5rem;
            color: #64748b;
            cursor: pointer;
        }

        .admin-modal-header h3 {
            margin: 0 0 0.3rem 0;
            color: #081C33;
            font-size: 1.2rem;
        }

        .admin-modal-header p {
            margin: 0 0 1.2rem 0;
            font-size: 0.85rem;
            color: #64748b;
        }
    </style>

   <script>
    function openAdminEditModal(btn) {
        var id = btn.dataset.id;

        document.getElementById('admin_edit_tx_id').value = id;
        document.getElementById('admin_edit_tx_ref').textContent = 'NBB-TX-' + id;
        document.getElementById('admin_edit_tx_purpose').value = btn.dataset.purpose || '';
        document.getElementById('admin_edit_tx_date').value = btn.dataset.date;
        document.getElementById('adminEditTxModal').style.display = 'flex';
    }

    function closeAdminEditModal() {
        document.getElementById('adminEditTxModal').style.display = 'none';
    }

    // Close on backdrop click or Escape
    document.getElementById('adminEditTxModal').addEventListener('click', function (e) {
        if (e.target === this) closeAdminEditModal();
    });
    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape') closeAdminEditModal();
    });
</script>

@endsection