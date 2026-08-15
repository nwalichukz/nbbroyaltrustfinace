@inject('appData', 'App\Services\Helper')
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

<title>MetroKapital - Your Finance Pal</title>

<!-- Fav Icon -->
<link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

<!-- Stylesheets -->
<link href="{{ asset('assets/css/font-awesome-all.css')}}" rel="stylesheet">
<link href=" {{ asset('assets/css/flaticon.css') }}" rel="stylesheet">
<link href="{{ asset('assets/css/owl.css') }}" rel="stylesheet">
<link href="{{ asset('assets/css/bootstrap.css') }}" rel="stylesheet">
<link href="{{ asset('assets/css/jquery.fancybox.min.css')}}" rel="stylesheet">
<link href="{{ asset('assets/css/animate.css')}}" rel="stylesheet">
<link href="{{ asset('assets/css/nice-select.css')}}" rel="stylesheet">
<link href="{{ asset('assets/css/elpath.css')}}" rel="stylesheet">
<link href="{{ asset('assets/css/color/theme-color.css')}}" id="jssDefault" rel="stylesheet">
<link href="{{ asset('assets/css/switcher-style.css')}}" rel="stylesheet">
<link href="{{ asset('assets/css/rtl.css')}}" rel="stylesheet">
<link href="{{ asset('assets/css/style.css')}}" rel="stylesheet">
<link href="{{ asset('assets/css/module-css/banner.css')}}" rel="stylesheet">
<link href="{{ asset('assets/css/module-css/funfact.css')}}" rel="stylesheet">
<link href="{{ asset('assets/css/module-css/about.css')}}" rel="stylesheet">
<link href="{{ asset('assets/css/module-css/process.css')}}" rel="stylesheet">
<link href=" {{ asset('assets/css/module-css/service.css')}}" rel="stylesheet">
<link href="{{ asset('assets/css/module-css/card.css')}}" rel="stylesheet">
<link href="{{ asset('assets/css/module-css/exchange.css')}}" rel="stylesheet">
<link href="{{ asset('assets/css/module-css/apps.css')}}" rel="stylesheet">
<link href="{{ asset('assets/css/module-css/testimonial.css')}}" rel="stylesheet">
<link href="{{ asset('assets/css/module-css/news.css')}}" rel="stylesheet">
<link href="{{ asset('assets/css/module-css/subscribe.css')}}" rel="stylesheet">
<link href="{{ asset('assets/css/responsive.css')}}" rel="stylesheet">

<link rel="stylesheet" href="https://www.w3schools.com/w3css/5/w3.css">
<style>
.mySlides {display:none;}
</style>



</head>

<!-- page wrapper -->
<body>
   
<div class="boxed_wrapper ltr">

        <!-- preloader -->
        <div class="loader-wrap">
            <div class="preloader">
                <div class="preloader-close">close</div>
                <div id="handle-preloader" class="handle-preloader">
                    <div class="animation-preloader">
                        <div class="spinner"></div>
                        <div class="txt-loading">
                            <span data-text-preloader="m" class="letters-loading">
                                m
                            </span>
                            <span data-text-preloader="e" class="letters-loading">
                                e
                            </span>
                            <span data-text-preloader="t" class="letters-loading">
                                t
                            </span>
                            <span data-text-preloader="r" class="letters-loading">
                                r
                            </span>
                            <span data-text-preloader="o" class="letters-loading">
                                o
                            </span>
                            <span data-text-preloader="k" class="letters-loading">
                                K
                            </span>
                            <span data-text-preloader="a" class="letters-loading">
                                a
                            </span>
                            <span data-text-preloader="p" class="letters-loading">
                                p
                            </span>
                            <span data-text-preloader="i" class="letters-loading">
                                i
                            </span>
                            <span data-text-preloader="t" class="letters-loading">
                                t
                            </span>
                            <span data-text-preloader="a" class="letters-loading">
                                a
                            </span>
                            <span data-text-preloader="l" class="letters-loading">
                                l
                            </span>
                        </div>
                    </div>  
                </div>
            </div>
        </div>
        <!-- preloader end -->


        <!-- page-direction -->
        <div class="page_direction">
            <div class="demo-rtl direction_switch"><button class="rtl">RTL</button></div>
            <div class="demo-ltr direction_switch"><button class="ltr">LTR</button></div>
        </div>
        <!-- page-direction end -->


        <!-- switcher menu -->
        <div class="switcher">
            <div class="switch_btn">
                <button><i class="fas fa-palette"></i></button>
            </div>
            <div class="switch_menu">
                <!-- color changer -->
                <div class="switcher_container">
                    <ul id="styleOptions" title="switch styling">
                        <li>
                            <a href="javascript: void(0)" data-theme="theme-color" class="theme-color"></a>
                        </li>
                        <li>
                            <a href="javascript: void(0)" data-theme="pink" class="pink-color"></a>
                        </li>
                        <li>
                            <a href="javascript: void(0)" data-theme="violet" class="violet-color"></a>
                        </li>
                        <li>
                            <a href="javascript: void(0)" data-theme="crimson" class="crimson-color"></a>
                        </li>
                        <li>
                            <a href="javascript: void(0)" data-theme="orange" class="orange-color"></a>
                        </li>
                    </ul>
                </div> 
            </div>
        </div>
        <!-- end switcher menu -->


        <!-- main header -->
        <header class="main-header header-style-three">
            <!-- header-top -->
            <div class="auto-container">
                <div class="header-top">
                    <div class="top-inner">
                        <ul class="links-list clearfix">
                            @if(Auth::check())
                            <li><a href="{{url('/user-signin/'.Auth::user()->id)}}">Dashboard</a></li>
                            @else
                           <li><a href="{{url('/get-login')}}">Login</a></li>
                            <li><a href="{{url('/get-register')}}">Register</a></li>
                          @endif
                        </ul>

                        <ul class="info-list clearfix"> 
                        
                            {{--<li>
                                <i class="icon-2"></i>
                                Find Nearest Branch
                            </li>--}}
                        </ul>
                    </div>
                </div>
            </div>
            <!-- header-lower -->
            <div class="auto-container">
                <div class="header-lower">
                    <div class="outer-box">
                        <div class="logo-box">
                            <figure class="logo">
                                <a href="{{url('/')}}"><img src="{{ asset('assets/images/logo.png')}}" alt=""></a></figure>
                        </div>
                        <div class="menu-area">
                            <!--Mobile Navigation Toggler-->
                            <div class="mobile-nav-toggler">
                                <i class="icon-bar"></i>
                                <i class="icon-bar"></i>
                                <i class="icon-bar"></i>
                            </div>
                            <nav class="main-menu navbar-expand-md navbar-light clearfix">
                                <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                                    <ul class="navigation clearfix">
                                        <li class="current dropdown"><a href="{{ url('/')}}">The Bank</a>
                                        
                                            <ul>
                                                <li><a href="#">Financial</a></li>
                                                <li><a href="#">Trading</a></li>
                                               
                                            </ul>
                                        </li> 
                                        <li><a href="#">News</a></li>
                                        <li class="dropdown"><a href="{{url('/')}}">Account</a>
                                            <ul>
                                                
                                                <li><a href="#">Savings</a></li>
                                                <li><a href="#">Retirement</a></li>
                                                <li><a href="#">Joint</a></li>
                                                <li><a href="#">Company</a></li>
                                                <li><a href="#">Current</a></li>
                                               
                                            </ul>
                                        </li> 
                                        <li class="dropdown"><a href="#">Citinship By Investment</a>
                                            <ul>
                                               <li class="dropdown"><a href="#">By Investment</a>
                                                    <ul>
                                                      @foreach($appData->getCitizenByInvCountry() as $country)
                                                        <li><a href="{{url('/view-citizenship-by-investment/'.$country->id)}}">{{$country->country_name}} </a></li>
                                                        @endforeach
                                                        {{--<li><a href="team-details.html">Austria</a></li>
                                                        <li><a href="team-details.html">Dominica</a></li>
                                                        <li><a href="team-details.html">Egypt</a></li>
                                                        <li><a href="{{url('/citizenship-inv-grenada')}}">Grenada </a></li>
                                                        <li><a href="team-details.html"> Jordan</a></li>
                                                        <li><a href="team-details.html"> Malta</a></li>
                                                        <li><a href="team-details.html"> Montenegro</a></li>
                                                        <li><a href="team-details.html"> Nauru</a></li>
                                                        <li><a href="team-details.html">North Macedonia </a></li>
                                                        <li><a href="team-details.html">St. Kitts and Nevis </a></li>
                                                        <li><a href="team-details.html">St. Lucia </a></li>
                                                        <li><a href="team-details.html">Turkiye </a></li>--}}
                                                    </ul>
                                                </li>
                                                 <li class="dropdown"><a href="#">By Residence</a>
                                                    <ul>
                                                  @foreach($appData->getResidencyByInvCountry() as $country)
                                                    <li><a href="{{url('/view-residency-by-investment/'.$country->id)}}">{{$country->country_name}}</a></li>
                                                        @endforeach
                                                        {{--  <li><a href="{{url('/residency-inv-australia')}}">Australia</a></li>
                                                        <li><a href="career-details.html">Austria </a></li>
                                                        <li><a href="team-details.html">Canada </a></li>
                                                        <li><a href="team-details.html">Costa Rica </a></li>
                                                        <li><a href="team-details.html">Cyprus </a></li>
                                                        <li><a href="team-details.html">Greece </a></li>
                                                        <li><a href="team-details.html">Hong Kong </a></li>
                                                        <li><a href="team-details.html">Ireland </a></li>
                                                        <li><a href="team-details.html">Hungary </a></li>
                                                        <li><a href="team-details.html">Italy </a></li>
                                                        <li><a href="team-details.html">Jersey </a></li>
                                                        <li><a href="team-details.html">Latvia </a></li>
                                                        <li><a href="team-details.html">Luxembourg </a></li>
                                                        <li><a href="team-details.html">Malaysia </a></li>
                                                        <li><a href="team-details.html"> Malta</a></li>
                                                        <li><a href="team-details.html">Mauritius </a></li>
                                                        <li><a href="team-details.html">Monaco </a></li>
                                                        <li><a href="team-details.html">Montengro </a></li>
                                                        <li><a href="team-details.html">Namibia </a></li>
                                                        <li><a href="team-details.html"> Netherlands</a></li>
                                                        <li><a href="team-details.html">New Zealand </a></li>
                                                        <li><a href="team-details.html"> Panama</a></li>
                                                        <li><a href="team-details.html"> Portugal</a></li>
                                                        <li><a href="team-details.html"> Singapore</a></li>
                                                        <li><a href="team-details.html"> Spain</a></li>
                                                        <li><a href="team-details.html"> Switzerland</a></li>
                                                        <li><a href="team-details.html"> Thailand</a></li>
                                                        <li><a href="team-details.html"> United Arab Emirates</a></li>
                                                        <li><a href="team-details.html"> United Kingdom</a></li>
                                                        <li><a href="team-details.html"> United State of America</a></li>
                                                        <li><a href="team-details.html"> </a></li>--}}
                                                    </ul>
                                                </li>
                                                 <li class="dropdown"><a href="#">By Real Estate</a>
                                                    <ul>
                                                  
                                                    @foreach($appData->getResidencyByRealEstateCountry() as $country)
                                                    <li><a href="{{url('/view-residency-by-real-estate/'.$country->id)}}">{{$country->country_name}}</a></li>
                                                        @endforeach
                                                       {{-- <li><a href="blog.html">Angua and Barbuda</a></li>
                                                        <li><a href="blog-2.html">Cyprus </a></li>
                                                        <li><a href="blog-2.html"> Dominica</a></li>
                                                        <li><a href="blog-2.html"> Greece</a></li>
                                                        <li><a href="blog-2.html">Latvia </a></li>
                                                        <li><a href="blog-2.html">Malta </a></li>
                                                        <li><a href="blog-2.html"> Mauritius</a></li>
                                                        <li><a href="blog-2.html">Montenegro </a></li>
                                                        <li><a href="blog-2.html"> Panama</a></li>
                                                        <li><a href="blog-2.html"> Portugal</a></li>
                                                        <li><a href="blog-2.html">Spain </a></li>
                                                        <li><a href="blog-2.html">St. Kitts and Nevis </a></li>
                                                        <li><a href="blog-2.html">Turkiye </a></li>
                                                        <li><a href="blog-2.html">United Kingdom </a></li>
                                                        <li><a href="blog-2.html">United States of America </a></li>
                                                        <li><a href="blog-2.html">United Arab Emirates </a></li>
                                                        <li><a href="blog-2.html">Monaco </a></li>
                                                        <li><a href="blog-2.html">Luxembourg </a></li>
                                                        <li><a href="blog-2.html">Egypt </a></li>
                                                        <li><a href="blog-2.html"> South Africa</a></li>--}}
                                                    </ul>
                                                </li> 
                                                {{--<li><a href="currency.html">Antigua & Barbuba</a></li>
                                                <li><a href="credit-cards.html">Dominica</a></li>
                                                <li><a href="faq.html">Grenada</a></li>
                                                <li><a href="error.html">Malta</a></li>
                                                <li><a href="error.html">Moutaguo</a></li>
                                                <li><a href="error.html">Portugal</a></li>
                                                <li><a href="error.html">Saint Lucia</a></li>
                                                <li><a href="error.html">St. Kitts & Nevis</a></li>--}}
                                            </ul>
                                        </li> 
                                        <li><a href="{{url('/contact-us')}}">Contact</a></li> 
                                    </ul>
                                </div>
                            </nav>
                            <div class="menu-right-content ml_70">
                                @if(Auth::check())
                                <a href="{{url('/user-signin/.Auth::user()->id')}}" class="theme-btn btn-two mr_20">Dashboard</a>
                                @else
                                <a href="{{url('/get-login')}}" class="theme-btn btn-two mr_20">Login</a>
                                <a href="{{url('/get-register')}}" class="theme-btn btn-one">Register</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <!--sticky Header-->
            <div class="sticky-header">
                <div class="large-container">
                    <div class="outer-box">
                        <div class="logo-box">
                            <figure class="logo"><a href="{{url('/')}}">
                                <img src="{{ asset('assets/images/logo.png')}}" alt=""></a>
                        </figure>
                        </div>
                        <div class="menu-area">
                            <nav class="main-menu clearfix">
                                <!--Keep This Empty / Menu will come through Javascript-->
                            </nav>
                            <div class="menu-right-content ml_70">
                                <a href="{{url('/get-login')}}" class="theme-btn btn-two mr_20">Login</a>
                                <a href="{{url('/get-register')}}" class="theme-btn btn-one">Register</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- main-header end -->




        <!-- Mobile Menu  -->
        <div class="mobile-menu">
            <div class="menu-backdrop"></div>
            <div class="close-btn"><i class="fas fa-times"></i></div>
            
            <nav class="menu-box">
                <div class="nav-logo"><a href="{{url('/')}}">
                    <img src="{{ asset('assets/images/logo.png')}}" alt="" title=""></a></div>
                <div class="menu-outer"><!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header--></div>
                <div class="contact-info">
                    <h4>Contact Info</h4>
                    <ul>
                        <li>Chicago 12, Melborne City, USA</li>
                        <li><a href="tel:+8801682648101">+1 219 3809 686 </a></li>
                        <li><a href="mailto:contactmetrokapital@gmail.com">contactmetrokapital@gmail.com</a></li>
                    </ul>
                </div>
                <div class="social-links">
                    <ul class="clearfix">
                        <li><a href="#"><span class="fab fa-twitter"></span></a></li>
                        <li><a href="#"><span class="fab fa-instagram"></span></a></li>
                        <li><a href="https://www.youtube.com/@metrokapitalor"><span class="fab fa-youtube"></span></a></li>
                    </ul>
                </div>
            </nav>
        </div>  <!-- End Mobile Menu -->


@include('partials.errors') 

@yield('content')



@include('partials.footer')
  

        <!--Scroll to top-->
        <div class="scroll-to-top">
            <div>
                <div class="scroll-top-inner">
                    <div class="scroll-bar">
                        <div class="bar-inner"></div>
                    </div>
                    <div class="scroll-bar-text">Go To Top</div>
                </div>
            </div>
        </div>
        <!-- Scroll to top end -->
        
    </div>


    <!-- jequery plugins -->
    <script src="{{ asset('assets/js/jquery.js')}}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('assets/js/owl.js')}}"></script>
    <script src="{{ asset('assets/js/wow.js')}}"></script>
    <script src="{{ asset('assets/js/validation.js')}}"></script>
    <script src="{{ asset('assets/js/jquery.fancybox.js')}}"></script>
    <script src="{{ asset('assets/js/appear.js')}}"></script>
    <script src="{{ asset('assets/js/isotope.js')}}"></script>
    <script src="{{ asset('assets/js/parallax-scroll.js')}}"></script>
    <script src="{{ asset('assets/js/jquery.nice-select.min.js')}}"></script>
    <script src="{{ asset('assets/js/jQuery.style.switcher.min.js')}}"></script>

    <!-- main-js -->
    <script src="{{ asset('assets/js/script.js')}}"></script>

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


var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  if (n > x.length) {slideIndex = 1}
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  x[slideIndex-1].style.display = "block";  
}

</script>

</body><!-- End of .page_wrapper -->
</html>
