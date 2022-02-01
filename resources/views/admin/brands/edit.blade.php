@extends('admin.layout.app')
@section('css')

    <style>
        .formlabal {
            width: 280px;
            display: block;
            padding: 10px;
            text-align: center;
            margin-bottom: 15px;
            background-color: #00b7ff;
            color: white;
            cursor: pointer;
        }
    </style>

@endsection

@section('content')
<div class="main-content padding-0 categories">
    <div class="col-12 bg-white">
    <p class="box__title">
        ویرایش برند
        <b>{{$brand->name}}</b>
    </p>
    @if(session('success'))
        <div class="text-success text-center">{{session('success')}}</div>
    @endif
    <form action="{{ route('brand.update',$brand->id) }}" method="post" class="padding-30" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <input value="{{$brand->name}}" name="name" type="text" placeholder="نام برند" class="text">
        @error('name')
        <p class=" error-input"  >   {{$message}}</p>
        @enderror
        <label class="formlabal" for="image">انتخاب عکس برند</label>

        <input id="image" hidden value="{{old('image')}}" name="image" type="file" placeholder="عکس برند" class="text">
        @error('image')
        <p class=" error-input" >   {{$message}}</p>
        @enderror
        <button class="btn btn-brand">اضافه کردن</button>
    </form>

        <div class="col-6 text-center">
            <img src="/{{str_replace('public','storage',$brand->image)}}"  alt="brand">
        </div>
</div>

</div>
@endsection
