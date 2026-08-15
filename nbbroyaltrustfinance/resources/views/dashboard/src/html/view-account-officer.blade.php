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
                                            <h3 class="nk-block-title page-title">Account Officers</h3>
                                            <div class="nk-block-des text-soft">
                                                <p> </p>
                                            </div>
                                        </div><!-- .nk-block-head-content -->

                                        <div class="nk-block-head-content">
                                            <div class="toggle-wrap nk-block-tools-toggle">
                                                <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                                                <div class="toggle-expand-content" data-content="pageMenu">
                                                    <ul class="nk-block-tools g-3">
                                                        <li><a href="#" class="btn btn-white btn-outline-light"><em class="icon ni ni-download-cloud"></em><span>Export</span></a></li>
                                                        <li class="nk-block-tools-opt">
                                                            <div class="drodown">
                                                                <a href="#" class="dropdown-toggle btn btn-icon btn-primary" data-bs-toggle="dropdown"><em class="icon ni ni-plus"></em></a>
                                                                <div class="dropdown-menu dropdown-menu-end">
                                                                    <ul class="link-list-opt no-bdr">
                                                                        <li><a href="#"><span>Add User</span></a></li>
                                                                        <li><a href="#"><span>Add Team</span></a></li>
                                                                        <li><a href="#"><span>Import User</span></a></li>
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

      
                                <div class="nk-block nk-block-lg">
                                
                                    <div class="row g-gs">
                                        <div class="col-sm-6 col-lg-4 col-xxl-3">
                                            <div class="card card-bordered">
                                                <div class="card-inner">
                                                    <div class="team">
                                                    @foreach($user as $user)
                                                        <div class="team-options">
                                                            <div class="drodown">
                                                                <a href="#" class="dropdown-toggle btn btn-sm btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                                <div class="dropdown-menu dropdown-menu-end">
                                                                    <ul class="link-list-opt no-bdr">
                                                                        <li><a href="{{url('/admin/remove-account-officer/'.$user->id)}}"><em class="icon ni ni-focus"></em><span>Remove</span></a></li>
                                                                        <li><a href="{{url('/admin/upload-account-officer-image/'.$user->id)}}"><em class="icon ni ni-focus"></em><span>Upload Image</span></a></li>
                                                                        {{--<li><a href="#"><em class="icon ni ni-eye"></em><span>View Details</span></a></li>
                                                                        <li><a href="#"><em class="icon ni ni-mail"></em><span>Send Email</span></a></li>
                                                                        <li class="divider"></li>
                                                                        <li><a href="#"><em class="icon ni ni-shield-star"></em><span>Reset Pass</span></a></li>
                                                                        <li><a href="#"><em class="icon ni ni-shield-off"></em><span>Reset 2FA</span></a></li>
                                                                        <li><a href="#"><em class="icon ni ni-na"></em><span>Suspend User</span></a></li>--}}
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                                        </div>
                                                       
                                                        <div class="user-card user-card-s2">
                                                            <div class="user-avatar lg bg-primary">
                                                                <span>{{strtoupper(substr($user->name,0, 2))}}</span>
                                                                <div class="status dot dot-lg dot-success"></div>
                                                            </div>
                                                            <div class="user-info">
                                                                <h6>{{$user->name}}</h6>
                                                                <span class="sub-text">{{$user->access_level}}</span>
                                                            </div>
                                                        </div>
                                                        <ul class="team-info">
                                                            <li><span>Avg Response Time</span><span>2 Hrs</span></li>
                                                            <li><span>Contact</span><span>{{$user->mobile_number}}</span></li>
                                                            <li><span>Email</span><span>{{$user->email}}</span></li>
                                                        </ul>
                                                        <div class="team-view">
                                                            <a href="#" class="btn btn-block btn-dim btn-primary"><span>Get In Touch Now</span></a>
                                                        </div>
                                                    </div><!-- .team -->

                                                    @endforeach
                                                </div><!-- .card-inner -->
                                            </div><!-- .card -->
                                        </div><!-- .col -->
                                      
                                    </div>

                                    
                                </div><!-- .nk-block -->

                                
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content @e -->
                @endsection