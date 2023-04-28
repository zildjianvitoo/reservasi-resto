 <!-- Header Section Begin -->
    <header class="header">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 pt-1">
                    <div class="header__logo">
                        <div class="row">
                            <div class="col-3 mr-0 pr-0">
                                <img src="{{ asset('img/logo.png') }}" width="60px" height="auto">
                            </div>
                            <div class="col-9 ml-0 pl-1 pt-3">
                                <h3 style="font-size: 150%">Roemah Elektro</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu mb-0 pb-0 d-flex justify-content-center">
                        <ul>
                            <li class="active"><a href="/">Home</a></li>
                            <li><a href="/tentang-kami">Tentang Kami</a></li>
                            <li><a href="/galeri">Galeri</a></li>
                            <li><a href="/menu">Menu</a></li>
                            <!--                            <li><a href="#">Pages</a>-->
                            <!--                                <ul class="header__menu__dropdown">-->
                            <!--                                    <li><a href="./shop-details.html">Shop Details</a></li>-->
                            <!--                                    <li><a href="./shoping-cart.blade.php">Shoping Cart</a></li>-->
                            <!--                                    <li><a href="./checkout.html">Check Out</a></li>-->
                            <!--                                    <li><a href="./blog-details.html">Blog Details</a></li>-->
                            <!--                                </ul>-->
                            <!--                            </li>-->
                            <li><a href="/reservasi">Reservasi</a></li>
                            <li><a href="/ulasan">Ulasan</a></li>
                        </ul>
                    </nav>
                    <div class="hero__search mt-0 pt-0">
                        <div class="hero__search__form">
                            <form action="{{ route('menu.index') }}" method="GET">
                                <input type="text" placeholder="Apa yang kamu cari?" name="keyword" style="color: #000;">
                                <button type="submit" class="site-btn" style="padding-top: 5px"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 pt-1">
                    <div class="header__cart">
                        @if(session('isLogin'))
                            <div class="header__top__right__auth">
                                <span class="p-3"><i class="fa fa-user"></i> {{ session('username') }}</span>
                            </div>
                            <div class="header__top__right__auth">
                                <a href="/riwayat" class="btn site-btn pt-2 pb-2 pr-4 pl-4 text-white"><i class="fa fa-file-text-o"></i></a>
                            </div>
                            <div class="header__top__right__auth">
                                <a href="/logout" class="btn btn-login-register text-white"><i class="fa fa-power-off"></i> Logout</a>
                            </div>
                        @else
                            <div class="header__top__right__auth">
                                <a href="/login" class="btn btn-login-register text-white"><i class="fa fa-sign-in"></i> Login</a>
                            </div>
                            <div class="header__top__right__auth">
                                <a href="/register" class="btn btn-login-register text-white"><i class="fa fa-user-plus"></i> Register</a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->
