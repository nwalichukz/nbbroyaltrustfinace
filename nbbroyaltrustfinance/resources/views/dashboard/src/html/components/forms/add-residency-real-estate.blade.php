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
                                                <h5 class="card-title">Add Residency BY Real Estate</h5>
                                            </div>
                                            <form method="POST" action="{{url('/admin/create-residency-by-real-estate')}}" enctype="multipart/form-data" accept=true>
                                            @csrf
                                                

                                              <div class="form-group">
                                                    <label class="form-label" for="cf-email-address">Country Name</label>
                                                    <input name="country_name" type="text" class="form-control" id="cf-email-address" required>
                                                </div>
                                                                                          
                                                            <div class="form-group">
                                                                <label class="form-label" for="default-textarea">Description</label>
                                                                <div class="form-control-wrap">
                                                                    <textarea id="invdesc" name="description" class="form-control no-resize" id="default-textarea" placeholder="Enter your" required>  </textarea>
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                    <label class="form-label" for="cf-full-name">Upload Image</label>
                                                    <input name="image[]" type="file" class="form-control" id="cf-nam" placeholder="Select Image" multiple required>
                                                </div>
                                                  
                                              
                                              
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-lg btn-primary">Save</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endsection
