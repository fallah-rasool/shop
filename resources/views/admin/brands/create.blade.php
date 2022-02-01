<div class="col-4 bg-white">
    <p class="box__title">ایجاد برند جدید</p>

    @if(session('success'))
        <div class="text-success text-center">{{session('success')}}</div>
    @endif
    <form action="{{ route('brand.store') }}" method="post" class="padding-30" enctype="multipart/form-data">
        @csrf

        <input value="{{old('name')}}" name="name" type="text" placeholder="نام برند" class="text">

        @error('name')
        <p class=" error-input"  >   {{$message}}</p>
        @enderror
<label class="formlabal" for="image">انتخاب عکس برند</label>

        <input id="image" hidden value="{{old('image')}}" name="image" type="file" placeholder="عکس برند" class="text">

        @error('image')
        <p class=" error-input" >   {{$message}}</p>
        @enderror

        <button class="btn btn-brand">اضافه کردن</button>
    </form>

</div>
