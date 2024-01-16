@extends('admin.layouts.master')

@section('head-tag')
    <title>ایجاد محصول</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="{{ route('admin.home') }}">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="{{ route('admin.product.products.index') }}">بخش محصولات</a>
            </li>
            <li class="breadcrumb-item font-size-12"> <a href="#">محصول</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> ایجاد پست</li>
        </ol>
    </nav>


    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        ایجاد پست
                    </h5>
                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-3">
                    <a href="{{ route('admin.product.products.index') }}" class="btn btn-info btn-sm">بازگشت</a>
                </section>

                <section>
                    <form action="{{ route('admin.product.products.store') }}" method="POST" enctype="multipart/form-data"
                        id="form">
                        <section class="row">

                            @csrf

                            <section class="col-12 col-md-6 my-2">
                                <div class="form-group">
                                    <label for="name">نام محصول</label>
                                    <input type="text" name="name" class="form-control form-control-sm"
                                        value="{{ old('name') }}">

                                </div>

                                @error('name')
                                    <span>
                                        <strong class="text-danger p-1">
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>

                            <section class="col-12 col-md-6 p-2">
                                <div class="form-group">
                                    <label for="category_id">انتخاب دسته</label>
                                    <select name="category_id" id="category_id" class="form-control form-control-sm">
                                        <option value="">دسته را انتخاب کنید</option>

                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                @if (old('category_id') == $category->id) selected @endif>{{ $category->name }}
                                            </option>
                                        @endforeach

                                    </select>
                                </div>

                                @error('category_id')
                                    <span>
                                        <strong class="text-danger p-1">
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>


                            <section class="col-12 col-md-6 my-2">
                                <div class="form-group">
                                    <label for="image">تصویر</label>
                                    <input type="file" name="image" id="image"
                                        class="form-control form-control-sm">
                                </div>


                                @error('image')
                                    <span>
                                        <strong class="text-danger p-1">
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>


                            <section class="col-6 my-2">
                                <div class="form-group">
                                    <label for="status">وضعیت</label>
                                    <select name="status" id="status" class="form-control form-control-sm">
                                        <option value="0" @if (old('status') == 0) selected @endif>غیر فعال
                                        </option>
                                        <option value="1" @if (old('status') == 1) selected @endif>فعال
                                        </option>
                                    </select>
                                </div>

                                @error('status')
                                    <span>
                                        <strong class="text-danger p-1">
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>

                            <section class="col-12">
                                <div class="form-group">
                                    <label for="">قیمت کالا</label>
                                    <input type="text" name="price" value="{{ old('price') }}"
                                        class="form-control form-control-sm">
                                </div>
                                @error('price')
                                <span>
                                    <strong class="text-danger p-1">
                                        {{ $message }}
                                    </strong>
                                </span>
                            @enderror
                            </section>

                            <section class="col-12 my-2">
                                <div class="form-group">
                                    <label for="description">درباره محصول</label>
                                    <textarea name="description" id="description" class="form-control form-control-sm" rows="6"> 
                                                                        {{ old('description') }}
                                    </textarea>
                                </div>

                                @error('description')
                                    <span>
                                        <strong class="text-danger p-1">
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>

                            <section class="col-12">
                                <button class="btn btn-primary btn-sm">ثبت</button>
                            </section>
                        </section>
                    </form>
                </section>

            </section>
        </section>
    </section>
@endsection

@section('script')
    {{-- ckEditor --}}
    <script src="{{ asset('admin-assets/ckeditor/ckeditor.js') }}"></script> //این ادرس فایل مد نظر بر اساس پوشه بندی



    <script>
        CKEDITOR.replace('description');
    </script>
@endsection
