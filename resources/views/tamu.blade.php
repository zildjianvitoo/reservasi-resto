@extends('layouts.app')

@section('content')
<section class="featured mb-0" style="background: #7fad39;padding-top: 0;">
    <div class="container">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8 justify-content-center">
                <div class="contact-form pt-4 pb-4">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="section-title tentang-kami-title text-white">
                                    <h2>Reservasi</h2>
                                </div>
                            </div>
                        </div>
                        <form action="{{ route('reservasi') }}" method="GET">
                            <div class="row">
                                <div class="col-lg-12 text-center">
                                    <input type="number" min="1" placeholder="Jumlah Tamu" name="jumlah_tamu" required>
                                </div>
                                <div class="col-lg-12">
                                    <input type="datetime-local" id="myDateTime" placeholder="Tanggal" name="date" required>
                                </div>
                                <div class="col-lg-12 text-center">
                                    <button type="submit" class="btn btn-light">Isi Data Diri</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    // Get a reference to the datetime-local input element
    var dateTimeInput = document.getElementById("myDateTime");

    // Create a new Date object representing the current date and time
    var now = new Date();

    // Calculate the time zone offset in minutes between UTC time and the local time zone
    var offset = now.getTimezoneOffset();

    // Adjust the date and time by the time zone offset
    now.setMinutes(now.getMinutes() - offset);

    // Format the current date and time as an ISO formatted string
    var isoString = now.toISOString().slice(0, -8);

    // Set the minimum date and time to the current date and time
    dateTimeInput.min = isoString;
</script>
@endsection
