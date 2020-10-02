@extends('admin-page.layouts.main')

@section('content')


<div class="container">

<h1 class="mt-4">About Page</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">About Info</li>
        </ol>

        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif

@if($about)
	
<div class="card">
	<div class="row">
		<aside class="col-sm-5 border-right">
			<section class="gallery-wrap"> 
			<div class="img-wrap">
			  <div> 
                <center> 
                    <a href="#"><img src="{{ secure_asset($about->image) }}" width="300" height="300" style="padding-top:100px;"></a>
                </center>
			  </div>
			</div> 
			
			</section> 
		</aside>



		<aside class="col-sm-7">
			<section class="card-body p-5">
			 <center>	<h1 class="text-danger title mb-3">{{ $about->fname }} {{ $about->lname }}</h1> </center>

  <h3>Email</h3>
  <p>{{ $about->email }}</p>
  <h3>Phone</h3>
  <p>{{ $about->phone }}</p>
  <h3>Address</h3>
  <p>{!! $about->address !!}</p>
  <h3>Additional information</h3>
  <p>{!! $about->additional_info !!}</p>

    <a href="{{ route('about.edit', [$about->id]) }}">
        <button class="btn btn-primary" style="margin-bottom:10px;">EDIT</button>
    </a>
    
    <form action="{{ route('about.destroy', [$about->id]) }}" method="post" onsubmit="return confirm('Are you sure you want to delete?');">
        @csrf
        {{ method_field('DELETE') }}
        <button type="submit" class="btn btn-danger">DELETE</button>
    </form>


</section> 

		</aside> 

	</div> 
</div> 

@else
    <p>No About Detail.</p>
@endif


</div>

@endsection