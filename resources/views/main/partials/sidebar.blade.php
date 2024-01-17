<aside id="sidebar" class="sidebar col-md-3">
    <section class="content-wrapper bg-white p-3 rounded-2 mb-3">

        <form action="{{ route('products.index' , ['category' => request()->category ?  request()->category->id : null]) }}" method="get">
            <input type="hidden" name="sort" value="{{ request()->sort }}">

            <!-- start sidebar nav-->
            <section class="sidebar-nav">
                <section class="sidebar-nav-item">

                    @include('main.partials.categories', ['categories' => $categories])

                </section>
            </section>
            <!--end sidebar nav-->
    </section>

    <section class="content-wrapper bg-white p-3 rounded-2 mb-3">
        <section class="content-header mb-3">
            <section class="d-flex justify-content-between align-items-center">
                <h2 class="content-header-title content-header-title-small">
                    جستجو در نتایج
                </h2>
                <section class="content-header-link">
                    <!--<a href="#">مشاهده همه</a>-->
                </section>
            </section>
        </section>

        <section class="">
            <input class="sidebar-input-text" type="text" placeholder="جستجو بر اساس نام، برند ..." name="search"
                value="{{ request()->search }}">
        </section>
    </section>

    <section class="content-wrapper bg-white p-3 rounded-2 mb-3">
        <section class="content-header mb-3">
            <section class="d-flex justify-content-between align-items-center">
                <h2 class="content-header-title content-header-title-small">
                    محدوده قیمت
                </h2>
                <section class="content-header-link">
                    <!--<a href="#">مشاهده همه</a>-->
                </section>
            </section>
        </section>
        <section class="sidebar-price-range d-flex justify-content-between">
            <section class="p-1"><input type="text" placeholder="قیمت از ..." name="min_price"
                    value="{{ request()->min_price }}"></section>
            <section class="p-1"><input type="text" placeholder="قیمت تا ..." name="max_price"
                    value="{{ request()->max_price }}"></section>
        </section>
    </section>


    <section class="content-wrapper bg-white p-3 rounded-2 mb-3">
        <section class="sidebar-filter-btn d-grid gap-2">
            <button class="btn btn-danger" type="submit">اعمال فیلتر</button>
        </section>
    </section>

    </form>


    <div>
        <a href="{{ route('products.index') }}" class="btn btn-warning d-block">حذف تمامی فیلتر ها</a>
    </div>
</aside>