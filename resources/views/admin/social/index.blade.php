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
            <form method="POST" action="{{url('Admin/social/create')}}"
             enctype="multipart/form-data"> @csrf
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="">Facebook</label>
                        <input type="text" name="facebook" id="" class="form-control"
                        value="{{old('facebook') ? old('facebook') : 'facebook' }}">
                    </div>
                    <div class="form-group col-md-12">
                        <label for="">Instagram</label>
                        <input type="text" name="instagram" id="" class="form-control"
                        value="{{old('instagram') ? old('instagram') : 'instagram' }}">
                    </div>
                    <div class="form-group col-md-12">
                        <label for="">Linkedin</label>
                        <input type="text" name="linkedin" id="" class="form-control"
                        value="{{old('linkedin') ? old('linkedin') : 'linkedin' }}">
                        
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