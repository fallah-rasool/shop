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
            <p class="box__title">ویرایش نقش
                <b>{{$role->title}} </b></p>

            <form action="{{ route('role.update',$role) }}" method="post" class="padding-30" >
                @csrf
                @method('patch')
                <input value="{{$role->title}}" name="title" type="text" placeholder="عنوان نقش " class="text">
                @error('title')
                <p class=" error-input" > {{$message}}</p>
                @enderror

                <div class="row">

                    <br>
                    <span style="margin-left:11px;font-size: 14px;margin-bottom: 15px" >
             <input style="margin-left: 7px;" type="radio" id="selectAll" name="checkAll">  فعال کردن همه
        </span>
                    <span style=" font-size: 14px;margin-bottom: 15px">
                <input style="margin-left: 7px;" type="radio"id="disbaleAll" name="checkAll" >غیر فعال کردن همه
       </span>
                    <hr style="border: 1px solid #EEEEEE">
                    <br>

                    <div class="padding-bottom-10 mr-10">

                        @foreach($permissions as $permission)
                            <span style="width: 47%;font-size: 12px;margin-bottom: 1px; font-weight: bold;;">
                    <input class="checked"   @if($role->hasPermission($permission)) checked @endif style="margin-left: 5px;" type="checkbox" name="permissions[]" value="{{$permission->id}}">{{$permission->label }}
                    </span>
                        @endforeach
                    </div>
                </div>

                <button class="btn btn-brand">افزودن نقش
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

