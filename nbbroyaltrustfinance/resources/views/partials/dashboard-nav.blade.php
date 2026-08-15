<div class="col-md-12 col-lg-3">
<div class="nav flex-column nav-pills settings-nav" id="v-pills-tab" role="tablist"
  aria-orientation="vertical">
  @if(Auth::check())
        @if(Auth::user()->user_level == 'admin')
  <a class="nav-link active" id="settings-profile-tab" data-toggle="pil" href="{{url('/admin/all-users')}}" role="tab"
    aria-controls="settings-profile" aria-selected="true"><i class="icon ion-md-person"></i> All users</a>

     
        <a class="nav-link" id="settings-tab" data-toggle="pil" href="{{url('/admin/all-investments')}}" role="tab"
    aria-controls="settings" aria-selected="false"><i class="icon ion-md-settings"></i> All Investments </a>

    <a class="nav-link" id="settings-tab" data-toggle="pil" href="{{url('/admin/all-transactions')}}" role="tab"
    aria-controls="settings" aria-selected="false"><i class="icon ion-md-settings"></i> All Transactions </a>

    <a class="nav-link" id="settings-tab" data-toggle="pil" href="{{url('/admin/withdrawal-request/get-all')}}" role="tab"
    aria-controls="settings" aria-selected="false"><i class="icon ion-md-settings"></i> Withdrawal Request </a>

    <a class="nav-link" id="settings-tab" data-toggle="pil" href="{{url('/admin/deposit-request/get-all')}}" role="tab"
    aria-controls="settings" aria-selected="false"><i class="icon ion-md-settings"></i> Deposit Request </a>

    <a class="nav-link" id="settings-tab" data-toggle="pil" href="{{url('admin/get-send-email-to-all')}}" role="tab"
    aria-controls="settings" aria-selected="false"><i class="icon ion-md-settings"></i> Send Email to all </a>
    
    @elseif(Auth::user()->user_level == 'user')
    <a class="nav-link active" id="settings-profile-tab" data-toggle="pil" href="{{url('/user-signin/'.Auth::user()->id)}}" role="tab"
    aria-controls="settings-profile" aria-selected="true"><i class="icon ion-md-person"></i> Profile</a>

    <a class="nav-link" id="settings-wallet-ta" data-toggle="pil" href="{{ url('/dashboardee/get-wallet-page') }}" role="ta"
    aria-controls="settings-wallet" aria-selected="false"><i class="icon ion-md-wallet"></i> Wallet</a>

    <a class="nav-link" id="settings-tab" data-toggle="pil" href="{{ url('/dashboardee/get-setting-page') }}" role="tab"
    aria-controls="settings" aria-selected="false"><i class="icon ion-md-settings"></i> Settings</a>

    <a class="nav-link" id="settings-tab" data-toggle="pil" href="{{ url('/dashboard/get-investment-page') }}" role="tab"
    aria-controls="settings" aria-selected="false"><i class="icon ion-md-settings"></i> Investment </a>

    <a class="nav-link" id="settings-tab" data-toggle="pil" href="{{url('/dashboard/my-investment/'.Auth::user()->id)}}" role="tab"
    aria-controls="settings" aria-selected="false"><i class="icon ion-md-settings"></i> My Investment </a>

    <a class="nav-link" id="settings-tab" data-toggle="pil" href="{{url('/dashboard/my-binary/'.Auth::user()->id)}}" role="tab"
    aria-controls="settings" aria-selected="false"><i class="icon ion-md-settings"></i> Binary </a>
    <a class="nav-link" id="settings-tab" data-toggle="pil" href="{{url('/dashboard/my-referral-code')}}" role="tab"
    aria-controls="settings" aria-selected="false"><i class="icon ion-md-settings"></i> Referral Code </a>
      @endif
    @endif

</div>
</div>