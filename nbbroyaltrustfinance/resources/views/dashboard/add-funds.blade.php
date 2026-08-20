@extends('layouts.dashboard')

@php($activeNav = 'add-funds')
@section('title', 'Add Funds | Nbb Trust Kapital Admin')

@section('content')

    <div class="db-page-head">
        <div>
            <div class="breadcrumb"><a href="{{ url('/admin/dashboard') }}">Admin</a> <span>/</span> <span>Transactions</span> <span>/</span> <span>Add Funds</span></div>
            <h1>Add Funds to a Client Account</h1>
            <p class="lede">Credit a client account directly. All fund additions are logged against your admin ID and routed through dual approval before settlement.</p>
        </div>
    </div>

    <div class="alert alert--info" style="margin-bottom:1.4rem;">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" style="flex:none;"><circle cx="12" cy="12" r="9"/><path d="M12 8h.01M11 12h1v5h1"/></svg>
        <span>Transactions above £10,000 require secondary sign-off from a second compliance officer before funds are released.</span>
    </div>

    <form class="db-form-grid db-form-grid--split" id="add-funds-for" method="POST" action="{{ url('/admin/fund-account') }}">
        @csrf

        <div class="db-card">
            <div class="db-card__head">
                <div>
                    <span class="u-eyebrow">Step 1</span>
                    <h2 style="margin-top:0.4rem;">Select client &amp; amount</h2>
                </div>
            </div>

            <div class="db-form-grid">
                <div class="field-row field-row--2">
                    <div class="field field--amount">
                        <label for="af-amount">Amount to add</label>
                        <span class="currency-prefix">$</span>
                        <input type="number" id="af-amount" name="amount" min="0"  placeholder="0.00" required>
                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                    </div>
                </div>

                <div class="field">
                    <label for="af-reference">Internal reference / notes</label>
                    <textarea id="af-reference" rows="3" placeholder="e.g. Funding of account" name="purpose"></textarea>
                    <span class="hint">Visible to compliance only &mdash; not shown to the client.</span>
                </div>
            </div>

            <div style="display:flex; gap:0.8rem; margin-top:1.6rem; flex-wrap:wrap;">
                <button type="submit" class="btn btn--primary">Add Fund</button>

                <button type="button" class="btn btn--outline-dark">Cancel</button>
            </div>
        </div>
    </form>

@endsection