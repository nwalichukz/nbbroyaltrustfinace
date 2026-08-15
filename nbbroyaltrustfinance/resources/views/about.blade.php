@extends('layouts.app')

@section('title', 'About Us | Nbb Trust Kapital')
@section('meta_description', 'Learn about Nbb Trust Kapital, a UK-based international finance institution, and explore our services, governance and support resources.')

@section('content')

    <section class="page-banner">
        <div class="container">
            <div class="breadcrumb"><a href="{{ url('/') }}">Home</a> <span>/</span> <span>About</span></div>
            <span class="u-eyebrow">About Nbb Trust Kapital</span>
            <h1>An international institution, built from a UK foundation of trust</h1>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="prose">
                <p>
                    Nbb Trust Kapital was founded to serve individuals, families, corporations and institutions
                    that operate across borders and expect their financial partner to do the same. Headquartered
                    in the United Kingdom, we combine UK regulatory discipline with regional expertise across
                    Europe, the Middle East, Africa, Asia-Pacific and the Americas.
                </p>
                <p>
                    Every client relationship is built around a named relationship manager, transparent reporting,
                    and governance processes designed to protect capital as much as to grow it.
                </p>
            </div>
        </div>
    </section>

    {{-- =========================================================
         Services
         ========================================================= --}}
    <section class="section section--paper" id="services">
        <div class="container">
            <div class="section-head">
                <span class="u-eyebrow">Services</span>
                <h2>What we offer</h2>
                <p>From individual private clients to multinational institutions, every service is built around governance, discretion and long-term stewardship of capital.</p>
            </div>

            <div class="grid grid--services">
                <article class="service-card">
                    <span class="service-card__icon" aria-hidden="true">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M12 3l8 4v5c0 5-3.5 8-8 9-4.5-1-8-4-8-9V7l8-4z"/></svg>
                    </span>
                    <h3>Private Banking</h3>
                    <p>Dedicated relationship managers, multi-currency accounts and bespoke lending for individuals and families.</p>
                    <a href="{{ url('/private-banking') }}" class="btn btn--ghost">Learn more</a>
                </article>

                <article class="service-card">
                    <span class="service-card__icon" aria-hidden="true">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M2 12h20M12 2c2.5 3 4 7 4 10s-1.5 7-4 10c-2.5-3-4-7-4-10s1.5-7 4-10z"/></svg>
                    </span>
                    <h3>International Payments</h3>
                    <p>Same-day international transfers, FX risk management and multi-market settlement.</p>
                    <a href="{{ url('/international-payments') }}" class="btn btn--ghost">Learn more</a>
                </article>

                <article class="service-card">
                    <span class="service-card__icon" aria-hidden="true">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M3 21h18M5 21V9l7-5 7 5v12M9 21v-6h6v6"/></svg>
                    </span>
                    <h3>Corporate &amp; Institutional</h3>
                    <p>Treasury, trade finance and cross-border banking infrastructure for businesses and institutions.</p>
                    <a href="{{ url('/corporate-institutional') }}" class="btn btn--ghost">Learn more</a>
                </article>

                <article class="service-card">
                    <span class="service-card__icon" aria-hidden="true">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M4 19V9M10 19V5M16 19v-7M4 19h16"/></svg>
                    </span>
                    <h3>Wealth Management</h3>
                    <p>Discretionary and advisory portfolios, succession planning and access to global investment desks.</p>
                    <a href="{{ url('/wealth-management') }}" class="btn btn--ghost">Learn more</a>
                </article>
            </div>
        </div>
    </section>

    {{-- =========================================================
         Institution
         ========================================================= --}}
    <section class="section" id="institution">
        <div class="container">
            <div class="section-head">
                <span class="u-eyebrow">Institution</span>
                <h2>How we're governed</h2>
                <p>Transparency and accountability sit behind everything we do — from regulatory compliance to how we grow our team.</p>
            </div>

            <div class="grid grid--3col">
                <article class="service-card">
                    <span class="service-card__icon" aria-hidden="true">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M12 2l8 4v6c0 5-3.5 8.5-8 10-4.5-1.5-8-5-8-10V6l8-4z"/></svg>
                    </span>
                    <h3>Governance &amp; Compliance</h3>
                    <p>Our regulatory framework, board oversight and approach to risk management.</p>
                    <a href="{{ url('/governance') }}" class="btn btn--ghost">Learn more</a>
                </article>

                <article class="service-card">
                    <span class="service-card__icon" aria-hidden="true">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M4 19V9M10 19V5M16 19v-7M4 19h16"/></svg>
                    </span>
                    <h3>Insights &amp; Research</h3>
                    <p>Perspective on markets, regulation and international finance from our teams.</p>
                    <a href="{{ url('/insights') }}" class="btn btn--ghost">Learn more</a>
                </article>

                <article class="service-card">
                    <span class="service-card__icon" aria-hidden="true">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M4 12l6 6L20 6"/></svg>
                    </span>
                    <h3>Careers</h3>
                    <p>Open roles across our London headquarters and regional desks worldwide.</p>
                    <a href="{{ url('/careers') }}" class="btn btn--ghost">Learn more</a>
                </article>
            </div>
        </div>
    </section>

    {{-- =========================================================
         Support
         ========================================================= --}}
    <section class="section section--paper" id="support">
        <div class="container">
            <div class="section-head">
                <span class="u-eyebrow">Support</span>
                <h2>Here to help</h2>
                <p>Resources for existing and prospective clients, in one place.</p>
            </div>

            <div class="grid grid--3col">
                <article class="service-card">
                    <span class="service-card__icon" aria-hidden="true">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="4" y="10" width="16" height="10" rx="2"/><path d="M8 10V7a4 4 0 018 0v3"/></svg>
                    </span>
                    <h3>Security Centre</h3>
                    <p>How we protect your accounts, and what to do if something looks wrong.</p>
                    <a href="{{ url('/security') }}" class="btn btn--ghost">Learn more</a>
                </article>

                <article class="service-card">
                    <span class="service-card__icon" aria-hidden="true">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><circle cx="12" cy="12" r="9"/><path d="M9.5 9a2.5 2.5 0 015 0c0 1.7-2.5 2-2.5 3.5M12 17h.01"/></svg>
                    </span>
                    <h3>FAQs</h3>
                    <p>Answers to common questions about accounts, payments and onboarding.</p>
                    <a href="{{ url('/faqs') }}" class="btn btn--ghost">Learn more</a>
                </article>

                <article class="service-card">
                    <span class="service-card__icon" aria-hidden="true">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M4 7h16M4 12h10M4 17h16"/></svg>
                    </span>
                    <h3>Complaints Procedure</h3>
                    <p>How to raise a concern, and what to expect from our resolution process.</p>
                    <a href="{{ url('/complaints') }}" class="btn btn--ghost">Learn more</a>
                </article>
            </div>
        </div>
    </section>

@endsection
