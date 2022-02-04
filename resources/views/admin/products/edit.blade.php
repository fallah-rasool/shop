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
        .
    </style>

@endsection
@section('content')
    <div class="main-content padding-0 categories">


    <div class="col-12 bg-white">
    <p class="box__title">ویرایش محصول   <b> {{$product->name}} </b></p>

    @if(session('success'))
        <div class="text-success text-center">{{session('success')}}</div>
    @endif
    <form action="{{ route('product.update',$product->id) }}" method="post" class="padding-30" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <input  value="{{$product->name}}" name="name" type="text" placeholder="نام محصول" class="text">
        @error('name')
        <p class=" error-input"  >   {{$message}}</p>
        @enderror

        <input value="{{$product->price }}" name="price" type="text" placeholder="قیمت محصول" class="text">
        @error('price')
        <p class=" error-input"  >   {{$message}}</p>
        @enderror


        <select name="category_id" >
            <option value selected>ویرایش دسته بندی محصول</option>
            @forelse ($categories as $category)
                <option
                    @if ($category->id == $product->category_id ) selected @endif
                    value="{{ $category->id }}"> {{ $category->title_fa }}</option>
            @empty
            @endforelse

        </select>

        @error('category_id')
        <p class=" error-input"  >   {{$message}}</p>
        @enderror


        <select name="brand_id" >
            <option value selected> برند محصول</option>

            @forelse ($brands as $brand)

                <option
                    @if ($brand->id == $product->brand_id ) selected @endif
                    value="{{ $brand->id }}"> {{ $brand->name }}</option>
            @empty

            @endforelse

        </select>

        @error('brand_id')
        <p class=" error-input"  >   {{$message}}</p>
        @enderror


        <label class="formlabal" for="image">انتخاب عکس محصول</label>

        <input id="image" hidden  name="image" type="file" placeholder="عکس محصول" class="text">

        @error('image')
        <p class=" error-input" >   {{$message}}</p>
        @enderror
        <div>
            <img width="50" height="50" src="/{{str_replace('public','storage',$product->image)}}"  alt="product">
        </div>
        <input value="{{$product->slug}}" name="slug" type="text" placeholder="slug" class="text">


        @if(session()->has('slug'))
           <p class="error-input">{{Session::get('slug')}}</p>
        @endif
{{--        @error('slug')--}}
{{--        <p class=" error-input"  >   {{$message}}</p>--}}
{{--        @enderror--}}

        <textarea name="description" id="" placeholder="توضیحات" cols="30" rows="10">{{$product->description}}</textarea>

        @error('description')
        <p class=" error-input"  >   {{$message}}</p>
        @enderror

        <button class="btn btn-brand">ویرایش کردن</button>
    </form>

</div>

    </div>
@endsection
