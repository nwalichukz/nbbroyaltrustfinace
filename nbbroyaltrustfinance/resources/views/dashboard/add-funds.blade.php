@extends('layouts.dashboard')

@php($activeNav = 'add-funds')
@section('title', 'Add Funds | Nbb Trust Kapital Admin')

@section('content')

    <div class="db-page-head">
        <div>
            <div class="breadcrumb"><a href="{{ url('/dashboard') }}">Admin</a> <span>/</span> <span>Transactions</span> <span>/</span> <span>Add Funds</span></div>
            <h1>Add Funds to a Client Account</h1>
            <p class="lede">Credit a client account directly. All fund additions are logged against your admin ID and routed through dual approval before settlement.</p>
        </div>
    </div>

    <div class="alert alert--info" style="margin-bottom:1.4rem;">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" style="flex:none;"><circle cx="12" cy="12" r="9"/><path d="M12 8h.01M11 12h1v5h1"/></svg>
        <span>Transactions above £10,000 require secondary sign-off from a second compliance officer before funds are released.</span>
    </div>

    <form class="db-form-grid db-form-grid--split" id="add-funds-form">

        {{-- ---------- Form ---------- --}}
        <div class="db-card">
            <div class="db-card__head">
                <div>
                    <span class="u-eyebrow">Step 1</span>
                    <h2 style="margin-top:0.4rem;">Select client &amp; amount</h2>
                </div>
            </div>

            <div class="db-form-grid">
                <div class="field">
                    <label for="af-client">Client account</label>
                    <select id="af-client" required>
                        <option value="" data-balance="0">Search or select a client&hellip;</option>
                        <option value="AC" data-balance="24650.00">Amara Chukwu &mdash; NBB-GB-38820 &mdash; Nigeria</option>
                        <option value="JW" data-balance="118204.50">James Whitfield &mdash; NBB-GB-38712 &mdash; United Kingdom</option>
                        <option value="PN" data-balance="6410.00">Priya Nair &mdash; NBB-GB-39044 &mdash; Singapore</option>
                        <option value="OB" data-balance="1220.00">Olumide Bakare &mdash; NBB-GB-37905 &mdash; Nigeria</option>
                    </select>
                    <span class="hint">Only active, approved accounts can receive funds.</span>
                </div>

                <div class="field-row field-row--2">
                    <div class="field field--amount">
                        <label for="af-amount">Amount to add</label>
                        <span class="currency-prefix">£</span>
                        <input type="number" id="af-amount" min="0" step="0.01" placeholder="0.00" required>
                    </div>
                    <div class="field">
                        <label for="af-currency">Currency</label>
                        <select id="af-currency">
                            <option>GBP &mdash; British Pound</option>
                            <option>USD &mdash; US Dollar</option>
                            <option>EUR &mdash; Euro</option>
                        </select>
                    </div>
                </div>

                <div class="field">
                    <label for="af-reason">Reason for credit</label>
                    <select id="af-reason">
                        <option>Client deposit</option>
                        <option>Correction / reversal</option>
                        <option>Interest payment</option>
                        <option>Goodwill adjustment</option>
                        <option>Other (specify in reference)</option>
                    </select>
                </div>

                <div class="field">
                    <label for="af-reference">Internal reference / notes</label>
                    <textarea id="af-reference" rows="3" placeholder="e.g. Wire receipt WR-88421 confirmed via SWIFT MT103"></textarea>
                    <span class="hint">Visible to compliance only &mdash; not shown to the client.</span>
                </div>
            </div>

            <div style="display:flex; gap:0.8rem; margin-top:1.6rem; flex-wrap:wrap;">
                <button type="submit" class="btn btn--primary">Submit for Approval</button>
                <button type="button" class="btn btn--outline-dark">Cancel</button>
            </div>
        </div>

        {{-- ---------- Summary sidebar ---------- --}}
        <div style="display:flex; flex-direction:column; gap:1.2rem;">
            <div class="summary-card">
                <h3>Transaction preview</h3>
                <div class="summary-row"><span>Current balance</span><span id="af-current-balance">£0.00</span></div>
                <div class="summary-row"><span>Amount to add</span><span id="af-preview-amount">£0.00</span></div>
                <div class="summary-row total"><span>New balance</span><span id="af-preview-balance">£0.00</span></div>
            </div>

            <div class="db-card">
                <div class="db-card__head">
                    <h2>Recent funding history</h2>
                </div>
                <div style="display:flex; flex-direction:column; gap:0.9rem;">
                    <div class="summary-row" style="border-color:var(--color-line); color:var(--color-ink);">
                        <span style="color:var(--color-ink-soft);">Amara Chukwu &middot; 02 Aug</span>
                        <span class="cell-mono">+£3,000.00</span>
                    </div>
                    <div class="summary-row" style="border-color:var(--color-line); color:var(--color-ink);">
                        <span style="color:var(--color-ink-soft);">James Whitfield &middot; 28 Jul</span>
                        <span class="cell-mono">+£15,000.00</span>
                    </div>
                    <div class="summary-row" style="border-color:transparent; color:var(--color-ink);">
                        <span style="color:var(--color-ink-soft);">Priya Nair &middot; 21 Jul</span>
                        <span class="cell-mono">+£860.00</span>
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection
