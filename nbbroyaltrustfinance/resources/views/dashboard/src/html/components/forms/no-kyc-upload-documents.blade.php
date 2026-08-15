     <!-- content @s -->
 @extends('dashboard/src/html/crm/dashboard-layout-no-kyc')
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
                                                <h5 class="card-title">UPLOAD KYC DOCUMENTS</h5>
                                                <h6></h6>
                                            </div>
                                            <form method="post" action="{{url('user/kyc-document/create')}}" enctype="multipart/form-data" accept=true>
                                            @csrf
                                            <div class="form-group">
                                                                <label class="form-label" for="fv-topics">Select Document Type</label>
                                                                <div class="form-control-wrap ">
                                                                    <select class="form-select js-select2" id="fv-topics" name="name" data-placeholder="Select a option" required>
                                                                        <option value="">Select Document Type</option>
                                                                        <option value="passport">Passport</option>
                                                                        <option value="natonal-id">National ID</option>
                                                                        <option value="drivers-licence">Driver's Licence</option>
                                                                      
                                                                    </select>
                                                                </div>
                                                            </div>
                                                <input type="hidden" name="user_id" value="{{Auth::user()->id}}" required>
                                                <div class="form-group">
                                                    <label class="form-label" for="cf-full-name">Upload Documents</label>
                                                    <input name="image" type="file" class="form-control" id="cf-nam" placeholder="Select Image" required>
                                                </div>
                                                                                     

                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-lg btn-primary">Submit</button>
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