     <!-- content @s -->
 @extends('dashboard/src/html/crm/dashboard-layout')
@section('content')        
            <!-- content @s -->
            <div class="nk-content ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
    
                                <div class="col-lg-6">
                                    <div class="card card-bordered h-100">
                                        <div class="card-inner">
                                            <div class="card-head">
                                                <h5 class="card-title">UPLOAD ACCOUNT OFFICER PROFILE IMAGE</h5>
                                            </div>
                                            <form method="post" action="{{url('admin/account-officer-image/create')}}" enctype="multipart/form-data" accept=true>
                                            @csrf
                                        
                                                <div class="form-group">
                                                    <label class="form-label" for="cf-full-name">Upload Profile Image</label>
                                                    <input name="image" type="file" class="form-control" id="cf-nam" placeholder="Select Image" required>
                                                    <input type="hidden" name="user_id" value="{{$user_id}}">
                                                </div>
                                                                                     

                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-lg btn-primary">Upload</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- content @e -->
                 @endsection