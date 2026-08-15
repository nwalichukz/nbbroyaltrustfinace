@extends('layouts.dashboard')

@php($activeNav = 'users')
@section('title', 'View Users | Nbb Trust Kapital Admin')

@section('content')

    <div class="db-page-head">
        <div>
            <div class="breadcrumb"><a href="{{ url('/dashboard') }}">Admin</a> <span>/</span> <span>Clients</span></div>
            <h1>View Users</h1>
            <p class="lede">Approve new client accounts, suspend accounts under review, or remove accounts permanently.</p>
        </div>
        <div class="db-page-head__actions">
            <button class="btn btn--outline-dark">Export CSV</button>
            <a href="{{ route('dashboard.add-funds') ?? url('/dashboard/add-funds') }}" class="btn btn--primary">Add Funds</a>
        </div>
    </div>

    <div class="db-card" style="padding:0;">

        <div class="table-toolbar">
            <div class="table-toolbar__search">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="7"/><path d="M21 21l-4.3-4.3"/></svg>
                <input type="search" placeholder="Search by name, email or account number&hellip;" aria-label="Search users">
            </div>
            <select aria-label="Filter by status">
                <option>All statuses</option>
                <option>Active</option>
                <option>Pending</option>
                <option>Suspended</option>
            </select>
            <select aria-label="Filter by country">
                <option>All countries</option>
                <option>United Kingdom</option>
                <option>Nigeria</option>
                <option>United Arab Emirates</option>
                <option>Singapore</option>
                <option>Ghana</option>
            </select>
        </div>

        <div class="table-wrap">
            <table class="db-table">
                <thead>
                    <tr>
                        <th><input type="checkbox" aria-label="Select all users"></th>
                        <th>Client</th>
                        <th>Account No.</th>
                        <th>Country</th>
                        <th>Balance</th>
                        <th>Status</th>
                        <th>Joined</th>
                        <th style="text-align:right;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @php($users = [
                        ['name' => 'Daniel Owusu', 'email' => 'd.owusu@example.com', 'initials' => 'DO', 'acct' => 'NBB-GB-40218', 'country' => 'Ghana', 'balance' => '£0.00', 'status' => 'pending', 'label' => 'Pending', 'joined' => '11 Aug 2026'],
                        ['name' => 'Fatima Al-Sayed', 'email' => 'f.alsayed@example.com', 'initials' => 'FA', 'acct' => 'NBB-GB-40219', 'country' => 'United Arab Emirates', 'balance' => '£0.00', 'status' => 'pending', 'label' => 'Pending', 'joined' => '11 Aug 2026'],
                        ['name' => 'Amara Chukwu', 'email' => 'amara.c@example.com', 'initials' => 'AC', 'acct' => 'NBB-GB-38820', 'country' => 'Nigeria', 'balance' => '£24,650.00', 'status' => 'active', 'label' => 'Active', 'joined' => '02 Feb 2025'],
                        ['name' => 'James Whitfield', 'email' => 'j.whitfield@example.com', 'initials' => 'JW', 'acct' => 'NBB-GB-38712', 'country' => 'United Kingdom', 'balance' => '£118,204.50', 'status' => 'active', 'label' => 'Active', 'joined' => '19 Nov 2024'],
                        ['name' => 'Priya Nair', 'email' => 'priya.nair@example.com', 'initials' => 'PN', 'acct' => 'NBB-GB-39044', 'country' => 'Singapore', 'balance' => '£6,410.00', 'status' => 'active', 'label' => 'Active', 'joined' => '30 Mar 2025'],
                        ['name' => 'Olumide Bakare', 'email' => 'o.bakare@example.com', 'initials' => 'OB', 'acct' => 'NBB-GB-37905', 'country' => 'Nigeria', 'balance' => '£1,220.00', 'status' => 'suspended', 'label' => 'Suspended', 'joined' => '14 Jul 2024'],
                        ['name' => 'Chen Wei', 'email' => 'chen.wei@example.com', 'initials' => 'CW', 'acct' => 'NBB-GB-40221', 'country' => 'Singapore', 'balance' => '£0.00', 'status' => 'pending', 'label' => 'Pending', 'joined' => '10 Aug 2026'],
                    ])
                    @foreach($users as $u)
                        <tr data-row>
                            <td><input type="checkbox" aria-label="Select {{ $u['name'] }}"></td>
                            <td>
                                <div class="cell-user">
                                    <span class="avatar">{{ $u['initials'] }}</span>
                                    <div class="cell-user__meta">
                                        <strong>{{ $u['name'] }}</strong>
                                        <span>{{ $u['email'] }}</span>
                                    </div>
                                </div>
                            </td>
                            <td class="cell-mono">{{ $u['acct'] }}</td>
                            <td>{{ $u['country'] }}</td>
                            <td class="cell-mono">{{ $u['balance'] }}</td>
                            <td><span class="status-pill status-pill--{{ $u['status'] }}">{{ $u['label'] }}</span></td>
                            <td>{{ $u['joined'] }}</td>
                            <td>
                                <div class="row-actions">
                                    @if($u['status'] === 'pending')
                                        <button class="icon-btn approve" aria-label="Approve {{ $u['name'] }}"
                                            data-confirm
                                            data-confirm-title="Approve this client?"
                                            data-confirm-body="<strong>{{ $u['name'] }}</strong> ({{ $u['email'] }}) will be granted an active Nbb Trust Kapital account."
                                            data-confirm-label="Approve"
                                            data-confirm-style="primary"
                                            data-success-message="{{ $u['name'] }} approved.">
                                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 12l6 6L20 6"/></svg>
                                        </button>
                                    @endif

                                    @if($u['status'] === 'active')
                                        <button class="icon-btn suspend" aria-label="Suspend {{ $u['name'] }}"
                                            data-confirm
                                            data-confirm-title="Suspend this account?"
                                            data-confirm-body="<strong>{{ $u['name'] }}</strong> will lose access to online banking and card transactions until reinstated. This does not delete the account."
                                            data-confirm-label="Suspend account"
                                            data-confirm-style="danger"
                                            data-success-message="{{ $u['name'] }}'s account suspended.">
                                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="9"/><path d="M9 9l6 6M15 9l-6 6"/></svg>
                                        </button>
                                    @endif

                                    @if($u['status'] === 'suspended')
                                        <button class="icon-btn approve" aria-label="Reinstate {{ $u['name'] }}"
                                            data-confirm
                                            data-confirm-title="Reinstate this account?"
                                            data-confirm-body="<strong>{{ $u['name'] }}</strong> will regain full access to their account."
                                            data-confirm-label="Reinstate"
                                            data-confirm-style="primary"
                                            data-success-message="{{ $u['name'] }}'s account reinstated.">
                                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4v6h6M20 20v-6h-6"/><path d="M5.5 15a7 7 0 0012.6 2.5M18.5 9A7 7 0 005.9 6.5"/></svg>
                                        </button>
                                    @endif

                                    <button class="icon-btn remove" aria-label="Remove {{ $u['name'] }}"
                                        data-confirm
                                        data-confirm-title="Remove this client permanently?"
                                        data-confirm-body="This will permanently close <strong>{{ $u['name'] }}'s</strong> account and remove their access. This action cannot be undone &mdash; make sure any remaining balance has been settled first."
                                        data-confirm-label="Remove permanently"
                                        data-confirm-style="danger"
                                        data-success-message="{{ $u['name'] }}'s account removed.">
                                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 7h16M9 7V5a1 1 0 011-1h4a1 1 0 011 1v2m-8 0l1 12a1 1 0 001 1h6a1 1 0 001-1l1-12"/></svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="table-pagination">
            <span>Showing 1&ndash;7 of 8,241 clients</span>
            <div class="table-pagination__pages">
                <a href="#" aria-current="page">1</a>
                <a href="#">2</a>
                <a href="#">3</a>
                <span>&hellip;</span>
                <a href="#">412</a>
            </div>
        </div>
    </div>

@endsection
