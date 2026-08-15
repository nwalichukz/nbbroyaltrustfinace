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
                                                <h5 class="card-title">Confirm Transfer Details </h5>
                                            </div>
                                            <form method="POST" action="{{url('/user/external-transfer')}}">
                                            @csrf
                                               
                                            <div class="form-group" id="bank_name">
                                                    <label class="form-label" style="display:block;" for="cf-email-address">Enter Bank Name</label>
                                
                                                    <input type="text"  class="form-control" value="{{$bank_name}}" id="cf-email-address" disabled required>
                                                </div>

                                                <div class="form-group" id="account_name" style="display:block;">
                                                    <label class="form-label" for="cf-email-address">Account Name</label>
                                
                                                    <input type="text"  class="form-control" value="{{$account_name}}" id="cf-email-address" disabled required>
                                                </div>
                                                            
                                                      
                                                <div class="form-group" id="acc_number" style="display:block;">
                                                    <label class="form-label" for="cf-email-address">Account Number</label>
                                                    <input type="text" name="account_number" class="form-control" value="{{$account_number}}" id="cf-email-address" disabled required>
                                                     <input id="senderid " type="hidden" name="sender_user_id" value="{{Auth::user()->id}}"  required>
                                                     <input type="hidden" name="bank_name" value="{{$bank_name}}"  required>
                                                     <input type="hidden" name="amount" value="{{$amount}}"  required>
                                                     <input type="hidden" name="account_number" value="{{$account_number}}"  required>
                                                     <input type="hidden" name="account_name" value="{{$account_name}}"  required>
                                                     

                                                </div>

                                                <div class="form-group" id="amount" style="display:block;">
                                                    <label class="form-label" for="cf-email-address">Amount</label>
                                                    <input type="text" class="form-control" value="${{$amount}}" id="cf-email-address" disabled required>
                                                </div>

                                                <div class="form-group" id="fees" style="display:block;">
                                                    <label class="form-label" for="cf-email-address">Fees</label>
                                                    <input type="text" name="amount" class="form-control" value="$1" id="cf-email-address" disabled required>
                                                </div>

                                                <div class="form-group" id="pin" style="display:block;">
                                                    <label class="form-label" for="cf-email-address">PIN</label>
                                                    <input type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="4" name="pin" class="form-control" id="cf-email-address" required>
                                                </div>

                                                <div style="display:none;" class="form-group" id="otp">
                                                    <label class="form-label" for="cf-email-address">OTP</label>
                                                    <input type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="4" name="otp" class="form-control" required>
                                                    <span>Enter 4 digit code sent to your email. Check spam if you did not see in inbox</span> <a href="" onclick="resendOtp()" > Resend OTP </a>
                                                </div>

                                                <div class="form-group" id="showbtn">
                                                    <button onclick="showForm()" class="btn btn-lg btn-primary">Proceed</button>
                                                </div>
                                              
                                              
                                                <div style="display:none;" id="trfbtn" class="form-group">
                                                    <button type="submit"  class="btn btn-lg btn-primary">Make Transfer</button>
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
