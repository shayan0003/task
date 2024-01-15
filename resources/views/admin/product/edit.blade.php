@extends('admin.layouts.master')

@section('head-tag')
    <title>ویرایش پست</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="{{ route('admin.home') }}">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">بخش محتوی</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">پست</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> ویرایش پست</li>
        </ol>
    </nav>


    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        ویرایش خبر
                    </h5>
                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-3">
                    <a href="#" class="btn btn-info btn-sm">بازگشت</a>
                </section>

                <section>
                    <form action="#" method="POST"
                        enctype="multipart/form-data" id="form">
                        <section class="row">

                            @csrf
                            @method('put')

                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="title">عنوان پست</label>
                                    <input type="text" name="title" class="form-control form-control-sm"
                                        value="{{ old('title')}}"> 
                                        {{-- value="{{ old('title', $post->title) --}}

                                </div>

                                @error('title')
                                    <span>
                                        <strong class="text-danger p-2">
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>

                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="category_id">انتخاب دسته</label>
                                    <select name="category_id" id="category_id" class="form-control form-control-sm">
                                        <option value="">دسته را انتخاب کنید</option>
                                        {{-- @foreach ($postCtegories as $postCategory)
                                            <option value="{{ $postCategory->id }}"
                                                @if (old('category_id', $post->category_id) == $postCategory->id) selected @endif>{{ $postCategory->name }}
                                            </option>
                                        @endforeach --}}

                                    </select>
                                </div>
                                @error('category_id')
                                    <span class="alert_requiredrounded" role="alert">
                                        <strong class=" text-danger p-2 ">
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>

                            <section class="col-12 my-2">
                                <div class="form-group">
                                    <label for="status">وضعیت</label>
                                    <select name="status" id="status" class="form-control form-control-sm">
                                        {{-- <option value="0" @if (old('status', $post->status) == 0) selected @endif>غیر فعال
                                        </option>
                                        <option value="1" @if (old('status', $post->status) == 1) selected @endif>فعال
                                        </option> --}}
                                    </select>
                                </div>

                                @error('status')
                                    <span>
                                        <strong class="text-danger p-2">
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>



                            <section class="col-12 my-2">
                                <div class="form-group">
                                    <label for="summery"> خلاصه متن پست</label>
                                    <textarea name="summery" id="summery" class="form-control form-control-sm" rows="6">
                                        {{ old('summery') }}
                                    </textarea>
                                </div>

                                @error('summery')
                                    <span>
                                        <strong class="text-danger p-2">
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>

                            <section class="col-12 my-2">
                                <div class="form-group">
                                    <label for="body">متن پست</label>
                                    <textarea name="body" id="body" class="form-control form-control-sm" rows="6">
                                        {{ old('body') }}
                                    </textarea>
                                </div>

                                @error('body')
                                    <span>
                                        <strong class="text-danger p-2">
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>

                            <section class="col-12 my-2">
                                <div class="form-group">
                                    <label for="image">تصویر</label>
                                    <input type="file" name="image" id="image"
                                        class="form-control form-control-sm">
                                </div>

                                @error('image')
                                    <span>
                                        <strong class="text-danger p-2">
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror


                                <section class="row">
                                    {{-- @php
                                        $number = 1;
                                    @endphp
                                    @foreach ($post->image['indexArray'] as $key => $value)
                                        <section class="col-md-{{ 6 / $number }}">
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" name="currentImage"
                                                    value="{{ $key }}" id="{{ $number }}"
                                                    @if ($post->image['currentImage'] == $key) checked @endif>
                                                <label for="{{ $number }}" class="form-check-label mx-2">
                                                    <img src="{{ asset($value) }}" class="w-100" alt="">
                                                </label>
                                            </div>
                                        </section>
                                        @php
                                            $number++;
                                        @endphp
                                    @endforeach --}}

                                </section>

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
    <script src="{{ asset('admin-assets/ckeditor/ckeditor.js') }}"></script>


    {{-- ckEditor --}}
    <script>
        CKEDITOR.replace('body');
        CKEDITOR.replace('summery');
    </script>

@endsection
