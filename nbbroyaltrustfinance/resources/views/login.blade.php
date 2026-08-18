@extends('layouts.app')

@section('title', 'Client Login | Nbb Trust Kapital')
@section('meta_description', 'Sign in to your Nbb Trust Kapital account.')

@section('content')

    <section class="auth-section">
        <div class="container">
            <div class="auth-shell">
                <div class="auth-card">
                    <div class="auth-card__head">
                        <span class="u-eyebrow">Client login</span>
                        <h1 style="margin-top:0.6rem;">Welcome back</h1>
                        <p>Sign in to manage your accounts, payments and statements.</p>
                    </div>

                    @include('partials/errors')

                    <form action="{{ url('post-login') }}" method="POST" novalidate>
                        @csrf

                        <div class="form-field">
                            <label for="login-email">Email address</label>
                            <input type="email" id="login-email" name="email" placeholder="you@example.com" autocomplete="email" required>
                        </div>

                        <div class="form-field">
                            <label for="login-password">Password</label>
                            <input type="password" id="login-password" name="password" placeholder="Enter your password" autocomplete="current-password" required>
                        </div>

                        <div class="form-check" style="justify-content:space-between; display:flex; align-items:center;">
                            <span style="display:flex; gap:0.6rem; align-items:center;">
                                <input type="checkbox" id="login-remember" name="remember" style="margin:0;">
                                <label for="login-remember" style="margin:0;">Remember me</label>
                            </span>
                            <a href="{{ url('/forgot-password') }}" style="color:var(--color-blue-700); font-weight:600; font-size:0.85rem;">Forgot password?</a>
                        </div>

                        <button type="submit" class="btn btn--primary btn--block">Sign In</button>
                    </form>

                    <div class="auth-card__foot">
                        New to Nbb Trust Kapital? <a href="{{ url('/register') }}">Open an account</a>
                    </div>
                </div>

                <aside class="auth-side">
                    <h2>Secure by design</h2>
                    <p>Every session is protected with layered encryption and continuous fraud monitoring.</p>
                    <ul>
                        <li>
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="4" y="10" width="16" height="10" rx="2"/><path d="M8 10V7a4 4 0 018 0v3"/></svg>
                            <span>256-bit encrypted connections</span>
                        </li>
                        <li>
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M12 2l8 4v6c0 5-3.5 8.5-8 10-4.5-1.5-8-5-8-10V6l8-4z"/></svg>
                            <span>FCA-regulated institution</span>
                        </li>
                        <li>
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><circle cx="12" cy="12" r="9"/><path d="M12 8h.01M11 12h1v5h1"/></svg>
                            <span>24/7 fraud monitoring on every account</span>
                        </li>
                    </ul>
                </aside>
            </div>
        </div>
    </section>

@endsection