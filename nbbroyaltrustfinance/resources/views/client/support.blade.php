@extends('layouts.client')

@php($activeNav = 'support')
@section('title', 'Help Centre | Nbb Trust Kapital')

@push('styles')
<style>
    :root {
        --color-brand: #081C33;
        --color-brand-hover: #0b2545;
        --color-brand-subtle: #f0f4f8;
        --color-border: #e2e8f0;
        --color-ink: #0f172a;
        --color-ink-soft: #64748b;
        --color-surface: #ffffff;
    }

    .help-hero-card {
        background: linear-gradient(135deg, var(--color-brand) 0%, #1e3a8a 100%);
        color: #ffffff;
        padding: 2.5rem 2rem;
        border-radius: 12px;
        margin-bottom: 2rem;
        text-align: center;
    }

    .help-hero-card h2 {
        font-size: 1.75rem;
        margin-bottom: 0.5rem;
        color: #ffffff;
    }

    .help-hero-card p {
        color: #94a3b8;
        margin-bottom: 1.5rem;
    }

    .help-search-box {
        max-width: 540px;
        margin: 0 auto;
        position: relative;
    }

    .help-search-box input {
        width: 100%;
        padding: 0.875rem 1rem 0.875rem 3rem;
        border-radius: 8px;
        border: 1px solid rgba(255, 255, 255, 0.2);
        background: rgba(255, 255, 255, 0.1);
        color: #ffffff;
        font-size: 0.95rem;
        outline: none;
        backdrop-filter: blur(4px);
    }

    .help-search-box input::placeholder {
        color: #94a3b8;
    }

    .help-search-box svg {
        position: absolute;
        left: 1rem;
        top: 50%;
        transform: translateY(-50%);
        color: #94a3b8;
    }

    .faq-categories-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        gap: 1.25rem;
        margin-bottom: 2rem;
    }

    .faq-category-card {
        background: var(--color-surface);
        border: 1px solid var(--color-border);
        border-radius: 10px;
        padding: 1.5rem;
        cursor: pointer;
        transition: all 0.2s ease;
    }

    .faq-category-card:hover, .faq-category-card.active {
        border-color: var(--color-brand);
        box-shadow: 0 4px 12px rgba(8, 28, 51, 0.05);
    }

    .faq-category-card .icon-wrapper {
        width: 42px;
        height: 42px;
        border-radius: 8px;
        background: var(--color-brand-subtle);
        color: var(--color-brand);
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 1rem;
    }

    .faq-category-card h3 {
        font-size: 1.05rem;
        margin-bottom: 0.25rem;
        color: var(--color-ink);
    }

    .faq-category-card p {
        font-size: 0.85rem;
        color: var(--color-ink-soft);
        margin: 0;
    }

    .faq-section {
        margin-bottom: 2.5rem;
    }

    .faq-accordion {
        background: var(--color-surface);
        border: 1px solid var(--color-border);
        border-radius: 10px;
        overflow: hidden;
    }

    .accordion-item {
        border-bottom: 1px solid var(--color-border);
    }

    .accordion-item:last-child {
        border-bottom: none;
    }

    .accordion-header {
        width: 100%;
        padding: 1.25rem 1.5rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
        background: none;
        border: none;
        text-align: left;
        font-size: 0.975rem;
        font-weight: 600;
        color: var(--color-ink);
        cursor: pointer;
    }

    .accordion-header:hover {
        background: var(--color-brand-subtle);
    }

    .accordion-body {
        padding: 0 1.5rem 1.25rem 1.5rem;
        color: var(--color-ink-soft);
        font-size: 0.9rem;
        line-height: 1.6;
    }

    .support-contact-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 1.5rem;
    }

    .contact-card {
        background: var(--color-surface);
        border: 1px solid var(--color-border);
        border-radius: 10px;
        padding: 1.5rem;
        display: flex;
        align-items: flex-start;
        gap: 1rem;
    }

    .contact-icon {
        width: 48px;
        height: 48px;
        border-radius: 50%;
        background: var(--color-brand-subtle);
        color: var(--color-brand);
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }

    .contact-info h4 {
        margin: 0 0 0.25rem 0;
        font-size: 1rem;
        color: var(--color-ink);
    }

    .contact-info p {
        margin: 0 0 0.75rem 0;
        font-size: 0.85rem;
        color: var(--color-ink-soft);
    }

    .contact-info a {
        color: var(--color-brand);
        font-weight: 600;
        font-size: 0.9rem;
        text-decoration: none;
    }

    .contact-info a:hover {
        text-decoration: underline;
    }
</style>
@endpush

@section('content')
<div class="db-page-head">
    <div>
        <div class="breadcrumb"><a href="{{ url('/client/dashboard') }}">Client Area</a> <span>/</span> <span>Help Centre</span></div>
        <h1>Help Centre</h1>
        <p class="lede">Find answers or get in touch with client support.</p>
    </div>
</div>

<!-- Hero Search Section -->
<div class="help-hero-card">
    <h2>How can we help you today?</h2>
    <p>Search our knowledge base or browse common topics below.</p>
    <div class="help-search-box">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <circle cx="11" cy="11" r="8"></circle>
            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
        </svg>
        <input type="text" placeholder="Search for answers, transfers, security settings...">
    </div>
</div>

<!-- Categories Grid -->
<div class="faq-categories-grid">
    <div class="faq-category-card active">
        <div class="icon-wrapper">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <rect x="2" y="4" width="20" height="16" rx="2"></rect>
                <line x1="2" y1="10" x2="22" y2="10"></line>
            </svg>
        </div>
        <h3>Cards & Accounts</h3>
        <p>Limits, virtual cards, & balances</p>
    </div>

    <div class="faq-category-card">
        <div class="icon-wrapper">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <line x1="22" y1="2" x2="11" y2="13"></line>
                <polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
            </svg>
        </div>
        <h3>Transfers & Wires</h3>
        <p>SWIFT, SEPA, & domestic processing</p>
    </div>

    <div class="faq-category-card">
        <div class="icon-wrapper">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
            </svg>
        </div>
        <h3>Security & Access</h3>
        <p>2FA, passwords, & account protection</p>
    </div>

    <div class="faq-category-card">
        <div class="icon-wrapper">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                <polyline points="14 2 14 8 20 8"></polyline>
                <line x1="16" y1="13" x2="8" y2="13"></line>
                <line x1="16" y1="17" x2="8" y2="17"></line>
            </svg>
        </div>
        <h3>Statements & Tax</h3>
        <p>Exporting reports & monthly statements</p>
    </div>
</div>

<!-- Frequently Asked Questions Accordion -->
<div class="faq-section" x-data="{ openFaq: 1 }">
    <h3 style="font-size: 1.25rem; color: var(--color-ink); margin-bottom: 1rem;">Frequently Asked Questions</h3>
    
    <div class="faq-accordion">
        <div class="accordion-item">
            <button class="accordion-header" @click="openFaq = (openFaq === 1 ? null : 1)">
                <span>How do I freeze or unfreeze my Nbb Trust Kapital card?</span>
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" :style="openFaq === 1 ? 'transform: rotate(180deg)' : ''" style="transition: transform 0.2s;">
                    <polyline points="6 9 12 15 18 9"></polyline>
                </svg>
            </button>
            <div class="accordion-body" x-show="openFaq === 1" x-cloak>
                You can temporarily freeze or unfreeze your debit or virtual card instantly via the <strong>My Cards</strong> section in your dashboard. Freezing blocks all new authorizations while leaving recurring subscriptions unaffected depending on your security rules.
            </div>
        </div>

        <div class="accordion-item">
            <button class="accordion-header" @click="openFaq = (openFaq === 2 ? null : 2)">
                <span>What are the processing times for international wire transfers?</span>
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" :style="openFaq === 2 ? 'transform: rotate(180deg)' : ''" style="transition: transform 0.2s;">
                    <polyline points="6 9 12 15 18 9"></polyline>
                </svg>
            </button>
            <div class="accordion-body" x-show="openFaq === 2" x-cloak>
                Outbound SWIFT transfers typically take 1 to 3 business days to settle depending on the recipient bank and intermediary routing. Domestic wire transfers processed before 4:00 PM EST usually clear on the same business day.
            </div>
        </div>

        <div class="accordion-item">
            <button class="accordion-header" @click="openFaq = (openFaq === 3 ? null : 3)">
                <span>How do I reset my two-factor authentication (2FA)?</span>
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" :style="openFaq === 3 ? 'transform: rotate(180deg)' : ''" style="transition: transform 0.2s;">
                    <polyline points="6 9 12 15 18 9"></polyline>
                </svg>
            </button>
            <div class="accordion-body" x-show="openFaq === 3" x-cloak>
                If you have lost access to your authenticator application, use one of your backup emergency codes provided during initial setup. If you do not have emergency codes, please contact client support directly for manual identity verification.
            </div>
        </div>

        <div class="accordion-item">
            <button class="accordion-header" @click="openFaq = (openFaq === 4 ? null : 4)">
                <span>Where can I download my official monthly account statements?</span>
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" :style="openFaq === 4 ? 'transform: rotate(180deg)' : ''" style="transition: transform 0.2s;">
                    <polyline points="6 9 12 15 18 9"></polyline>
                </svg>
            </button>
            <div class="accordion-body" x-show="openFaq === 4" x-cloak>
                Account statements can be downloaded in PDF or CSV formats directly from the <strong>Statements & Reports</strong> page. Statements for previous months are generated on the 1st day of every month.
            </div>
        </div>
    </div>
</div>

<!-- Support Channels -->
<div class="faq-section">
    <h3 style="font-size: 1.25rem; color: var(--color-ink); margin-bottom: 1rem;">Still need assistance?</h3>
    <div class="support-contact-grid">
        <div class="contact-card">
            <div class="contact-icon">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                </svg>
            </div>
            <div class="contact-info">
                <h4>Live Chat Support</h4>
                <p>Chat directly with a client specialist during market hours.</p>
                <a href="#">Start Live Chat &rarr;</a>
            </div>
        </div>

        <div class="contact-card">
            <div class="contact-icon">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                    <polyline points="22,6 12,13 2,6"></polyline>
                </svg>
            </div>
            <div class="contact-info">
                <h4>Email Support</h4>
                <p>Send a ticket to support@nbbtrustkapital.com</p>
                <a href="mailto:support@nbbtrustkapital.com">Submit a Ticket &rarr;</a>
            </div>
        </div>
    </div>
</div>
@endsection