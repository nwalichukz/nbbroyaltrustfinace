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
                                                <h5 class="card-title">Confrim Investment Details </h5>
                                            </div>
                                            <form method="POST" action="{{url('user/investment/create')}}">
                                            @csrf
                                                
                                                            <div class="form-group">
                                                    <label class="form-label" for="cf-email-address">Investment Type</label>
                                                    <input name="inv_type" type="text" class="form-control" id="cf-email-address"  value="{{$inv_type->parent_name}}" disabled>
                                                    <input type="hidden" name="investment_type_id" value="{{$inv_type->id}}" required>
                                                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}" required>
                                                </div>
                                                

                                                       
                                                <div class="form-group">
                                                    <label class="form-label" for="cf-email-address">Investment Name</label>
                                                    <input name="inv_name"  class="form-control" id="cf-email-address" value="{{$inv_type->name}}" disabled>
                                                </div>
                                                      
                                                <div class="form-group">
                                                    <label class="form-label" for="cf-email-address">Amount</label>
                                                    <input name="amount" type="number" class="form-control" id="cf-email-address" focus="true" required>
                                                </div>

                                                <div class="form-group">
                                                    <label class="form-label" for="cf-email-address">Min. Amount</label>
                                                    <input name="Min_amount" type="text" class="form-control" id="cf-email-address" value="{{$inv_type->min_amt}}" disabled required>
                                                </div>

                                                <div class="form-group">
                                                    <label class="form-label" for="cf-email-address">Max. Amount</label>
                                                    <input name="max_amount" type="text" class="form-control" id="cf-email-address" value="{{$inv_type->max_amt}}" disabled required>
                                                </div>

                                                @if(!empty($inv_type->int_interval))
                                                <div class="form-group">
                                                    <label class="form-label" for="cf-email-address">Int Interval(Days)</label>
                                                    <input name="int_interval" type="text" class="form-control" id="cf-email-address" value="{{$inv_type->int_interval}}" disabled required>
                                                </div>
                                                @endif


                                                <div class="form-group">
                                                    <label class="form-label" for="cf-email-address">Percentage Profit</label>
                                                    <input name="earning_percentage" type="text" class="form-control" id="cf-email-address" value="{{$inv_type->earning_percentage}}" disabled required>
                                                </div>

                                               {{-- <div class="form-group">
                                                    <label class="form-label" for="cf-email-address">Expected Earning</label>
                                                    <input name="earning_percentage" type="text" class="form-control" id="cf-email-address" required>
                                                </div>--}}

                                                <div class="form-group">
                                                    <label class="form-label" for="cf-email-address">Duration</label>
                                                    <input name="duration" type="text" class="form-control" id="cf-email-address" value="{{$inv_type->duration}}" disabled required>
                                                </div>

                                                
                                               

                                              
                                                            <div class="form-group">
                                                                <label class="form-label" for="default-textarea">Description</label>
                                                                <div class="form-control-wrap">
                                                                    <textarea name="description" class="form-control no-resize" id="default-textarea" disabled required> {{$inv_type->description}} </textarea>
                                                                </div>
                                                            </div>
                                                  
                                              
                                              
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-lg btn-primary"> Proceed </button>
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
