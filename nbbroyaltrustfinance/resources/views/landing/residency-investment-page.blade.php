@extends('layout.app-landing')
@section('content')
<!-- page-title -->
        <section class="page-title centred">
            <div class="bg-layer" style="{{ asset('background-image: url(assets/images/background/page-title.jpg)')}};"></div>
            <div class="pattern-layer">
                <div class="pattern-1" style="{{ asset('background-image: url(assets/images/shape/shape-18.png)')}};"></div>
                <div class="pattern-2" style="background-image: url(assets/images/shape/shape-17.png);"></div>
            </div>
            <div class="auto-container">
                <div class="content-box">
                 
                  
                <div class="image">
                @if(!$image->isEmpty())
               
                    <!-- Slideshow container -->
  <div class="w3-content w3-display-container">
  
    @foreach ($image as $user)

  <img class="mySlides" src="{{asset('images/Property/'.$user->name)}}" alt="Property Image" style="width:100%">
 
 @endforeach
  <button class="w3-button w3-display-left" onclick="plusDivs(-1)">&#10094;</button>
<button class="w3-button w3-display-right" onclick="plusDivs(+1)">&#10095;</button>

</div>
              @endif
            </div>

               {!!$data->description !!}




                </div>
            </div>
        
        <!-- page-title end -->


        <!-- error-section -->
        
          
        <br/>
        <br/>      
        <p style="border: 20px;">
                    
                    <a  href="{{url('/user/get-account-officer')}}" class="theme-btn btn-one">Apply Today</a>
</p>

<br/>
<br/>
<br/>
              
        </section>
        <!-- error-section end -->
         @endsection
