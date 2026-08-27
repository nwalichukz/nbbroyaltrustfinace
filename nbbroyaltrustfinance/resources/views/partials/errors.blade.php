@if ($errors->any())
    <div class="row justify-content-center my-3">
        <div class="col-md-6">
            <div class="alert alert-danger alert-dismissible fade show" role="alert" id="alert-errors" style="background-color:#f8d7da; border-color:#f5c2c7; color:#842029;">
                <ul class="mb-0 ps-3">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" onclick="document.getElementById('alert-errors').remove()"></button>
            </div>
        </div>
    </div>
@endif

@if (session()->has('success'))
    <div class="row justify-content-center my-3">
        <div class="col-md-6">
            <div class="alert alert-success alert-dismissible fade show" role="alert" id="alert-success" style="background-color:#d1e7dd; border-color:#badbcc; color:#0f5132;">
                <strong>Success!</strong> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" onclick="document.getElementById('alert-success').remove()"></button>
            </div>
        </div>
    </div>
@elseif (session()->has('status'))
    <div class="row justify-content-center my-3">
        <div class="col-md-6">
            <div class="alert alert-success alert-dismissible fade show" role="alert" id="alert-status" style="background-color:#d1e7dd; border-color:#badbcc; color:#0f5132;">
                <strong>Success!</strong> {{ session('status') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" onclick="document.getElementById('alert-status').remove()"></button>
            </div>
        </div>
    </div>
@elseif (session()->has('error'))
    <div class="row justify-content-center my-3">
        <div class="col-md-6">
            <div class="alert alert-danger alert-dismissible fade show" role="alert" id="alert-error" style="background-color:#f8d7da; border-color:#f5c2c7; color:#842029;">
                <strong>Error!</strong> {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" onclick="document.getElementById('alert-error').remove()"></button>
            </div>
        </div>
    </div>
@endif

<script>
    (function () {
        var alertIds = ['alert-errors', 'alert-success', 'alert-status', 'alert-error'];
        alertIds.forEach(function (id) {
            var el = document.getElementById(id);
            if (el) {
                setTimeout(function () {
                    el.remove();
                }, 50000); // 50 seconds
            }
        });
    })();
</script>