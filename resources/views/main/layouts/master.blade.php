<!doctype html>
<html lang="fa" dir="rtl">

<head>

    @include('main.layouts.head-tag')
    @yield('head-tag')

</head>

<body>

    
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
