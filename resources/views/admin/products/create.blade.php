@extends('admin.layouts.master')
@section('title' , 'Add Product')
    

@section('css')
<link href="{{asset('admin/assets/plugins/fileuploads/css/fileupload.css')}}" rel="stylesheet" type="text/css"/>
@endsection



@section('content')
<div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
    <form method="POST" action="{{route('products.store')}}" enctype="multipart/form-data">
    @csrf
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
                Add Product
            </div>
            <br>
            {{-- <p class="mg-b-20">{{__('Add Product')}}</p> --}}
            
            
            <div class="row row-sm">
                <div class="col-lg">
                    <label >{{__('Product name')}}</label>
                    <input class="form-control mg-b-20" name="title" placeholder="{{__('product name')}}" type="text">
                </div>
            </div>
            
            <div class="row row-sm">
                <div class="col-lg">
                    <label >{{__('Description')}}</label>
                    <textarea class="form-control" name="description" placeholder="{{__('description')}}" placeholder="Textarea" rows="3"></textarea>
                </div>
            </div>
            <br>
            
                <div>
                    <label >Image</label>
                    <div class="row mb-4">
                        <div class="col-sm-12 col-md-4">
                            <input type="file" name="image" class="dropify" data-height="200" />
                        </div>
                    </div>
                </div>
                <br>      
                                
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{route('products.index')}}" class="btn btn-secondary">Cancel</a>
                </div>
    </div>
    </div>
</div>
</form>

@endsection


@section('js')
<script src="{{asset('admin/assets/plugins/fileuploads/js/fileupload.js')}}"></script>
<script src="{{asset('admin/assets/plugins/fileuploads/js/file-upload.js')}}"></script>
@endsection