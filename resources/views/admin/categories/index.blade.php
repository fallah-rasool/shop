
@extends('admin.layout.app')


@section('css')
{{-- صفجه بندی  --}}
<style>

    .pagination{
        width: 100%;
     }
     .pagination > .pagination__page{

         background-color: rgb(255, 255, 255);
         box-shadow:1px 3px 2px rgba(0, 0, 0, .1);
         padding: 10px ;


     }
     .pagination__page--current{
         background-color: rgb(56, 163, 252);
         box-shadow:1px 3px 2px rgba(0, 0, 0, .1);
         padding: 10px 15px;
         margin-left: 3px ;
         color: white;
     }
     .pagination__page--prev{
         background-color: rgb(255, 255, 255);
         box-shadow:1px 3px 2px rgba(0, 0, 0, .1);
         padding: 10px;
         margin-left: 3px ;

    </style>


@endsection

@section('content')

    <div class="main-content padding-0 categories">
        <div class="row no-gutters  ">
            <div class="col-8 margin-left-10 margin-bottom-15 border-radius-3">
                <p class="box__title">دسته بندی ها</p>
                <div class="table__box">
                    <table class="table">
                        <thead role="rowgroup">
                        <tr role="row" class="title-row">
                            <th>شناسه</th>
                            <th>نام دسته بندی</th>
                            <th>نام انگلیسی دسته بندی</th>
                            <th>دسته پدر</th>
                            <th>ویرایش</th>
                            <th>حذف</th>
                        </tr>
                        </thead>
                        <tbody>


                            @forelse ($categories as $category)

                                <tr role="row" class="">
                                    <td><a href="">{{ $category->id }}</a></td>
                                    <td><a href=""> {{ $category->title_fa }}</a></td>
                                    <td>{{ $category->title_en }}</td>

                                    @if (!optional($category->parent)->title_fa)
                                    <td> <b class="text-warning">والد</b></td>
                                    @else
                                    <td>{{ optional($category->parent)->title_fa }}</td>
                                    @endif

                                    <td>
                                        <a href="{{ route('category.edit',$category->id) }}" class="item-edit " title="ویرایش"></a>
                                    </td>
                                    <td>
                                        <form action="{{ route('category.destroy',$category->id) }}" method="post">

                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn_delete item-delete mlg-15"></button>

                                        </form>
                                    </td>
                                </tr>
                                @empty

                                <div>
                                    داده ای وجود ندار د
                                </div>

                                @endforelse

                        </tbody>
                    </table>
                </div>
            </div>

            {{--new category --}}
            @include('admin.categories.create')


            {{ $categories->links() }}

        </div>
    </div>


@endsection
