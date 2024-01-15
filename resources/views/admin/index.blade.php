@extends('admin.layouts.master')


@section('head-tag')
    <title>داشبورد اصلی</title>
@endsection


@section('content')
    <section class="row">

        <section class="col-lg-3 col-md-6 col-12">
            <a href="#" class="text-decoration-none d-block mb-4">
                <section class="card bg-danger text-white">
                    <section class="card-body">
                        <section class="d-flex justify-content-between">
                            <section class="info-box-body">
                                <h5>تعداد کل اخبار</h5>
                                {{-- <p>{{ $posts }}</p> --}}
                            </section>
                            <section class="info-box-icon">
                                <i class="fas fa-chart-line"></i>
                            </section>
                        </section>
                    </section>
                    <section class="card-footer info-box-footer">
                        {{-- <i class="fas fa-clock mx-2"></i> به روز رسانی شده در : 21:42 بعد از ظهر --}}
                    </section>
                </section>
            </a>
        </section>
        <section class="col-lg-3 col-md-6 col-12">
            <a href="#" class="text-decoration-none d-block mb-4">
                <section class="card bg-success text-white">
                    <section class="card-body">
                        <section class="d-flex justify-content-between">
                            <section class="info-box-body">
                                <h5>تعداد کل دسته بندی ها</h5>
                                {{-- <p>{{ $postCategories }}</p> --}}
                            </section>
                            <section class="info-box-icon">
                                <i class="fas fa-chart-line"></i>
                            </section>
                        </section>
                    </section>
                    <section class="card-footer info-box-footer">
                        {{-- <i class="fas fa-clock mx-2"></i> به روز رسانی شده در : 21:42 بعد از ظهر --}}
                    </section>
                </section>
            </a>
        </section>
        <section class="col-lg-3 col-md-6 col-12">
            <a href="#" class="text-decoration-none d-block mb-4">
                <section class="card bg-warning text-white">
                    <section class="card-body">
                        <section class="d-flex justify-content-between">
                            <section class="info-box-body">
                                <h5>تعداد کاربران</h5>
                                {{-- <p>{{ $users }}</p> --}}
                            </section>
                            <section class="info-box-icon">
                                <i class="fas fa-chart-line"></i>
                            </section>
                        </section>
                    </section>
                    <section class="card-footer info-box-footer">
                        {{-- <i class="fas fa-clock mx-2"></i> به روز رسانی شده در : 21:42 بعد از ظهر --}}
                    </section>
                </section>
            </a>
        </section>
        <section class="col-lg-3 col-md-6 col-12">
            <a href="#" class="text-decoration-none d-block mb-4">
                <section class="card bg-primary text-white">
                    <section class="card-body">
                        <section class="d-flex justify-content-between">
                            <section class="info-box-body">
                                <h5>نقش شما در سیستم</h5>

                                {{-- @foreach ($roles as $role)
                                    <p>{{ $role->description }}</p>
                                @endforeach --}}

                            </section>
                            <section class="info-box-icon">
                                <i class="fas fa-chart-line"></i>
                            </section>
                        </section>
                    </section>
                    <section class="card-footer info-box-footer">
                        {{-- <i class="fas fa-clock mx-2"></i> به روز رسانی شده در : 21:42 بعد از ظهر --}}
                    </section>
                </section>
            </a>
        </section>

    </section>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    {{-- <h5>
                       پنل مدیریت
                    </h5>
                    <p>
                        در این بخش اطلاعاتی کلی در مورد نحو کار با سیستم به شما داده می شود
                    </p> --}}
                </section>
                <header><i class="icons icon-doc-2"></i>
                    <h4> اخبار پر بازدید </h4>
                </header>
                <hr>
                {{-- <section class="body-content col-12">
                    <section class="last-news-section border-radius margin-top-60 col-12 d-flex m-0">

                        @foreach ($mostVisitedPosts as $mostVisitedPost)
                            <div class="card flex-row m-1" style="width:350px">
                                <div>
                                    <img class="card-img-top"
                                        src="{{ asset($mostVisitedPost->image['indexArray'][$mostVisitedPost->image['currentImage']]) }}"
                                        alt="Card image" style="width:100%">
                                    <div class="card-body">
                                        <h6 class="card-title"> {{ Str::limit($mostVisitedPost->title , 15) }}</h6>
                                        <p class="card-text"> {!! Str::limit(html_entity_decode($mostVisitedPost->summery), 20) !!} </p>
                                        <span>تعداد بازدید : {{ $mostVisitedPost->view }}</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </section>

                </section> --}}
            </section>
        </section>
    </section>
@endsection
