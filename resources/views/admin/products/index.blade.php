
@extends('admin.layout.app')


@section('css')
    {{-- صفجه بندی  --}}
    <style>
        .pagination {
            width: 100%;
        }

        .pagination > .pagination__page {

            background-color: rgb(255, 255, 255);
            box-shadow: 1px 3px 2px rgba(0, 0, 0, .1);
            padding: 10px;
        }

        .pagination__page--current {
            background-color: rgb(56, 163, 252);
            box-shadow: 1px 3px 2px rgba(0, 0, 0, .1);
            padding: 10px 15px;
            margin-left: 3px;
            color: white;
        }

        .pagination__page--prev {
            background-color: rgb(255, 255, 255);
            box-shadow: 1px 3px 2px rgba(0, 0, 0, .1);
            padding: 10px;
            margin-left: 3px;
        }

        .formlabal {
            width: 100%;
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
        <div class="row no-gutters  ">
            <div class="col-8 margin-left-10 margin-bottom-15 border-radius-3">
                <p class="box__title"> لیست محصولات</p>
                <div class="table__box">
                    <table class="table">
                        <thead role="rowgroup">
                        <tr role="row" class="title-row">
                            <th>#</th>
                            <th>نام  محصول</th>
                             <th>  تصویر محصول</th>
                            <th>  قیمت</th>
                            <th> برند</th>
                            <th>  دسته</th>
                            <th> تاریخ ایجاد</th>
                            <th>ویرایش</th>
                            <th>حذف</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse ($products as $product)
                            <tr role="row" class="">
                                <td><a href="">{{ $product->id }}</a></td>
                                <td><a href=""> {{ $product->name }}</a></td>
                                <td>
                                    <img width="50" height="50" src="/{{str_replace('public','storage',$product->image)}}"  alt="brand">


                                <td><a href=""> {{number_format( $product->price )}}</a></td>

                             <td><a href=""> {{ $product->category->title_fa }}</a></td>
                               <td><a href=""> {{ $product->brand->name }}</a></td>
                                <td><a href=""> {{Verta::instance($product->created_at)->format('Y-n-j')  }}</a></td>
                                <td>
                                    <a href="{{route('product.edit',$product->id)}}" class="item-edit " title="ویرایش"></a>
                                </td>
                                <td>
                                    <form action="{{route('product.destroy',$product->id)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn_delete item-delete mlg-15"></button>
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                        @empty
                            <div>
                                داده ای وجود ندار د
                            </div>
                        @endforelse

                    </table>

                </div>
            </div>

            {{--new category --}}
            @include('admin.products.create')


                        {{ $products->links() }}

        </div>
    </div>


@endsection
