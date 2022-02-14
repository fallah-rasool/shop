
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
            <div class="col-12 margin-left-10 margin-bottom-15 border-radius-3">
                <p class="box__title">کاربران  </p>
                <div class="table__box">
                    <table class="table">
                        <thead user="rowgroup">
                        <tr user="row" class="title-row">
                            <th>#</th>
                            <th> نام </th>
                            <th> ایمیل</th>
                            <th> نقش</th>
                            <th>ویرایش</th>
                            <th>حذف</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse ($users as $user)
                            <tr user="row" class="">
                                <td><a href="">{{ $user->id }}</a></td>
                                <td><a href=""> {{ $user->name }}</a></td>
                                <td><a href=""> {{ $user->email }}</a></td>
                                <td><a href="">{{ $user->role->title }}</a></td>

                                <td>
                                    <a href="{{ route('user.edit',$user) }}" class="item-edit " title="ویرایش"></a>
                                </td>
                                <td>
                                    <form action="{{ route('user.destroy',$user->id) }}" method="post">
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
            @include('admin.users.create')
            {{ $users->links() }}

        </div>
    </div>


@endsection
