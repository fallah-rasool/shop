
@extends('admin.layout.app')

@section('content')
<div class="main-content padding-0 categories">
    <div class="row no-gutters  ">

        <div class="col-12 bg-white">
            <p class="box__title">

                ویرایش
                دسته
                <b> {{ $category->title_fa }}</b>

            </p>
            <form action="{{ route('category.update', $category->id) }}" method="post" class="padding-30">
                @csrf
                @method('patch')

                <input  name="title_fa" value=" {{ $category->title_fa }}" type="text" placeholder="نام دسته بندی" class="text">

                @if(session()->has('title_fa'))
                    <p class="error-input">{{Session::get('title_fa')}}</p>
                @endif
{{--                @error('title_fa')--}}
{{--                <p class=" error-input"  >   {{$message}}</p>--}}
{{--                @enderror--}}

                <input  name="title_en" value=" {{ $category->title_en }}" type="text" placeholder="نام انگلیسی دسته بندی" class="text">

                @error('title_en')
                <p class=" error-input" >   {{$message}}</p>
                @enderror


                <p class="box__title margin-bottom-15">انتخاب دسته پدر</p>

                <select name="patent_id" >
                    <option value >دسته پدر ندارد</option>

                    @forelse ($categories as $parent)

                    <option
                    @if($parent->id == $category->patent_id)
                        selected
                    @endif

                    value="{{ $parent->id }}"> {{ $parent->title_fa }}</option>
                    @empty

                    @endforelse

                </select>

                <button class="btn btn-brand">اضافه کردن</button>
            </form>

        </div>
    </div>
</div>

@endsection
