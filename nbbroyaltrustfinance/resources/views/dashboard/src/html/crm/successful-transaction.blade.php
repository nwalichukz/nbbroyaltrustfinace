  <!-- content @s -->
  @extends('dashboard/src/html/crm/dashboard-layout')
  @section('content')              
  <div class="nk-content ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="nk-block-head">
                                    <div class="nk-block-between g-3">
                                        {{--<div class="nk-block-head-content">
                                            <h3 class="nk-block-title page-title">Receipt <strong class="text-primary small">#66K5W3</strong></h3>
                                            <div class="nk-block-des text-soft">
                                                <ul class="list-inline">
                                                    <li>Created At: <span class="text-base">18 Dec, 2019 01:02 PM</span></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="nk-block-head-content">
                                            <a href="html/crm/invoices.html" class="btn btn-outline-light bg-white d-none d-sm-inline-flex"><em class="icon ni ni-arrow-left"></em><span>Back</span></a>
                                            <a href="html/crm/invoices.html" class="btn btn-icon btn-outline-light bg-white d-inline-flex d-sm-none"><em class="icon ni ni-arrow-left"></em></a>
                                        </div>--}}
                                    </div>
                                </div><!-- .nk-block-head -->
                                <div class="nk-block">
                                    <div class="invoice">
                                    
                                     
                                        <div class="invoice-wrap">
                                           
                                            
                                                   <center>
                                                   <span style='font-size:100px;'>&#128077;</span>
                                                   <br/>

                            
                                                     <span style="color:#000; font-size:2em" class="overline-title"> Payment Sent</span> 
                                                     <br/>

                                                     <span style="color:#000; font-size:2em" class="overline-titl">{{$msg}}  </span> 
                                                    </center>
                                             
                                               
                                            <div class="invoice-bills">
                                           
                                            </div><!-- .invoice-bills -->
                                        </div><!-- .invoice-wrap -->
                                        <br/>
                                    
                                        <center><a href="{{url('/receipt/'.$bank_name.'/'.$account_name.'/'.$account_number.'/'.$amount.'/'.$date_created)}}"><button style="background-color:#008CBA; color:#fff; font-size:2em;">View Receipt</button></a> <a href="{{url('user/my-transactions/'.$id)}}"><button style="background-color:#008CBA; color:#fff; font-size:2em;">View Transactions</button></a></center>
                                    </div><!-- .invoice -->
                                </div><!-- .nk-block -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content @e -->
                @endsection