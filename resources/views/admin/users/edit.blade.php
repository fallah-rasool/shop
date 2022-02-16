@extends('admin.layout.app')


@section('content')
    <div class="main-content padding-0 categories">
        <div class="row no-gutters">
            <div class="col-12 bg-white">

                <p class="box__title">ویرایش  کاربر
                <b>{{$user->name}}</b>
                </p>

                <form action="{{ route('user.update',$user) }}" method="post" class="padding-30" >
                    @csrf
                    @method('patch')
                    <input value="{{$user->name}}" name="name" type="text" placeholder="ویرایش نام کاربر  " class="text">
                    @error('name')
                    <p class=" error-input" > {{$message}}</p>
                    @enderror

                    <input value="{{$user->email}}" name="email" type="text" placeholder="ایمیل کاربر " class="text">
                   @if ($errors->any())
                        <div class="error-input">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif



                    <select name="role_id" >
                        <option value selected>انتخاب نقش کاربر</option>
                        @forelse ($roles as $role)
                            <option
                                @if ($role->id == $user->role_id ) selected @endif
                            value="{{ $role->id }}"> {{ $role->title }}</option>
                        @empty
                        @endforelse

                    </select>
                    @error('role_id')
                    <p class=" error-input" > {{$message}}</p>
                    @enderror

                    <button class="btn btn-brand">ویرایش کاربر
                    </button>
                </form>

            </div>
        </div>
    </div>
@endsection

@section('js')



@endsection

