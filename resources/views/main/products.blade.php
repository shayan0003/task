@extends('main.layouts.master')

@section('head-tag')
    <title> محصولات </title>
@endsection

@section('content')

    @include('main.partials.sidebar')


    <main id="main-body" class="main-body col-md-9">
        <section class="content-wrapper bg-white p-3 rounded-2 mb-2">
            <section class="filters mb-3">

                @if (request()->search)
                    <span class="d-inline-block border p-1 rounded bg-light">نتیجه جستجو برای :
                        <span class="badge bg-info text-dark"> {{ request()->search }} </span>
                    </span>
                @endif

                {{-- @if (request()->category)
                    <span class="d-inline-block border p-1 rounded bg-light">دسته :
                        <span class="badge bg-info text-dark">{{ request()->category }}</span>
                    </span>
                @endif --}}

                @if (request()->min_price)
                    <span class="d-inline-block border p-1 rounded bg-light">قیمت از :
                        <span class="badge bg-info text-dark">{{ request()->min_price }} تومان</span>
                    </span>
                @endif

                @if (request()->max_price)
                    <span class="d-inline-block border p-1 rounded bg-light">قیمت تا :
                        <span class="badge bg-info text-dark">{{ request()->max_price }} تومان</span>
                    </span>
                @endif

            </section>


            <section class="sort ">
                <span>مرتب سازی بر اساس : </span>
                <a class="btn {{ request()->sort == 1 ? 'btn-info' : '' }} btn-sm px-1 py-0" type="button"
                    href="{{ route('products.index', ['category' => request()->category ?  request()->category->id : null , 'search' => request()->search, 'sort' => '1', 'min_price' => request()->min_price, 'max_price' => request()->max_price]) }}">گران
                    ترین</a>
                <a class="btn {{ request()->sort == 2 ? 'btn-info' : '' }} btn-sm px-1 py-0" type="button"
                    href="{{ route('products.index', ['category' => request()->category ?  request()->category->id : null , 'search' => request()->search, 'sort' => '2', 'min_price' => request()->min_price, 'max_price' => request()->max_price]) }}">ارزان
                    ترین</a>
            </section>


            <section class="main-product-wrapper row my-4">

                @forelse ($products as $product)
                    <section class="col-md-3 p-0">
                        <section class="product">

                            <a class="product-link" href="#">
                                <section class="product-image">
                                    <img class="" src="{{ asset($product->image) }}" alt="">
                                </section>
                                <section class="product-colors"></section>
                                <section class="product-name">
                                    <h3> {{ $product->name }} </h3>
                                </section>
                                <section class="product-price-wrapper">
                                    <section class="product-price"> {{ number_format($product->price) }} تومان </section>
                                </section>
                            </a>
                        </section>
                    </section>

                @empty
                    <h1 class="text-danger"> محصولی یافت نشد </h1>
                @endforelse


                <section class="col-12 border-0">
                    <section class="my-4 d-flex justify-content-center">
                        <nav>
                            {{ $products->links('pagination::bootstrap-4') }}
                        </nav>
                    </section>
                </section>

            </section>


        </section>
    </main>
@endsection
