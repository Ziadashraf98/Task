@extends('admin.layouts.master')
@section('title' , 'Edit User')
    

@section('content')
<div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
    <form method="POST" action="{{route('users.update' , $user->id)}}" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <div class="card">
        <div class="card-body">

            @if ($errors->any())
          <div class="alert alert-outline-danger mg-b-0" role="alert">
            <button aria-label="Close" class="close" data-dismiss="alert" type="button">
            <span aria-hidden="true">&times;</span></button>
            <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
            </ul>
          </div>
          @endif
        
          @if(session()->has('success'))

          <div class="alert alert-outline-success" role="alert">
              <button aria-label="Close" class="close" data-dismiss="alert" type="button">
              <span aria-hidden="true">&times;</span></button>
              {{session()->get('success')}}
          </div>
  
          @endif
          <br>
            <div class="main-content-label mg-b-5">
                Edit User
            </div>
            <br>
            {{-- <p class="mg-b-20">{{__('Add Product')}}</p> --}}
            
            
            <div class="row row-sm">
                <div class="col-lg">
                    <label >{{__('User name')}}</label>
                    <input class="form-control mg-b-20" name="name" value="{{$user->name}}" placeholder="{{__('user name')}}" type="text">
                </div>
            </div>
            
            <div class="row row-sm">
                <div class="col-lg">
                    <label >{{__('Email')}}</label>
                    <input class="form-control mg-b-20" name="email" value="{{$user->email}}" placeholder="{{__('email')}}" type="email">
                </div>
            </div>
            
            <div class="row row-sm">
                <div class="col-lg">
                    <label >{{__('Password')}}</label>
                    <input class="form-control mg-b-20" name="password" placeholder="{{__('password')}}" type="password">
                </div>
            </div>
            
            <div class="row row-sm">
                <div class="col-lg">
                    <label >{{__('Confirm password')}}</label>
                    <input class="form-control mg-b-20" name="password_confirmation" placeholder="{{__('confirm password')}}" type="password">
                </div>
            </div>

            
            <br>      
                            
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{route('users.index')}}" class="btn btn-secondary">Cancel</a>
            </div>
        </div>
    </div>
</div>
</form>

@endsection