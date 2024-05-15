@extends('layouts.pages')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        
        <div class="col-md-8">
            <div class="card">
                @if($blog->image)
                    <img class="card-img-top" src="{{asset('image/blog/'.$blog->image)}}" alt="1"  >
                @else
                    <img class="card-img-top" src="{{asset('image/blog/noimage.jpg')}}" alt="2">
                @endif
               
                @if($blog->BlogImages)
                    @foreach($blog->BlogImages as $image)
                    <img class="card-img-top" src="{{asset('image/blog/'.$image->name)}}" alt="1"  >
                    
                    @endforeach
                @endif
                <div class="card-body" >
                  <h5 class="card-title">{{$blog->title}}</h5>
                  <p class="card-text">{{$blog->text}}</p>
            
                </div>
              </div>
           
        </div>
       
    </div>
</div>

@endsection