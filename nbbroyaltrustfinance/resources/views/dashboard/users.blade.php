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
            <a href="{{ url('/dashboard/add-funds') }}" class="btn btn--primary">Add Funds</a>
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
                    
                    @foreach($users as $u)
                        <tr data-row>
                            <td><input type="checkbox" aria-label="Select {{ $u['name'] }}"></td>
                            <td>
                                <div class="cell-user">
                                    <span class="avatar">{{ strtoupper(substr($u->name, 0, 2))}}

                                    </span>
                                    <div class="cell-user__meta">
                                        <strong>{{ $u['name'] }}</strong>
                                        <span>{{ $u['email'] }}</span>
                                    </div>
                                </div>
                            </td>
                            <td class="cell-mono">{{ $u->userwallet->wallet_no}}</td>
                            <td>{{ $u['country'] }}</td>
                            <td class="cell-mono">{{ $u->userwallet->balance }}</td>
                            <td><span class="status-pill status-pill--{{ $u['status'] }}">{{ $u->status }}</span></td>
                            <td>{{ $u->created_at }}</td>
                            <td style="text-align:right;">
                                <!-- Dropdown Menu Container -->
                                <div class="dropdown" style="position: relative; display: inline-block;">
                                    <button class="icon-btn" type="button" data-bs-toggle="dropdown" aria-expanded="false" aria-label="Actions for {{ $u['name'] }}">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="1"/><circle cx="12" cy="5" r="1"/><circle cx="12" cy="19" r="1"/></svg>
                                    </button>
                                    
                                    <div class="dropdown-menu dropdown-menu-end" style="position: absolute; right: 0; z-index: 1000; display: none; background: #fff; border: 1px solid #e2e8f0; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1); border-radius: 6px; padding: 0.5rem 0; min-width: 180px; text-align: left;">
                                        
                                        <!-- Fund Account -->
                                        <a class="dropdown-item" href="{{ url('/dashboard/users/' . $u['id'] . '/fund') }}" style="display: block; padding: 0.5rem 1rem; color: #1e293b; text-decoration: none; font-size: 0.875rem;">
                                            Fund account
                                        </a>

                                        <!-- Suspend / Reinstate -->
                                        @if($u['status'] === 'active')
                                            <a class="dropdown-item" href="{{ url('/dashboard/users/' . $u['id'] . '/suspend') }}" style="display: block; padding: 0.5rem 1rem; color: #d97706; text-decoration: none; font-size: 0.875rem;"
                                                data-confirm data-confirm-title="Suspend this account?" data-confirm-body="<strong>{{ $u['name'] }}</strong> will lose access to online banking." data-confirm-label="Suspend" data-confirm-style="danger">
                                                Suspend account
                                            </a>
                                        @elseif($u['status'] === 'suspended')
                                            <a class="dropdown-item" href="{{ url('/dashboard/users/' . $u['id'] . '/reinstate') }}" style="display: block; padding: 0.5rem 1rem; color: #059669; text-decoration: none; font-size: 0.875rem;">
                                                Reinstate account
                                            </a>
                                        @endif

                                        <!-- Stop External Transfer -->
                                        <a class="dropdown-item" href="{{ url('/dashboard/users/' . $u['id'] . '/stop-transfer') }}" style="display: block; padding: 0.5rem 1rem; color: #d97706; text-decoration: none; font-size: 0.875rem;">
                                            Stop external transfer
                                        </a>

                                        <div style="height: 1px; background: #e2e8f0; margin: 0.25rem 0;"></div>

                                        <!-- Delete Account -->
                                        <a class="dropdown-item text-danger" href="{{ url('/dashboard/users/' . $u['id'] . '/delete') }}" style="display: block; padding: 0.5rem 1rem; color: #dc2626; text-decoration: none; font-size: 0.875rem;"
                                            data-confirm data-confirm-title="Remove client permanently?" data-confirm-body="This will permanently close <strong>{{ $u['name'] }}'s</strong> account." data-confirm-label="Remove permanently" data-confirm-style="danger">
                                            Delete account
                                        </a>
                                    </div>
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