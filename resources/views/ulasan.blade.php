@extends('layouts.app')

@section('content')
    <style>
        .modal {
            display: none;
            position: fixed;
            z-index: 999;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .modal-content {
            background-color: #fefefe;
            margin: 10% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .modal-title {
            margin: 0;
        }

        .close {
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }

        .close:hover,
        .close:focus {
            color: #000;
            text-decoration: none;
            outline: none;
        }
    </style>
    <div class="d-flex justify-content-center section-title product__discount__title">
        <h2>Ulasan <sup><a href="#" onclick="openForm()" style="color: #7fad39;"><i class="fa fa-plus-circle"></i></a></sup></h2>
    </div>
    <div id="ulasanModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Form Tambah Ulasan</h4>
                <span class="close" onclick="closeForm()">&times;</span>
            </div>
            <div class="modal-body">
                <form action="{{ route('ulasan.store') }}" method="POST">
                    @csrf
                    <input type="number" name="accounts_id" value="{{ session('id') }}" hidden>
                    <div class="form-group">
                        <label for="rating">Rating</label>
                        <div class="rating">
                            <input type="radio" id="star5" name="rating" value="1">
                            <label for="star5" title="1 stars" class="mr-3">1 <i class="fa fa-star"></i></label>
                            <input type="radio" id="star4" name="rating" value="2">
                            <label for="star4" title="2 stars" class="mr-3">2 <i class="fa fa-star"></i></label>
                            <input type="radio" id="star3" name="rating" value="3">
                            <label for="star3" title="3 stars" class="mr-3">3 <i class="fa fa-star"></i></label>
                            <input type="radio" id="star2" name="rating" value="4">
                            <label for="star2" title="4 stars" class="mr-3">4 <i class="fa fa-star"></i></label>
                            <input type="radio" id="star1" name="rating" value="5">
                            <label for="star1" title="5 star">5 <i class="fa fa-star"></i></label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Pesan</label>
                        <textarea class="form-control" placeholder="Ketik ulasanmu disini..." rows="4" name="message"></textarea>
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn site-btn pt-2 pb-2">Kirim</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        function openForm() {
            @if(session('isLogin'))
            document.getElementById("ulasanModal").style.display = "block";
            @else
                window.location.href = '/login';
            @endif
        }

        function closeForm() {
            document.getElementById("ulasanModal").style.display = "none";
        }
    </script>
    <div class="row ml-1 mr-1">
        <div class="col-lg-1"></div>
        <div class="col-lg-10">
            <div class="shoping__cart__table">
                <table>
                    <thead>
                    <tr>
                        <th class="text-left">From</th>
                        <th>Rating</th>
                        <th>Message</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($reviews as $review)
                            <tr class="align-top">
                                <td width="30%" class="text-left">
                                    <h5>{{ $review->name }}</h5>
                                </td>
                                <td width="15%">
                                    @php
                                        $rating = $review->rating;
                                    @endphp
                                    @for($i = 1; $i <= $rating; $i++)
                                        <i class="fa fa-star"></i>
                                    @endfor
                                    @for($i = 1; $i <= 5-$rating; $i++)
                                        <i class="fa fa-star-o"></i>
                                    @endfor
                                </td>
                                <td width="55%" class="p-2">
                                    <div class="quantity">
                                        <p class="text-justify">
                                            {{ $review->message }}
                                        </p>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center">
        {{ $reviews->links() }}
    </div>
@endsection
