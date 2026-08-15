@extends('layouts.dashboard')

@section('title', 'Admin - User Management')

@section('content')
<div class="container-fluid p-0">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-bold mb-1" style="color: var(--primary-navy);">Client User Management</h4>
            <p class="text-muted mb-0 small">Review, approve, suspend, or terminate corporate accounts.</p>
        </div>
        <button class="btn btn-orange btn-sm"><i class="bi bi-person-plus-fill me-1"></i> Add New Client</button>
    </div>

    <div class="card border-0 shadow-sm rounded-4">
        <div class="table-responsive">
            <table class="table align-middle table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="ps-3">Client Name / Email</th>
                        <th>Country</th>
                        <th>KYC Status</th>
                        <th>Account Status</th>
                        <th class="text-end pe-3">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="ps-3">
                            <div class="fw-bold">Edward Sterling</div>
                            <small class="text-muted">e.sterling@sterlingholdings.uk</small>
                        </td>
                        <td>United Kingdom</td>
                        <td><span class="badge bg-success bg-opacity-10 text-success">Verified</span></td>
                        <td><span class="badge bg-success">Active</span></td>
                        <td class="text-end pe-3">
                            <button class="btn btn-sm btn-outline-warning me-1">Suspend</button>
                            <button class="btn btn-sm btn-outline-danger">Remove</button>
                        </td>
                    </tr>
                    <tr>
                        <td class="ps-3">
                            <div class="fw-bold">Hans Gruber</div>
                            <small class="text-muted">h.gruber@alpine-capital.de</small>
                        </td>
                        <td>Germany</td>
                        <td><span class="badge bg-warning bg-opacity-10 text-warning">Pending Review</span></td>
                        <td><span class="badge bg-secondary">Unapproved</span></td>
                        <td class="text-end pe-3">
                            <button class="btn btn-sm btn-success me-1">Approve</button>
                            <button class="btn btn-sm btn-outline-danger">Remove</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection