@extends('layouts.registration')

@section('content')
    <div class="" >
        <!-- top tiles -->
        <section class="car-fix-banner shadow">
            <img src="{{ asset('assets') }}/build/images/flag-left.png" class="flag-left" alt="">
            <img src="{{ asset('assets') }}/build/images/flag-right.png" class="flag-right" alt="">
            <div class="car-logo">
                <img src="{{ asset('assets') }}/build/images/logo.png" alt="">
            </div>
            <div class="car-banner-meta">
                <h1>Start Vehicle Registration</h1>
                <a href="{{route('vehicle.register')}}">start</a>
            </div>
            <footer class="footer">
                <ul class="social-links pl-0">
                    <li>
                        <div class="bg-image">
                            <img src="{{ asset('assets') }}/build/images/location-pin.png" alt="">
                        </div>
                        <a href="">Dr.M.j.Hugenholtzweg 44</a>
                    </li>
                    <li>
                        <div class="bg-image whatsapp-img">
                            <img src="{{ asset('assets') }}/build/images/whatsapp.png" alt="">
                        </div>
                        <a href="">+5999-461-1422/461-8830</a>
                    </li>
                    <li>
                        <div class="bg-image">
                            <img src="{{ asset('assets') }}/build/images/mail.png" alt="">
                        </div>
                        <a href="">info@carfix-cur.com</a>
                    </li>
                </ul>
            </footer>
        </section>
       
    </div>
@endsection
