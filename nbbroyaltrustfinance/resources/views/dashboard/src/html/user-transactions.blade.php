@extends('dashboard/src/html/crm/dashboard-layout')
@section('content')
     <!-- content @s -->
     <div class="nk-content ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
     <div class="col-md-5">
                                            <div class="card card-bordered card-full">
                                                <div class="card-inner-group">
                                                    <div class="card-inner">
                                                        <div class="card-title-group">
                                                            <div class="card-title">
                                                                <h6 class="title">My Transactions</h6>
                                                            </div>
                                                            <div class="card-tools">
                                                                <a href="html/crm/recent-sale.html" class="link">Edit All</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-inner p-0">
                                                        <table class="nk-tb-list nk-tb-ulist">
                                                            <thead>
                                                                <tr class="nk-tb-item nk-tb-head">
                                                                  
                                                                    <th class="nk-tb-col"><span class="sub-text">Desc</span></th>
                                                                    <th class="nk-tb-col"><span class="sub-text">Type</span></th>
                                                                    <th class="nk-tb-col"><span class="sub-text">Amount</span></th>
                                                                    <th class="nk-tb-col"><span class="sub-text">Date</span></th>
                                                                   
                                                                    <th class="nk-tb-col nk-tb-col-tools text-end">
                                                                        {{--<div class="dropdown">
                                                                            <a href="#" class="btn btn-xs btn-trigger btn-icon dropdown-toggle me-n1" data-bs-toggle="dropdown" data-offset="0,5"><em class="icon ni ni-more-h"></em></a>
                                                                            
                                                                        </div>--}}
                                                                    </th>
                                                                </tr><!-- .nk-tb-item -->
                                                            </thead>
                                                            <tbody>
                                                                @foreach($myTransactions as $myTransact)
                                                                <tr class="nk-tb-item">
                                                                  
                                                                    <td class="nk-tb-col">
                                                                        <span>{{$myTransact->purpose}}<span class="dot dot-success d-lg-none ms-1"></span></span>
                                                                    </td>
                                                                    <td class="nk-tb-col">
                                                                        <span>{{$myTransact->transaction_type}}</span>
                                                                    </td>

                                                                    <td class="nk-tb-col">
                                                                        <span>{{$myTransact->amount}}</span>
                                                                    </td>

                                                                    <td class="nk-tb-col">
                                                                        <span>{{$myTransact->created_at->diffForHumans()}}</span>
                                                                    </td>
                                                                   
                                                                    <td class="nk-tb-col nk-tb-col-tools">
                                                                        <ul class="nk-tb-actions">
                                                                            <li>
                                                                                <div class="dropdown">
                                                                                    <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                                                    <div class="dropdown-menu dropdown-menu-end">
                                                                                        <ul class="link-list-opt no-bdr">
                                                                                            <li><a data-bs-toggle="modal" href="#editDataDash"><em class="icon ni ni-trash"></em><span>Delete</span></a></li>
                                                                                         
                                                                                        </ul>
                                                                                    </div>
                                                                                </div>
                                                                            </li>
                                                                        </ul>
                                                                    </td>
                                                                </tr><!-- .nk-tb-item -->
                                            @endforeach
                                                          
                                                           
                                                            </tbody>
                                                        </table><!-- .nk-tb-list -->
                                                    </div><!-- .card-inner -->
                                                </div>
                                            </div><!-- .card -->
                                        </div>
                                        </div>
                                        </div>
                                        </div>
</div>
                @endsection
                <!-- content @e -->