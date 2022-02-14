<div class="col-4 bg-white">
    <p class="box__title">ایجاد نقش جدید</p>
    @if(session('success'))
        <div class="text-success text-center">{{session('success')}}</div>
    @endif
    <form action="{{ route('role.store') }}" method="post" class="padding-30" >
        @csrf
        <input value="{{old('title')}}" name="title" type="text" placeholder="عنوان نقش " class="text">

        @error('title')
        <p class=" error-input"  >   {{$message}}</p>
        @enderror

        <br>
        <span style="margin-left:11px;font-size: 14px;margin-bottom: 15px" >
             <input style="margin-left: 7px;" type="radio" id="selectAll" name="checkAll">  فعال کردن همه
        </span>
       <span style=" font-size: 14px;margin-bottom: 15px">
                <input style="margin-left: 7px;" type="radio"id="disbaleAll" name="checkAll" >غیر فعال کردن همه
       </span>
        <hr style="border: 1px solid #EEEEEE">
        <br>
        <div class="row">
            <div class="padding-bottom-10 mr-10">
                @foreach($permissions as $permission)
                    <span style="width: 47%;font-size: 12px;margin-bottom: 1px; font-weight: bold;;">
                    <input class="checked" style="margin-left: 5px;" type="checkbox" name="permissions[]" value="{{$permission->id}}">{{$permission->label }}
                    </span>
                @endforeach
            </div>
        </div>

        <button class="btn btn-brand">افزودن نقش
        </button>
    </form>

</div>
@section('js')
    <script>
        @include('admin.layout.checkbox')
    </script>
@endsection
