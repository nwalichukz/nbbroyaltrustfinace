     <!-- content @s -->
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
                                                <h5 class="card-title">SETTLE WITHDRAWAL REQUEST</h5>
                                            </div>
                                            <form method="POST" action="{{url('/admin/settle-withdrawal-request/create')}}">
                                            @csrf
                                                <div class="form-group">
                                                    <label class="form-label" for="cf-full-name">Amount</label>
                                                    <input name="amount" type="number" class="form-control" id="cf-full-name" value="{{$deposit->amount}}" required>
                                                    <input type="hidden" name="id" value="{{$deposit->id}}">
                                                </div>
                                                                                     

                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-lg btn-primary">Setlle Request</button>
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