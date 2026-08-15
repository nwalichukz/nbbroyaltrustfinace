@extends('layouts.client')

@php($activeNav = 'beneficiaries')
@section('title', 'Beneficiaries | Nbb Trust Kapital')

@section('content')

    <div class="db-page-head">
        <div>
            <div class="breadcrumb"><a href="{{ url('/client/dashboard') }}">Client Area</a> <span>/</span> <span>Beneficiaries</span></div>
            <h1>Saved Beneficiaries</h1>
            <p class="lede">Manage saved individuals and corporate entities for fast, recurring transfers.</p>
        </div>
        <a href="{{ url('/client/beneficiaries/create') }}" class="btn-brand">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="8.5" cy="7" r="4"/><line x1="20" y1="8" x2="20" y2="14"/><line x1="23" y1="11" x2="17" y2="11"/></svg>
            Add New Beneficiary
        </a>
    </div>

    <!-- Search & Filter Controls -->
    <div class="db-card filter-card">
        <form class="search-filter-form" onsubmit="event.preventDefault();">
            <div class="search-input-wrapper">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
                <input type="text" class="form-control" placeholder="Search by name, bank, or account number...">
            </div>
            <div class="filter-select-wrapper">
                <select class="form-control">
                    <option value="all">All Transfer Types</option>
                    <option value="internal">Internal (Nbb Trust)</option>
                    <option value="domestic">Domestic Wire / ACH</option>
                    <option value="international">SWIFT / International</option>
                </select>
            </div>
        </form>
    </div>

    <!-- Saved Beneficiaries Grid -->
    <div class="beneficiaries-grid">

        <!-- Beneficiary Item 1 -->
        <div class="db-card beneficiary-card">
            <div class="beneficiary-card__head">
                <div class="avatar-circle">
                    <span>AN</span>
                </div>
                <div class="beneficiary-info">
                    <h3>Amuche Nwali</h3>
                    <span class="bank-name">Nbb Trust Kapital</span>
                </div>
                <span class="type-badge internal">Internal</span>
            </div>

            <div class="beneficiary-card__body">
                <div class="meta-row">
                    <span class="meta-label">Account Number</span>
                    <span class="meta-value">•••• 9182</span>
                </div>
                <div class="meta-row">
                    <span class="meta-label">Currency</span>
                    <span class="meta-value">USD ($)</span>
                </div>
                <div class="meta-row">
                    <span class="meta-label">Last Transfer</span>
                    <span class="meta-value">Jul 28, 2026</span>
                </div>
            </div>

            <div class="beneficiary-card__foot">
                <a href="{{ url('/client/transfers?beneficiary=1') }}" class="btn-sm-brand">Send Money</a>
                <div class="card-dropdown">
                    <button class="btn-icon" title="Options">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="1"/><circle cx="12" cy="5" r="1"/><circle cx="12" cy="19" r="1"/></svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Beneficiary Item 2 -->
        <div class="db-card beneficiary-card">
            <div class="beneficiary-card__head">
                <div class="avatar-circle corporate">
                    <span>LT</span>
                </div>
                <div class="beneficiary-info">
                    <h3>Letnote Logistics Ltd</h3>
                    <span class="bank-name">JPMorgan Chase Bank</span>
                </div>
                <span class="type-badge domestic">Domestic Wire</span>
            </div>

            <div class="beneficiary-card__body">
                <div class="meta-row">
                    <span class="meta-label">Account / IBAN</span>
                    <span class="meta-value">•••• 4410</span>
                </div>
                <div class="meta-row">
                    <span class="meta-label">Routing / ABA</span>
                    <span class="meta-value">021000021</span>
                </div>
                <div class="meta-row">
                    <span class="meta-label">Last Transfer</span>
                    <span class="meta-value">Aug 04, 2026</span>
                </div>
            </div>

            <div class="beneficiary-card__foot">
                <a href="{{ url('/client/transfers?beneficiary=2') }}" class="btn-sm-brand">Send Money</a>
                <div class="card-dropdown">
                    <button class="btn-icon" title="Options">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="1"/><circle cx="12" cy="5" r="1"/><circle cx="12" cy="19" r="1"/></svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Beneficiary Item 3 -->
        <div class="db-card beneficiary-card">
            <div class="beneficiary-card__head">
                <div class="avatar-circle">
                    <span>CN</span>
                </div>
                <div class="beneficiary-info">
                    <h3>Chukwuma Nwali</h3>
                    <span class="bank-name">Barclays Bank UK</span>
                </div>
                <span class="type-badge swift">SWIFT</span>
            </div>

            <div class="beneficiary-card__body">
                <div class="meta-row">
                    <span class="meta-label">IBAN</span>
                    <span class="meta-value">GB29 BARC •••• 8821</span>
                </div>
                <div class="meta-row">
                    <span class="meta-label">SWIFT / BIC</span>
                    <span class="meta-value">BARCGB22XXX</span>
                </div>
                <div class="meta-row">
                    <span class="meta-label">Last Transfer</span>
                    <span class="meta-value">Jun 14, 2026</span>
                </div>
            </div>

            <div class="beneficiary-card__foot">
                <a href="{{ url('/client/transfers?beneficiary=3') }}" class="btn-sm-brand">Send Money</a>
                <div class="card-dropdown">
                    <button class="btn-icon" title="Options">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="1"/><circle cx="12" cy="5" r="1"/><circle cx="12" cy="19" r="1"/></svg>
                    </button>
                </div>
            </div>
        </div>

    </div>

    <style>
        :root {
            --color-brand: #081C33;
            --color-brand-hover: #0b2545;
            --color-brand-subtle: #f0f4f8;
            --color-border: #e2e8f0;
            --color-ink: #0f172a;
            --color-ink-soft: #64748b;
        }

        .db-page-head {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            margin-bottom: 1.5rem;
        }

        .db-card {
            background: #ffffff;
            border: 1px solid var(--color-border);
            border-radius: 12px;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
        }

        /* Filter & Search Bar */
        .filter-card {
            padding: 1rem 1.25rem;
        }

        .search-filter-form {
            display: flex;
            gap: 1rem;
            align-items: center;
        }

        .search-input-wrapper {
            flex: 1;
            position: relative;
            display: flex;
            align-items: center;
        }

        .search-input-wrapper svg {
            position: absolute;
            left: 0.85rem;
            color: var(--color-ink-soft);
        }

        .search-input-wrapper input {
            padding-left: 2.5rem;
            width: 100%;
        }

        .filter-select-wrapper select {
            min-width: 220px;
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

        /* Grid */
        .beneficiaries-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 1.5rem;
        }

        .beneficiary-card {
            margin-bottom: 0;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .beneficiary-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.06);
        }

        .beneficiary-card__head {
            display: flex;
            align-items: center;
            gap: 0.85rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid #f1f5f9;
            margin-bottom: 1rem;
            position: relative;
        }

        .avatar-circle {
            width: 44px;
            height: 44px;
            border-radius: 50%;
            background: var(--color-brand-subtle);
            color: var(--color-brand);
            font-weight: 700;
            font-size: 0.95rem;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .avatar-circle.corporate {
            background: #e0f2fe;
            color: #0369a1;
        }

        .beneficiary-info {
            flex: 1;
            min-width: 0;
        }

        .beneficiary-info h3 {
            font-size: 1rem;
            font-weight: 700;
            color: var(--color-brand);
            margin: 0 0 0.15rem 0;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .bank-name {
            font-size: 0.8rem;
            color: var(--color-ink-soft);
            display: block;
        }

        .type-badge {
            font-size: 0.725rem;
            font-weight: 600;
            padding: 0.2rem 0.55rem;
            border-radius: 6px;
            align-self: flex-start;
        }

        .type-badge.internal { background: #dcfce7; color: #15803d; }
        .type-badge.domestic { background: #f0f4f8; color: var(--color-brand); }
        .type-badge.swift { background: #fef3c7; color: #b45309; }

        .beneficiary-card__body {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
            margin-bottom: 1.25rem;
        }

        .meta-row {
            display: flex;
            justify-content: space-between;
            font-size: 0.825rem;
        }

        .meta-label {
            color: var(--color-ink-soft);
        }

        .meta-value {
            color: var(--color-ink);
            font-weight: 600;
            font-family: 'IBM Plex Mono', monospace;
        }

        .beneficiary-card__foot {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 0.85rem;
            border-top: 1px solid #f1f5f9;
        }

        .btn-brand {
            background: var(--color-brand);
            color: #ffffff;
            height: 42px;
            padding: 0 1.2rem;
            border-radius: 8px;
            font-weight: 600;
            font-size: 0.875rem;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            transition: background 0.2s;
        }

        .btn-brand:hover {
            background: var(--color-brand-hover);
        }

        .btn-sm-brand {
            background: var(--color-brand);
            color: #ffffff;
            padding: 0.45rem 0.95rem;
            border-radius: 6px;
            font-size: 0.8rem;
            font-weight: 600;
            text-decoration: none;
            transition: background 0.2s;
        }

        .btn-sm-brand:hover {
            background: var(--color-brand-hover);
        }

        .btn-icon {
            background: transparent;
            border: none;
            color: var(--color-ink-soft);
            padding: 0.35rem;
            border-radius: 6px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background 0.2s, color 0.2s;
        }

        .btn-icon:hover {
            background: #f1f5f9;
            color: var(--color-ink);
        }

        @media (max-width: 768px) {
            .db-page-head {
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
            }

            .search-filter-form {
                flex-direction: column;
            }

            .filter-select-wrapper {
                width: 100%;
            }

            .filter-select-wrapper select {
                width: 100%;
            }
        }
    </style>

@endsection