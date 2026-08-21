@extends('layouts.app')

@section('title', 'Nbb Trust Kapital | International Private Banking & Wealth Management')
@section('meta_description', 'Nbb Trust Kapital is a UK-based international finance institution offering private banking, wealth management, and corporate & institutional banking across five continents.')

@section('content')

    {{-- =========================================================
         Hero
         ========================================================= --}}
    <section class="hero">
        <svg class="hero__watermark" viewBox="0 0 1200 800" preserveAspectRatio="xMidYMid slice" aria-hidden="true">
            <g stroke="#FFFFFF" stroke-width="1" fill="none">
                <circle cx="900" cy="220" r="90"/>
                <circle cx="900" cy="220" r="170"/>
                <circle cx="900" cy="220" r="250"/>
                <circle cx="900" cy="220" r="330"/>
                <line x1="900" y1="-110" x2="900" y2="550"/>
                <line x1="570" y1="220" x2="1230" y2="220"/>
                <path d="M900 -110 C 1060 40, 1060 400, 900 550" />
                <path d="M900 -110 C 740 40, 740 400, 900 550" />
                <path d="M900 -110 C 1160 40, 1160 400, 900 550" />
                <path d="M900 -110 C 640 40, 640 400, 900 550" />
            </g>
        </svg>

        <div class="container hero__grid">
            <div>
                <span class="u-eyebrow hero__eyebrow">UK &middot; Established international institution</span>
                <h1>Private banking built on trust, governed with discretion.</h1>
                <div class="hero__rule"></div>
                <p class="lede">Nbb Trust Kapital serves private individuals, families, corporations and institutions across five continents &mdash; combining UK regulatory standards with genuinely international reach.</p>

                <div class="hero__actions">
                    <a href="{{ url('/register') }}" class="btn btn--primary">Open an Account</a>
                    <a href="{{ url('/contact') }}" class="btn btn--outline-light">Speak to a Private Banker</a>
                </div>

                <div class="hero__meta">
                    <div class="hero__meta-item">
                        <strong>40+</strong>
                        <span>Countries served</span>
                    </div>
                    <div class="hero__meta-item">
                        <strong>5</strong>
                        <span>Continents with regional desks</span>
                    </div>
                    <div class="hero__meta-item">
                        <strong>24/7</strong>
                        <span>Client relationship support</span>
                    </div>
                    <div class="hero__meta-item">
                        <strong>GBP&nbsp;&middot;&nbsp;USD&nbsp;&middot;&nbsp;EUR</strong>
                        <span>Multi-currency accounts</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- =========================================================
         Trust / regulatory strip
         ========================================================= --}}
    <div class="trust-strip">
        <div class="container trust-strip__inner">
            <span class="trust-item">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2l8 4v6c0 5-3.5 8.5-8 10-4.5-1.5-8-5-8-10V6l8-4z"/></svg>
                Authorised &amp; regulated by the FCA
            </span>
            <span class="trust-item">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="7" width="18" height="13" rx="1"/><path d="M8 7V5a4 4 0 018 0v2"/></svg>
                FSCS-eligible deposit protection
            </span>
            <span class="trust-item">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 3"/></svg>
                Registered in England &amp; Wales
            </span>
            <span class="trust-item">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 12l6 6L20 6"/></svg>
                256-bit encrypted client banking
            </span>
        </div>
    </div>

    {{-- =========================================================
         Services
         ========================================================= --}}
    <section class="section section--paper" id="services">
        <div class="container">
            <div class="section-head">
                <span class="u-eyebrow">What we offer</span>
                <h2>Institutional discipline, applied to every relationship</h2>
                <p>From individual private clients to multinational institutions, every service is built around governance, discretion and long-term stewardship of capital.</p>
            </div>

            <div class="grid grid--services">
                <article class="service-card">
                    <span class="service-card__index">01</span>
                    <span class="service-card__icon" aria-hidden="true">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M12 3l8 4v5c0 5-3.5 8-8 9-4.5-1-8-4-8-9V7l8-4z"/></svg>
                    </span>
                    <h3>Private Banking</h3>
                    <p>Dedicated relationship managers, multi-currency accounts and bespoke lending for individuals and families.</p>
                    <a href="{{ url('/private-banking') }}" class="btn btn--ghost">Learn more</a>
                </article>

                <article class="service-card">
                    <span class="service-card__index">02</span>
                    <span class="service-card__icon" aria-hidden="true">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M3 21h18M5 21V9l7-5 7 5v12M9 21v-6h6v6"/></svg>
                    </span>
                    <h3>Corporate &amp; Institutional</h3>
                    <p>Treasury, trade finance and cross-border banking infrastructure for businesses and institutions.</p>
                    <a href="{{ url('/corporate-institutional') }}" class="btn btn--ghost">Learn more</a>
                </article>

                <article class="service-card">
                    <span class="service-card__index">03</span>
                    <span class="service-card__icon" aria-hidden="true">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M4 19V9M10 19V5M16 19v-7M4 19h16"/></svg>
                    </span>
                    <h3>Wealth Management</h3>
                    <p>Discretionary and advisory portfolios, succession planning and access to global investment desks.</p>
                    <a href="{{ url('/wealth-management') }}" class="btn btn--ghost">Learn more</a>
                </article>

                <article class="service-card">
                    <span class="service-card__index">04</span>
                    <span class="service-card__icon" aria-hidden="true">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M2 12h20M12 2c2.5 3 4 7 4 10s-1.5 7-4 10c-2.5-3-4-7-4-10s1.5-7 4-10z"/></svg>
                    </span>
                    <h3>International Payments</h3>
                    <p>Same-day international transfers, FX risk management and multi-market settlement.</p>
                    <a href="{{ url('/international-payments') }}" class="btn btn--ghost">Learn more</a>
                </article>
            </div>
        </div>
    </section>

    {{-- =========================================================
         Why Nbb Trust Kapital — pillars
         ========================================================= --}}
    <section class="section section--navy">
        <div class="container">
            <div class="section-head">
                <span class="u-eyebrow">Why Nbb Trust Kapital</span>
                <h2>Governance you can verify, service you can rely on</h2>
            </div>

            <div class="pillars">
                <div class="pillar">
                    <span class="pillar__num">01</span>
                    <div>
                        <h3>Security</h3>
                        <p>Layered encryption, continuous fraud monitoring and segregated client funds.</p>
                    </div>
                </div>
                <div class="pillar">
                    <span class="pillar__num">02</span>
                    <div>
                        <h3>Global Expertise</h3>
                        <p>Regional desks with on-the-ground knowledge across five continents.</p>
                    </div>
                </div>
                <div class="pillar">
                    <span class="pillar__num">03</span>
                    <div>
                        <h3>Personal Governance</h3>
                        <p>A named relationship manager and clear escalation path for every client.</p>
                    </div>
                </div>
                <div class="pillar">
                    <span class="pillar__num">04</span>
                    <div>
                        <h3>Discretion</h3>
                        <p>Confidentiality built into every process, from onboarding to reporting.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- =========================================================
         Global network
         ========================================================= --}}
    <section class="section">
        <div class="container">
            <div class="section-head">
                <span class="u-eyebrow">Global network</span>
                <h2>Headquartered in the UK. Present where our clients are.</h2>
            </div>

            <div class="region-list">
                <div class="region-row">
                    <span class="region-row__name">Europe</span>
                    <span class="region-row__cities">London &middot; Frankfurt &middot; Zurich</span>
                </div>
                <div class="region-row">
                    <span class="region-row__name">Middle East</span>
                    <span class="region-row__cities">Dubai &middot; Riyadh</span>
                </div>
                <div class="region-row">
                    <span class="region-row__name">Africa</span>
                    <span class="region-row__cities">Lagos &middot; Nairobi &middot; Johannesburg</span>
                </div>
                <div class="region-row">
                    <span class="region-row__name">Asia-Pacific</span>
                    <span class="region-row__cities">Singapore &middot; Hong Kong</span>
                </div>
                <div class="region-row">
                    <span class="region-row__name">Americas</span>
                    <span class="region-row__cities">New York &middot; Toronto</span>
                </div>
            </div>
        </div>
    </section>

    {{-- =========================================================
         Insights teaser
         ========================================================= --}}
    <section class="section section--paper">
        <div class="container">
            <div class="section-head">
                <span class="u-eyebrow">Insights</span>
                <h2>Perspective on markets and international finance</h2>
            </div>

            <div class="grid grid--insights">
                <article class="insight-card">
                    <div class="insight-card__media"><span class="insight-card__tag">Markets</span></div>
                    <div class="insight-card__body">
                        <h3>Navigating currency risk in cross-border trade</h3>
                        <p>A practical framework for corporates managing exposure across multiple markets.</p>
                        <span class="insight-card__meta">5 min read</span>
                    </div>
                </article>
                <article class="insight-card">
                    <div class="insight-card__media"><span class="insight-card__tag">Wealth</span></div>
                    <div class="insight-card__body">
                        <h3>Succession planning for international families</h3>
                        <p>What multi-jurisdiction families should consider when structuring an estate.</p>
                        <span class="insight-card__meta">7 min read</span>
                    </div>
                </article>
                <article class="insight-card">
                    <div class="insight-card__media"><span class="insight-card__tag">Regulation</span></div>
                    <div class="insight-card__body">
                        <h3>What UK regulatory change means for private clients</h3>
                        <p>A plain-English briefing on recent developments and what to expect next.</p>
                        <span class="insight-card__meta">4 min read</span>
                    </div>
                </article>
            </div>
        </div>
    </section>

    {{-- =========================================================
         CTA band
         ========================================================= --}}
    <section class="section">
        <div class="container">
            <div class="cta-band">
                <h2>Ready to begin a private banking relationship?</h2>
                <div class="cta-band__actions">
                    {{--<a href="{{ url('/open-account') }}" class="btn btn--primary">Open an Account</a>--}}
                    <a href="{{ url('/contact') }}" class="btn btn--outline-light">Talk to Us</a>
                </div>
            </div>
        </div>
    </section>
 
@endsection
