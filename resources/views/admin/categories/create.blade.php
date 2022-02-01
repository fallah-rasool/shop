<div class="col-4 bg-white">
    <p class="box__title">ایجاد دسته بندی جدید</p>

    @if(session('success'))
        <div class="text-success text-center">{{session('success')}}</div>
    @endif

    <form action="{{ route('category.store') }}" method="post" class="padding-30">
        @csrf

        <input value="{{old('title_fa')}}" name="title_fa" type="text" placeholder="نام دسته بندی" class="text">

        @error('title_fa')
        <p class=" error-input"  >   {{$message}}</p>
        @enderror

        <input value="{{old('title_en')}}" name="title_en" type="text" placeholder="نام انگلیسی دسته بندی" class="text">

        @error('title_en')
        <p class=" error-input" >   {{$message}}</p>
        @enderror


        <p class="box__title margin-bottom-15">انتخاب دسته پدر</p>

        <select name="patent_id" >
            <option value selected>دسته پدر ندارد</option>

            @forelse ($selectCategories as $parent)

                <option value="{{ $parent->id }}"> {{ $parent->title_fa }}</option>
            @empty

            @endforelse

        </select>

        <button class="btn btn-brand">اضافه کردن</button>
    </form>

</div>
