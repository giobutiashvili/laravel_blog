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
            <form method="POST" action="{{url('Admin/aboutUs/update')}}"
             enctype="multipart/form-data"> @csrf
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="">Title</label>
                        <input type="text" name="Title"  class="form-control"
                        value="@if($aboutUs){{old('Title') ? old('Title') : $aboutUs->title}}
                        @else{{old('Title')}} 
                        @endif">
                    </div>
                      
                   
                    <div class="form-group col-md-12">
                        <label for="">Text</label>
                        <textarea type="text" name="Text" class="form-control" rows="10"
                        >@if($aboutUs) {{old('Text') ? old('Text') : $aboutUs->text}}
                        @else{{old('Text')}} 
                        @endif
                    </textarea>
                    </div>
                    @if($aboutUs && $aboutUs->image)           
                    <div class="form-group 4">
                        <img class="w-100" src="{{asset('image/aboutUs/'.$aboutUs->image)}}" >
                    </div>                          
                    @endif
                    <div class="form-group col-md-12">
                        <label for="">Image</label>
                        <input type="file" name="Image" class="form-control">
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