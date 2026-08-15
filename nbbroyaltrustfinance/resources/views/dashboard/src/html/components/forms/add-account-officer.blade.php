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
                                                <h5 class="card-title">ADD ACCOUNT TYPE</h5>
                                            </div>
                                            <form method="POST" action="{{url('admin/create-account-officer')}}">
                                            @csrf
                
                                                            <div class="form-group">
                                                    <label class="form-label" for="cf-email-address">Account Officer Name</label>
                                                    <input name="name" type="text" class="form-control" id="cf-email-address" required>
                                                </div>
                                                      
                                                <div class="form-group">
                                                    <label class="form-label" for="cf-email-address">Min. Amount</label>
                                                    <input name="min_amount" type="number" class="form-control" id="cf-email-address" required>
                                                </div>

                                                <div class="form-group">
                                                    <label class="form-label" for="cf-email-address">Max. Amount</label>
                                                    <input name="max_amount" type="text" class="form-control" id="cf-email-address" required>
                                                </div>

                                                <div class="form-group">
                                                    <label class="form-label" for="cf-email-address">Percentage Profit</label>
                                                    <input name="earning_percentage" type="text" class="form-control" id="cf-email-address" required>
                                                </div>

                                                
                                                <div class="form-group">
                                                                <label class="form-label" for="fv-topics">Select Duration in Months</label>
                                                                <div class="form-control-wrap ">
                                                                    <select name="duratn_in_mnth" class="form-select js-select2" id="fv-topics" name="fv-topics" data-placeholder="Select a option" required>
                                                                        <option label="empty" value="">Select duration</option>
                                                                        <option value="1">1</option>
                                                                        <option value="2">2</option>
                                                                        <option value="3">3</option>
                                                                        <option value="4">4</option>
                                                                        <option value="5">5</option>
                                                                        <option value="6">6</option>
                                                                        <option value="7">7</option>
                                                                        <option value="8">8</option>
                                                                        <option value="9">9</option>
                                                                        <option value="10">10</option>
                                                                        <option value="11">11</option>
                                                                        <option value="12">12</option>
                                                                    </select>
                                                                </div>
                                                            </div>

                                              
                                                            <div class="form-group">
                                                                <label class="form-label" for="default-textarea">Description</label>
                                                                <div class="form-control-wrap">
                                                                    <textarea name="description" class="form-control no-resize" id="default-textarea" required> Description about the account type </textarea>
                                                                </div>
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
