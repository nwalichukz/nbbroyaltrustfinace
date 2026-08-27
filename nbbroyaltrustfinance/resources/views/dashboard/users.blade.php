@extends('layouts.dashboard')

@php($activeNav = 'users')
@section('title', 'Users | Nbb Trust Kapital Admin')

@section('content')

    <div class="db-page-head">
        <div>
            <div class="breadcrumb"><a href="{{ url('/dashboard') }}">Admin</a> <span>/</span> <span>Clients</span></div>
            <h1>Users</h1>
            <p class="lede">A quick view of all client accounts.</p>
        </div>
    </div>

    <div class="db-card" style="padding:0;">
        <div class="table-wrap">
            <table class="db-table">
                <thead>
                    <tr>
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
                        <tr>
                            <td>
                                <div class="cell-user">
                                    @if(!empty($u->avatar))
                                        <img src="{{ asset('images/avatar/'.$u->avatar) }}" alt="{{ $u->name }}" class="avatar" style="object-fit: cover;">
                                    @else
                                        <span class="avatar">{{ strtoupper(substr($u->name, 0, 2)) }}</span>
                                    @endif
                                    <div class="cell-user__meta">
                                        <strong>{{ $u->name }}</strong>
                                        <span>{{ $u->email }}</span>
                                    </div>
                                </div>
                            </td>
                            <td class="cell-mono">{{ $u->userwallet->wallet_no ?? '—' }}</td>
                            <td>{{ $u->country }}</td>
                            <td class="cell-mono">{{ $u->userwallet->balance ?? '0.00' }}</td>
                            <td><span class="status-pill status-pill--{{ $u->status }}">{{ $u->status }}</span></td>
                            <td>{{ $u->created_at->format('d M Y') }}</td>
                            <td style="text-align:right;">
                                <div class="row-dropdown">
                                    <button type="button" class="icon-btn row-dropdown__toggle" aria-haspopup="true" aria-expanded="false" aria-label="Actions for {{ $u->name }}">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="1"/><circle cx="12" cy="5" r="1"/><circle cx="12" cy="19" r="1"/></svg>
                                    </button>
                                    <div class="row-dropdown__menu">
                                        <a href="{{ url('/dashboard/users/' . $u->id . '/edit') }}" class="row-dropdown__item">Edit account</a>
                                        <a href="{{ url('/admin/update-img/'.$u->id) }}" class="row-dropdown__item">Edit Image</a>
                                        @if(Auth::user()->external_transfer_status == 'active')
                                        <a href="{{ url('/admin/make-active-external-transfer/'.$u->id.'/block') }}" class="row-dropdown__item">Stop External transfer</a>
                                        @else
                                         <a href="{{ url('/admin/make-active-external-transfer/'.$u->id.'/active') }}" class="row-dropdown__item">Activate External transfer</a>
                                        @endif
                                        <a href="{{ url('/admin/fund-user/' . $u->id) }}" class="row-dropdown__item">Fund account</a>
                                        <div class="row-dropdown__divider"></div>
                                        <a href="{{ url('/dashboard/users/' . $u->id . '/delete') }}" class="row-dropdown__item row-dropdown__item--danger"
                                            data-confirm data-confirm-title="Remove client permanently?" data-confirm-body="This will permanently close <strong>{{ $u->name }}'s</strong> account." data-confirm-label="Remove permanently" data-confirm-style="danger">
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
    </div>

@endsection

@push('styles')
<style>
.row-dropdown { position: relative; display: inline-block; }
.row-dropdown__menu {
    position: absolute;
    right: 0;
    top: calc(100% + 4px);
    z-index: 1000;
    display: none;
    min-width: 180px;
    background: #fff;
    border: 1px solid var(--color-line, #e2e8f0);
    box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1);
    border-radius: 6px;
    padding: 0.4rem 0;
    text-align: left;
}
.row-dropdown__menu.is-open { display: block; }
.row-dropdown__item {
    display: block;
    padding: 0.5rem 1rem;
    color: #1e293b;
    text-decoration: none;
    font-size: 0.875rem;
    white-space: nowrap;
}
.row-dropdown__item:hover { background: #f8fafc; }
.row-dropdown__item--danger { color: #dc2626; }
.row-dropdown__divider { height: 1px; background: var(--color-line, #e2e8f0); margin: 0.25rem 0; }
.cell-user img.avatar {
    width: 36px;
    height: 36px;
    border-radius: 50%;
    object-fit: cover;
}
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    document.addEventListener('click', function (e) {
        const toggle = e.target.closest('.row-dropdown__toggle');

        // close every open menu that isn't the one being toggled right now
        document.querySelectorAll('.row-dropdown__menu.is-open').forEach(function (menu) {
            const owner = menu.closest('.row-dropdown').querySelector('.row-dropdown__toggle');
            if (!toggle || owner !== toggle) {
                menu.classList.remove('is-open');
                owner.setAttribute('aria-expanded', 'false');
            }
        });

        if (toggle) {
            e.preventDefault();
            e.stopPropagation();
            const menu = toggle.parentElement.querySelector('.row-dropdown__menu');
            const isOpen = menu.classList.toggle('is-open');
            toggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
        }
    });

    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape') {
            document.querySelectorAll('.row-dropdown__menu.is-open').forEach(function (menu) {
                menu.classList.remove('is-open');
            });
        }
    });
});
</script>
@endpush