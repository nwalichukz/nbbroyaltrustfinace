@extends('layouts.client') {{-- Adjust to your dashboard layout path if different --}}

@section('title', 'Transaction PIN Management | Nbb Trust Kapital')

@push('styles')
<style>
    .pin-container {
        max-width: 560px;
        margin: 2rem auto;
    }

    .pin-card {
        background: #ffffff;
        border: 1px solid #E2E8F0;
        border-radius: 10px;
        padding: 2.5rem 2rem;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.03);
    }

    .pin-header {
        text-align: center;
        margin-bottom: 2rem;
    }

    .pin-header__icon {
        width: 56px;
        height: 56px;
        background: #F0F4F8;
        color: #081C33;
        border-radius: 50%;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 1rem;
    }

    .pin-header h2 {
        font-family: 'Source Serif 4', Georgia, serif;
        color: #081C33;
        font-size: 1.5rem;
        margin-bottom: 0.5rem;
    }

    .pin-header p {
        color: #64748B;
        font-size: 0.9rem;
        margin: 0;
    }

    .pin-display {
        text-align: center;
        padding: 1.5rem;
        background: #F8FAFC;
        border: 1px dashed #CBD5E1;
        border-radius: 8px;
        margin-bottom: 1.5rem;
    }

    .pin-display__dots {
        letter-spacing: 0.5rem;
        font-size: 1.75rem;
        font-family: 'IBM Plex Mono', monospace;
        color: #081C33;
        font-weight: 700;
    }

    .pin-status-badge {
        display: inline-flex;
        align-items: center;
        gap: 0.35rem;
        padding: 0.25rem 0.75rem;
        background: #DCFCE7;
        color: #166534;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 600;
        margin-bottom: 1rem;
    }

    .form-group {
        margin-bottom: 1.25rem;
    }

    .form-label {
        display: block;
        font-weight: 600;
        font-size: 0.85rem;
        color: #081C33;
        margin-bottom: 0.4rem;
    }

    .pin-input-group {
        position: relative;
    }

    .pin-control {
        width: 100%;
        padding: 0.75rem 1rem;
        font-family: 'IBM Plex Mono', monospace;
        font-size: 1.1rem;
        letter-spacing: 0.3rem;
        text-align: center;
        border: 1px solid #CBD5E1;
        border-radius: 6px;
        background-color: #F8FAFC;
        color: #081C33;
        transition: border-color 0.2s, box-shadow 0.2s;
    }

    .pin-control:focus {
        outline: none;
        border-color: #081C33;
        box-shadow: 0 0 0 3px rgba(8, 28, 51, 0.12);
        background-color: #ffffff;
    }

    .pin-control.is-invalid {
        border-color: #E53E3E;
        background-color: #FFF5F5;
    }

    .invalid-feedback {
        color: #E53E3E;
        font-size: 0.8rem;
        margin-top: 0.35rem;
        text-align: center;
    }

    .btn-submit {
        width: 100%;
        padding: 0.75rem;
        background: #081C33;
        color: #ffffff;
        border: none;
        border-radius: 6px;
        font-weight: 600;
        font-size: 0.95rem;
        cursor: pointer;
        transition: background 0.2s;
        margin-top: 0.5rem;
    }

    .btn-submit:hover {
        background: #134074;
    }
</style>
@endpush

@section('content')
<div class="pin-container">
    <div class="pin-card">
        
        {{-- CASE 1: PIN IS ALREADY SET --}}
        @if(Auth::user()->pin || (Auth::user()->userwallet && Auth::user()->userwallet->pin))
            <div class="pin-header">
                <div class="pin-header__icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0110 0v4"/></svg>
                </div>
                <div class="pin-status-badge">
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><path d="M20 6L9 17l-5-5"/></svg>
                    PIN Active & Secure
                </div>
                <h2>Transaction PIN Established</h2>
                <p>Your 4-digit security PIN is active and required to authorize outgoing transfers and card management operations.</p>
            </div>

            <div class="pin-display">
                <span class="pin-display__dots">&bull; &bull; &bull; &bull;</span>
            </div>

            <details>
                <summary style="cursor: pointer; text-align: center; font-size: 0.85rem; color: #134074; font-weight: 500;">
                    Need to update your PIN?
                </summary>
                
                <form action="{{ route('client.pin.update') }}" method="POST" style="margin-top: 1.5rem;">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="current_pin" class="form-label">Current PIN</label>
                        <input 
                            type="password" 
                            id="current_pin" 
                            name="current_pin" 
                            class="pin-control @error('current_pin') is-invalid @enderror" 
                            maxlength="4" 
                            pattern="[0-9]*" 
                            inputmode="numeric"
                            placeholder="&bull;&bull;&bull;&bull;" 
                            required
                        >
                        @error('current_pin')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="pin" class="form-label">New 4-Digit PIN</label>
                        <input 
                            type="password" 
                            id="pin" 
                            name="pin" 
                            class="pin-control @error('pin') is-invalid @enderror" 
                            maxlength="4" 
                            pattern="[0-9]*" 
                            inputmode="numeric"
                            placeholder="&bull;&bull;&bull;&bull;" 
                            required
                        >
                        @error('pin')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="pin_confirmation" class="form-label">Confirm New PIN</label>
                        <input 
                            type="password" 
                            id="pin_confirmation" 
                            name="pin_confirmation" 
                            class="pin-control" 
                            maxlength="4" 
                            pattern="[0-9]*" 
                            inputmode="numeric"
                            placeholder="&bull;&bull;&bull;&bull;" 
                            required
                        >
                    </div>

                    <button type="submit" class="btn-submit">Update Security PIN</button>
                </form>
            </details>

        {{-- CASE 2: PIN NOT SET YET --}}
        @else
            <div class="pin-header">
                <div class="pin-header__icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 019.9-1"/></svg>
                </div>
                <h2>Set Transaction PIN</h2>
                <p>Create a 4-digit security PIN to enable transfers, payments, and account authorization.</p>
            </div>

            <form action="{{ url('client/pin-update') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="pin" class="form-label">Create 4-Digit PIN</label>
                    <input 
                        type="password" 
                        id="pin" 
                        name="pin" 
                        class="pin-control @error('pin') is-invalid @enderror" 
                        maxlength="4" 
                        pattern="[0-9]*" 
                        inputmode="numeric"
                        placeholder="&bull;&bull;&bull;&bull;" 
                        required
                        autofocus
                    >
                    @error('pin')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="pin_confirmation" class="form-label">Confirm PIN</label>
                    <input 
                        type="password" 
                        id="pin_confirmation" 
                        name="pin_confirmation" 
                        class="pin-control" 
                        maxlength="4" 
                        pattern="[0-9]*" 
                        inputmode="numeric"
                        placeholder="&bull;&bull;&bull;&bull;" 
                        required
                    >
                </div>

                <button type="submit" class="btn-submit">Save &amp; Activate PIN</button>
            </form>
        @endif

    </div>
</div>
@endsection