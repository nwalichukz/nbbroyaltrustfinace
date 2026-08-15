
<br/> <br/><br/><br/>
@if ($errors->any())
<center>
<div class="col-md-4 center-block" style="background-color:red;">
<ul class="alert alert-danger">
@foreach ($errors->all() as $error)
<li> {{ $error }} </li>
@endforeach
</ul>
</div>
</center>
@endif


@if (Session::has('success'))
	
  <br>
  {{--<div id="overlay" style="margin-left:auto; margin-right:auto; float:none;" class="col-md-8 alert alert-success">
  <button type="button" data-dismiss="alert" aria-label="">×</button> 
  <strong>  </strong>
  </div>--}}

  <div class="alert alert-success alert-dismissible">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Success!</strong> {{ session::get('success') }}
</div>
  @elseif(Session::has('error'))
   <br>

  <div class="alert alert-danger alert-dismissible">
  {{--<a href="#" class="close" data-dismiss="alert" aria-label="close"> </a>--}}
  <strong>Error!</strong>{{ Session::get('error') }}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true"> </span>
</button>
</div>
  @endif