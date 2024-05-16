@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i>ბლოგის შექმნა</a>
    </div>

    <div class="row">
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
            <form method="POST" action="{{url('Admin/blogs/store')}}"
             enctype="multipart/form-data"> @csrf
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="">Title</label>
                        <input type="text" name="Title" id="" class="form-control"
                        value="{{old('Title')}}">
                    </div>

                    <div class="form-group col-md-12">
                        <label for="">Category</label>
                        <select class="form-control" name="Category">
                            <option value=""
                            >აირჩიე...</option>    
                            @foreach($categories as $category)
                            <option value="{{$category->id}}"
                            >{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                      
                    <div class="form-group col-md-12">
                        <label for="">Text</label>
                        <textarea type="text" name="Text" class="form-control"
                        value="{{old('Text')}}"></textarea>
                    </div>
                               
                    <div class="form-group col-md-12">
                        <label for="">Profile Image</label>
                        <input type="file" name="Image" class="form-control">
                    </div>                          
                    <div class="form-group col-md-12">
                        <label for="">Image</label>
                        <input type="file" name="Images[]" class="form-control"
                        multiple>
                    </div>
                    <div class="form-group col-md-12">
                        @forelse ($slugs as $slug)  
                        
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="{{$slug->id}}"
                            name="slugs[]"
                            id="Slug_{{$slug->id}}"
                            type="checkbox">
                            <label class="form-check-label" for="Slug_{{$slug->id}}"   > 
                                {{$slug->name}}
                            </label>
                          </div>
                        @empty

                        @endforelse
                    </div>

                    <div class="form-group col-md-12">
                        <button class="btn btn-success">Add</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection