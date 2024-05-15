@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i>ბლოგის გვერდი</a>
    </div>
    <div class="row">
        @if(Session::has('success'))
            <p>{{Session::get('success')}}</p>
        @endif
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="d-flex justify-content-end">
                <a href="{{url('Admin/blogs/create')}}" class="btn btn-success">Add New</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">View</th>
                    <th scope="col">Imges</th>
                    <th class="text-right">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($blogs as $blog)
                         <tr>
                           <th scope="row">{{$blog->id}}</th>
                           <td>{{$blog->title}}</td>
                           <td>{{$blog->views}}</td>
                           <td>
                                @if($blog->image)<img src="{{asset('image/blog/'.$blog->image)}}" 
                                    height="90px" width="90px">
                                @endif
                            </td>
                           <td class="text-right">
                            <a  href="{{route('blog.edit', $blog->id )}}" title="რედაქტირება" class="btn btn-info">
                                <i class="fa-solid fa-pen "></i></a>
                            <a  href="" title="წაშლა" class="btn btn-danger"
                                    onclick="event.preventDefault();
                                    this.nextElementSibling.submit();">
                                <i class="fa-solid fa-trash ">
                                </i>
                            </a>   
                            <form
                                    action="{{ route('blog.delete', $blog->id) }}"
                                    method="POST"
                                    class="d-none"
                                >
                                    @csrf
                            </form> 
                           </td>
                         </tr>
                     @endforeach
                </tbody>
              </table>
        </div>
    </div>

</div>


@endsection