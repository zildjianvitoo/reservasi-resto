@extends('layouts.app')

@section('content')
    <style>
        .testimonial {
            text-align: center;
            padding: 20px;
        }
        .testimonial p {
            font-size: 18px;
            line-height: 1.5;
        }
        .testimonial h4 {
            margin-top: 20px;
            margin-bottom: 10px;
        }
        .testimonial .job-title {
            font-style: italic;
        }
    </style>
    <script>
        $(document).ready(function(){
            $('#testimonial-slider').carousel({
                interval: 6000 //controls the time for each slide transition
            });
        });
    </script>
    <!-- Hero Section Begin -->
    <section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-1"></div>
                <div class="col-lg-10">

                </div>
            </div>
            <div class="row">
                <div class="col-lg-1"></div>
                <div class="col-lg-10">
                    <div class="hero__item set-bg" data-setbg="https://images.unsplash.com/photo-1471253794676-0f039a6aae9d?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80">
                        <div class="hero__text">
                            <span style="text-shadow: 1px 1px 0px #000;">Roemah Elektro</span>
                            <h2 style="text-shadow: 1px 1px 0px #fff;">Best <br />Restaurant</h2>
                            <p style="text-shadow: 1px 1px 0px #000;color: #fff;">Our service is the best</p>
                            <a href="/reservasi" class="primary-btn shadow-lg">Reservasi</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Tentang Kami Section Begin -->
    <section class="featured mb-0" style="background: #7fad39;padding-top: 30px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-8 justify-content-center">
                    <div class="section-title tentang-kami-title text-white">
                        <h2>Tentang Kami</h2>
                    </div>
                    <p class="text-white text-justify">
                        Restoran kami adalah sebuah tempat yang menyediakan hidangan lezat dan berkualitas tinggi untuk dinikmati oleh pelanggan kami. Kami berkomitmen untuk memberikan pengalaman makan yang tak terlupakan bagi setiap tamu yang datang ke restoran kami.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- Tentang Kami Section End -->

    <!-- Featured Section Begin -->
    <section class="featured mt-0 pb-2" style="padding-top: 30px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Menu Terbaru Kami</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-1"></div>
                <div class="col-lg-10">
                    <div class="row featured__filter">
                        @foreach($data['menus'] as $menu)
                            <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                                <div class="featured__item">
                                    <div class="featured__item__pic set-bg" data-setbg="{{ asset('storage/images/'.$menu->gambar) }}">
                                        @if($menu->flash_sales_id)
                                            <div class="discount-label">-{{$menu->discount}}%</div>
                                        @endif
                                    </div>
                                    <div class="featured__item__text">
                                        <h6>{{ $menu->name }}</h6>
                                        <h5>
                                            Rp. {{ $menu->price - (($menu->price*$menu->discount)/100) }}
                                            <sub>
                                        <span style="color: grey; text-decoration: line-through;">
                                            Rp. {{ $menu->price }}
                                        </span>
                                            </sub>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Featured Section End -->

    <!-- Ulasan -->
    <section class="featured mt-0 pb-5" style="background: #7fad39;padding-top: 30px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title tentang-kami-title text-white">
                        <h2>Ulasan Pelanggan</h2>
                    </div>
                </div>
            </div>
            <div class="row text-white">
                <div class="col-lg-1"></div>
                <div class="col-lg-10">
                    <div id="testimonial-slider" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            @php
                            $first = true
                            @endphp
                            @foreach($data['reviews'] as $review)
                                <div class="carousel-item
                                @php
                                if($first){
                                    echo 'active';
                                    $first = false;
                                }
                                @endphp
                                ">
                                    <div class="testimonial">
                                        <p>"
                                            {{ $review->message }}
                                            "</p>
                                        <h4>{{ $review->name }}</h4>
                                        <p class="job-title">
                                            @php
                                                $rating = $review->rating;
                                            @endphp
                                            @for($i = 1; $i <= $rating; $i++)
                                                <i class="fa fa-star"></i>
                                            @endfor
                                            @for($i = 1; $i <= 5-$rating; $i++)
                                                <i class="fa fa-star-o"></i>
                                            @endfor
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#testimonial-slider" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#testimonial-slider" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Ulasan End -->
@endsection
