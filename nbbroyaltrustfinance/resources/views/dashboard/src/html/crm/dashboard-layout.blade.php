@inject('appData', 'App\Services\Helper')
<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <base href="#">
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="{{ asset('dashboard/images/favicon.png')}}">
    <!-- Page Title  -->
    <title>MetroKapital | Dashboard</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="{{ asset('dashboard/assets/css/dashlite.css?ver=3.2.4')}}">
    <link id="skin-default" rel="stylesheet" href="{{ asset('dashboard/assets/css/theme.css?ver=3.2.4')}}">
    <script src="{{ asset('tinymce/js/tinymce/tinymce.min.js')}}" referrerpolicy="origin"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
      tinymce.init({
        selector: '#invdesc',    
      });
    </script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>

<body class="nk-body bg-lighter npc-general has-sidebar ">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- sidebar @s -->
            <div class="nk-sidebar nk-sidebar-fixed is-dark " data-content="sidebarMenu">
                <div class="nk-sidebar-element nk-sidebar-head">
                    <div class="nk-menu-trigger">
                        <a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu"><em class="icon ni ni-arrow-left"></em></a>
                        <a href="#" class="nk-nav-compact nk-quick-nav-icon d-none d-xl-inline-flex" data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
                    </div>

                    <div class="nk-sidebar-brand">
                        <a href="{{url('/')}}" class="logo-link nk-sidebar-logo">
                           <img class="logo-light logo-img" src="{{ asset('dashboard/images/logo.png')}}" srcset="{{ asset('dashboard/images/logo.png 2x')}}" alt="logo">
                            <img class="logo-light logo-img" src="{{ asset('dashboard/images/logo.png')}}" srcset="{{ asset('dashboard/images/logo.png 2x')}}" alt="logo">
                                   
                        </a>
                    </div>
                </div><!-- .nk-sidebar-element -->
                <div class="nk-sidebar-element nk-sidebar-body">
                    <div class="nk-sidebar-content">
                        <div class="nk-sidebar-menu" data-simplebar>
                            <ul class="nk-menu">

                                <li class="nk-menu-item">
                                    <a href="{{url('/user-signin/'.Auth::user()->id)}}" class="nk-men-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-dashboard-fill"></em></span>
                                        <span class="nk-menu-tex">Dashboard</span>
                                    </a>
                                </li><!-- .nk-menu-item -->

                                <li class="nk-menu-item has-sub">
                                    <a href="{{url('/dashboard/user-signin/'.Auth::user()->id)}}" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon"><em class="icon ni ni-task-fill-c"></em></span>
                                        <span class="nk-menu-text">Accounts</span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                       
                                        <li class="nk-menu-item">
                                            <a href="{{url('user/get-account-plans/Savings')}}" class="nk-menu-link"><span class="nk-menu-text">Savings</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="{{url('/user/get-account-plans/Retirement Plan')}}" class="nk-menu-link"><span class="nk-menu-text">Retirement</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="{{url('user/get-joint-account')}}" class="nk-menu-link"><span class="nk-menu-text">Joint</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="{{url('user/get-account-plans/Current')}}" class="nk-menu-link"><span class="nk-menu-text">Current</span></a>
                                        </li>
                                    </ul><!-- .nk-menu-sub -->
                                </li><!-- .nk-menu-item -->

                                <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon"><em class="icon ni ni-users-fill"></em></span>
                                        <span class="nk-menu-text">Balance</span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                        <li class="nk-menu-item">
                                            <a href="{{url('/dashboard/get-fund-account')}}" class="nk-menu-link"><span class="nk-menu-text">FUND ACCOUNT</span></a>
                                        </li>

                                        <li class="nk-menu-item">
                                            <a href="{{url('/dashboard/get-withdrawal-request')}}" class="nk-menu-link"><span class="nk-menu-text">WITHDRAWAL REQUEST</span></a>
                                        </li>

                                        {{--<li class="nk-menu-item">
                                            <a href="{{url('/user/wallet-info')}}" class="nk-menu-link"><span class="nk-menu-text">WALLET INFO</span></a>
                                        </li>--}}
                                      
                                    </ul><!-- .nk-menu-sub -->
                                </li><!-- .nk-menu-item -->
                                {{--<li class="nk-menu-item">
                                    <a href="html/crm/customer-list.html" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-user-list-fill"></em></span>
                                        <span class="nk-menu-text">Transactions</span>
                                    </a>
                                </li>--}}<!-- .nk-menu-item -->
                                <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon"><em class="icon ni ni-cart-fill"></em></span>
                                        <span class="nk-menu-text">Transfers</span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                        <li class="nk-menu-item">
                                            <a href="{{url('/dashboard/get-internal-transfer')}}" class="nk-menu-link"><span class="nk-menu-text">Internal</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="{{url('/dashboard/get-external-transfer')}}" class="nk-menu-link"><span class="nk-menu-text">External</span></a>
                                        </li>
                                        {{--<li class="nk-menu-item">
                                            <a href="html/crm/recent-sale.html" class="nk-menu-link"><span class="nk-menu-text">Recent Sale</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/crm/estimates.html" class="nk-menu-link"><span class="nk-menu-text">Estimates</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/crm/expenses.html" class="nk-menu-link"><span class="nk-menu-text">Expenses</span></a>
                                        </li>--}}
                                    </ul><!-- .nk-menu-sub -->
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon"><em class="icon ni ni-tranx"></em></span>
                                        <span class="nk-menu-text">Transactions</span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                        <li class="nk-menu-item">
                                            <a href="{{url('user/my-transactions/'.Auth::user()->id)}}" class="nk-menu-link"><span class="nk-menu-text">My Transactions</span></a>
                                        </li>
                                        {{--<li class="nk-menu-item">
                                            <a href="html/crm/transaction.html" class="nk-menu-link"><span class="nk-menu-text"> All Transaction</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/crm/transfer-report.html" class="nk-menu-link"><span class="nk-menu-text">Transfer Report</span></a>
                                        </li>--}}
                                    </ul><!-- .nk-menu-sub -->
                                </li><!-- .nk-menu-item -->



                                <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon"><em class="icon ni ni-coin"></em></span>
                                        <span class="nk-menu-text">FDR</span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                        @foreach($appData->getLabelName($fdr = "FDR") as $country)
                                        <li class="nk-menu-item">
                                            <a href="{{url('user/confirm-investment-type_two/'.$country->id)}}" class="nk-menu-link"><span class="nk-menu-text">{{$country->name}}</span></a>
                                        </li>
                                       @endforeach
                                    </ul><!-- .nk-menu-sub -->
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon"><em class="icon ni ni-truck"></em></span>
                                        <span class="nk-menu-text">Annuities</span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                        
                                        @foreach($appData->getLabelName($fdr = "Annuities") as $country)
                                        <li class="nk-menu-item">
                                    <a href="{{url('user/confirm-investment-type_two/'.$country->id)}}" class="nk-menu-link"><span class="nk-menu-text">{{$country->name}}</span></a>
                                        </li>
                                       @endforeach
                                    
                                    </ul><!-- .nk-menu-sub -->
                                </li><!-- .nk-menu-item -->

                                <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon"><em class="icon ni ni-growth-fill"></em></span>
                                        <span class="nk-menu-text">DPS</span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                    @foreach($appData->getLabelName($fdr = "DPS") as $country)
                                        <li class="nk-menu-item">
                                            <a href="{{url('user/confirm-investment-type_two/'.$country->id)}}" class="nk-menu-link"><span class="nk-menu-text">{{$country->name}}</span></a>
                                        </li>
                                       @endforeach
                                  
                                      
                                    </ul><!-- .nk-menu-sub -->
                                </li><!-- .nk-menu-item -->

                                <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon"><em class="icon ni ni-invest"></em></span>
                                        <span class="nk-menu-text">Investments</span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                    <li class="nk-menu-item">
                                            <a href="{{url('user/get-my-investments/'.Auth::user()->id)}}" class="nk-menu-link"><span class="nk-menu-text">My Investments</span></a>
                                        </li>
                                                                         
                                        </ul>   
                                        </li>

                                        <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon"><em class="icon ni ni-growth-fill"></em></span>
                                        <span class="nk-menu-text">Trading</span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                    @foreach($appData->getLabelName($fdr = "Trading") as $country)
                                        <li class="nk-menu-item">
                                            <a href="{{url('user/confirm-investment-type_two/'.$country->id)}}" class="nk-menu-link"><span class="nk-menu-text">{{$country->name}}</span></a>
                                        </li>
                                       @endforeach
                                  
                                      
                                    </ul><!-- .nk-menu-sub -->
                                </li><!-- .nk-menu-item -->

                                
                              @if(Auth::user()->access_level == 'admin')

                                <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon"><em class="icon ni ni-growth-fill"></em></span>
                                        <span class="nk-menu-text">Admin</span>
                                    </a>
                                    <ul class="nk-menu-sub">


                                         
                                <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon"><em class="icon ni ni-user"></em></span>
                                        <span class="nk-menu-text">Users</span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                        <li class="nk-menu-item">
                                            <a href="{{url('/admin/user-list')}}" class="nk-menu-link"><span class="nk-menu-text">All Users</span></a>
                                        </li>
                                        </ul>   
                                        </li>

                                        <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon"><em class="icon ni ni-invest"></em></span>
                                        <span class="nk-menu-text">Investments</span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                    {{--<li class="nk-menu-item">
                                            <a href="{{url('/admin/add-account-type')}}" class="nk-menu-link"><span class="nk-menu-text">Add Investment Type</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="{{url('/admin/get-all-investment-type')}}" class="nk-menu-link"><span class="nk-menu-text">View All Investment Type </span></a>
                                        </li>--}}

                                        <li class="nk-menu-item">
                                            <a href="{{url('/admin/get-all-investments')}}" class="nk-menu-link"><span class="nk-menu-text">View All Investment </span></a>
                                        </li>
                                        </ul>   
                                        </li>

                                        <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon"><em class="icon ni ni-wallet"></em></span>
                                        <span class="nk-menu-text">Wallets</span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                    <li class="nk-menu-item">
                                            <a href="{{url('/admin/add-wallet-address')}}" class="nk-menu-link"><span class="nk-menu-text">Add Wallet Address</span></a>
                                        </li>

                                        <li class="nk-menu-item">
                                            <a href="{{url('/admin/get-all-wallet-address')}}" class="nk-menu-link"><span class="nk-menu-text">View Wallet Address</span></a>
                                        </li>
                                        </ul>   
                                        </li>

                                        <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon"><em class="icon ni ni-user"></em></span>
                                        <span class="nk-menu-text">KYC Verifications</span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                        <li class="nk-menu-item">
                                            <a href="{{url('/admin/get-pending-kyc')}}" class="nk-menu-link"><span class="nk-menu-text">All Pending KYC</span></a>
                                        </li>
                                        </ul>   
                                        </li>

                                        
                                        <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon"><em class="icon ni ni-book"></em></span>
                                        <span class="nk-menu-text">Transactions</span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                    <li class="nk-menu-item">
                                            <a href="{{url('/admin/all-transactions')}}" class="nk-menu-link"><span class="nk-menu-text">All Transactions</span></a>
                                        </li>

                                        </ul>   
                                        </li>

                                        <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon"><em class="icon ni ni-support"></em></span>
                                        <span class="nk-menu-text">Account Officers</span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                   

                                        <li class="nk-menu-item">
                                            <a href="{{url('/admin/get-account-officer')}}" class="nk-menu-link"><span class="nk-menu-text">View Account officer</span></a>
                                        </li>

                                        </ul>   
                                        </li>

                                        <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon"><em class="icon ni ni-bell-fill"></em></span>
                                        <span class="nk-menu-text">Citizenship By Investment</span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                    <li class="nk-menu-item">
                                            <a href="{{url('/admin/get-citizenship-by-investment')}}" class="nk-menu-link"><span class="nk-menu-text">Add Citizenship</span></a>
                                        </li>

                                        <li class="nk-menu-item">
                                            <a href="{{url('/admin/get-all-citizenship-by-investment')}}" class="nk-menu-link"><span class="nk-menu-text">View All</span></a>
                                        </li>

                                        </ul>   
                                        </li>

                                        <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon"><em class="icon ni ni-clock"></em></span>
                                        <span class="nk-menu-text">Residency By Investment</span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                    <li class="nk-menu-item">
                                            <a href="{{url('/admin/get-residency-by-investment')}}" class="nk-menu-link"><span class="nk-menu-text">Add Investment</span></a>
                                        </li>

                                        <li class="nk-menu-item">
                                            <a href="{{url('/admin/get-all-residency-by-investment')}}" class="nk-menu-link"><span class="nk-menu-text">View All</span></a>
                                        </li>

                                        </ul>   
                                        </li>

                                        <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon"><em class="icon ni ni-activity-round-fill"></em></span>
                                        <span class="nk-menu-text">Residency By Real Estate</span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                    <li class="nk-menu-item">
                                            <a href="{{url('/admin/get-residency-by-real-estate')}}" class="nk-menu-link"><span class="nk-menu-text">Add Investment</span></a>
                                        </li>

                                        <li class="nk-menu-item">
                                            <a href="{{url('/admin/get-all-residency-by-real-estate')}}" class="nk-menu-link"><span class="nk-menu-text">View All</span></a>
                                        </li>

                                        </ul>   
                                        </li>

                                        <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon"><em class="icon ni ni-money"></em></span>
                                        <span class="nk-menu-text">Funding Request</span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                    <li class="nk-menu-item">
                                            <a href="{{url('/admin/deposit-request/get-all')}}" class="nk-menu-link"><span class="nk-menu-text">View Funding Request</span></a>
                                        </li>


                                        </ul>   
                                        </li>


                                        <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon"><em class="icon ni ni-money"></em></span>
                                        <span class="nk-menu-text">Withdrawal Request</span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                    <li class="nk-menu-item">
                                            <a href="{{url('/admin/withdrawal-request/get-all')}}" class="nk-menu-link"><span class="nk-menu-text">View Withdrawal Request</span></a>
                                        </li>


                                        </ul>   
                                        </li>
                                      
                                       
         
                                    </ul><!-- .nk-menu-sub -->
                                </li><!-- .nk-menu-item -->
                       @endif
                                



                                <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon"><em class="icon ni ni-layers-fill"></em></span>
                                        <span class="nk-menu-text">Arbitrage</span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                    @foreach($appData->getLabelName($fdr = "Arbitrage") as $country)
                                        <li class="nk-menu-item">
                                            <a href="{{url('user/confirm-investment-type_two/'.$country->id)}}" class="nk-menu-link"><span class="nk-menu-text">{{$country->name}}</span></a>
                                        </li>
                                       @endforeach
                                      
                                     
                                    </ul><!-- .nk-menu-sub -->
                                </li><!-- .nk-menu-item -->

                                <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon"><em class="icon ni ni-growth-fill"></em></span>
                                        <span class="nk-menu-text">KYC</span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                        <li class="nk-menu-item">
                                            <a href="{{url('user/get-kyc-page')}}" class="nk-menu-link">
                                                <span class="nk-menu-text"> Upload Documents </span></a>
                                        </li>
                                       
                                    
                                    </ul><!-- .nk-menu-sub -->
                                </li><!-- .nk-menu-item -->

                                <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon"><em class="icon ni ni-layers-fill"></em></span>
                                        <span class="nk-menu-text">Islamic Banking</span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                    @foreach($appData->getLabelName($fdr = "Islamic Banking") as $country)
                                        <li class="nk-menu-item">
                                            <a href="{{url('user/confirm-investment-type_two/'.$country->id)}}" class="nk-menu-link"><span class="nk-menu-text">{{$country->name}}</span></a>
                                        </li>
                                       @endforeach
                                      
                                        {{--<li class="nk-menu-item">
                                            <a href="html/crm/expense-report.html" class="nk-menu-link"><span class="nk-menu-text">Expense Report</span></a>
                                        </li>--}}
                                    </ul><!-- .nk-menu-sub -->
                                </li><!-- .nk-menu-item -->

                                {{--<li class="nk-menu-item">
                                    <a href="html/crm/employee.html" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-layers-fill"></em></span>
                                        <span class="nk-menu-text">Employees</span>
                                    </a>
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-item">
                                    <a href="html/crm/projects.html" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-list-index-fill"></em></span>
                                        <span class="nk-menu-text">Projects</span>
                                    </a>
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon"><em class="icon ni ni-coins"></em></span>
                                        <span class="nk-menu-text">Payroll</span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                        <li class="nk-menu-item">
                                            <a href="html/crm/salary-grade.html" class="nk-menu-link"><span class="nk-menu-text">Salary grade</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/crm/employee-salary-list.html" class="nk-menu-link"><span class="nk-menu-text">Employee Salary List</span></a>
                                        </li>
                                    </ul><!-- .nk-menu-sub -->
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-item">
                                    <a href="html/crm/time-history.html" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-calendar-check-fill"></em></span>
                                        <span class="nk-menu-text">Attendance</span>
                                    </a>
                                </li>--}}<!-- .nk-menu-item -->
                                <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon"><em class="icon ni ni-truck"></em></span>
                                        <span class="nk-menu-text">Loans</span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                    @foreach($appData->getLabelName($fdr = "Loans") as $country)
                                        <li class="nk-menu-item">
                                            <a href="{{url('user/confirm-investment-type_two/'.$country->id)}}" class="nk-menu-link"><span class="nk-menu-text">{{$country->name}}</span></a>
                                        </li>
                                       @endforeach
                                    </ul><!-- .nk-menu-sub -->
                                </li><!-- .nk-menu-item -->
                               {{-- <li class="nk-menu-item">
                                    <a href="html/crm/subscription.html" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-invest"></em></span>
                                        <span class="nk-menu-text">Subscription</span>
                                    </a>
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-item">
                                    <a href="html/crm/notice-board.html" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-notice"></em></span>
                                        <span class="nk-menu-text">Notice Board</span>
                                    </a>
                                </li>--}}<!-- .nk-menu-item -->
                                <li class="nk-menu-item">
                                    <a href="{{url('/user/get-account-officer')}}" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-chat-circle-fill"></em></span>
                                        <span class="nk-menu-text">Account Officer</span>
                                    </a>
                                </li><!-- .nk-menu-item -->
                                <br></br></br></br>
                                {{--<li class="nk-menu-item">
                                    <a href="html/crm/support.html" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-chat-circle-fill"></em></span>
                                        <span class="nk-menu-text">Support</span>
                                    </a>
                                </li>
                                <!-- .nk-menu-item -->
                                <li class="nk-menu-item">
                                    <a href="html/crm/settings.html" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-setting-alt-fill"></em></span>
                                        <span class="nk-menu-text">Settings</span>
                                    </a>
                                </li><!-- .nk-menu-item -->

                                <li class="nk-menu-heading">
                                    <h6 class="overline-title text-primary-alt">Return to</h6>
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-item">
                                    <a href="html/index.html" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-dashlite-alt"></em></span>
                                        <span class="nk-menu-text">Main Dashboard</span>
                                    </a>
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-item">
                                    <a href="html/components.html" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-layers-fill"></em></span>
                                        <span class="nk-menu-text">All Components</span>
                                    </a>
                                </li>--}}<!-- .nk-menu-item -->
                            </ul><!-- .nk-menu -->
                        </div><!-- .nk-sidebar-menu -->
                    </div><!-- .nk-sidebar-content -->
                </div><!-- .nk-sidebar-element -->
            </div>
            <!-- sidebar @e -->
            <!-- wrap @s -->
            <div class="nk-wrap ">
                <!-- main header @s -->
                <div class="nk-header nk-header-fixed is-light">
                    <div class="container-fluid">
                        <div class="nk-header-wrap">
                            <div class="nk-menu-trigger d-xl-none ms-n1">
                                <a href="#" class="nk-nav-toggle nk-quick-nav-icon" data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
                            </div>
                            <div class="nk-header-brand d-xl-none">
                                <a href="{{url('/')}}" class="logo-link">
                                    <img class="logo-light logo-img" src="{{ asset('dashboard/images/logo.png')}}" srcset="{{ asset('dashboard/images/logo.png')}}" alt="logo">
                                    <img class="logo-light logo-img" src="{{ asset('dashboard/images/logo.png')}}" srcset="{{ asset('dashboard/images/logo.png')}}" alt="logo">
                                </a>
                            </div><!-- .nk-header-brand -->
                            <div class="nk-header-news d-none d-xl-block">
                                <div class="nk-news-list">
                                    <a class="nk-news-item" href="{{url('/')}}">
                                        <div class="nk-news-icon">
                                            <em class="icon ni ni-card-view"></em>
                                        </div>
                                        <div class="nk-news-text">
                                            <p>  <span>  </span></p>
                                            <em class="icon ni ni-external"></em>
                                        </div>
                                    </a>
                                </div>
                            </div><!-- .nk-header-news -->
                            <div class="nk-header-tools">
                                <ul class="nk-quick-nav">
                                    <li class="dropdown language-dropdown d-none d-sm-block me-n1">
                                        <a href="#" class="dropdown-toggle nk-quick-nav-icon" data-bs-toggle="dropdown">
                                            <div class="quick-icon border border-light">
                                                <img class="icon" src="{{ asset('dashboard/images/flags/english-sq.png')}}" alt="">
                                            </div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-s1">
                                            <ul class="language-list">
                                                <li>
                                                    <a href="#" class="language-item">
                                                        <img src="{{ asset('dashboard/images/flags/english.png')}}" alt="" class="language-flag">
                                                        <span class="language-name">English</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" class="language-item">
                                                        <img src="dashboard/images/flags/spanish.png" alt="" class="language-flag">
                                                        <span class="language-name">Español</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" class="language-item">
                                                        <img src="dashboard/images/flags/french.png" alt="" class="language-flag">
                                                        <span class="language-name">Français</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" class="language-item">
                                                        <img src="dashboard/images/flags/turkey.png" alt="" class="language-flag">
                                                        <span class="language-name">Türkçe</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li><!-- .dropdown -->
                                    <li class="dropdown user-dropdown">
                                        <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">
                                            <div class="user-toggle">
                                                <div class="user-avatar sm">
                                                    <em class="icon ni ni-user-alt"></em>
                                                </div>
                                                <div class="user-info d-none d-md-block">
                                                    <div class="user-status">@if(Auth::check()){{Auth::user()->access_level}} @endif</div>
                                                    <div class="user-name dropdown-indicator">@if(Auth::check()){{Auth::user()->name}}@endif </div>
                                                </div>
                                            </div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-end dropdown-menu-s1">
                                            <div class="dropdown-inner user-card-wrap bg-lighter d-none d-md-block">
                                                <div class="user-card">
                                                    <div class="user-avatar">
                                                        <span>@if(Auth::check()){{strtoupper(substr(Auth::user()->name,0, 2))}}@endif</span>
                                                    </div>
                                                    <div class="user-info">
                                                        <span class="lead-text">@if(Auth::check()){{Auth::user()->name}}@endif</span>
                                                        <span class="sub-text">@if(Auth::check()){{Auth::user()->email}}@endif</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="dropdown-inner">
                                                <ul class="link-list">
                                                    <li><a href="{{url('/user-profile-setting/'.Auth::user()->id)}}"><em class="icon ni ni-user-alt"></em><span>View Profile</span></a></li>
                                                    <li><a href="{{url('/user/change-password')}}"><em class="icon ni ni-setting-alt"></em><span>Change Password</span></a></li>
                                                    <li><a class="dark-switch" href="#"><em class="icon ni ni-moon"></em><span>Dark Mode</span></a></li>
                                                </ul>
                                            </div>
                                            <div class="dropdown-inner">
                                                <ul class="link-list">
                                                    <li><a href="{{ url('/logout')}}">
                                                        <em class="icon ni ni-signout"></em><span>Sign out</span></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li><!-- .dropdown -->
                                    <li class="dropdown notification-dropdown me-n1">
                                        <a href="#" class="dropdown-toggle nk-quick-nav-icon" data-bs-toggle="dropdown">
                                            <div class="icon-status icon-status-info"><em class="icon ni ni-bell"></em></div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-xl dropdown-menu-end dropdown-menu-s1">
                                            <div class="dropdown-head">
                                                <span class="sub-title nk-dropdown-title">Notifications</span>
                                                <a href="#">Mark All as Read</a>
                                            </div>
                                            <div class="dropdown-body">
                                                <div class="nk-notification">


                                                @foreach($appData->getUserHistory(Auth::user()->id) as $data)
                                                    <div class="nk-notification-item dropdown-inner">
                                                        @if($data->transaction_type == 'credit')
                                                        <div class="nk-notification-icon">
                                                            <em class="icon icon-circle bg-success-dim ni ni-curve-up-right"></em>
                                                        </div>
                                                        @elseif($data->transaction_type == 'debit')
                                                        <div class="nk-notification-icon">
                                                            <em class="icon icon-circle bg-warning-dim ni ni-curve-up-left"></em>
                                                        </div>
                                                        @endif

                                                        <div class="nk-notification-content">
                                                            <div class="nk-notification-text">{{$data->purpose}}</div>
                                                            <div class="nk-notification-time">{{$data->created_at->diffForHumans()}}</div>
                                                        </div>
                                                    </div>
                                                @endforeach


                                                </div><!-- .nk-notification -->
                                            </div><!-- .nk-dropdown-body -->
                                            <div class="dropdown-foot center">
                                                <a href="{{url('user/my-transactions/'.Auth::user()->id)}}">View All</a>
                                            </div>
                                        </div>
                                    </li><!-- .dropdown -->
                                </ul><!-- .nk-quick-nav -->
                            </div><!-- .nk-header-tools -->
                        </div><!-- .nk-header-wrap -->
                    </div><!-- .container-fliud -->
                </div>
                <!-- main header @e -->
              
                @include('partials/errors')
                @yield('content')

                <!-- footer @s -->
                <div class="nk-footer">
                    <div class="container-fluid">
                        <div class="nk-footer-wrap">
                            <div class="nk-footer-copyright"> &copy; {{Date('Y')}} <a href="https://metrokapital.org" target="_blank">MetroKapital</a>
                            </div>
                            {{--<div class="nk-footer-links">
                                <ul class="nav nav-sm">
                                    <li class="nav-item dropup">
                                        <a href="#" class="dropdown-toggle dropdown-indicator has-indicator nav-link" data-bs-toggle="dropdown" data-offset="0,10"><span>English</span></a>
                                        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-end">
                                            <ul class="language-list">
                                                <li>
                                                    <a href="#" class="language-item">
                                                        <span class="language-name">English</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" class="language-item">
                                                        <span class="language-name">Español</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" class="language-item">
                                                        <span class="language-name">Français</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" class="language-item">
                                                        <span class="language-name">Türkçe</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="nav-item">
                                        <a data-bs-toggle="modal" href="#region" class="nav-link"><em class="icon ni ni-globe"></em><span class="ms-1">Select Region</span></a>
                                    </li>
                                </ul>
                            </div>--}}
                        </div>
                    </div>
                </div>
                <!-- footer @e -->
            </div>
            <!-- wrap @e -->
        </div>
        <!-- main @e -->
    </div>
    <!-- app-root @e -->
    <!-- select region modal -->
    <div class="modal fade" tabindex="-1" role="dialog" id="region">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <a href="#" class="close" data-bs-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
                <div class="modal-body modal-body-md">
                    <h5 class="title mb-4">Select Your Country</h5>
                    <div class="nk-country-region">
                        <ul class="country-list text-center gy-2">
                            <li>
                                <a href="#" class="country-item">
                                    <img src="dashboard/images/flags/arg.png" alt="" class="country-flag">
                                    <span class="country-name">Argentina</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="dashboard/images/flags/aus.png" alt="" class="country-flag">
                                    <span class="country-name">Australia</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="dashboard/images/flags/bangladesh.png" alt="" class="country-flag">
                                    <span class="country-name">Bangladesh</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="dashboard/images/flags/canada.png" alt="" class="country-flag">
                                    <span class="country-name">Canada <small>(English)</small></span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="dashboard/images/flags/china.png" alt="" class="country-flag">
                                    <span class="country-name">Centrafricaine</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="dashboard/images/flags/china.png" alt="" class="country-flag">
                                    <span class="country-name">China</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="dashboard/images/flags/french.png" alt="" class="country-flag">
                                    <span class="country-name">France</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="dashboard/images/flags/germany.png" alt="" class="country-flag">
                                    <span class="country-name">Germany</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="dashboard/images/flags/iran.png" alt="" class="country-flag">
                                    <span class="country-name">Iran</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="dashboard/images/flags/italy.png" alt="" class="country-flag">
                                    <span class="country-name">Italy</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="dashboard/images/flags/mexico.png" alt="" class="country-flag">
                                    <span class="country-name">México</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="dashboard/images/flags/philipine.png" alt="" class="country-flag">
                                    <span class="country-name">Philippines</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="dashboard/images/flags/portugal.png" alt="" class="country-flag">
                                    <span class="country-name">Portugal</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="dashboard/images/flags/s-africa.png" alt="" class="country-flag">
                                    <span class="country-name">South Africa</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="dashboard/images/flags/spanish.png" alt="" class="country-flag">
                                    <span class="country-name">Spain</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="dashboard/images/flags/switzerland.png" alt="" class="country-flag">
                                    <span class="country-name">Switzerland</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="dashboard/images/flags/uk.png" alt="" class="country-flag">
                                    <span class="country-name">United Kingdom</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="dashboard/images/flags/english.png" alt="" class="country-flag">
                                    <span class="country-name">United State</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div><!-- .modal-content -->
        </div><!-- .modla-dialog -->
    </div><!-- .modal -->
    <!-- Department -->
    <div class="modal fade" id="addData">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <em class="icon ni ni-cross-sm"></em>
                </a>
                <div class="modal-body modal-body-md">
                    <h5 class="modal-title">Add Employee</h5>
                    <form action="#" class="mt-2">
                        <div class="row g-gs">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="name"> Name</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" id="name" placeholder="Abu Bin Istiak">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="email"> Email</label>
                                    <div class="form-control-wrap">
                                        <input type="email" class="form-control" id="email" placeholder="info@softnio.com">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Department</label>
                                    <div class="form-control-wrap">
                                        <select class="form-select js-select2">
                                            <option value="default_option">Select Department</option>
                                            <option value="bangladesh">Information Technology</option>
                                            <option value="canada">Finance</option>
                                            <option value="england">Marketing</option>
                                            <option value="pakistan">Human Resource</option>
                                            <option value="usa">Graphics</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="code">Designation</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" id="code" placeholder="Software developer">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="phone">Phone</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" id="phone" placeholder="+124 394-1787">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Address(Lane)</label>
                                    <div class="form-control-wrap">
                                        <select class="form-select js-select2">
                                            <option value="default_option">Select Address</option>
                                            <option value="dhaka">House 165, Lane No 3, Mohakhali DOHS,Dhaka</option>
                                            <option value="london">199 Bishopsgate, London</option>
                                            <option value="mumbai">Narottam Morarji Marg, Mumbai</option>
                                            <option value="kualalampur">Ipoh, Johor Bahru, Kualalampur</option>
                                            <option value="spain">Gran Vía, Madrid.</option>
                                            <option value="usa">182/A Y-ra, Boston</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label">Varified</label>
                                    <div class="form-control-wrap">
                                        <ul class="custom-control-group g-3 align-center flex-wrap">
                                            <li>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" checked="" id="Check1">
                                                    <label class="custom-control-label" for="Check1">Email</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" checked="" id="Check2">
                                                    <label class="custom-control-label" for="Check2">KYC</label>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <button data-bs-dismiss="modal" type="submit" class="btn btn-primary">Add Employee</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div><!-- .Edit Modal-Content -->
    <div class="modal fade" id="editData">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <em class="icon ni ni-cross-sm"></em>
                </a>
                <div class="modal-body modal-body-md">
                    <h5 class="modal-title">Edit Employee</h5>
                    <form action="#" class="mt-2">
                        <div class="row g-gs">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="edit-name"> Name</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" id="edit-name" value="Abu Bin Istiak">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="edit-email"> Email</label>
                                    <div class="form-control-wrap">
                                        <input type="email" class="form-control" id="edit-email" value="info@softnio.com">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="dept">Department</label>
                                    <div class="form-control-wrap">
                                        <select class="form-select js-select2" id="dept">
                                            <option value="default_option">Select Department</option>
                                            <option value="bangladesh">Information Technology</option>
                                            <option value="canada">Finance</option>
                                            <option value="england">Marketing</option>
                                            <option value="pakistan">Human Resource</option>
                                            <option value="usa">Graphics</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="edit-code">Designation</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" id="edit-code" value="Software developer">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="edit-phone">Phone</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" id="edit-phone" value="+124 394-1787">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Address(Lane)</label>
                                    <div class="form-control-wrap">
                                        <select class="form-select js-select2">
                                            <option value="default_option">Select Address</option>
                                            <option value="dhaka">House 165, Lane No 3, Mohakhali DOHS,Dhaka</option>
                                            <option value="london">199 Bishopsgate, London</option>
                                            <option value="mumbai">Narottam Morarji Marg, Mumbai</option>
                                            <option value="kualalampur">Ipoh, Johor Bahru, Kualalampur</option>
                                            <option value="spain">Gran Vía, Madrid.</option>
                                            <option value="usa">182/A Y-ra, Boston</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Varified</label>
                                    <div class="form-control-wrap">
                                        <ul class="custom-control-group g-3 align-center flex-wrap">
                                            <li>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" checked="" id="customCheck1">
                                                    <label class="custom-control-label" for="customCheck1">Email</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" checked="" id="customCheck2">
                                                    <label class="custom-control-label" for="customCheck2">KYC</label>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <button data-bs-dismiss="modal" type="submit" class="btn btn-primary">Update Employee</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div><!-- .Edit Modal-Content -->
    <div class="modal fade" id="deleteData">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <a href="#" class="close" data-bs-dismiss="modal"><em class="icon ni ni-cross"></em></a>
                <div class="modal-body modal-body-sm text-center">
                    <div class="nk-modal py-4">
                        <em class="nk-modal-icon icon icon-circle icon-circle-xxl ni ni-cross bg-danger"></em>
                        <h4 class="nk-modal-title">Are You Sure ?</h4>
                        <div class="nk-modal-text mt-n2">
                            <p class="text-soft">This item will be removed permanently.</p>
                        </div>
                        <ul class="d-flex justify-content-center gx-4 mt-4">
                            <li>
                                <button data-bs-dismiss="modal" id="deleteEvent" class="btn btn-success">Yes, Delete it</button>
                            </li>
                            <li>
                                <button data-bs-dismiss="modal" data-toggle="modal" data-target="#editEventPopup" class="btn btn-danger btn-dim">Cancel</button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .Delete Modal-content -->
    <!-- Dashboard -->
    <div class="modal fade" id="editDataDash">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <em class="icon ni ni-cross"></em>
                </a>
                <div class="modal-header">
                    <h5 class="modal-title">Edit Information</h5>
                </div>
                <div class="modal-body">
                    <form action="#">
                        <div class="form-group">
                            <label class="form-label" for="dept-name">Dept. Name</label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" id="dept-name" value="Finance">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="author-name">Author Name</label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" id="author-name" value="Abu Bin Istiak">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="designtn">Designation</label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" id="designtn" value="Admin">
                            </div>
                        </div>
                        <div class="form-group">
                            <button data-bs-dismiss="modal" type="submit" class="btn btn-primary">Save Informations</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div><!-- .Edit Modal-Content -->
    <!-- JavaScript -->
    <script src="{{ asset('dashboard/assets/js/bundle.js')}}"></script> 
            <script src="{{ asset('dashboard/assets/js/scripts.js?ver=3.2.4')}}"></script>
    <script src="{{ asset('dashboard/assets/js/charts/chart-crm.js?ver=3.2.4')}}"></script>
   

<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/6814b567bfcbab190c7a9162/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();

function showForm(){
    event.preventDefault();
    var xz = <?php echo Auth::user()->id ?>;
    var y = document.getElementById("otp");
    var xy = document.getElementById("showbtn");
    var z = document.getElementById("trfbtn");
   // x.style.display = 'none';
    y.style.display = 'block';
    z.style.display = 'block';
    xy.style.display = 'none';
 
   $.ajax("send-otp/"+ xz);
}

function resendOtp(){
    event.preventDefault();
    var xz = <?php echo Auth::user()->id ?>; 
   $.ajax("send-otp/"+ xz);
}
</script>
</body>

</html>