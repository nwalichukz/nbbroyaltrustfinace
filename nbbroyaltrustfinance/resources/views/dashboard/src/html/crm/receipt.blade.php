  <!-- content @s -->
  @extends('dashboard/src/html/crm/dashboard-layout')
  @section('content')              
  <div class="nk-content ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="nk-block-head">
                                    <div class="nk-block-between g-3">
                                        <div class="nk-block-head-content">
                                            <h3 class="nk-block-title page-title">Receipt <strong class="text-primary small"></strong></h3>
                                            <div class="nk-block-des text-soft">
                                                {{--<ul class="list-inline">
                                                    <li>Created At: <span class="text-base">18 Dec, 2019 01:02 PM</span></li>
                                                </ul>--}}
                                            </div>
                                        </div>
                                        {{--<div class="nk-block-head-content">
                                            <a href="html/crm/invoices.html" class="btn btn-outline-light bg-white d-none d-sm-inline-flex"><em class="icon ni ni-arrow-left"></em><span>Back</span></a>
                                            <a href="html/crm/invoices.html" class="btn btn-icon btn-outline-light bg-white d-inline-flex d-sm-none"><em class="icon ni ni-arrow-left"></em></a>
                                        </div>--}}
                                    </div>
                                </div><!-- .nk-block-head -->
                                <div class="nk-block">
                                    <div class="invoice">
                                        <div class="invoice-action">
                                            {{--<a class="btn btn-icon btn-lg btn-white btn-dim btn-outline-primary" href="html/crm/invoice-print.html" target="_blank"><em class="icon ni ni-printer-fill"></em></a>--}}
                                        </div><!-- .invoice-actions -->
                                        <div class="invoice-wrap">
                                            <div class="invoice-brand text-center">
                                                {{--<div class="logo-link">
                                                    <img class="logo-light logo-img" src="./images/logo.png" srcset="./images/logo2x.png 2x" alt="">
                                                    <img class="logo-dark logo-img" src="./images/logo-dark.png" srcset="./images/logo-dark2x.png 2x" alt="">
                                                </div>--}}
                                            </div>
                                            <div class="invoice-head">
                                                <div class="invoice-contact">
                                                    <span class="overline-title">Payment Sent To</span>
                                                    <div class="invoice-contact-info">
                                                        <h4 class="title">{{$account_name}}</h4>
                                                        <ul class="list-plain">
                                                        <li class="invoice-id"><span>Invoice ID</span>:<span>#0{{rand()}}</span></li>
                                                        <li class="invoice-date"><span>Date</span>:<span>{{$date_created}}</span></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                               {{-- <div class="invoice-desc">
                                                    <h3 class="title">Invoice</h3>
                                                    <ul class="list-plain">
                                                        
                                                    </ul>
                                                </div>--}}
                                            </div><!-- .invoice-head -->
                                            <div class="invoice-bills">
                                                <div class="table-responsive">
                                                    <table class="table table-striped">
                                                        <thead>
                                                            <tr>
                                                                {{--<th class="w-150px">Item Code</th>
                                                                <th class="w-60">Description</th>
                                                                <th>Price</th>
                                                                <th>Qty</th>
                                                                <th>Amount</th>--}}
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>Bank</td>
                                                               
                                                                <td>{{$bank_name}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Account Name</td>
                                                             
                                                                <td>{{$account_number}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Account Number</td>
                                                               
                                                                <td>{{$account_name}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Amount</td>
                                                              
                                                                <td>${{$amount}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Transaction Fee</td>
                                                                
                                                                <td>$1</td>
                                                            </tr>
                                                        </tbody>
                                                        {{--<tfoot>
                                                            <tr>
                                                                <td colspan="2"></td>
                                                                <td colspan="2">Subtotal</td>
                                                                <td>$2,681</td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2"></td>
                                                                <td colspan="2">Processing fee</td>
                                                                <td>$10.00</td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2"></td>
                                                                <td colspan="2">TAX</td>
                                                                <td>$43.50</td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2"></td>
                                                                <td colspan="2">Grand Total</td>
                                                                <td>$2,734.50</td>
                                                            </tr>
                                                        </tfoot>--}}
                                                    </table>
                                                    {{--<div class="nk-notes ff-italic fs-12px text-soft"> Invoice was created on a computer and is valid without the signature and seal. </div>--}}
                                                </div>
                                            </div><!-- .invoice-bills -->
                                        </div><!-- .invoice-wrap -->
                                    </div><!-- .invoice -->
                                </div><!-- .nk-block -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content @e -->
                @endsection