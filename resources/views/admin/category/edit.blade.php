@extends('admin.layouts.master')

@section('head-tag')
    <title>دسته بندی</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="{{ route('admin.home') }}">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">دسته بندی</a>
            </li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> ویرایش دسته بندی</li>
        </ol>
    </nav>


    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        ویرایش
                    </h5>
                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-3">
                    <a href="{{ route('admin.product.category.index') }}" class="btn btn-info btn-sm">بازگشت</a>
                </section>

                <section>
                    <form action="{{ route('admin.product.category.update', $category->id) }}" method="POST"
                        enctype="multipart/form-data" id="form">


                        @csrf
                        @method('put')

                        <section class="row">

                            <section class="col-12 col-md-6 my-2">
                                <div class="form-group">
                                    <label for="name">نام دسته</label>
                                    <input type="text" name="name" id="name" class="form-control form-control-sm"
                                        value=" {{ old('name', $category->name) }} ">
                                </div>

                                @error('name')
                                    <span>
                                        <strong class="text-danger p-1">
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror

                            </section>

                            <section class="col-12 col-md-6 my-2">
                                <div class="form-group">
                                    <label for="status">وضعیت</label>
                                    <select name="status" id="status" class="form-control form-control-sm">
                                        <option value="0" @if (old('status', $category->status) == 0) selected @endif>غیر فعال
                                        </option>
                                        <option value="1" @if (old('status', $category->status) == 1) selected @endif>فعال
                                        </option>
                                    </select>
                                </div>
                            </section>

                            <section class="col-12 my-2">
                                <div class="form-group">
                                    <label for="parent_id">دسته والد</label>
                                    <select name="parent_id" id="parent_id" class="form-control form-control-sm">
                                        <option value="">دسته اصلی</option>

                                        @foreach ($categories as $categoryItem)
                                            <option value="{{ $categoryItem->id }}"
                                                @if (old('parent_id', $category->parent_id) == $categoryItem->id) selected @endif>
                                                {{ $categoryItem->name }}</option>
                                        @endforeach


                                    </select>
                                </div>

                                @error('parent_id')
                                    <span>
                                        <strong class="text-danger p-1">
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>


                            <section class="col-12 my-2">
                                <div class="form-group">
                                    <label for="description">توضیحات</label>
                                    <textarea name="description" id="description" class="form-control form-control-sm" rows="6"> 
                                                                        {{ old('description', $category->description) }}
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
                                <button class="btn btn-primary btn-sm">ویرایش</button>
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
