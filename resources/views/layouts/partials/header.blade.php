<!-- Header -->
<header class="header-v4">
    <!-- Header desktop -->
    <div class="container-menu-desktop">

        <!-- Topbar -->
        <div class="top-bar">
            <div class="content-topbar flex-sb-m h-full container">
                <div class="left-top-bar">
                    
                </div>
                <div class="right-top-bar flex-w h-full">
                    <a href="#" class="flex-c-m trans-04 p-lr-25">
                        <i class="fa fa-facebook"></i>
                    </a>

                    <a href="#" class="flex-c-m trans-04 p-lr-25">
                        <i class="fa fa-instagram"></i>
                    </a>

                    <a href="#" class="flex-c-m trans-04 p-lr-25">
                        <i class="fa fa-youtube"></i>
                    </a>

                    <a href="#" class="flex-c-m trans-04 p-lr-25">
                        <i class="fa fa-pinterest"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="wrap-menu-desktop how-shadow1">
            <nav class="limiter-menu-desktop container">
                
                <!-- Logo desktop -->		
                <a href="/" class="logo">
                    <img src="images/icons/logo-01.png" alt="IMG-LOGO">
                </a>

                <!-- Menu desktop -->
                <div class="menu-desktop">
                    <ul class="main-menu">
                        <li>
                            <a href="/">Anasayfa</a>
                            <ul class="sub-menu">
                                <li><a href="/">Homepage 1</a></li>
                                <li><a href="home-02.html">Homepage 2</a></li>
                                <li><a href="home-03.html">Homepage 3</a></li>
                            </ul>
                        </li>

                        <li class="{{ Route::is('urunlerimiz') ? 'active-menu' : '' }}">
                            <a href="{{ route('urunlerimiz') }}">Ürünlerimiz</a>
                        </li>

                        <li class="{{ Route::is('uygulamalarimiz') ? 'active-menu' : '' }}">
                            <a href="{{ route('uygulamalarimiz') }}">Uygulamalar</a>
                        </li>

                        <li class="{{ Route::is('hakkimizda') ? 'active-menu' : '' }}">
                            <a href="{{ route('hakkimizda') }}">Hakkımızda</a>
                        </li>

                        <li class="{{ Route::is('iletisim') ? 'active-menu' : '' }}">
                            <a href="{{ route('iletisim') }}">İletişim</a>
                        </li>
                    </ul>
                </div>	

                <!-- Eğer kullanıcı oturum açmamışsa -->
                @guest
                <!-- Icon header -->
                <div class="wrap-icon-header flex-w flex-r-m">
                    <a href="/login" class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11">
                        <i class="fa fa-user-circle-o"></i>
                    </a>
                </div>
                @endguest

                <!-- Eğer kullanıcı oturum açmışsa -->
                @auth
                    <div class="wrap-icon-header flex-w flex-r-m">
                        <ul class="main-menu">
                            <li>
                                <a href="{{ route('dashboard') }}">
                                    <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11">
                                        <i class="fa fa-address-book"></i>
                                    </div>
                                </a>
                                <ul class="sub-menu">
                                    <li><a href="{{ route('dashboard') }}">Admin Paneli</a></li>
                                    <li>
                                        <!-- Çıkış işlemi form ile yapılır -->
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Çıkış Yap</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                @endauth
            </nav>
        </div>	
    </div>

    <!-- Header Mobile -->
    <div class="wrap-header-mobile">
        <!-- Logo moblie -->		
        <div class="logo-mobile">
            <a href="/"><img src="images/icons/logo-01.png" alt="IMG-LOGO"></a>
        </div>

        @guest
            <!-- Icon header -->
            <div class="wrap-icon-header flex-w flex-r-m m-r-15">
                <a href="{{ route('login') }}" class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 js-show-cart">
                    <i class="fa fa-user-circle-o"></i>
                </a>
            </div>
        @endguest

        <!-- Eğer kullanıcı oturum açmışsa -->
        @auth
            <!-- Icon header -->
            <div class="wrap-icon-header flex-w flex-r-m m-r-15">
                <a href="{{ route('dashboard') }}" class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 js-show-cart">
                    <i class="fa fa-address-book" aria-hidden="true"></i>
                </a>
            </div>
        @endauth

        <!-- Button show menu -->
        <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
            <span class="hamburger-box">
                <span class="hamburger-inner"></span>
            </span>
        </div>
    </div>
 

    <!-- Menu Mobile -->
    <div class="menu-mobile">
        <ul class="topbar-mobile">
            <li>
                <div class="right-top-bar flex-w h-full">
                    <a href="#" class="flex-c-m p-lr-10 trans-04">
                        <i class="fa fa-facebook"></i>
                    </a>

                    <a href="#" class="flex-c-m p-lr-10 trans-04">
                        <i class="fa fa-instagram"></i>
                    </a>

                    <a href="#" class="flex-c-m p-lr-10 trans-04">
                        <i class="fa fa-youtube"></i>
                    </a>

                    <a href="#" class="flex-c-m p-lr-10 trans-04">
                        <i class="fa fa-pinterest"></i>
                    </a>
                </div>
            </li>
        </ul>

        <ul class="main-menu-m"> 
            <li>
                <a href="/">Anasayfa</a>
                <ul class="sub-menu-m">
                    <li><a href="/">Homepage 1</a></li>
                    <li><a href="home-02.html">Homepage 2</a></li>
                    <li><a href="home-03.html">Homepage 3</a></li>
                </ul>
                <span class="arrow-main-menu-m">
                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                </span>
            </li>

            <li>
                <a href="/urunlerimiz">Ürünlerimiz</a>
            </li>

            <li>
                <a href="/uygulamalarimiz">Uygulamalar</a>
            </li>

            <li>
                <a href="/hakkimizda">Hakkımızda</a>
            </li>

            <li>
                <a href="/iletisim">İletişim</a>
            </li>
            <li>
                <!-- Çıkış işlemi form ile yapılır -->
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Çıkış Yap</a>
            </li>
        </ul>
    </div>

    <!-- Modal Search -->
    <div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
        <div class="container-search-header">
            <button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
                <img src="images/icons/icon-close2.png" alt="CLOSE">
            </button>

            <form class="wrap-search-header flex-w p-l-15">
                <button class="flex-c-m trans-04">
                    <i class="zmdi zmdi-search"></i>
                </button>
                <input class="plh3" type="text" name="search" placeholder="Search...">
            </form>
        </div>
    </div>
</header>