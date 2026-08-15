@extends('layouts.client')

@php($activeNav = 'statements')
@section('title', 'Statements | Nbb Trust Kapital')

@section('content')

    <div class="db-page-head">
        <div>
            <div class="breadcrumb"><a href="{{ url('/client/dashboard') }}">Client Area</a> <span>/</span> <span>Statements</span></div>
            <h1>Account Statements</h1>
            <p class="lede">Generate, view, and download official account statements for your records.</p>
        </div>
    </div>

    <!-- Filter & Generator Card -->
    <div class="db-card filter-card">
        <form class="statement-filter-form" onsubmit="event.preventDefault();">
            <div class="form-grid">
                <div class="form-group">
                    <label for="account_select">Select Account</label>
                    <select id="account_select" class="form-control">
                        <option value="all">All Accounts (Combined)</option>
                        <option value="3001">Private Reserve Checking (•••• 3001)</option>
                        <option value="7742">High-Yield Savings (•••• 7742)</option>
                        <option value="9904">Global Investment Vault (•••• 9904)</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="date_range">Date Range</label>
                    <select id="date_range" class="form-control">
                        <option value="30">Last 30 Days</option>
                        <option value="90" selected>Last 90 Days</option>
                        <option value="year_to_date">Year to Date (2026)</option>
                        <option value="custom">Custom Date Range</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="file_format">File Format</label>
                    <select id="file_format" class="form-control">
                        <option value="pdf">PDF Document (.pdf)</option>
                        <option value="csv">CSV Spreadsheet (.csv)</option>
                    </select>
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

    <!-- Available Monthly Statements Table -->
    <div class="db-card table-card">
        <div class="card-head">
            <h2>Recent Monthly Statements</h2>
            <span class="card-subtitle">Official end-of-month statements ready for instant download</span>
        </div>

        <div class="table-responsive">
            <table class="statements-table">
                <thead>
                    <tr>
                        <th>Statement Period</th>
                        <th>Account</th>
                        <th>Format</th>
                        <th>Issued Date</th>
                        <th class="text-right">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <div class="period-cell">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10 9 9 9 8 9"/></svg>
                                <strong>July 2026 Statement</strong>
                            </div>
                        </td>
                        <td><span class="acc-tag">Checking (•••• 3001)</span></td>
                        <td><span class="format-badge pdf">PDF</span></td>
                        <td>Aug 01, 2026</td>
                        <td class="text-right">
                            <a href="#" class="btn-sm-outline">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
                                Download
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="period-cell">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10 9 9 9 8 9"/></svg>
                                <strong>June 2026 Statement</strong>
                            </div>
                        </td>
                        <td><span class="acc-tag">Checking (•••• 3001)</span></td>
                        <td><span class="format-badge pdf">PDF</span></td>
                        <td>Jul 01, 2026</td>
                        <td class="text-right">
                            <a href="#" class="btn-sm-outline">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
                                Download
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="period-cell">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10 9 9 9 8 9"/></svg>
                                <strong>Q2 2026 Portfolio Summary</strong>
                            </div>
                        </td>
                        <td><span class="acc-tag">All Accounts</span></td>
                        <td><span class="format-badge pdf">PDF</span></td>
                        <td>Jul 01, 2026</td>
                        <td class="text-right">
                            <a href="#" class="btn-sm-outline">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
                                Download
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="period-cell">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10 9 9 9 8 9"/></svg>
                                <strong>May 2026 Statement</strong>
                            </div>
                        </td>
                        <td><span class="acc-tag">Savings (•••• 7742)</span></td>
                        <td><span class="format-badge pdf">PDF</span></td>
                        <td>Jun 01, 2026</td>
                        <td class="text-right">
                            <a href="#" class="btn-sm-outline">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
                                Download
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
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
            margin-bottom: 1.5rem;
        }

        .db-card {
            background: #ffffff;
            border: 1px solid var(--color-border);
            border-radius: 12px;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
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

        /* Card Header */
        .card-head {
            margin-bottom: 1.25rem;
        }

        .card-head h2 {
            font-size: 1.1rem;
            font-weight: 700;
            color: var(--color-brand);
            margin: 0 0 0.2rem 0;
        }

        .card-subtitle {
            font-size: 0.85rem;
            color: var(--color-ink-soft);
        }

        /* Statements Table */
        .table-responsive {
            overflow-x: auto;
        }

        .statements-table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
            font-size: 0.875rem;
        }

        .statements-table th {
            padding: 0.75rem 1rem;
            border-bottom: 2px solid var(--color-border);
            color: var(--color-ink-soft);
            font-weight: 600;
            font-size: 0.775rem;
            text-transform: uppercase;
            letter-spacing: 0.04em;
        }

        .statements-table td {
            padding: 1rem;
            border-bottom: 1px solid #f1f5f9;
            color: var(--color-ink);
            vertical-align: middle;
        }

        .statements-table tr:last-child td {
            border-bottom: none;
        }

        .period-cell {
            display: flex;
            align-items: center;
            gap: 0.6rem;
            color: var(--color-brand);
        }

        .period-cell stroke {
            color: var(--color-brand);
        }

        .acc-tag {
            background: var(--color-brand-subtle);
            color: var(--color-brand);
            padding: 0.25rem 0.6rem;
            border-radius: 6px;
            font-size: 0.775rem;
            font-weight: 600;
        }

        .format-badge {
            font-size: 0.75rem;
            font-weight: 700;
            padding: 0.2rem 0.5rem;
            border-radius: 4px;
            text-transform: uppercase;
        }

        .format-badge.pdf {
            background: #fee2e2;
            color: #991b1b;
        }

        .text-right {
            text-align: right;
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

        .btn-sm-outline {
            border: 1px solid var(--color-border);
            color: var(--color-ink);
            padding: 0.4rem 0.85rem;
            border-radius: 6px;
            font-size: 0.8rem;
            font-weight: 500;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            transition: background 0.2s;
        }

        .btn-sm-outline:hover {
            background: #f8fafc;
            border-color: #cbd5e1;
        }

        @media (max-width: 768px) {
            .statement-filter-form .form-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>

@endsection