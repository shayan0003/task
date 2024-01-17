<section class="search-wrapper m-3">
    <section class="search-box">
        <section class="search-textbox">
            <span><i class="fa fa-search"></i></span>

            <form action="{{ route('products.index' , request()->category ? request()->category->id : null) }}" method="get">

                <input id="search" type="text" class="" name="search" value="{{ request()->search }}"
                    placeholder="جستجو ..." autocomplete="off">

            </form>

        </section>
    </section>
</section>
