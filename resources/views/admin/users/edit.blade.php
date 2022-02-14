@extends('admin.layout.app')

@section('css')

    <style>
        #myModal {
            position: absolute;
            left:30%;
            top: auto;
            background-color: #ffffff;
            color: black;
            width-min: 300px;
            box-shadow: 2px 2px 5px rgb(135 133 133 / 70%);
            padding:20px 25px;
            border-radius: 5px;
        }
        .modal-body{
            margin: 10px 0;
        }
        .modal-body p{
            color: #169105;
        }
        .modal-footer{
            text-align: left;
        }
        @media only screen and (max-width: 540px) {
            #myModal {
                left:22%;
            }
        }
        @media only screen and (max-width: 1200px) {
            body {
                background-color: lightblue;
            }
            #myModal {
                left:30%;
            }
        }
    </style>
@endsection

@section('content')
    <div class="main-content padding-0 categories">
        <div class="row no-gutters">
            <div class="col-12 bg-white">
            @if(session('success'))
                <!-- Modal -->
                    <div id="myModal" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-body">
                                    <p>{{session('success')}} </p>
                                </div>
                                <div class="modal-footer">
                                    <button  id="close" type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>

                        </div>
                    </div>
                @endif
                <p class="box__title">ویرایش  کاربر
                <b>{{$user->name}}</b>
                </p>

                <form action="{{ route('user.update',$user) }}" method="post" class="padding-30" >
                    @csrf
                    @method('patch')
                    <input value="{{$user->name}}" name="title" type="text" placeholder="ویرایش نام کاربر  " class="text">
                    @error('name')
                    <p class=" error-input" > {{$message}}</p>
                    @enderror

                    <input value="{{$user->email}}" name="title" type="text" placeholder="ایمیل کاربر " class="text">
                    @error('email')
                    <p class=" error-input" > {{$message}}</p>
                    @enderror

                    <input value="{{$user->role->title}}" name="title" type="text" placeholder="نقش کاربر " class="text">


                    <select name="role_id" >
                        <option value selected>انتخاب نقش کاربر</option>
                        @forelse ($roles as $role)
                            <option
                                @if ($role->id == $user->role_id ) selected @endif
                            value="{{ $role->id }}"> {{ $role->title }}</option>
                        @empty
                        @endforelse

                    </select>


                    <button class="btn btn-brand">ویرایش کاربر
                    </button>
                </form>

            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>

        $("#close").click(function(){

            $("#myModal").fadeOut();
        });

        @include('admin.layout.checkbox')
    </script>


@endsection

