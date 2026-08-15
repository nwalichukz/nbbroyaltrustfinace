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
                                                <h5 class="card-title"> CREATE JIONT ACCOUNT </h5>
                                            </div>
                                            <form method="POST" action="{{url('user/joint-account-create')}}">
                                            @csrf
                                                
                                                            
                                            <div class="form-group">
                                                    <label class="form-label" for="cf-email-address">Partner Full Name</label>
                                                    <input name="partner_full_name" type="text" class="form-control" id="cf-email-address" required>
                                                </div>

                                                              
                                                <div class="form-group">
                                                    <label class="form-label" for="cf-email-address">Email</label>
                                                    <input name="email" type="email" class="form-control" id="cf-email-address" required>
                                                </div>
                                            
                                            
                                            <div class="form-group">
                                                                <label class="form-label" for="fv-topics">Select Gender</label>
                                                                <div class="form-control-wrap ">
                                                                    <select class="form-select js-select2" id="fv-topics" name="gender" data-placeholder="Select a option" required>
                                                                        <option value="Female">Female</option>
                                                                        <option value="Male">Male</option>
                                                                    </select>
                                                                </div>
                                                            </div>


                                                <div class="form-group">
                                                    <label class="form-label" for="cf-email-address">Occupation</label>
                                                    <input name="occupation" type="text" class="form-control" id="cf-email-address" required>
                                                </div>

                                                <div class="form-group">
                                                    <label class="form-label" for="cf-email-address">Next of Kin Name</label>
                                                    <input name="next_of_kin_name" type="text" class="form-control" id="cf-email-address" required>
                                                  
                                                </div>

                                                <div class="form-group">
                                                    <label class="form-label" for="cf-email-address">Next of Kin Phone</label>
                                                    <input name="next_of_kin_phone" type="text" class="form-control" id="cf-email-address" required>
                                                  
                                                </div>

                                                
                                                <div class="form-group">
                                                                <label class="form-label" for="fv-topics">Next of Kin Relationship </label>
                                                                <div class="form-control-wrap ">
                                                                    <select name="relationship_to_next_of_kin" class="form-select js-select2" id="fv-topics" data-placeholder="Select a option" required>
                                                                    <option value="">Select relationship type</option>
                                                                    <option value="Brother">Brother</option>
                                                                        <option value="Sister">Sister</option>
                                                                        <option value="Father"> Father</option>
                                                                        <option value="Mother">Mother</option>
                                                        
                                                                    </select>
                                                                </div>
                                                            </div>
                                              
                                              
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-lg btn-primary">Create</button>
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
