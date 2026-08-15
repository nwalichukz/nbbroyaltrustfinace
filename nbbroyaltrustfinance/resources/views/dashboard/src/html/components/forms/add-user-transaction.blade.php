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
                                                <h5 class="card-title">ADD TRANSACTION TYPE</h5>
                                            </div>
                                            <form method="POST" action="{{url('admin/create-user-transaction')}}">
                                            @csrf
                                                
                                            <div class="form-group">
                                                    <label class="form-label" for="cf-email-address">Amount</label>
                                                    <input name="amount" type="text" class="form-control" id="cf-email-address" required>
                                                    <input name="user_id" type="hidden" value="{{$user_id}}">
                                                </div>

                                                         <div class="form-group">
                                                                <label class="form-label" for="fv-topics">Select Transaction Tye</label>
                                                                <div class="form-control-wrap ">
                                                                    <select class="form-select js-select2" id="fv-topics" name="transaction_type" data-placeholder="Select a option" required>
                                                                        <option value="">Select type</option>
                                                                        <option value="credit">Credit</option>
                                                                        <option value="debit">Debit</option>
                                                               
                                                                    </select>
                                                                </div>
                                                            </div>

                                             
                                                      
                                              

                                              
                                             
                                              
                                                            <div class="form-group">
                                                                <label class="form-label" for="default-textarea">Purpose</label>
                                                                <div class="form-control-wrap">
                                                                    <textarea name="purpose" class="form-control no-resize" id="default-textarea" required>  </textarea>
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
