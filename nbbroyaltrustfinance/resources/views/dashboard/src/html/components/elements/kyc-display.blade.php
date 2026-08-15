@extends('dashboard/src/html/crm/dashboard-layout')
@section('content')   

                <!-- content @s -->
                <div class="nk-content ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="components-preview wide-md mx-auto">
                                    <div class="nk-block-head nk-block-head-lg wide-sm">
                                        <div class="nk-block-head-content">
                                            <div class="nk-block-head-sub"><a class="back-to" href=""><em class="icon ni ni-arrow-left"></em><span>Admin</span></a></div>
                                            <h2 class="nk-block-title fw-normal"> KYC Verifications</h2>
                                           
                                        </div>
                                    </div>



                                    <div class="nk-block nk-block-lg">
                                        

                                      @foreach($kyc as $data)
                                        <div class="card card-bordered card-preview">
                                            <div class="card-inner">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="card card-bordered">
                                                            <img src="{{ asset('images/Kyc/'.$data->file_name)}}" class="card-img-top" alt="">
                                                            <div class="card-inner">
                                                                <h5 class="card-title">{{$data->user->name}}</h5>
                                                                <p class="card-text">{{$data->user->country}}, {{$data->name}}</p>
                                                                <a href="{{url('admin/approve/'.$data->id)}}" class="btn btn-primary" title="When approved user can access dashboard">Approve</a>
                                                                <a href="{{url('admin/decline/'.$data->id)}}" class="btn btn-warning" title="If declined user will not be able to login">Decline</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- .card-preview -->
                                        @endforeach




                                        
  
                                 
                                       


                                        </div><!-- .code-block -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content @e -->
                @endsection