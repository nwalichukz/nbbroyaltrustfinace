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
                                                <h5 class="card-title">Edit Transaction</h5>
                                            </div>
                                            <form method="POST" action="{{url('admin/transaction/update')}}">
                                            @csrf
                                                <div class="form-group">
                                                    <label class="form-label" for="cf-full-name">Amount</label>
                                                    <input name="amount" type="number" class="form-control" id="cf-full-name" value="{{$edit->amount}}" required>
                                                </div>
                                                     <input type="hidden" name="id" value="{{$edit->id}}">
                                                <div class="form-group">
                                                    <label class="form-label" for="cf-full-name">Date</label>
                                                    <input name="date" type="date" class="form-control" id="cf-full-name" value="{{$edit->created_at}}" >
                                                </div>
                                                                                     

                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-lg btn-primary">Update</button>
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