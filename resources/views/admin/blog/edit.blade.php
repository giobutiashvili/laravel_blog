@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i>ბლოგის შექმნა</a>
    </div>

    <div class="row justify-content-center align-items-center" 
         style="color:rgb(28, 83, 119); background-color:powderblue; font-size:20px; font-weight:bold;  ">
        @if(Session::has('success'))
            <p>{{Session::get('success')}}</p>
        @endif
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="row">
        <div class="col-md-12">
            <form method="POST" action="{{route('blog.update', $blog->id)}}"
             enctype="multipart/form-data"> @csrf
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label >Title</label>
                        <input  name="Title"  class="form-control"
                        value="{{old('Title') ? old('Title') : $blog->title}}">
                        
                    </div>
                      
                   
                    <div class="form-group col-md-12">
                        <label for="">Text</label>
                        <textarea type="text" name="Text" class="form-control" rows="10"
                        >{{old('Text') ? old('Text') : $blog->text}}</textarea>
                    </div>
                    <div class="form-group col-md-12">

                        @forelse ($slugs as $slug)  
                        <div class="form-check">
                            <input class="form-check-inline"
                            name="slugs[]"
                            type="checkbox" id="Slug_{{$slug->id}}"
                            value="{{$slug->id}}" @if(in_array($slug->id, $ids))checked @endif
                           >
                            <label class="form-check-label" for="Slug_{{$slug->id}}"   > 
                                {{$slug->name}}
                            </label>
                          </div>
                        @empty

                        @endforelse
                        
                    </div>          
                      
                    <div class="form-group col-md-12">
                        <label for="">Category</label>
                        <select class="form-control" name="Category">
                            <option value=""
                            >აირჩიე...</option>    
                            @foreach($categories as $category)
                            <option value="{{$category->id}}" 
                                @if($category->id == $blog->category_id)selected
                            @endif
                            >{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    @if($blog->image)
                        <div class="form-group col-md-4">
                            <img class="w-100" src="{{asset('image/blog/'.$blog->image)}}" alt="">
                        </div>
                    @endif 
                    <div class="form-group col-md-12">
                        <label >Add Image</label>
                        <input type="file" name="Image" class="form-control"
                        >
                    </div>                          
                    <div class="form-group col-md-12">
                        <button class="btn btn-success">Edit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection