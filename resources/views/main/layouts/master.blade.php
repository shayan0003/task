<!doctype html>
<html lang="fa" dir="rtl">

<head>

    @include('main.layouts.head-tag')
    @yield('head-tag')

</head>

<body>
    <section class="top-header mt-3">
        <section class="container-xxl">
            <section class="py-3">

               @include('main.layouts.search')

            </section>
        </section>
    </section>


    <!-- start body -->
    <section class="">
        <section id="main-body-two-col" class="container-xxl body-container">
            <section class="row">

                @yield('content')

            </section>
        </section>
    </section>

    <!-- end body -->


    @include('main.layouts.script')
    @yield('script')

</body>

</html>
