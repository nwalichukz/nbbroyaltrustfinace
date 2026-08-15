<!-- content @s -->
@extends('dashboard/src/html/crm/dashboard-layout')
@section('content')
<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Transaction</h3>
                        </div><!-- .nk-block-head-content -->
                        <div class="nk-block-head-content">
                            <div class="toggle-wrap nk-block-tools-toggle">
                                <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                                <div class="toggle-expand-content" data-content="pageMenu">
                                    <ul class="nk-block-tools g-3">
                                        <li>
                                            <div class="drodown">
                                                <a href="#" class="dropdown-toggle btn btn-white btn-dim btn-outline-light" data-bs-toggle="dropdown"><em class="d-none d-sm-inline icon ni ni-filter-alt"></em><span>Filtered By</span><em class="dd-indc icon ni ni-chevron-right"></em></a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <ul class="link-list-opt no-bdr">
                                                        <li><a href="#"><span>10days</span></a></li>
                                                        <li><a href="#"><span>20days</span></a></li>
                                                        <li><a href="#"><span>30days</span></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>
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
                                    <div class="card-tools">
                                        <div class="form-inline flex-nowrap gx-3">
                                            <div class="form-wrap w-150px">
                                                <select class="form-select js-select2 js-select2-sm" data-search="off" data-placeholder="Bulk Action">
                                                    <option value="">Bulk Action</option>
                                                    <option value="email">Send Email</option>
                                                    <option value="suspend">Suspend </option>
                                                    <option value="delete">Delete </option>
                                                </select>
                                            </div>
                                            <div class="btn-wrap">
                                                <span class="d-none d-md-block"><button class="btn btn-dim btn-outline-light disabled">Apply</button></span>
                                                <span class="d-md-none"><button class="btn btn-dim btn-outline-light btn-icon disabled"><em class="icon ni ni-arrow-right"></em></button></span>
                                            </div>
                                        </div><!-- .form-inline -->
                                    </div><!-- .card-tools -->
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
                                                        <ul class="link-check">
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
                                                        </ul>
                                                    </div>
                                                </div><!-- .dropdown -->
                                            </li><!-- li -->
                                        </ul><!-- .btn-toolbar -->
                                    </div><!-- card-tools -->
                                    <div class="card-search search-wrap" data-search="search">
                                        <div class="search-content">
                                            <a href="#" class="search-back btn btn-icon toggle-search" data-target="search"><em class="icon ni ni-arrow-left"></em></a>
                                            <input type="text" class="form-control form-control-sm border-transparent form-focus-none" placeholder="Quick search by Bank">
                                            <button class="search-submit btn btn-icon"><em class="icon ni ni-search"></em></button>
                                        </div>
                                    </div><!-- card-search -->
                                </div><!-- .card-title-group -->
                            </div><!-- .card-inner -->
                            <div class="card-inner p-0">
                                <table class="nk-tb-list nk-tb-ulist">
                                    <thead>
                                        <tr class="nk-tb-item nk-tb-head">
                                            <th class="nk-tb-col nk-tb-col-check">
                                                <div class="custom-control custom-control-sm custom-checkbox notext">
                                                    <input type="checkbox" class="custom-control-input" id="pid-all">
                                                    <label class="custom-control-label" for="pid-all"></label>
                                                </div>
                                            </th>
                                            <th class="nk-tb-col"><span class="sub-text">Name</span></th>
                                            <th class="nk-tb-col tb-col-lg"><span class="sub-text">Date</span></th>
                                            <th class="nk-tb-col tb-col-xl"><span class="sub-text">Account</span></th>
                                            <th class="nk-tb-col tb-col-sm"><span class="sub-text">Account Number</span></th>
                                            <th class="nk-tb-col tb-col-md"><span class="sub-text">Transaction ID</span></th>
                                            <th class="nk-tb-col"><span class="sub-text">Amount</span></th>
                                            <th class="nk-tb-col nk-tb-col-tools text-end">
                                                <div class="dropdown">
                                                    <a href="#" class="btn btn-xs btn-trigger btn-icon dropdown-toggle me-n1" data-bs-toggle="dropdown" data-offset="0,5"><em class="icon ni ni-more-h"></em></a>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <ul class="link-list-opt no-bdr">
                                                            <li><a href="#"><em class="icon ni ni-check-round-cut"></em><span>Mark As Done</span></a></li>
                                                            <li><a href="#"><em class="icon ni ni-archive"></em><span>Mark As Archive</span></a></li>
                                                            <li><a href="#"><em class="icon ni ni-trash"></em><span>Remove Deposite</span></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </th>
                                        </tr><!-- .nk-tb-item -->
                                    </thead>
                                    <tbody>
                                        <tr class="nk-tb-item">
                                            <td class="nk-tb-col nk-tb-col-check">
                                                <div class="custom-control custom-control-sm custom-checkbox notext">
                                                    <input type="checkbox" class="custom-control-input" id="pid-01">
                                                    <label class="custom-control-label" for="pid-01"></label>
                                                </div>
                                            </td>
                                            <td class="nk-tb-col">
                                                <div class="user-card">
                                                    <div class="user-avatar user-avatar-sm bg-warning">
                                                        <img src="./images/avatar/b-sm.jpg" alt="">
                                                    </div>
                                                    <div class="user-name">
                                                        <span class="tb-lead">Blanca Schultz</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="nk-tb-col tb-col-lg">
                                                <span>12.01.2021</span>
                                            </td>
                                            <td class="nk-tb-col tb-col-xl">
                                                <span>Paypal</span>
                                            </td>
                                            <td class="nk-tb-col tb-col-sm">
                                                <span>026090675</span>
                                            </td>
                                            <td class="nk-tb-col tb-col-md">
                                                <span>1259983MN421ER9H</span>
                                            </td>
                                            <td class="nk-tb-col">
                                                <span>$560.30</span>
                                            </td>
                                            <td class="nk-tb-col nk-tb-col-tools">
                                                <ul class="nk-tb-actions gx-1">
                                                    <li>
                                                        <div class="drodown">
                                                            <a href="#" class="dropdown-toggle btn btn-sm btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                <ul class="link-list-opt no-bdr">
                                                                    <li><a data-bs-toggle="modal" href="#editDeposit"><em class="icon ni ni-edit"></em><span>Edit </span></a></li>
                                                                    <li><a data-bs-toggle="modal" href="#deleteDeposit"><em class="icon ni ni-delete"></em><span>Delete </span></a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr><!-- .nk-tb-item -->
                                        <tr class="nk-tb-item">
                                            <td class="nk-tb-col nk-tb-col-check">
                                                <div class="custom-control custom-control-sm custom-checkbox notext">
                                                    <input type="checkbox" class="custom-control-input" id="pid-02">
                                                    <label class="custom-control-label" for="pid-02"></label>
                                                </div>
                                            </td>
                                            <td class="nk-tb-col">
                                                <div class="user-card">
                                                    <div class="user-avatar user-avatar-sm bg-purple">
                                                        <img src="./images/avatar/a-sm.jpg" alt="">
                                                    </div>
                                                    <div class="user-name">
                                                        <span class="tb-lead">Aidyn Cody</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="nk-tb-col tb-col-lg">
                                                <span>04.01.2021</span>
                                            </td>
                                            <td class="nk-tb-col tb-col-xl">
                                                <span>NexusPay</span>
                                            </td>
                                            <td class="nk-tb-col tb-col-sm">
                                                <span>024679873</span>
                                            </td>
                                            <td class="nk-tb-col tb-col-md">
                                                <span>7853HJG578KJN872</span>
                                            </td>
                                            <td class="nk-tb-col">
                                                <span>$750.25</span>
                                            </td>
                                            <td class="nk-tb-col nk-tb-col-tools">
                                                <ul class="nk-tb-actions gx-1">
                                                    <li>
                                                        <div class="drodown">
                                                            <a href="#" class="dropdown-toggle btn btn-sm btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                <ul class="link-list-opt no-bdr">
                                                                    <li><a data-bs-toggle="modal" href="#editDeposit"><em class="icon ni ni-edit"></em><span>Edit </span></a></li>
                                                                    <li><a data-bs-toggle="modal" href="#deleteDeposit"><em class="icon ni ni-delete"></em><span>Delete </span></a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr><!-- .nk-tb-item -->
                                        <tr class="nk-tb-item">
                                            <td class="nk-tb-col nk-tb-col-check">
                                                <div class="custom-control custom-control-sm custom-checkbox notext">
                                                    <input type="checkbox" class="custom-control-input" id="pid-03">
                                                    <label class="custom-control-label" for="pid-03"></label>
                                                </div>
                                            </td>
                                            <td class="nk-tb-col">
                                                <div class="user-card">
                                                    <div class="user-avatar user-avatar-sm bg-success">
                                                        <span>ED</span>
                                                    </div>
                                                    <div class="user-name">
                                                        <span class="tb-lead">Emeline Duarte</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="nk-tb-col tb-col-lg">
                                                <span>22.11.2020</span>
                                            </td>
                                            <td class="nk-tb-col tb-col-xl">
                                                <span>Payoneer</span>
                                            </td>
                                            <td class="nk-tb-col tb-col-sm">
                                                <span>026002532</span>
                                            </td>
                                            <td class="nk-tb-col tb-col-md">
                                                <span>34522323MN340LP1F</span>
                                            </td>
                                            <td class="nk-tb-col">
                                                <span>$459.25</span>
                                            </td>
                                            <td class="nk-tb-col nk-tb-col-tools">
                                                <ul class="nk-tb-actions gx-1">
                                                    <li>
                                                        <div class="drodown">
                                                            <a href="#" class="dropdown-toggle btn btn-sm btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                <ul class="link-list-opt no-bdr">
                                                                    <li><a data-bs-toggle="modal" href="#editDeposit"><em class="icon ni ni-edit"></em><span>Edit </span></a></li>
                                                                    <li><a data-bs-toggle="modal" href="#deleteDeposit"><em class="icon ni ni-delete"></em><span>Delete </span></a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr><!-- .nk-tb-item -->
                                        <tr class="nk-tb-item">
                                            <td class="nk-tb-col nk-tb-col-check">
                                                <div class="custom-control custom-control-sm custom-checkbox notext">
                                                    <input type="checkbox" class="custom-control-input" id="pid-04">
                                                    <label class="custom-control-label" for="pid-04"></label>
                                                </div>
                                            </td>
                                            <td class="nk-tb-col">
                                                <div class="user-card">
                                                    <div class="user-avatar user-avatar-sm bg-purple">
                                                        <span>AB</span>
                                                    </div>
                                                    <div class="user-name">
                                                        <span class="tb-lead">Abu Bin Ishtiyak</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="nk-tb-col tb-col-lg">
                                                <span>02.03.2021</span>
                                            </td>
                                            <td class="nk-tb-col tb-col-xl">
                                                <span>Paypal</span>
                                            </td>
                                            <td class="nk-tb-col tb-col-sm">
                                                <span>026002532</span>
                                            </td>
                                            <td class="nk-tb-col tb-col-md">
                                                <span>34522323MN340LP1F</span>
                                            </td>
                                            <td class="nk-tb-col">
                                                <span>$459.25</span>
                                            </td>
                                            <td class="nk-tb-col nk-tb-col-tools">
                                                <ul class="nk-tb-actions gx-1">
                                                    <li>
                                                        <div class="drodown">
                                                            <a href="#" class="dropdown-toggle btn btn-sm btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                <ul class="link-list-opt no-bdr">
                                                                    <li><a data-bs-toggle="modal" href="#editDeposit"><em class="icon ni ni-edit"></em><span>Edit </span></a></li>
                                                                    <li><a data-bs-toggle="modal" href="#deleteDeposit"><em class="icon ni ni-delete"></em><span>Delete </span></a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr><!-- .nk-tb-item -->
                                        <tr class="nk-tb-item">
                                            <td class="nk-tb-col nk-tb-col-check">
                                                <div class="custom-control custom-control-sm custom-checkbox notext">
                                                    <input type="checkbox" class="custom-control-input" id="pid-05">
                                                    <label class="custom-control-label" for="pid-05"></label>
                                                </div>
                                            </td>
                                            <td class="nk-tb-col">
                                                <div class="user-card">
                                                    <div class="user-avatar user-avatar-sm bg-warning">
                                                        <img src="./images/avatar/c-sm.jpg" alt="">
                                                    </div>
                                                    <div class="user-name">
                                                        <span class="tb-lead">Larry Lin</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="nk-tb-col tb-col-lg">
                                                <span>14.03.2021</span>
                                            </td>
                                            <td class="nk-tb-col tb-col-xl">
                                                <span>Paypal</span>
                                            </td>
                                            <td class="nk-tb-col tb-col-sm">
                                                <span>023459061</span>
                                            </td>
                                            <td class="nk-tb-col tb-col-md">
                                                <span>1259983MN4289EHJF</span>
                                            </td>
                                            <td class="nk-tb-col">
                                                <span>$890.30</span>
                                            </td>
                                            <td class="nk-tb-col nk-tb-col-tools">
                                                <ul class="nk-tb-actions gx-1">
                                                    <li>
                                                        <div class="drodown">
                                                            <a href="#" class="dropdown-toggle btn btn-sm btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                <ul class="link-list-opt no-bdr">
                                                                    <li><a data-bs-toggle="modal" href="#editDeposit"><em class="icon ni ni-edit"></em><span>Edit </span></a></li>
                                                                    <li><a data-bs-toggle="modal" href="#deleteDeposit"><em class="icon ni ni-delete"></em><span>Delete </span></a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr><!-- .nk-tb-item -->
                                        <tr class="nk-tb-item">
                                            <td class="nk-tb-col nk-tb-col-check">
                                                <div class="custom-control custom-control-sm custom-checkbox notext">
                                                    <input type="checkbox" class="custom-control-input" id="pid-06">
                                                    <label class="custom-control-label" for="pid-06"></label>
                                                </div>
                                            </td>
                                            <td class="nk-tb-col">
                                                <div class="user-card">
                                                    <div class="user-avatar user-avatar-sm bg-warning">
                                                        <img src="./images/avatar/a-sm.jpg" alt="">
                                                    </div>
                                                    <div class="user-name">
                                                        <span class="tb-lead">Aliah Pitts</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="nk-tb-col tb-col-lg">
                                                <span>29.07.2020</span>
                                            </td>
                                            <td class="nk-tb-col tb-col-xl">
                                                <span>Payoneer</span>
                                            </td>
                                            <td class="nk-tb-col tb-col-sm">
                                                <span>023459061</span>
                                            </td>
                                            <td class="nk-tb-col tb-col-md">
                                                <span>5779983MN4289EBHR</span>
                                            </td>
                                            <td class="nk-tb-col">
                                                <span>$1230.50</span>
                                            </td>
                                            <td class="nk-tb-col nk-tb-col-tools">
                                                <ul class="nk-tb-actions gx-1">
                                                    <li>
                                                        <div class="drodown">
                                                            <a href="#" class="dropdown-toggle btn btn-sm btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                <ul class="link-list-opt no-bdr">
                                                                    <li><a data-bs-toggle="modal" href="#editDeposit"><em class="icon ni ni-edit"></em><span>Edit </span></a></li>
                                                                    <li><a data-bs-toggle="modal" href="#deleteDeposit"><em class="icon ni ni-delete"></em><span>Delete </span></a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr><!-- .nk-tb-item -->
                                        <tr class="nk-tb-item">
                                            <td class="nk-tb-col nk-tb-col-check">
                                                <div class="custom-control custom-control-sm custom-checkbox notext">
                                                    <input type="checkbox" class="custom-control-input" id="pid-07">
                                                    <label class="custom-control-label" for="pid-07"></label>
                                                </div>
                                            </td>
                                            <td class="nk-tb-col">
                                                <div class="user-card">
                                                    <div class="user-avatar user-avatar-sm bg-success">
                                                        <span>ED</span>
                                                    </div>
                                                    <div class="user-name">
                                                        <span class="tb-lead">Emeline Duarte</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="nk-tb-col tb-col-lg">
                                                <span>22.11.2020</span>
                                            </td>
                                            <td class="nk-tb-col tb-col-xl">
                                                <span>Payoneer</span>
                                            </td>
                                            <td class="nk-tb-col tb-col-sm">
                                                <span>026002532</span>
                                            </td>
                                            <td class="nk-tb-col tb-col-md">
                                                <span>34522323MN340LP1F</span>
                                            </td>
                                            <td class="nk-tb-col">
                                                <span>$459.25</span>
                                            </td>
                                            <td class="nk-tb-col nk-tb-col-tools">
                                                <ul class="nk-tb-actions gx-1">
                                                    <li>
                                                        <div class="drodown">
                                                            <a href="#" class="dropdown-toggle btn btn-sm btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                <ul class="link-list-opt no-bdr">
                                                                    <li><a data-bs-toggle="modal" href="#editDeposit"><em class="icon ni ni-edit"></em><span>Edit </span></a></li>
                                                                    <li><a data-bs-toggle="modal" href="#deleteDeposit"><em class="icon ni ni-delete"></em><span>Delete </span></a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr><!-- .nk-tb-item -->
                                        <tr class="nk-tb-item">
                                            <td class="nk-tb-col nk-tb-col-check">
                                                <div class="custom-control custom-control-sm custom-checkbox notext">
                                                    <input type="checkbox" class="custom-control-input" id="pid-08">
                                                    <label class="custom-control-label" for="pid-08"></label>
                                                </div>
                                            </td>
                                            <td class="nk-tb-col">
                                                <div class="user-card">
                                                    <div class="user-avatar user-avatar-sm bg-warning">
                                                        <img src="./images/avatar/c-sm.jpg" alt="">
                                                    </div>
                                                    <div class="user-name">
                                                        <span class="tb-lead">Larry Lin</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="nk-tb-col tb-col-lg">
                                                <span>14.03.2021</span>
                                            </td>
                                            <td class="nk-tb-col tb-col-xl">
                                                <span>Paypal</span>
                                            </td>
                                            <td class="nk-tb-col tb-col-sm">
                                                <span>023459061</span>
                                            </td>
                                            <td class="nk-tb-col tb-col-md">
                                                <span>1259983MN4289EHJF</span>
                                            </td>
                                            <td class="nk-tb-col">
                                                <span>$890.30</span>
                                            </td>
                                            <td class="nk-tb-col nk-tb-col-tools">
                                                <ul class="nk-tb-actions gx-1">
                                                    <li>
                                                        <div class="drodown">
                                                            <a href="#" class="dropdown-toggle btn btn-sm btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                <ul class="link-list-opt no-bdr">
                                                                    <li><a data-bs-toggle="modal" href="#editDeposit"><em class="icon ni ni-edit"></em><span>Edit </span></a></li>
                                                                    <li><a data-bs-toggle="modal" href="#deleteDeposit"><em class="icon ni ni-delete"></em><span>Delete </span></a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr><!-- .nk-tb-item -->
                                        <tr class="nk-tb-item">
                                            <td class="nk-tb-col nk-tb-col-check">
                                                <div class="custom-control custom-control-sm custom-checkbox notext">
                                                    <input type="checkbox" class="custom-control-input" id="pid-09">
                                                    <label class="custom-control-label" for="pid-09"></label>
                                                </div>
                                            </td>
                                            <td class="nk-tb-col">
                                                <div class="user-card">
                                                    <div class="user-avatar user-avatar-sm bg-purple">
                                                        <span>AB</span>
                                                    </div>
                                                    <div class="user-name">
                                                        <span class="tb-lead">Abu Bin Ishtiyak</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="nk-tb-col tb-col-lg">
                                                <span>02.03.2021</span>
                                            </td>
                                            <td class="nk-tb-col tb-col-xl">
                                                <span>Paypal</span>
                                            </td>
                                            <td class="nk-tb-col tb-col-sm">
                                                <span>026002532</span>
                                            </td>
                                            <td class="nk-tb-col tb-col-md">
                                                <span>34522323MN340LP1F</span>
                                            </td>
                                            <td class="nk-tb-col">
                                                <span>$459.25</span>
                                            </td>
                                            <td class="nk-tb-col nk-tb-col-tools">
                                                <ul class="nk-tb-actions gx-1">
                                                    <li>
                                                        <div class="drodown">
                                                            <a href="#" class="dropdown-toggle btn btn-sm btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                <ul class="link-list-opt no-bdr">
                                                                    <li><a data-bs-toggle="modal" href="#editDeposit"><em class="icon ni ni-edit"></em><span>Edit </span></a></li>
                                                                    <li><a data-bs-toggle="modal" href="#deleteDeposit"><em class="icon ni ni-delete"></em><span>Delete </span></a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr><!-- .nk-tb-item -->
                                        <tr class="nk-tb-item">
                                            <td class="nk-tb-col nk-tb-col-check">
                                                <div class="custom-control custom-control-sm custom-checkbox notext">
                                                    <input type="checkbox" class="custom-control-input" id="pid-10">
                                                    <label class="custom-control-label" for="pid-10"></label>
                                                </div>
                                            </td>
                                            <td class="nk-tb-col">
                                                <div class="user-card">
                                                    <div class="user-avatar user-avatar-sm bg-warning">
                                                        <img src="./images/avatar/c-sm.jpg" alt="">
                                                    </div>
                                                    <div class="user-name">
                                                        <span class="tb-lead">Larry Lin</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="nk-tb-col tb-col-lg">
                                                <span>14.03.2021</span>
                                            </td>
                                            <td class="nk-tb-col tb-col-xl">
                                                <span>Paypal</span>
                                            </td>
                                            <td class="nk-tb-col tb-col-sm">
                                                <span>023459061</span>
                                            </td>
                                            <td class="nk-tb-col tb-col-md">
                                                <span>1259983MN4289EHJF</span>
                                            </td>
                                            <td class="nk-tb-col">
                                                <span>$890.30</span>
                                            </td>
                                            <td class="nk-tb-col nk-tb-col-tools">
                                                <ul class="nk-tb-actions gx-1">
                                                    <li>
                                                        <div class="drodown">
                                                            <a href="#" class="dropdown-toggle btn btn-sm btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                <ul class="link-list-opt no-bdr">
                                                                    <li><a data-bs-toggle="modal" href="#editDeposit"><em class="icon ni ni-edit"></em><span>Edit </span></a></li>
                                                                    <li><a data-bs-toggle="modal" href="#deleteDeposit"><em class="icon ni ni-delete"></em><span>Delete </span></a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr><!-- .nk-tb-item -->
                                    </tbody>
                                </table><!-- .nk-tb-list -->
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
@endsection