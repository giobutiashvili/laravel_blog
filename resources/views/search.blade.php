@extends('layouts.pages')

@section('content')


<section>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>მთავარი გვერდი  </h1>
        </div>
    </div>   
    <div class="row my-5">
        <div class="col-md-12">
            <form action="{{url('search')}}" method="get">
                <div class="form-row d-flex">
                    <div class="form-group col-md-4">
                        <input type="text" placeholder="საძიებო სიტყვა" class="form-control" name="query"
                        value="{{$value? $value :""}}">
                    </div>
                    <div class="form-group col-md-4">
                        <input type="number" placeholder="დან" class="form-control" name="from"
                        value="{{$from ? $from :""}}">
                    </div>
                    <div class="form-group col-md-4">
                        <input type="number" placeholder="მდე" class="form-control" name="to"
                        value="{{$to? $to :""}}">
                    </div>
                    <div class="form-group col-md-4">
                        <button class="btn btn-success btn-block">ძებნა</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        @forelse ($blogs as $blog)
        <div class="col-md-4">
            <div class="card">
                @if($blog->image)
                    <img class="card-img-top" src="{{asset('image/blog/'.$blog->image)}}" alt="1" height="250" >
                @else
                    <img class="card-img-top" src="{{asset('image/blog/noimage.jpg')}}" alt="2">
                @endif
               
                <div class="card-body" >
                  <h5 class="card-title">{{$blog->title}}-{{$blog->Category ? $blog->Category->name: "" }}</h5>
                  <p class="card-text">{{mb_strimwidth($blog->text, '0', '100', '...')}}</p>
                  <div class="d-flex" style="justify-content: space-between">

                      <a href="{{route('blog.show',['id' => $blog->id, 'slug' => $blog->slug] )}}" class="btn btn-primary">More ...</a>
                      <p>Views:  {{$blog->views}}</p>
                  </div>
                </div>
              </div>
           
        </div>
        @empty
            <div class="cl-mb-12">
                <h2 class="py-4 bg-danger text-white text-center">
                    ჩანაწერი ვერ მოიძებნა
                </h2>
            </div>
        @endforelse
       
    </div>
    <div class="row">
        <div class="col-md-12">
            {{-- {{$blogs->links('vendor\pagination\bootstrap-4')}} --}}
        </div>
    </div>
</div>  
</section>

@endsection