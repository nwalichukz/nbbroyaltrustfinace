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
                                                <h5 class="card-title">Create Joint Account</h5>
                                            </div>
                                            <form method="POST" action="{{url('user/create-joint-account')}}">
                                            @csrf
                
                                                            <div class="form-group">
                                                    <label class="form-label" for="cf-email-address">Full Name</label>
                                                    <input name="name" type="text" class="form-control" id="cf-email-address" required>
                                                </div>
                                                      
                                                <div class="form-group">
                                                    <label class="form-label" for="cf-email-address">Date Of Birth</label>
                                                    <input name="date_of_birth" type="date" class="form-control" id="cf-email-address" required>
                                                </div>

                                                <div class="form-group">
                                                    <label class="form-label" for="cf-email-address">Phone Number</label>
                                                    <input name="max_amount" type="text" class="form-control" id="cf-email-address" required>
                                                </div>

                                                <div class="form-group">
                                                    <label class="form-label" for="cf-email-address">Email</label>
                                                    <input name="earning_percentage" type="text" class="form-control" id="cf-email-address" required>
                                                </div>

                                                
                                                <div class="form-group">
                                                    <label class="form-label" for="cf-email-address">Occupation</label>
                                                    <input name="earning_percentage" type="text" class="form-control" id="cf-email-address" required>
                                                </div>

                                                
                                                <div class="form-group">
                                                                <label class="form-label" for="fv-topics">Marital Status</label>
                                                                <div class="form-control-wrap ">
                                                                    <select name="duratn_in_mnth" class="form-select js-select2" id="fv-topics" name="fv-topics" data-placeholder="Select a option" required>
                                                                        <option label="empty" value="">Select</option>
                                                                        <option value="single">Single</option>
                                                                        <option value="married">Married</option>
                                                                        <option value="in-relationship">In Relationship</option>
                                                                    </select>
                                                                </div>
                                                            </div>

                                              
                                                            <div class="form-group">
                                                    <label class="form-label" for="cf-email-address">Next of Kin No</label>
                                                    <input name="earning_percentage" type="text" class="form-control" id="cf-email-address" required>
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
                @endsection
