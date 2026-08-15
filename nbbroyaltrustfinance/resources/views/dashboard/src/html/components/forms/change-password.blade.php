     <!-- content @s -->
 @extends('dashboard/src/html/crm/dashboard-layout')
@section('content')        
            <!-- content @s -->
            <div class="nk-content ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                            <h5 class="card-title">CHANGE PASSWORD</h5>
    
<br/>
                                <div class="col-lg-6">
                                    <div class="card card-bordered h-100">
                                        <div class="card-inner">
                                            <div class="card-head">
                                                <h5 class="card-title"></h5>
                                            </div>
                                            <form method="POST" action="{{url('user/post-change-password')}}">
                                            @csrf
                                                <div class="form-group">
                                                    <label class="form-label" for="cf-full-name">Old Password</label>
                                                    <input name="old_password" type="password" class="form-control" id="cf-full-name" placeholder="Enter Old Password" required>
                                                </div>

                                                <div class="form-group">
                                                    <label class="form-label" for="cf-full-name">New Password</label>
                                                    <input name="new_password" type="password" class="form-control" id="cf-full-name" placeholder="Enter New Password" required>
                                                     <input name="user_id" type="hidden" value="{{Auth::user()->id}}">
                                                </div>
                                                                                     

                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-lg btn-primary">Change Password</button>
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