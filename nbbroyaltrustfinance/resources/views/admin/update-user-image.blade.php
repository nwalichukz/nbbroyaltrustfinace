@extends('layouts.dashboard')

@php($activeNav = 'profile')
@section('title', 'Update Profile Image | Nbb Trust Kapital Admin')

@section('content')

    <div class="db-page-head">
        <div>
            <div class="breadcrumb"><a href="{{ url('admin /dashboard') }}">Admin</a> <span>/</span> <span>Users</span> <span>/</span> <span>Update Image</span></div>
            <h1>Update Profile Image</h1>
            <p class="lede">Replace the profile photo shown for this user across the admin console.</p>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert--danger" style="margin-bottom:1.4rem;">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" style="flex:none;"><circle cx="12" cy="12" r="9"/><path d="M12 8v5M12 16h.01"/></svg>
            <ul style="margin:0; padding-left:1.1rem;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert--info" style="margin-bottom:1.4rem;">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" style="flex:none;"><path d="M4 12l6 6L20 6"/></svg>
            <span>{{ session('success') }}</span>
        </div>
    @endif

    <form class="db-form-grid" id="update-image-form" method="POST" action="{{ url('/admin/img-update') }}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="user_id" value="{{ $user->id }}">

        <div class="db-card">
            <div class="db-card__head">
                <div>
                    <span class="u-eyebrow">{{ $user->name }}</span>
                    <h2 style="margin-top:0.4rem;">Profile photo</h2>
                </div>
            </div>

            <div class="db-form-grid">
                <div class="field">
                    <div style="display:flex; align-items:center; gap:1.2rem;">
                        <span class="avatar" id="ui-avatar-preview"
                            style="width:72px; height:72px; font-size:1.3rem;
                                @if($user->avatar) background-image:url('{{ asset('storage/' . $user->avatar) }}'); background-size:cover; background-position:center; @endif">
                            @unless($user->avatar)
                                {{ strtoupper(substr($user->name, 0, 2)) }}
                            @endunless
                        </span>
                        <div>
                            <label for="ui-image" class="btn btn--outline-dark" style="cursor:pointer;">Choose new image</label>
                            <input type="file" id="ui-image" name="avatar" accept="image/png, image/jpeg, image/webp" style="display:none;" required>
                            <div class="hint" id="ui-filename" style="margin-top:0.4rem;">No file selected.</div>
                        </div>
                    </div>
                    <span class="hint" style="display:block; margin-top:0.8rem;">PNG, JPG or WEBP. Max 2MB.</span>
                </div>
            </div>

            <div style="display:flex; gap:0.8rem; margin-top:1.6rem; flex-wrap:wrap;">
                <button type="submit" class="btn btn--primary">Save Image</button>
                <a href="{{ url('/dashboard/users') }}" class="btn btn--outline-dark">Cancel</a>
            </div>
        </div>
    </form>

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    var input = document.getElementById('ui-image');
    var preview = document.getElementById('ui-avatar-preview');
    var filename = document.getElementById('ui-filename');
    if (!input || !preview) return;

    input.addEventListener('change', function () {
        var file = input.files && input.files[0];
        if (!file) return;

        filename.textContent = file.name;

        var reader = new FileReader();
        reader.onload = function (e) {
            preview.style.backgroundImage = 'url(' + e.target.result + ')';
            preview.style.backgroundSize = 'cover';
            preview.style.backgroundPosition = 'center';
            preview.innerHTML = '';
        };
        reader.readAsDataURL(file);
    });
});
</script>
@endpush