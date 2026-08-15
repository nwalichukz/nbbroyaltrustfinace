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
                                                <h5 class="card-title">ADD WALLET ADDRESS</h5>
                                            </div>
                                            <form method="POST" action="{{url('admin/create-wallet-address')}}">
                                               
                                            @csrf            
                                            <div class="form-group">
                                                                <label class="form-label" for="fv-topics">Crypto Type</label>
                                                                <div class="form-control-wrap ">
                                                                    <select class="form-select js-select2" id="fv-topics" name="crypto_type" data-placeholder="Select a option" required>
                                                                        <option value="">Crypto Type</option>
                                                                        <option value="bnb">BNB</option>
                                                                        <option value="xrp">XRP</option>
                                                                        <option value="doge">DOGE</option>
                                                                        <option value="usdt">USDT</option>
                                                                        <option value="etherium">ETHERIUM</option>
                                                                        <option value="shiba">SHIBA</option>
                                                                        <option value="btc">BTC</option>   
                                                                    </select>
                                                                </div>
                                                            </div>

                                                      
                                                <div class="form-group">
                                                    <label class="form-label" for="cf-email-address">Wallet Address</label>
                                                    <input name="wallet_address" class="form-control" id="cf-email-address" required>
                                                </div>
                                               
                                              
                                              
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-lg btn-primary">Save</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endsection
