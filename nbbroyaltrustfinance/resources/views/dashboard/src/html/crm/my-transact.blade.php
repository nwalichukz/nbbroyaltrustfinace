@extends('dashboard/src/html/crm/dashboard-layout')
@section('content')
   <!-- content @s -->
                <div class="nk-content ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="nk-block-head">
                                    <div class="nk-block-between g-3">
                                        <div class="nk-block-head-content">
                                            <h3 class="nk-block-title page-title">My Transaction History</h3>
                                            <div class="nk-block-des text-soft">
                                                <p>You have {{$total_transactions}} transactions.</p>
                                            </div>
                                        </div><!-- .nk-block-head-content -->
                                        <div class="nk-block-head-content">
                                            <div class="toggle-wrap nk-block-tools-toggle">
                                                <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                                                <div class="toggle-expand-content" data-content="pageMenu">
                                                    <ul class="nk-block-tools justify-between g-3">
                                                        <li><a href="#" class="btn btn-white btn-outline-light"><em class="icon ni ni-upload-cloud"></em><span>Import</span></a></li>
                                                        <li><a data-bs-toggle="modal" href="#addInvoice" class="btn text-white bg-primary"><em class="icon ni ni-plus"></em><span>Add New</span></a></li>
                                                    </ul>
                                                </div>
                                            </div><!-- .toggle-wrap -->
                                        </div><!-- .nk-block-head-content -->
                                    </div><!-- .nk-block-between -->
                                </div><!-- .nk-block-head -->
                                <div class="nk-block">
                                    <div class="card card-bordered card-stretch">
                                        <div class="card-inner-group">
                                            <div class="card-inner">
                                                <div class="card-title-group">
                                                    <div class="card-title">
                                                        <h5 class="title">All Transactions</h5>
                                                    </div>
                                                    <div class="card-tools me-n1">
                                                        <ul class="btn-toolbar">
                                                            <li>
                                                                <a href="#" class="btn btn-icon search-toggle toggle-search" data-target="search"><em class="icon ni ni-search"></em></a>
                                                            </li><!-- li -->
                                                            <li class="btn-toolbar-sep"></li><!-- li -->
                                                            <li>
                                                                <div class="dropdown">
                                                                    <a href="#" class="btn btn-trigger btn-icon dropdown-toggle" data-bs-toggle="dropdown">
                                                                        <em class="icon ni ni-setting"></em>
                                                                    </a>
                                                                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-xs">
                                                                        {{--<ul class="link-check">
                                                                            <li><span>Show</span></li>
                                                                            <li class="active"><a href="#">10</a></li>
                                                                            <li><a href="#">20</a></li>
                                                                            <li><a href="#">50</a></li>
                                                                        </ul>
                                                                        <ul class="link-check">
                                                                            <li><span>Order</span></li>
                                                                            <li class="active"><a href="#">DESC</a></li>
                                                                            <li><a href="#">ASC</a></li>
                                                                        </ul>
                                                                        <ul class="link-check">
                                                                            <li><span>Density</span></li>
                                                                            <li class="active"><a href="#">Regular</a></li>
                                                                            <li><a href="#">Compact</a></li>
                                                                        </ul>--}}
                                                                    </div>
                                                                </div><!-- .dropdown -->
                                                            </li><!-- li -->
                                                        </ul><!-- .btn-toolbar -->
                                                    </div><!-- card-tools -->
                                                    <div class="card-search search-wrap" data-search="search">
                                                        <div class="search-content">
                                                            <a href="#" class="search-back btn btn-icon toggle-search" data-target="search"><em class="icon ni ni-arrow-left"></em></a>
                                                            <input type="text" class="form-control form-control-sm border-transparent form-focus-none" placeholder="Quick search by order id">
                                                            <button class="search-submit btn btn-icon"><em class="icon ni ni-search"></em></button>
                                                        </div>
                                                    </div><!-- card-search -->
                                                </div><!-- .card-title-group -->
                                            </div><!-- .card-inner -->

                                            <div class="card-inner p-0">

                                                <table class="table table-orders">
                                                    <thead class="tb-odr-head">
                                                        <tr class="tb-odr-item">
                                                            <th class="tb-odr-info">
                                                                <span class="tb-odr-id">Order ID</span>
                                                                <span class="tb-odr-date d-none d-md-inline-block">Date</span>
                                                            </th>
                                                            <th class="tb-odr-amount">
                                                                <span class="tb-odr-total">Amount</span>
                                                              
                                                            </th>
                                                            <th class="tb-odr-amount">
                                                           
                                                                <span class="tb-odr-status d-none d-md-inline-block">DESC</span>
                                                            </th>
                                                            <th class="tb-odr-action">&nbsp;</th>
                                                        </tr>
                                                    </thead>

                                                    <tbody class="tb-odr-body">
                                                    @foreach($myTransactions as $transactn)
                                                        <tr class="tb-odr-item">
                                                            <td class="tb-odr-info">
                                                                <span class="tb-odr-id"><a href="html/crm/invoice-details.html">#{{$transactn->id}}</a></span>
                                                                <span class="tb-odr-date">{{date_format($transactn->created_at, 'd M, Y H:i')}}</span>
                                                            </td>
                                                            <td class="tb-odr-amount">
                                                                <span class="tb-odr-total">
                                                                    <span class="amount">${{number_format($transactn->amount)}}</span>
                                                                </span>
                                                             
                                                            </td>
                                                            <td  class="tb-odr-info">
                                                            <span class="tb-odr-status">
                                                                   {{$transactn->purpose}}
                                                                        </span>
                                                                        </td>
                                                            <td class="tb-odr-action">
                                                                <div class="tb-odr-btns d-none d-sm-inline">
                                                                    <a href="html/invoice-print.html" target="_blank" class="btn btn-icon btn-white btn-dim btn-sm btn-primary"><em class="icon ni ni-printer-fill"></em></a>
                                                                    <a href="html/crm/invoice-details.html" class="btn btn-dim btn-sm btn-primary">View</a>
                                                                </div>
                                                                <a href="html/crm/invoice-details.html" class="btn btn-pd-auto d-sm-none"><em class="icon ni ni-chevron-right"></em></a>
                                                            </td>
                                                        </tr><!-- .tb-odr-item -->
                                                        @endforeach
                                                     
                                                      
                                               
                                                    </tbody>
                                                </table>
                                            </div><!-- .card-inner -->
                                            <div class="card-inner">
                                                <ul class="pagination justify-content-center justify-content-md-start">
                                                    <li class="page-item"><a class="page-link" href="#">Prev</a></li>
                                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                                    <li class="page-item"><span class="page-link"><em class="icon ni ni-more-h"></em></span></li>
                                                    <li class="page-item"><a class="page-link" href="#">6</a></li>
                                                    <li class="page-item"><a class="page-link" href="#">7</a></li>
                                                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                                                </ul><!-- .pagination -->
                                            </div><!-- .card-inner -->
                                        </div><!-- .card-inner-group -->
                                    </div><!-- .card -->
                                </div><!-- .nk-block -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content @e -->
                @endsection