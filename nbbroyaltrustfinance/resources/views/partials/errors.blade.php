@if ($errors->any())
    <div class="row justify-content-center my-3">
        <div class="col-md-6">
            <div class="alert alert-danger alert-dismissible fade show" role="alert" style="background-color:#f8d7da; border-color:#f5c2c7; color:#842029;">
                <ul class="mb-0 ps-3">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    </div>
@endif

@if (session()->has('success'))
    <div class="row justify-content-center my-3">
        <div class="col-md-6">
            <div class="alert alert-success alert-dismissible fade show" role="alert" style="background-color:#d1e7dd; border-color:#badbcc; color:#0f5132;">
                <strong>Success!</strong> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    </div>
@elseif (session()->has('status'))
    <div class="row justify-content-center my-3">
        <div class="col-md-6">
            <div class="alert alert-success alert-dismissible fade show" role="alert" style="background-color:#d1e7dd; border-color:#badbcc; color:#0f5132;">
                <strong>Success!</strong> {{ session('status') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    </div>
@elseif (session()->has('error'))
    <div class="row justify-content-center my-3">
        <div class="col-md-6">
            <div class="alert alert-danger alert-dismissible fade show" role="alert" style="background-color:#f8d7da; border-color:#f5c2c7; color:#842029;">
                <strong>Error!</strong> {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    </div>
@endif