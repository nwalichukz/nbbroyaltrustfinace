@extends('layouts.client')
@php($activeNav = 'transfers')
@section('title', 'Send Money | Nbb Trust Kapital')

    @section('content')
    <div class="db-page-head">
        <div>
            <div class="breadcrumb"><a href="{{ url('/client/dashboard') }}">Client Area</a> <span>/</span> <span>Send Money</span></div>
            <h1>Send Money</h1>
            <p class="lede">Transfer funds instantly between your accounts or to an external bank.</p>
        </div>
    </div>

    <div class="transfer-grid">
        <!-- Main Form Card -->
        <div class="db-card">

            <!-- Transfer Type Selector — controls which form below is shown -->
            <div class="form-group">
                <label class="form-label">Transfer Type</label>
                <div class="transfer-type-toggle">
                    <button type="button" class="type-option active" id="btnInternal" onclick="toggleTransferType('internal')">
                        <span>NbbTrust Bank</span>
                    </button>
                    <button type="button" class="type-option" id="btnExternal" onclick="toggleTransferType('external')">
                        <span>Other Bank Account</span>
                    </button>
                </div>
            </div>

            <!-- ===================== INTERNAL TRANSFER FORM ===================== -->
            <form action="{{ url('/client/transfers/internal') }}" method="POST" id="internalTransferForm" class="transfer-form">
                @csrf

                <div class="form-group">
                    <label for="from_account_internal" class="form-label">From Account</label>
                    <select name="from_account_id" id="from_account_internal" class="form-control" required>
                        <option value="" disabled selected>
                            {{ Auth::user()->userwallet->balance }}
                        </option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="to_account" class="form-label">To Account</label>
                    <select name="to_account_id" id="to_account" class="form-control" required>
                        <option value="" disabled selected>Select Destination Account</option>
                        @isset($accounts)
                            @foreach($accounts as $account)
                                <option value="{{ $account->id }}">
                                    {{ $account->account_type }} (****{{ substr($account->account_number, -4) }})
                                </option>
                            @endforeach
                        @endisset
                    </select>
                </div>

                <div class="form-row">
                    <div class="form-group col-half">
                        <label for="amount_internal" class="form-label">Amount ($)</label>
                        <div class="amount-input-wrapper">
                            <span class="currency-symbol">$</span>
                            <input type="number" step="0.01" min="1.00" name="amount" id="amount_internal" class="form-control amount-input" placeholder="0.00" required>
                        </div>
                    </div>
                    <div class="form-group col-half">
                        <label for="reference_internal" class="form-label">Description / Note (Optional)</label>
                        <input type="text" name="reference" id="reference_internal" class="form-control" placeholder="e.g. Rent, Gift, Payment">
                    </div>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn-primary-lg">
                        <span>Continue Transfer</span>
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                    </button>
                </div>
            </form>

            <!-- ===================== EXTERNAL TRANSFER FORM ===================== -->
            <form action="{{ url('/client/transfers/external') }}" method="POST" id="externalTransferForm" class="transfer-form" style="display:none;">
                @csrf

                <div class="form-group">
                    <label for="from_account_external" class="form-label">From Account</label>
                    <select name="from_account_id" id="from_account_external" class="form-control" required>
                        <option value="" disabled selected>
                            {{ Auth::user()->userwallet->balance }}
                        </option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="bank_name" class="form-label">Recipient Bank</label>
                    <input type="text" name="bank_name" id="bank_name" class="form-control" placeholder="Enter bank name or SWIFT/BIC" required>
                </div>

                <div class="form-group">
                    <label for="account_number" class="form-label">Account Number / IBAN</label>
                    <input type="text" name="account_number" id="account_number" class="form-control" placeholder="e.g. 1234567890" required>
                </div>

                <div class="form-group">
                    <label for="recipient_name" class="form-label">Beneficiary Name</label>
                    <input type="text" name="recipient_name" id="recipient_name" class="form-control" placeholder="Full name of account holder" required>
                </div>

                <div class="form-row">
                    <div class="form-group col-half">
                        <label for="amount_external" class="form-label">Amount ($)</label>
                        <div class="amount-input-wrapper">
                            <span class="currency-symbol">$</span>
                            <input type="number" step="0.01" min="1.00" name="amount" id="amount_external" class="form-control amount-input" placeholder="0.00" required>
                        </div>
                    </div>
                    <div class="form-group col-half">
                        <label for="reference_external" class="form-label">Description / Note (Optional)</label>
                        <input type="text" name="reference" id="reference_external" class="form-control" placeholder="e.g. Rent, Gift, Payment">
                    </div>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn-primary-lg">
                        <span>Continue Transfer</span>
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                    </button>
                </div>
            </form>
        </div>

        <!-- Right Side Panel / Security Notice -->
        <div class="db-sidebar-panel">
            <div class="db-card info-card">
                <h3>Transfer Security</h3>
                <ul class="info-list">
                    <li>
                        <strong>Instant Processing</strong>
                        <p>Internal transfers are processed immediately 24/7.</p>
                    </li>
                    <li>
                        <strong>Encryption</strong>
                        <p>All outgoing transactions are protected with 256-bit encryption.</p>
                    </li>
                    <li>
                        <strong>Limits</strong>
                        <p>Standard daily transfer limit: <strong>$10,000.00</strong></p>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Styling & Toggle Script -->
    <style>
        :root {
            --color-brand: #081C33;
            --color-brand-hover: #0b2545;
            --color-brand-light: #f0f4f8;
        }

        .transfer-grid {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 1.5rem;
            align-items: start;
        }

        @media (max-width: 900px) {
            .transfer-grid {
                grid-template-columns: 1fr;
            }
        }

        .transfer-type-toggle {
            display: flex;
            gap: 0.75rem;
            background: var(--color-bg-subtle, #f4f6f8);
            padding: 0.35rem;
            border-radius: 8px;
        }

        .type-option {
            flex: 1;
            text-align: center;
            cursor: pointer;
            background: none;
            border: none;
            padding: 0;
        }

        .type-option span {
            display: block;
            padding: 0.6rem 1rem;
            font-size: 0.9rem;
            font-weight: 500;
            border-radius: 6px;
            transition: all 0.2s ease;
            color: var(--color-ink-soft, #64748b);
        }

        .type-option.active span {
            background: var(--color-brand);
            color: #ffffff;
            box-shadow: 0 2px 4px rgba(8, 28, 51, 0.15);
            font-weight: 600;
        }

        .transfer-form {
            margin-top: 1.25rem;
        }

        .form-group {
            margin-bottom: 1.25rem;
        }

        .form-label {
            display: block;
            font-size: 0.85rem;
            font-weight: 600;
            margin-bottom: 0.4rem;
            color: var(--color-ink, #1e293b);
        }

        .form-control {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 1px solid var(--color-border, #cbd5e1);
            border-radius: 8px;
            font-size: 0.95rem;
            background: #ffffff;
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--color-brand);
            box-shadow: 0 0 0 3px rgba(8, 28, 51, 0.12);
        }

        .form-row {
            display: flex;
            gap: 1rem;
        }

        .col-half {
            flex: 1;
        }

        .amount-input-wrapper {
            position: relative;
            display: flex;
            align-items: center;
        }

        .currency-symbol {
            position: absolute;
            left: 1rem;
            font-weight: 600;
            color: var(--color-brand);
        }

        .amount-input {
            padding-left: 2rem;
            font-weight: 600;
            font-size: 1.1rem;
        }

        .btn-primary-lg {
            width: 100%;
            padding: 0.85rem 1.5rem;
            background: var(--color-brand);
            color: #ffffff;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            font-size: 1rem;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            transition: background 0.2s, transform 0.1s;
        }

        .btn-primary-lg:hover {
            background: var(--color-brand-hover);
        }

        .btn-primary-lg:active {
            transform: translateY(1px);
        }

        .info-card {
            background: var(--color-brand-light);
            border: 1px solid rgba(8, 28, 51, 0.1);
        }

        .info-card h3 {
            font-size: 1rem;
            margin-bottom: 1rem;
            color: var(--color-brand);
        }

        .info-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .info-list li {
            margin-bottom: 1rem;
        }

        .info-list strong {
            font-size: 0.85rem;
            color: var(--color-brand);
        }

        .info-list p {
            font-size: 0.8rem;
            color: #475569;
            margin: 0.2rem 0 0 0;
        }
    </style>

    <script>
        function toggleTransferType(type) {
            const internalForm = document.getElementById('internalTransferForm');
            const externalForm = document.getElementById('externalTransferForm');
            const btnInternal = document.getElementById('btnInternal');
            const btnExternal = document.getElementById('btnExternal');

            if (type === 'external') {
                externalForm.style.display = 'block';
                internalForm.style.display = 'none';
                btnExternal.classList.add('active');
                btnInternal.classList.remove('active');
            } else {
                externalForm.style.display = 'none';
                internalForm.style.display = 'block';
                btnInternal.classList.add('active');
                btnExternal.classList.remove('active');
            }
        }
    </script>
@endsection