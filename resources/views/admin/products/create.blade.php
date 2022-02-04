<div class="col-4 bg-white">
    <p class="box__title">ایجاد محصول جدید</p>

    @if(session('success'))
        <div class="text-success text-center">{{session('success')}}</div>
    @endif
    <form action="{{ route('product.store') }}" method="post" class="padding-30" enctype="multipart/form-data">
        @csrf

        <input value="{{old('name')}}" name="name" type="text" placeholder="نام محصول" class="text">
        @error('name')
        <p class=" error-input"  >   {{$message}}</p>
        @enderror

        <input value="{{old('price')}}" name="price" type="text" placeholder="قیمت محصول" class="text">
        @error('price')
        <p class=" error-input"  >   {{$message}}</p>
        @enderror


        <select name="category_id" >
            <option value selected> دسته بندی محصول</option>

            @forelse ($selectCategories as $category)

                <option value="{{ $category->id }}"> {{ $category->title_fa }}</option>

            @empty

            @endforelse

        </select>

        @error('category_id')
        <p class=" error-input"  >   {{$message}}</p>
        @enderror


        <select name="brand_id" >
            <option value selected> برند محصول</option>

            @forelse ($selectBrands as $brand)

                <option value="{{ $brand->id }}"> {{ $brand->name }}</option>
            @empty

            @endforelse

        </select>

        @error('brand_id')
        <p class=" error-input"  >   {{$message}}</p>
        @enderror


        <label class="formlabal" for="image">انتخاب عکس محصول</label>

        <input id="image" hidden value="{{old('image')}}" name="image" type="file" placeholder="عکس محصول" class="text">

        @error('image')
        <p class=" error-input" >   {{$message}}</p>
        @enderror
        <input value="{{old('slug')}}" name="slug" type="text" placeholder="slug" class="text">
        @error('slug')
        <p class=" error-input"  >   {{$message}}</p>
        @enderror

        <textarea name="description" id="" placeholder="توضیحات" cols="30" rows="10">{{old('description')}}</textarea>

        @error('description')
        <p class=" error-input"  >   {{$message}}</p>
        @enderror

        <button class="btn btn-brand">اضافه کردن</button>
    </form>

</div>
