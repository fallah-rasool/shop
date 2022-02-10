@extends('admin.layout.app')
@section('content')
    <div class="main-content padding-0 categories">
        <div class="row no-gutters  ">
            <div class="col-12 margin-left-10 margin-bottom-15 border-radius-3">

                <p class="box__title">  ویرایش درصد تحفیف محصول
                    <b>{{$product->name}}</b>
                </p>
                <div class="table__box">

                    <div class="col-12 bg-white">
                        @if(session('success'))
                            <div class="text-success text-center">{{session('success')}}</div>
                        @endif
                        <form action="{{ route('product.discount.update',['product'=>$product,'discount'=>$product->discount]) }}" method="post" class="padding-30" >
                            @csrf
                            @method('patch')

                            <input value="{{$discount->value}}"
                                   name="value" type="number" min="1" max="100" placeholder=" درصد تخفیف" class="text">

                            @error('value')
                            <p class=" error-input"  >   {{$message}}</p>
                            @enderror


                            <button class="btn btn-brand">ویرایش کردن</button>
                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>



@endsection
