@extends('layouts.pages')

<title>კონტაქტის გვერი</title>
@section('content')

<section>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>კონტაქტის გვერდი 21312  </h1>


            <p>{{$phone}}</p>
            <p>{{$email}}</p>
            @foreach ($arr as $key=> $ar)
            <p>{{$key}} : {{$ar}}</p>
                
            @endforeach

        </div>
    </div>
</div>  
</section>

@endsection