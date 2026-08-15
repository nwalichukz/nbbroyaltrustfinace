@extends('layout.app-landing')
@section('content')
      <!-- banner-style-three -->
        <section class="banner-style-three p_relative">
            <div class="shape" style="background-image: url(assets/images/shape/shape-19.png);"></div>
            <div class="banner-carousel owl-theme owl-carousel owl-dots-none owl-nav-none">
                <div class="slide-item p_relative">
                    <div class="bg-layer" style="background-image: url(assets/images/banner/banner-7.jpg);"></div>
                    <div class="pattern-layer">
                        <div class="pattern-4" style="background-image: url(assets/images/shape/shape-14.png);"></div>
                        <div class="pattern-5" style="background-image: url(assets/images/shape/shape-15.png);"></div>
                    </div>
                    <div class="auto-container">
                        <div class="content-box">
                            <h2>Open Current Account Online</h2>
                            <p> A current account is designed for frequent transactions, making it ideal for individuals or
                                 businesses that need regular access to their funds</p>
                            <div class="btn-box">
                                <a href="{{url('/get-register')}}" class="theme-btn btn-three">Create Account</a>
                            </div>
                        </div> 
                    </div>
                </div>

                <div class="slide-item p_relative">
                    <div class="bg-layer" style="background-image: url(assets/images/banner/banner-8.jpg);"></div>
                    <div class="pattern-layer">
                        <div class="pattern-4" style="background-image: url(assets/images/shape/shape-14.png);"></div>
                        <div class="pattern-5" style="background-image: url(assets/images/shape/shape-15.png);"></div>
                    </div>
                    <div class="auto-container">
                        <div class="content-box">
                            <h2>Open our Savings Account Online</h2>
                            <p>A savings account is a secure place to store your money while earning interest over time. </p>
                            <div class="btn-box">
                                <a href="{{url('/get-register')}}" class="theme-btn btn-three">Create Account</a>
                            </div>
                        </div> 
                    </div>
                </div>

                <div class="slide-item p_relative">
                    <div class="bg-layer" style="background-image: url(assets/images/banner/banner-8.jpg);"></div>
                    <div class="pattern-layer">
                        <div class="pattern-4" style="background-image: url(assets/images/shape/shape-14.png);"></div>
                        <div class="pattern-5" style="background-image: url(assets/images/shape/shape-15.png);"></div>
                    </div>
                    <div class="auto-container">
                        <div class="content-box">
                            <h2>Open Joint Account Online</h2>
                            <p>A joint account is a shared bank account owned by two or more individuals, typically used by
                                 couples, family members, or business partners.  </p>
                            <div class="btn-box">
                                <a href="{{url('/get-register')}}" class="theme-btn btn-three">Create Account</a>
                            </div>
                        </div> 
                    </div>
                </div>

                <div class="slide-item p_relative">
                    <div class="bg-layer" style="background-image: url(assets/images/banner/banner-9.jpg);"></div>
                    <div class="pattern-layer">
                        <div class="pattern-4" style="background-image: url(assets/images/shape/shape-14.png);"></div>
                        <div class="pattern-5" style="background-image: url(assets/images/shape/shape-15.png);"></div>
                    </div>
                    <div class="auto-container">
                        <div class="content-box">
                            <h2>Open Retirement Account Online</h2>
                            <p> A retirement account is a long-term savings plan designed to help you build financial security for your future.</p>
                            <div class="btn-box">
                                <a href="{{url('/get-login')}}" class="theme-btn btn-three">Create Account</a>
                            </div>
                        </div>  
                    </div>
                </div>
            </div>
        </section>
        <!-- banner-style-three end -->


        <!-- funfact-section -->
        <section class="funfact-section">
            <div class="auto-container">
                <div class="inner-container clearfix">
                    <div class="funfact-block-one">
                        <div class="inner-box">
                            <div class="icon-box"><i class="icon-21"></i></div>
                            <div class="count-outer count-box">
                                <span class="count-text" data-speed="1500" data-stop="50">0</span><span>k+</span>
                            </div>
                            <p>Happy Clients</p>
                        </div>
                    </div>
                    <div class="funfact-block-one">
                        <div class="inner-box">
                            <div class="icon-box"><i class="icon-22"></i></div>
                            <div class="count-outer count-box">
                                <span class="count-text" data-speed="1500" data-stop="90">0</span><span>Bn</span>
                            </div>
                            <p>Total Transactions</p>
                        </div>
                    </div>
                    <div class="funfact-block-one">
                        <div class="inner-box">
                            <div class="icon-box"><i class="icon-23"></i></div>
                            <div class="count-outer count-box">
                                <span class="count-text" data-speed="1500" data-stop="40">0</span><span>+</span>
                            </div>
                            <p>Branches in USA</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- funfact-section end -->


        <!-- about-section -->
        <section class="about-section pt_120 pb_120">
            <div class="pattern-layer rotate-me"></div>
            <div class="auto-container">
                <div class="row clearfix">
                    <div class="col-lg-6 col-md-12 col-sm-12 image-column">
                        <div class="image_block_three">
                            <div class="image-box pr_110 mr_20">
                                <div class="image-shape">
                                    <div class="shape-1" style="background-image: url(assets/images/shape/shape-3.png);"></div>
                                    <div class="shape-2" style="background-image: url(assets/images/shape/shape-11.png);"></div>
                                </div>
                                <figure class="image"><img src="{{ asset('assets/images/resource/about-1.jpg')}}" alt=""></figure>
                                <div class="rating-box">
                                    <ul class="rating mb_5 clearfix">
                                        <li><i class="icon-9"></i></li>
                                        <li><i class="icon-9"></i></li>
                                        <li><i class="icon-9"></i></li>
                                        <li><i class="icon-9"></i></li>
                                        <li><i class="icon-9"></i></li>
                                    </ul>
                                    <h6>5 Star Rating Bank</h6>
                                    <ul class="thumb-list">
                                        <li><img src="{{ asset('assets/images/resource/thumb-1.png')}}" alt=""></li>
                                        <li><img src="{{ asset('assets/images/resource/thumb-2.png')}}" alt=""></li>
                                        <li><img src="{{ asset('assets/images/resource/thumb-3.png')}}" alt=""></li>
                                        <li><img src="{{ asset('assets/images/resource/thumb-4.png')}}" alt=""></li>
                                    </ul>
                                </div>
                                <div class="experience-box">
                                    <div class="inner">
                                        <h2>25+<span>Years</span></h2>
                                        <h5>of Experience in the Finance Service</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                        <div class="content_block_one">
                            <div class="content-box ml_40">
                                <div class="sec-title mb_20">
                                    <h6>About US</h6>
                                    <h2>Financial Solutions for Every Stage of Life.</h2>
                                </div>
                                <div class="text-box mb_40">
                                    <p>The Security Center for and Mobile and Online Banking.</p>
                                </div>
                                <div class="inner-box mb_45">
                                    <div class="single-item">
                                        <div class="icon-box"><i class="icon-10"></i></div>
                                        <h3>Solution Focused</h3>
                                        <p>We are focused on finding solutions to your problems</p>
                                    </div>
                                    <div class="single-item">
                                        <div class="icon-box"><i class="icon-11"></i></div>
                                        <h3>99.99% Success</h3>
                                        <p>Our solutions deliver close to 100% we have got you</p>
                                    </div>
                                </div>
                                <div class="btn-box">
                                    <a href="#" class="theme-btn btn-one">Discover More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- about-section end -->


        <!-- process-section -->
        <section class="process-section centred pt_120 pb_90">
            <div class="bg-layer" style="background-image: url(assets/images/background/process-bg.jpg);"></div>
            <div class="auto-container">
                <div class="sec-title mb_110"> 
                    <h6>Our process</h6>
                    <h2>Open Bank Accounts</h2>
                </div>
                <div class="inner-container">
                    <div class="processing-block-one">
                        <div class="arrow-shape" style="background-image: url(assets/images/shape/shape-12.png);"></div>
                        <div class="inner-box">
                            <span class="count-text">01 <br />Step</span>
                            <h3>Fill In The <br />Required Form</h3>
                            <p> </p>
                        </div>
                    </div>
                    <div class="processing-block-one">
                        <div class="arrow-shape" style="background-image: url(assets/images/shape/shape-13.png);"></div>
                        <div class="inner-box">
                            <span class="count-text">02 <br />Step</span>
                            <h3>Submit All <br />Your Documents</h3>
                            <p> </p>
                        </div>
                    </div>
                    <div class="processing-block-one">
                        <div class="inner-box">
                            <span class="count-text">03 <br />Step</span>
                            <h3>Get Your <br />Desire Account</h3>
                            <p></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- process-sectione end -->



        <!-- service-style-three -->
        <section class="service-style-three pt_120 pb_90">
            <div class="bg-layer" style="background-image: url(assets/images/background/service-bg-3.jpg);"></div>
            <div class="auto-container">
                <div class="sec-title light centred mb_60">
                    <h6>Our Services</h6>
                    <h2>Online Banking at Fingertips</h2>
                </div>
                <div class="row clearfix">
                    <div class="col-lg-3 col-md-6 col-sm-12 service-block">
                        <div class="service-block-one wow fadeInUp animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                            <figure class="image-box"><a href="#">
                                <img src="{{ asset('assets/images/service/service-3.jpg')}}" alt=""></a></figure>
                            <div class="inner-box">
                                <div class="icon-box"><i class="icon-12"></i></div>
                                <h4>Digital Banking</h4>
                                <ul class="list-item clearfix">
                                    <li>Bank & savings accounts</li>
                                    <li>Credit cards</li>
                                    <li>Personal loans</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 service-block">
                        <div class="service-block-one wow fadeInUp animated" data-wow-delay="300ms" data-wow-duration="1500ms">
                            <figure class="image-box"><a href="#">
                                <img src="assets/images/service/service-6.jpg" alt=""></a></figure>
                            <div class="inner-box">
                                <div class="icon-box"><i class="icon-13"></i></div>
                                <h4>Mobile & Web Banking</h4>
                                <ul class="list-item clearfix">
                                    <li>Instant Access</li>
                                    <li>Savings Fixed Term</li>
                                    <li>Savings Instant</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 service-block">
                        <div class="service-block-one wow fadeInUp animated" data-wow-delay="600ms" data-wow-duration="1500ms">
                            <figure class="image-box"><a href="#"><img src="assets/images/service/service-7.jpg" alt=""></a></figure>
                            <div class="inner-box">
                                <div class="icon-box"><i class="icon-14"></i></div>
                                <h4>Insurance Policies</h4>
                                <ul class="list-item clearfix">
                                    <li>Pet insurance</li>
                                    <li>Transport Insurance</li>
                                    <li>Accident insurance</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 service-block">
                        <div class="service-block-one wow fadeInUp animated" data-wow-delay="900ms" data-wow-duration="1500ms">
                            <figure class="image-box"><a href="#"><img src="{{ asset('assets/images/service/service-8.jpg')}}" alt=""></a></figure>
                            <div class="inner-box">
                                <div class="icon-box"><i class="icon-15"></i></div>
                                <h4>Property Loan</h4>
                                <ul class="list-item clearfix">
                                    <li>Residential Mortgages</li>
                                    <li>Buy-to-let Mortgages</li>
                                    <li>Building Mortgages</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 service-block">
                        <div class="service-block-one wow fadeInUp animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                            <figure class="image-box">
                                <a href="#">
                                    <img src="{{ asset('assets/images/service/service-9.jpg')}}" alt=""></a></figure>
                            <div class="inner-box">
                                <div class="icon-box"><i class="icon-16"></i></div>
                                <h4>All Bank Account</h4>
                                <ul class="list-item clearfix">
                                    <li>Instant Access Savings</li>
                                    <li>Instant Access Cash</li>
                                    <li>Young Savers Account</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-12 service-block">
                        <div class="service-block-one wow fadeInUp animated" data-wow-delay="300ms" data-wow-duration="1500ms">
                            <figure class="image-box">
                                <a href="#">
                                    <img src="{{ asset('assets/images/service/service-10.jpg')}}" alt=""></a></figure>
                            <div class="inner-box">
                                <div class="icon-box"><i class="icon-17"></i></div>
                                <h4>Borrowing accounts</h4>
                                <ul class="list-item clearfix">
                                    <li>Bank Credit Card</li>
                                    <li>Setter personal loan</li>
                                    <li>Overdraft</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 service-block">
                        <div class="service-block-one wow fadeInUp animated" data-wow-delay="600ms" data-wow-duration="1500ms">
                            <figure class="image-box"><a href="#">
                                <img src="{{ asset('assets/images/service/service-11.jpg')}}" alt=""></a></figure>
                            <div class="inner-box">
                                <div class="icon-box"><i class="icon-18"></i></div>
                                <h4>Private Banking</h4>
                                <ul class="list-item clearfix">
                                    <li>Dedicated personal service</li>
                                    <li>Specialist teams</li>
                                    <li>Tailored products</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 service-block">
                        <div class="service-block-one wow fadeInUp animated" data-wow-delay="900ms" data-wow-duration="1500ms">
                            <figure class="image-box">
                                <a href="#">
                                <img src="{{ asset('assets/images/service/service-12.jpg')}}" alt=""></a></figure>
                            <div class="inner-box">
                                <div class="icon-box"><i class="icon-19"></i></div>
                                <h4>Fixed term accounts</h4>
                                <ul class="list-item clearfix">
                                    <li>Fixed Term Saving</li>
                                    <li>Fixed Rate Cash</li>
                                    <li>Resume your Current</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- service-style-three end -->


        <!-- card-section -->
        <section class="card-section centred pt_120 pb_90">
            <div class="pattern-layer">
                <div class="pattern-1 rotate-me"></div>
            </div>
            <div class="auto-container">
                <div class="sec-title mb_70">
                    <h6>Our Credit Card</h6>
                    <h2>Credit Cards We Provide</h2>
                </div>
                <div class="row clearfix">
                    <div class="col-lg-4 col-md-6 col-sm-12 card-block">
                        <div class="card-block-one wow fadeInUp animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                            <div class="inner-box">
                                <figure class="image-box"><img src="{{ asset('assets/images/resource/card-1.jpg')}}" alt=""></figure>
                                <div class="lower-content">
                                    <h3><a href="#">Visa Silver Card</a></h3>
                                    <p> Allows you to borrow money (up to a limit) to make purchases, which you will pay back later</p>
                                    <div class="btn-box">
                                        <a href="{{url('/get-login')}}" class="theme-btn btn-two">Apple for Card</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 card-block">
                        <div class="card-block-one wow fadeInUp animated" data-wow-delay="300ms" data-wow-duration="1500ms">
                            <div class="inner-box">
                                <figure class="image-box"><img src="{{ asset('assets/images/resource/card-2.jpg')}}" alt=""></figure>
                                <div class="lower-content">
                                    <h3><a href="#">Mastercard Gold Card</a></h3>
                                    <p>Another type of payment card - similar to a visa that can be a credit, debit or prepaid card.</p>
                                    <div class="btn-box">
                                        <a href="{{url('/get-login')}}" class="theme-btn btn-two">Apple for Card</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 card-block">
                        <div class="card-block-one wow fadeInUp animated" data-wow-delay="600ms" data-wow-duration="1500ms">
                            <div class="inner-box">
                                <figure class="image-box"><img src="{{ asset('assets/images/resource/card-3.jpg')}}" alt=""></figure>
                                <div class="lower-content">
                                    <h3><a href="#">Visa Platinum Card</a></h3>
                                    <p>Allows you to borrow money up to $1, 000, 000 make purchases, which you will pay back later </p>
                                    <div class="btn-box">
                                        <a href="{{url('/get-login')}}" class="theme-btn btn-two">Apple for Card</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- card-section end -->





        <!-- exchange-section -->
        <section class="exchange-section pt_120 pb_90 centred">
            <div class="auto-container">
                <div class="sec-title mb_70">
                    <h6>Exchange Currency</h6>
                    <h2>Foreign Exchange Rate</h2>
                </div>
                <div class="tabs-box">
                    <div class="tab-btn-box p_relative mb_60">
                        <ul class="tab-btns tab-buttons">
                            <li class="tab-btn active-btn" data-tab="#tab-1">Foreign Currency</li>
                            <li class="tab-btn" data-tab="#tab-2">Crypto Currency</li>
                        </ul>
                    </div>
                    <div class="tabs-content">
                        <div class="tab active-tab" id="tab-1">
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-4 col-sm-12 exchange-block">
                                    <div class="exchange-block-one">
                                        <div class="inner-box">
                                            <h5>USD<i class="icon-38"></i></h5>
                                            <figure class="flag">
                                                <img src="{{ asset('assets/images/icons/flag-1.png')}}" alt=""></figure>
                                            <ul class="lower-box clearfix">
                                                <li><span>Send</span><span>50.30</span></li>
                                                <li><span>Receive</span><span>45.30</span></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-4 col-sm-12 exchange-block">
                                    <div class="exchange-block-one red">
                                        <div class="inner-box">
                                            <h5>GBP<i class="icon-39"></i></h5>
                                            <figure class="flag">
                                                <img src="{{ asset('assets/images/icons/flag-2.png')}}" alt=""></figure>
                                            <ul class="lower-box clearfix">
                                                <li><span>Send</span><span>60.30</span></li>
                                                <li><span>Receive</span><span>55.30</span></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-4 col-sm-12 exchange-block">
                                    <div class="exchange-block-one red">
                                        <div class="inner-box">
                                            <h5>INR<i class="icon-39"></i></h5>
                                            <figure class="flag">
                                                <img src="{{ asset('assets/images/icons/flag-3.png')}}" alt=""></figure>
                                            <ul class="lower-box clearfix">
                                                <li><span>Send</span><span>20.30</span></li>
                                                <li><span>Receive</span><span>40.30</span></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-4 col-sm-12 exchange-block">
                                    <div class="exchange-block-one">
                                        <div class="inner-box">
                                            <h5>CAD<i class="icon-38"></i></h5>
                                            <figure class="flag">
                                                <img src="{{ asset('assets/images/icons/flag-4.png')}}" alt=""></figure>
                                            <ul class="lower-box clearfix">
                                                <li><span>Send</span><span>30.30</span></li>
                                                <li><span>Receive</span><span>32.30</span></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-4 col-sm-12 exchange-block">
                                    <div class="exchange-block-one">
                                        <div class="inner-box">
                                            <h5>YAN<i class="icon-38"></i></h5>
                                            <figure class="flag">
                                                <img src="{{ asset('assets/images/icons/flag-5.png')}}" alt=""></figure>
                                            <ul class="lower-box clearfix">
                                                <li><span>Send</span><span>90.30</span></li>
                                                <li><span>Receive</span><span>95.30</span></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-4 col-sm-12 exchange-block">
                                    <div class="exchange-block-one red">
                                        <div class="inner-box">
                                            <h5>AUD<i class="icon-39"></i></h5>
                                            <figure class="flag">
                                                <img src="{{ asset('assets/images/icons/flag-6.png')}}" alt=""></figure>
                                            <ul class="lower-box clearfix">
                                                <li><span>Send</span><span>50.30</span></li>
                                                <li><span>Receive</span><span>45.30</span></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab" id="tab-2">
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-4 col-sm-12 exchange-block">
                                    <div class="exchange-block-one">
                                        <div class="inner-box">
                                            <h5>USD<i class="icon-38"></i></h5>
                                            <figure class="flag">
                                                <img src="{{ asset('assets/images/icons/flag-1.png')}}" alt=""></figure>
                                            <ul class="lower-box clearfix">
                                                <li><span>Send</span><span>50.30</span></li>
                                                <li><span>Receive</span><span>45.30</span></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-4 col-sm-12 exchange-block">
                                    <div class="exchange-block-one red">
                                        <div class="inner-box">
                                            <h5>GBP<i class="icon-39"></i></h5>
                                            <figure class="flag">
                                                <img src="{{ asset('assets/images/icons/flag-2.png')}}" alt=""></figure>
                                            <ul class="lower-box clearfix">
                                                <li><span>Send</span><span>60.30</span></li>
                                                <li><span>Receive</span><span>55.30</span></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-4 col-sm-12 exchange-block">
                                    <div class="exchange-block-one red">
                                        <div class="inner-box">
                                            <h5>INR<i class="icon-39"></i></h5>
                                            <figure class="flag">
                                                <img src="{{ asset('assets/images/icons/flag-3.png')}}" alt=""></figure>
                                            <ul class="lower-box clearfix">
                                                <li><span>Send</span><span>20.30</span></li>
                                                <li><span>Receive</span><span>40.30</span></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-4 col-sm-12 exchange-block">
                                    <div class="exchange-block-one">
                                        <div class="inner-box">
                                            <h5>CAD<i class="icon-38"></i></h5>
                                            <figure class="flag"><img src="{{ asset('assets/images/icons/flag-4.png')}}" alt=""></figure>
                                            <ul class="lower-box clearfix">
                                                <li><span>Send</span><span>30.30</span></li>
                                                <li><span>Receive</span><span>32.30</span></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-4 col-sm-12 exchange-block">
                                    <div class="exchange-block-one">
                                        <div class="inner-box">
                                            <h5>YAN<i class="icon-38"></i></h5>
                                            <figure class="flag">
                                                <img src="{{ asset('assets/images/icons/flag-5.png')}}" alt=""></figure>
                                            <ul class="lower-box clearfix">
                                                <li><span>Send</span><span>90.30</span></li>
                                                <li><span>Receive</span><span>95.30</span></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-4 col-sm-12 exchange-block">
                                    <div class="exchange-block-one red">
                                        <div class="inner-box">
                                            <h5>AUD<i class="icon-39"></i></h5>
                                            <figure class="flag">
                                                <img src="{{ asset('assets/images/icons/flag-6.png')}}" alt=""></figure>
                                            <ul class="lower-box clearfix">
                                                <li><span>Send</span><span>50.30</span></li>
                                                <li><span>Receive</span><span>45.30</span></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- exchange-section end -->


        <!-- apps-section -->
        <section class="apps-section alternat-2 pt_120 pb_120">
            <div class="pattern-layer">
                <div class="pattern-1" style="background-image: url(assets/images/shape/shape-3.png);"></div>
                <div class="pattern-2" style="background-image: url(assets/images/shape/shape-16.png);"></div>
            </div>
            <div class="image-layer">
                <figure class="image-1"><img src="assets/images/resource/mockup-1.png" alt=""></figure>
                <figure class="image-2"><img src="assets/images/resource/mockup-2.png" alt=""></figure>
            </div>
            <div class="auto-container">
                <div class="row clearfix">
                    <div class="col-xl-6 col-lg-12 col-md-12 offset-xl-6 content-column">
                        <div class="content-box ml_50">
                            <div class="sec-title light mb_20">
                                <h6>Mobile App</h6>
                                <h2>Get the Fastest and Most Secure Banking</h2>
                            </div>
                            <div class="text-box mb_50">
                                <p>Center for and Mobile and Online Banking.</p>
                            </div>
                            <div class="btn-box">
                             
                              
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- apps-section end -->


        <!-- testimonial-style-two -->
        <section class="testimonial-style-two pt_120 pb_120">
            <div class="bg-layer" style="background-image: url(assets/images/background/testimonial-bg-2.jpg);"></div>
            <div class="auto-container">
                <div class="row clearfix">
                    <div class="col-lg-4 col-md-12 col-sm-12 title-column">
                        <div class="sec-title mr_70">
                            <h6>Testimonials</h6>
                            <h2>Love from Happy Clients</h2>
                            <p>We can testify the real nature of this platform. </p>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-12 col-sm-12 content-column">
                        <div class="two-item-carousel owl-carousel owl-theme owl-dots-none nav-style-one">
                            <div class="testimonial-block-two">
                                <div class="inner-box">
                                    <div class="author-box">
                                        <figure class="thumb-box"><img src="{{ asset('assets/images/resource/testimonial-4.png')}}" alt=""></figure>
                                        <h4>Julien Anthor</h4>
                                        <span class="designation">Manager</span>
                                    </div>
                                    <ul class="rating mb_15 clearfix">
                                        <li><i class="icon-9"></i></li>
                                        <li><i class="icon-9"></i></li>
                                        <li><i class="icon-9"></i></li>
                                        <li><i class="icon-9"></i></li>
                                        <li><i class="icon-9"></i></li>
                                    </ul>
                                    <p>“Absolutely satisfied with the services received.”</p>
                                </div>
                            </div>
                            <div class="testimonial-block-two">
                                <div class="inner-box">
                                    <div class="author-box">
                                        <figure class="thumb-box"><img src="assets/images/resource/testimonial-5.png" alt=""></figure>
                                        <h4>Rolier Demonil</h4>
                                        <span class="designation">Manager</span>
                                    </div>
                                    <ul class="rating mb_15 clearfix">
                                        <li><i class="icon-9"></i></li>
                                        <li><i class="icon-9"></i></li>
                                        <li><i class="icon-9"></i></li>
                                        <li><i class="icon-9"></i></li>
                                        <li><i class="icon-9"></i></li>
                                    </ul>
                                    <p>“Never regreted my time on this platform. Thank you to Metrokapital.”</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- testimonial-style-two end -->


        <!-- news-section -->
        {{--<section class="news-section pt_120 pb_90">
            <div class="pattern-layer">
                <div class="pattern-1" style="background-image: url(assets/images/shape/shape-6.png);"></div>
                <div class="pattern-2" style="background-image: url(assets/images/shape/shape-7.png);"></div>
            </div>
            <div class="auto-container">
                <div class="sec-title centred mb_70">
                    <h6>Latest News</h6>
                    <h2>Our Latest Media Update</h2>
                </div>
                <div class="row clearfix">
                    <div class="col-lg-4 col-md-6 col-sm-12 news-block">
                        <div class="news-block-one wow fadeInUp animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                            <div class="inner-box" style="background-image: url(assets/images/news/news-1.jpg);">
                                <div class="content-box">
                                    <span class="post-date"><i class="icon-27"></i>Apr 17, 2022</span>
                                    <h3><a href="blog-details.html">Self-Guided Driving & Tours Walk Of Greater City</a></h3>
                                    <ul class="post-info mb_25">
                                        <li><i class="icon-28"></i><a href="blog-details.html">Admin</a></li>
                                        <li><i class="icon-29"></i>0 Comment</li>
                                    </ul>
                                    <div class="btn-box"><a href="blog-details.html" class="theme-btn btn-three">Read More</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 news-block">
                        <div class="news-block-one wow fadeInUp animated" data-wow-delay="300ms" data-wow-duration="1500ms">
                            <div class="inner-box" style="background-image: url(assets/images/news/news-2.jpg);">
                                <div class="content-box">
                                    <span class="post-date"><i class="icon-27"></i>Apr 16, 2022</span>
                                    <h3><a href="blog-details.html">Assistance For Homes & Properties Real Estate</a></h3>
                                    <ul class="post-info mb_25">
                                        <li><i class="icon-28"></i><a href="blog-details.html">Admin</a></li>
                                        <li><i class="icon-29"></i>4 Comment</li>
                                    </ul>
                                    <div class="btn-box"><a href="blog-details.html" class="theme-btn btn-three">Read More</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 news-block">
                        <div class="news-block-one wow fadeInUp animated" data-wow-delay="600ms" data-wow-duration="1500ms">
                            <div class="inner-box" style="background-image: url(assets/images/news/news-3.jpg);">
                                <div class="content-box">
                                    <span class="post-date"><i class="icon-27"></i>Apr 15, 2022</span>
                                    <h3><a href="blog-details.html">Long-Term Vision Of Health & Attractive Facility</a></h3>
                                    <ul class="post-info mb_25">
                                        <li><i class="icon-28"></i><a href="blog-details.html">Admin</a></li>
                                        <li><i class="icon-29"></i>1 Comment</li>
                                    </ul>
                                    <div class="btn-box"><a href="blog-details.html" class="theme-btn btn-three">Read More</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>--}}
        <!-- news-section end -->


        <!-- subscribe-section -->
        {{--<section class="subscribe-section">
            <div class="pattern-layer" style="background-image: url(assets/images/shape/shape-5.png);"></div>
            <div class="auto-container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-12 col-sm-12 text-column">
                        <div class="text-box">
                            <h2>Subscribe us to Recieve Latest Updates</h2>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 form-column">
                        <div class="form-inner ml_40">
                            <form method="post" action="contact.html">
                                <div class="form-group">
                                    <input type="email" name="email" placeholder="Your email" required>
                                    <button type="submit" class="theme-btn btn-two">Subscribe Now</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>--}}
        <!-- subscribe-section end -->
         @endsection