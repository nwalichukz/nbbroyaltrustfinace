     <!-- content @s -->
 @extends('dashboard/src/html/crm/dashboard-layout')
@section('content')        
            <!-- content @s -->
            <div class="nk-content ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                            <h5 class="card-title">ADD FOUR DIGIT PIN</h5>
                            <br/>
                         <div class="col-lg-6">
                                    <div class="card card-bordered h-100">
                                        <div class="card-inner">
                                            <div class="card-head">
                                                <h5 class="card-title"></h5>
                                            </div>
                                            <form method="POST" action="{{url('user/pin/create')}}">
                                            @csrf
                                                <div class="form-group">
                                                    <label class="form-label" for="cf-full-name">Enter Pin</label>
                                                    <input name="pin" type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="4" class="form-control" id="cf-full-name" placeholder="Enter your four digit PIN" required>
                                                </div>
                                                                                     

                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-lg btn-primary">SET PIN</button>
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