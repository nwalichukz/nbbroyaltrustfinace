@extends('layouts.app')

@section('title', 'Contact Us | Nbb Trust Kapital')
@section('meta_description', 'Get in touch with Nbb Trust Kapital. Speak to a private banker, find our offices, or send us a message.')

@section('content')

    <section class="page-banner">
        <div class="container">
            <div class="breadcrumb"><a href="{{ url('/') }}">Home</a> <span>/</span> <span>Contact</span></div>
            <span class="u-eyebrow">Get in touch</span>
            <h1>We're here to help, wherever you are</h1>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="contact-grid">

                <div style="display:flex; flex-direction:column; gap:1.1rem;">
                    <div class="contact-info-card">
                        <span class="contact-info-card__icon"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M22 16.9v3a2 2 0 01-2.2 2 19.8 19.8 0 01-8.6-3 19.5 19.5 0 01-6-6 19.8 19.8 0 01-3-8.7A2 2 0 014.1 2h3a2 2 0 012 1.7c.1 1 .3 2 .7 3a2 2 0 01-.4 2.1L8 10.3a16 16 0 006 6l1.5-1.4a2 2 0 012.1-.4c1 .4 2 .6 3 .7a2 2 0 011.7 2z"/></svg></span>
                        <div>
                            <h3>Reach us</h3>
                            <p><a href="tel:+442012345678"> +44</a><br>Mon&ndash;Fri, 8am&ndash;7pm GMT</p>
                        </div>
                    </div>

                    <div class="contact-info-card">
                        <span class="contact-info-card__icon"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="3" y="5" width="18" height="14" rx="2"/><path d="M3 7l9 6 9-6"/></svg></span>
                        <div>
                            <h3>Email us</h3>
                            <p><a href="mailto:enquiries@nbbtrustkapital.com">nbbtrustkapital@gmail.com</a><br>We reply within one business day.</p>
                        </div>
                    </div>

                    <div class="contact-info-card">
                        <span class="contact-info-card__icon"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M12 21s7-6.5 7-11.5a7 7 0 10-14 0C5 14.5 12 21 12 21z"/><circle cx="12" cy="9.5" r="2.4"/></svg></span>
                        <div>
                            <h3>Head office</h3>
                            <p>[Registered Address]<br>London, United Kingdom</p>
                        </div>
                    </div>

                    <div class="contact-info-card">
                        <span class="contact-info-card__icon"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 3"/></svg></span>
                        <div>
                            <h3>Client support hours</h3>
                            <p>24/7 for existing clients via secure messaging in online banking.</p>
                        </div>
                    </div>
                </div>

                <div class="auth-card" style="align-self:start;">
                    <div class="auth-card__head">
                        <span class="u-eyebrow">Send a message</span>
                        <h1 style="margin-top:0.6rem; font-size:var(--step-2);">Speak to a private banker</h1>
                        <p>Tell us a little about what you need and a relationship manager will respond directly.</p>
                    </div>

                    <form action="{{ url('post-support') }}" method="POST" novalidate>
                        @csrf

                        <div class="form-row form-row--2">
                            <div class="form-field">
                                <label for="contact-name">Full name</label>
                                <input type="text" id="contact-name" name="name" placeholder="Your name" autocomplete="name" required>
                            </div>
                            <div class="form-field">
                                <label for="contact-email">Email address</label>
                                <input type="email" id="contact-email" name="email" placeholder="you@example.com" autocomplete="email" required>
                            </div>
                        </div>

                        <div class="form-field">
                            <label for="contact-topic">Subject</label>
                           <input type="email" id="contact-email" name="subject" placeholder="Complaint" autocomplete="email" required>
                            </div>
                        </div>

                        <div class="form-field">
                            <label for="contact-message">Message</label>
                            <textarea id="contact-message" name="content" rows="5" placeholder="Tell us a little about your enquiry&hellip;" required></textarea>
                        </div>

                        <div class="form-check">
                            <input type="checkbox" id="contact-privacy" name="privacy_ack" required>
                            <label for="contact-privacy">I agree to Nbb Trust Kapital's <a href="{{ url('/privacy-policy') }}">Privacy Policy</a>.</label>
                        </div>

                        <button type="submit" class="btn btn--primary btn--block">Send Message</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection
