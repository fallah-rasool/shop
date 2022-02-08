@extends('admin.layout.app')
@section('css')
    <link rel="stylesheet" href="/admin/css/dropzone.css">
@endsection

@section('content')
    <div class="main-content padding-0">
        <p class="box__title">ایجاد گالری برای <b> {{$product->name}}</b></p>
        <div class="row no-gutters bg-white">
            <div class="col-12">
                <form action="{{route('product.gallery.store',$product)}}" method="post" class="dropzone">
                    @csrf
                    <div class="fallback">
                            <input type="file" name="file" multiple>
                    </div>
                </form>
            </div>
        </div>

    </div>


    <div class="main-content padding-0 categories">
        <p class="box__title"> گالری محصول <b> {{$product->name}}</b></p>
        <div class="box__title m-5">
            <span> تعداد  تصاویر :</span>  {{$product->galleries->count()}}
        </div>
        <div class="row no-gutters bg-white">


           @foreach($product->galleries as $gallery)
                <div class="col-sm-2  col-md-3  ">
                                <div class="card text-center ml-1" style="margin:5px 7px 10px">
                                <img class="m-5"  width="150" height="150" src="{{str_replace('public','/storage',$gallery->path)}}" alt="{{$gallery->product->name}}">
                                <div class="">

                                    <form action="" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn_delete item-delete mlg-15"></button>
                                    </form>

                                </div>

                           </div>
                </div>
          @endforeach


        </div>
    </div>

@endsection

@section('js')
    <script src="/admin/js/dropzone.js"></script>
@endsection
