@extends('layouts.dashboard')

@section('title', 'Admin - Credit / Add Funds')

@section('content')
<div class="container-fluid p-0">
    <div class="mb-4">
        <h4 class="fw-bold mb-1" style="color: var(--primary-navy);">Institutional Fund Allocation</h4>
        <p class="text-muted mb-0 small"> Directly credit client balances or record incoming SWIFT/CHAPS wire deposits.</p>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm rounded-4 p-4">
                <form action="#" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label fw-bold">Select Client Account</label>
                        <select class="form-select">
                            <option value="">-- Choose Account --</option>
                            <option value="1">Edward Sterling (GB82 NBBT 4011 9288 3920 19)</option>
                            <option value="2">Hans Gruber (DE89 NBBT 5001 0293 8812 00)</option>
                        </select>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Amount</label>
                            <input type="number" step="0.01" class="form-control" placeholder="0.00">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Currency</label>
                            <select class="form-select">
                                <option value="GBP">GBP (£)</option>
                                <option value="USD">USD ($)</option>
                                <option value="EUR">EUR (€)</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Transaction Description / Reference</label>
                        <input type="text" class="form-control" placeholder="e.g. SWIFT Wire Transfer Settlement - Barclays London">
                    </div>

                    <button type="submit" class="btn btn-orange fw-bold px-4">Credit Account Balance</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection