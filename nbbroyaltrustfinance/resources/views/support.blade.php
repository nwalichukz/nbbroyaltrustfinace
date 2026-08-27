@extends('layouts.app')

@section('title', 'Support & Enquiries | Nbb Trust Kapital')
@section('meta_description', 'Get in touch with the support team at Nbb Trust Kapital. We are here to assist with your private banking and account enquiries.')

@push('styles')
<style>
    .support-hero {
        background: linear-gradient(135deg, #0B2545 0%, #134074 100%);
        color: #ffffff;
        padding: 4rem 1rem;
        text-align: center;
    }
    .support-hero h1 {
        font-family: 'Source Serif 4', Georgia, serif;
        font-size: 2.25rem;
        margin-bottom: 0.75rem;
    }
    .support-hero p {
        color: #EEF4F8;
        font-size: 1.05rem;
        max-width: 600px;
        margin: 0 auto;
    }

    .support-container {
        max-width: 1100px;
        margin: -2rem auto 4rem;
        padding: 0 1rem;
    }

    .support-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 2rem;
    }

    @media (min-width: 860px) {
        .support-grid {
            grid-template-columns: 2fr 1fr;
        }
    }

    .support-card {
        background: #ffffff;
        border: 1px solid #E2E8F0;
        border-radius: 8px;
        padding: 2rem;
        box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.05);
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-label {
        display: block;
        font-weight: 600;
        font-size: 0.875rem;
        color: #0B2545;
        margin-bottom: 0.5rem;
    }

    .form-label span {
        color: #E53E3E;
    }

    .form-control {
        width: 100%;
        padding: 0.75rem 1rem;
        font-family: inherit;
        font-size: 0.95rem;
        border: 1px solid #CBD5E1;
        border-radius: 6px;
        background-color: #F8FAFC;
        color: #0F172A;
        transition: border-color 0.2s, box-shadow 0.2s;
    }

    .form-control:focus {
        outline: none;
        border-color: #134074;
        box-shadow: 0 0 0 3px rgba(19, 64, 116, 0.15);
        background-color: #ffffff;
    }

    .form-control.is-invalid {
        border-color: #E53E3E;
        background-color: #FFF5F5;
    }

    .invalid-feedback {
        color: #E53E3E;
        font-size: 0.8rem;
        margin-top: 0.35rem;
    }

    textarea.form-control {
        resize: vertical;
        min-height: 140px;
    }

    .alert {
        padding: 1rem;
        border-radius: 6px;
        margin-bottom: 1.5rem;
        font-size: 0.9rem;
    }

    .alert-success {
        background-color: #F0FDF4;
        border: 1px solid #BBF7D0;
        color: #166534;
    }

    .info-box {
        background: #F8FAFC;
        border: 1px solid #E2E8F0;
        border-radius: 8px;
        padding: 1.5rem;
    }

    .info-box h3 {
        font-size: 1.1rem;
        color: #0B2545;
        margin-bottom: 1rem;
    }

    .info-item {
        margin-bottom: 1rem;
        font-size: 0.9rem;
    }

    .info-item strong {
        display: block;
        color: #0B2545;
        margin-bottom: 0.2rem;
    }

    .info-item a {
        color: #134074;
        text-decoration: underline;
    }
</style>
@endpush

@section('content')
<section class="support-hero">
    <div class="container">
        <h1>Client Support Centre</h1>
        <p>Submit your enquiry below and our client relations team will assist you promptly.</p>
    </div>
</section>

<div class="support-container">
    <div class="support-grid">
        
        {{-- Main Form Card --}}
        <div class="support-card">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ url('post-support') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="name" class="form-label">Full Name <span>*</span></label>
                    <input 
                        type="text" 
                        id="name" 
                        name="name" 
                        class="form-control @error('name') is-invalid @enderror" 
                        value="{{ old('name') }}" 
                        placeholder="e.g. John Doe" 
                        required
                    >
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email" class="form-label">Email Address <span>*</span></label>
                    <input 
                        type="email" 
                        id="email" 
                        name="email" 
                        class="form-control @error('email') is-invalid @enderror" 
                        value="{{ old('email') }}" 
                        placeholder="name@example.com" 
                        required
                    >
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="subject" class="form-label">Subject <span>*</span></label>
                    <input 
                        type="text" 
                        id="subject" 
                        name="subject" 
                        class="form-control @error('subject') is-invalid @enderror" 
                        value="{{ old('subject') }}" 
                        placeholder="Brief summary of your inquiry" 
                        required
                    >
                    @error('subject')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="content" class="form-label">Message / Enquiry <span>*</span></label>
                    <textarea 
                        id="content" 
                        name="content" 
                        class="form-control @error('content') is-invalid @enderror" 
                        placeholder="Please provide full details about your enquiry..." 
                        required
                    >{{ old('content') }}</textarea>
                    @error('content')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn--primary" style="width: 100%; text-align: center; justify-content: center;">
                    Send Message
                </button>
            </form>
        </div>

        {{-- Sidebar Info --}}
        <aside class="info-box">
            <h3>Direct Contact</h3>
            
            <div class="info-item">
                <strong>Telephone Support</strong>
                <a href="tel:+442012345678">+44 20 1234 5678</a>
            </div>

            <div class="info-item">
                <strong>Direct Email</strong>
                <a href="mailto:nbbtrustkapital@gmail.com">nbbtrustkapital@gmail.com</a>
            </div>

            <div class="info-item">
                <strong>Main Office</strong>
                <p style="margin:0; color:#64748B;">London, United Kingdom</p>
            </div>

            <div class="info-item" style="margin-top: 1.5rem; padding-top: 1rem; border-top: 1px solid #E2E8F0;">
                <strong>Security Reminder</strong>
                <p style="margin:0; font-size: 0.8rem; color: #64748B;">Nbb Trust Kapital will never ask for your private passwords or account PINs over email or web forms.</p>
            </div>
        </aside>

    </div>
</div>
@endsection