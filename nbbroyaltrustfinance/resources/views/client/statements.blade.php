@extends('layouts.client')

@php($activeNav = 'statements')
@section('title', 'Statements | Nbb Trust Kapital')

@section('content')

    <div class="db-page-head">
        <div>
            <div class="breadcrumb"><a href="{{ url('/client/dashboard') }}">Client Area </a> <span>/</span> <span> Statements </span></div>
            <h1> Account Statements </h1>
            <p class="lede">Generate, view, and download official account statements for your records. </p>
        </div>
    </div>

    <!-- Account Overview Meta Card -->
    <div class="db-card info-card">
        <div class="info-grid">
            <div class="info-item">
                <span class="info-label">Account Holder</span>
                <strong class="info-value">{{ auth()->user()->name }}</strong>
            </div>
            <div class="info-item">
                <span class="info-label">Available Balance</span>
                <strong class="info-value balance-value">${{ number_format(auth()->user()->userwallet->balance ?? 0.00, 2) }}</strong>
            </div>
        </div>
    </div>

    <!-- Filter & Generator Card -->
    <div class="db-card filter-card">
        <form class="statement-filter-form" action="{{ url('statements/generate') }}" method="POST">
             @csrf
             
            <!-- Hidden Authenticated User Email Input -->
            <input type="hidden" name="email_address" value="{{ auth()->user()->email }}">

            <div class="form-grid">
                <div class="form-group">
                    <label for="start_date">Start Date</label>
                    <input type="date" name="start_date" id="start_date" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="end_date">End Date</label>
                    <input type="date" name="end_date" id="end_date" class="form-control" required>
                </div>

                <div class="form-group btn-group">
                    <button type="submit" class="btn-brand">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
                        Generate Statement
                    </button>
                </div>
            </div>
        </form>
    </div>

    <style>
        :root {
            --color-brand: #081C33;
            --color-brand-hover: #0b2545;
            --color-brand-subtle: #f0f4f8;
            --color-border: #e2e8f0;
            --color-ink: #0f172a;
            --color-ink-soft: #64748b;
            --color-success: #16a34a;
        }

        .db-page-head {
            margin-bottom: 1.5rem;
        }

        .db-card {
            background: #ffffff;
            border: 1px solid var(--color-border);
            border-radius: 12px;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
        }

        /* Info Card Structural Styles */
        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1.5rem;
        }

        .info-item {
            display: flex;
            flex-direction: column;
            gap: 0.25rem;
        }

        .info-label {
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: var(--color-ink-soft);
            font-weight: 600;
        }

        .info-value {
            font-size: 1.25rem;
            color: var(--color-brand);
            font-weight: 700;
        }

        .balance-value {
            color: var(--color-success);
        }

        /* Filter Form */
        .statement-filter-form .form-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1.25rem;
            align-items: flex-end;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 0.4rem;
        }

        .form-group label {
            font-size: 0.825rem;
            font-weight: 600;
            color: var(--color-ink);
        }

        .form-control {
            height: 42px;
            padding: 0 0.85rem;
            border: 1px solid var(--color-border);
            border-radius: 8px;
            background-color: #ffffff;
            color: var(--color-ink);
            font-size: 0.875rem;
            outline: none;
            transition: border-color 0.2s;
        }

        .form-control:focus {
            border-color: var(--color-brand);
        }

        .btn-group {
            justify-content: flex-end;
        }

        /* Buttons */
        .btn-brand {
            background: var(--color-brand);
            color: #ffffff;
            height: 42px;
            padding: 0 1.2rem;
            border-radius: 8px;
            font-weight: 600;
            font-size: 0.875rem;
            border: none;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            transition: background 0.2s;
        }

        .btn-brand:hover {
            background: var(--color-brand-hover);
        }

        @media (max-width: 768px) {
            .statement-filter-form .form-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>

@endsection
