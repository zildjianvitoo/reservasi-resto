@extends('layouts.app')

@section('content')
    <!-- Product Section Begin -->
    <section class="product">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-5">
                    <div class="sidebar ml-3">
                        <div class="sidebar__item">
                            <h4>Kategori</h4>
                            <ul>
                                @foreach($menus['kategori'] as $kategori)
                                    <li><a href="{{ route('menu.index', ['kategori'=>$kategori->name]) }}">{{ $kategori->name }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-7">
                    @if(count($menus['flash_sale']))
                        <div class="product__discount">
                            <div class="section-title product__discount__title">
                                <h2>Flash Sale</h2>
                            </div>
                            <div class="row">
                                @if(count($menus['flash_sale']) >= 3)
                                    <div class="product__discount__slider owl-carousel">
                                        @endif
                                        @foreach($menus['flash_sale'] as $flash_sale)
                                            <div class="col-lg-4">
                                                <div class="product__discount__item">
                                                    <div class="product__discount__item__pic set-bg"
                                                         data-setbg="{{ asset('storage/images/'.$flash_sale->gambar) }}">
                                                        <div class="product__discount__percent">-{{$flash_sale->discount}}%</div>
                                                    </div>
                                                    <div class="product__discount__item__text">
                                                        <span>{{ $flash_sale->category }}</span>
                                                        <h5><a href="#">{{ $flash_sale->name }}</a></h5>
                                                        <div class="product__item__price">Rp. {{ $flash_sale->price - (($flash_sale->price*$flash_sale->discount)/100) }} <span>Rp. {{ $flash_sale->price }}</span></div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                        @if(count($menus['flash_sale']) >= 3)
                                    </div>
                                @endif

                            </div>
                        </div>
                    @endif
                    <div class="section-title product__discount__title">
                        <h2>Menu</h2>
                    </div>
                    <div class="row">
                        @if(count($menus['menu']))
                            @foreach($menus['menu'] as $menu)
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="product__item">
                                        <div class="product__item__pic set-bg" data-setbg="{{ asset('storage/images/'.$menu->gambar) }}"></div>
                                        <div class="product__item__text">
                                            <h6><a href="#">{{ $menu->name }}</a></h6>
                                            <h5>Rp. {{ $menu->price }}</h5>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="col-lg-12 d-flex justify-content-center">
                                <p class="text-dark">Menu tidak ada...</p>
                            </div>
                        @endif
                    </div>

                    <div class="d-flex justify-content-center">
                        {{ $menus['menu']->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Section End -->

@endsection
