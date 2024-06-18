@extends('admin.layout')
@section('title','ადმინსტრატორის დამატება')
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">ადმინსტრატორის დამატება</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">ადმინსტრატორის დამატება</li>
    </ol>
    
    @if($errors->any())
        <div class="row">
            <div class="col-md-5 offset-4">
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    @endif
    
    <div class="row">
        <div class="col-md-6 offset-3">
            <form method="post" action="{{ route('admins.store') }}">
                @csrf
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">სახელი</label>
                    <div class="col-sm-10">
                        <input type="text" name="name" value="{{ old('name') }}" class="form-control">
                    </div>
                </div>
                <div class="form-group row mt-4">
                    <label class="col-sm-2 col-form-label">ელ_ფოსტა</label>
                    <div class="col-sm-10">
                        <input type="email" name="email" value="{{ old('email') }}" class="form-control">
                    </div>
                </div>
                <div class="form-group row mt-4">
                    <label class="col-sm-2 col-form-label">პაროლი</label>
                    <div class="col-sm-10">
                        <input type="password" name="password" class="form-control">
                    </div>
                </div>
                <div class="form-group row mt-4">
                    <label class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-success">დამატება</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
                