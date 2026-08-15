     <!-- content @s -->
 @extends('dashboard/src/html/crm/dashboard-layout')
@section('content')        
            <!-- content @s -->
            <div class="nk-content ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                            <h5 class="card-title">SEND USER EMAIL</h5>
                            <br/>
                         <div class="col-lg-6">
                                    <div class="card card-bordered h-100">
                                        <div class="card-inner">
                                            <div class="card-head">
                                                <h5 class="card-title"></h5>
                                            </div>
                                            <form method="POST" action="{{url('admin/send-mail')}}">
                                            @csrf
                                                <div class="form-group">
                                                    <label class="form-label" for="cf-full-name">Enter Title</label>
                                                    <input name="title" type="text" class="form-control" id="cf-full-name" placeholder="Enter title" required>
                                                     <input name="id" value="{{$user_id}}" type="hidden" class="form-control">
                                                </div>

                                                <div class="form-group">
                                                                <label class="form-label" for="default-textarea">Message</label>
                                                                <div class="form-control-wrap">
                                                                    <textarea name="description" class="form-control no-resize" id="default-textarea" required>  </textarea>
                                                                </div>
                                                            </div>
                                                  
                                                                                     

                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-lg btn-primary">SEND</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- content @e -->
                 @endsection