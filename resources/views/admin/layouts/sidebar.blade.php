<aside id="sidebar" class="sidebar">
    <section class="sidebar-container">
        <section class="sidebar-wrapper">

            <a href="{{ route('admin.home') }}" class="sidebar-link">
                <i class="fas fa-home"></i>
                <span>خانه</span>
            </a>



            <section class="sidebar-part-title">بخش محصولات</section>
            
                <a href="{{ route('admin.product.category.index') }}" class="sidebar-link">
                    <i class="fas fa-bars"></i>
                    <span>دسته بندی</span>
                </a>

                <a href="{{ route('admin.product.products.index') }}" class="sidebar-link">
                    <i class="fas fa-bars"></i>
                    <span> محصولات </span>
                </a>

        </section>
    </section>
</aside>
