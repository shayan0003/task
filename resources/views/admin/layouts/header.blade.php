<header class="header-main">

    <section class="sidebar-header bg-gray">
        <section class="d-flex justify-content-between flex-md-row-reverse px-2">
            <span id="sidebar-toggle-show" class="d-inline d-md-none pointer"><i class="fas fa-toggle-off"></i></span>
            <span id="sidebar-toggle-hide" class="d-none d-md-inline pointer"><i class="fas fa-toggle-on"></i></span>
            <span><img class="logo" src="{{ asset('admin-assets/images/logo.png') }}" alt=""></span>
            <span class="d-md-none" id="menu-toggle"><i class="fas fa-ellipsis-h"></i></span>
        </section>
    </section>

    <section class="body-header" id="body-header">
        <section class="d-flex justify-content-between">

            <section>
                {{-- <span class="mr-5">
                    <span id="search-area" class="search-area d-none">
                        <i id="search-area-hide" class="fas fa-times pointer"></i>
                        <input id="search-input" type="text" class="search-input">
                        <i class="fas fa-search pointer"></i>
                    </span>
                    <i id="search-toggle" class="fas fa-search p-1 d-none d-md-inline pointer"></i>
                </span> --}}

                <span id="full-screen" class="pointer p-1 d-none d-md-inline mr-5">
                    <i id="screen-compress" class="fas fa-compress d-none"></i>
                    <i id="screen-expand" class="fas fa-expand "></i>
                </span>
            </section>

            <section>

                @auth
                    <span class="ml-3 ml-md-5 position-relative">
                        <span id="header-profile-toggle" class="pointer">
                            <span class="header-username"> شایان محسنی </span>
                            <i class="fas fa-angle-down"></i>
                        </span>
                        {{-- <section id="header-profile" class="header-profile rounded">
                            <section class="list-group rounded">
                                
                                <a href="#" class="list-group-item list-group-item-action header-profile-link">
                                    <i class="fas fa-lock"></i>قفل صفحه
                                </a>

                                <a href="#" class="list-group-item list-group-item-action header-profile-link">
                                    <i class="fas fa-user"></i>کاربر
                                </a> 
                                
                                <a href="{{ route('auth.logout') }}" class="list-group-item list-group-item-action header-profile-link">
                                    <i class="fas fa-sign-out-alt"></i>خروج
                                </a>
                               
                            </section>
                        </section> --}}
                    </span>
                @endauth

            </section>

        </section>
    </section>

</header>
