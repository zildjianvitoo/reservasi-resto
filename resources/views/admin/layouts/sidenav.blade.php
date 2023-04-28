<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <a class="nav-link" href="{{ route('admin.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <a class="nav-link collapsed" href="" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Menu
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ route('admin.menu') }}">Menu</a>
                        <a class="nav-link" href="{{ route('admin.flash-sale') }}">Flash Sale</a>
                        <a class="nav-link" href="{{ route('admin.kategori') }}">Kategori</a>
                    </nav>
                </div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts1" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                    Reservasi
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts1" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ route('admin.meja') }}">Meja</a>
                        <a class="nav-link" href="{{ route('admin.reservasi') }}">Reservasi</a>
                    </nav>
                </div>
{{--                <a class="nav-link" href="">--}}
{{--                    <div class="sb-nav-link-icon"><i class="fas fa-image"></i></div>--}}
{{--                    Galeri--}}
{{--                </a>--}}
                <a class="nav-link" href="{{ route('admin.ulasan') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-clipboard"></i></div>
                    Ulasan
                </a>
                <a class="nav-link" href="{{ route('admin.pesan') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-message"></i></div>
                    Chat
                </a>
                <a class="nav-link" href="{{ route('admin.galeri') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-image"></i></div>
                    Galeri
                </a>
                <a class="nav-link" href="/register">
                    <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                    Register
                </a>
            </div>
        </div>
        <div class="sb-sidenav-footer"></div>
    </nav>
</div>
