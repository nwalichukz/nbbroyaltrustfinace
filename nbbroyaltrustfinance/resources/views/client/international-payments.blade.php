@extends('layouts.client')

@php($activeNav = 'international')
@section('title', 'International Payments | Nbb Trust Kapital')

@section('content')

    <div class="db-page-head">
        <div>
            <div class="breadcrumb"><a href="{{ url('/client/dashboard') }}">Client Area</a> <span>/</span> <span>International Payments</span></div>
            <h1>International Payments</h1>
            <p class="lede">Send money abroad with transparent FX rates and tracked delivery.</p>
        </div>
    </div>

    <div class="db-card">
        <p style="color:var(--color-ink-soft); font-size:0.9rem;">
            This section follows the same layout as the rest of the Client Area
            (<code>resources/views/layouts/client.blade.php</code>) — build out the
            page content here the same way <code>client/dashboard.blade.php</code> was built.
        </p>
    </div>

@endsection
