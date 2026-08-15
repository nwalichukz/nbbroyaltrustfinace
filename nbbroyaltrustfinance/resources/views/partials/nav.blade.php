<header class="light-bb">
    <nav class="navbar navbar-expand-lg">
      <a class="navbar-brand" href="{{url('/')}}">
        <img src="{{ asset('')}}" >AddTekStock</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#headerMenu"
        aria-controls="headerMenu" aria-expanded="false" aria-label="Toggle navigation">
        <i class="icon ion-md-menu"></i>
      </button>

      <div class="collapse navbar-collapse" id="headerMenu">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
              aria-expanded="false">
              Trades
            </a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="{{url('/forex')}}">Forex</a>
              <a class="dropdown-item" href="{{url('/stock')}}">Stock</a>
              <a class="dropdown-item" href="{{url('/shares')}}">Shares</a>
              <a class="dropdown-item" href="{{url('/energies')}}">Energies</a>
              <a class="dropdown-item" href="{{url('/indices')}}">Indices</a>
            </div>
          </li>
          <!--<li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
              aria-expanded="false">
              Exchange
            </a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="exchange-light.html">Exchange</a>
              <a class="dropdown-item" href="exchange-light-live-price.html">Exchange Live Price</a>
              <a class="dropdown-item" href="exchange-light-ticker.html">Exchange Ticker</a>
              <a class="dropdown-item" href="exchange-light-fluid.html">Exchange Fluid</a>
            </div>
          </li>-->
         <!-- <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
              aria-expanded="false">
              Markets
            </a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="{{url('/market')}}">Markets</a>
              <a class="dropdown-item" href="{{url('/market-line')}}">Markets Line</a>
              <a class="dropdown-item" href="{{url('/market-bar')}}">Markets Bar</a>
              <a class="dropdown-item" href="{{url('/market-overview')}}">Market Overview</a>
              <a class="dropdown-item" href="{{url('/market-screener')}}">Market Screener</a>
              <a class="dropdown-item" href="{{url('/market-cryto')}}">Market Crypto</a>
            </div>
          </li>-->

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
              aria-expanded="false">
                Investment 
            </a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="{{url('/investment')}}">Investment Plans</a>
            </div>
          </li>
          <!-- <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
              aria-expanded="false">
                Partnership
            </a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="investments/investment.html">Partnership Plan</a>
            </div>
          </li> -->

          <!-- <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
              aria-expanded="false">
              Others
            </a>
             <div class="dropdown-menu">
              <a class="dropdown-item" href="technical-analysis-light.html">Technical Analysis</a>
              <a class="dropdown-item" href="cross-rates-light.html">Cross Rates</a>
              <a class="dropdown-item" href="symbol-info-light.html">Symbol Info</a>
              <a class="dropdown-item" href="heat-map-light.html">Heat Map</a>
              <a class="dropdown-item" href="trade/login.html">Sign in</a>
              <a class="dropdown-item" href="trade/register.html">Sign up</a>
              <a class="dropdown-item" href="404-light.html">404</a>
            </div> 
          </li> -->
        </ul>
        <ul class="navbar-nav ml-auto">
          @if(Auth::check())
          <a href="{{url('/user_signin/'.Auth::user()->id)}}" class="btn-2">Dashboard</a>
          @else
          <a href="{{url('/login')}}" class="btn-1">Sign In</a>
          <a href="{{url('/register')}}" class="btn-2">Get Started</a>
          @endif
        </ul>
      </div>
    </nav>
  </header>