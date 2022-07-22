@extends('layouts.registerform')
@section('content')
    <section class="registration-form mt-5">

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="card border-0 shadow-lg">
                        @include('../partials.navigation')
                        <div class="card-body">

                        
                            @if (session()->has('success'))
                                <div class="alert alert-success">
                                    {{ session()->get('success') }}
                                </div>
                            @endif
                            @if (session()->has('error'))
                                <div class="alert alert-danger">
                                    {{ session()->get('error') }}
                                </div>
                            @endif
                            <form action="{{ route('vehicle.register.post') }}" method="post" class=" mt-4"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="vehicle_id" id="vehicle_id">

                                <div class="row align-items-center">
                                    <div class="col-md-6">
                                        <div class="form-group mb-2">
                                            <label for="license_plate">License plate#</label>
                                            <input type="text"value="{{ old('license_plate') }}" data-inputmask="'mask': '99-99 A'"
                                                class="form-control shadow-none" name="license_plate" id="license_plate">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <i id="spinner" class="fa fa-spinner loader hidden"></i>
                                    </div>
                                </div>
                                <div class="row ">
                                    {{-- <div class="col-md-6">
                                        <div class="form-group mb-2">
                                            <label for="date">Date</label>
                                            <input type="datetime-local" value="" class="form-control" name="date"
                                                id="date">
                                        </div>
                                    </div> --}}
                                    <div class="col-md-6">
                                        <div class="form-group mb-2">
                                            <label for="name">Name:</label>
                                            <input type="text" 
                                                class="form-control shadow-none  @error('name') is-invalid @enderror"
                                                name="name" id="name" value="{{ old('name') }}" >
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-2">
                                            <label for="email">Email</label>
                                            <input type="email"
                                                class="form-control shadow-none @error('email') is-invalid @enderror"
                                                name="email" id="email" value="{{ old('email') }}">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group mb-2">
                                            <label for="phone">Phone# (WhatsApp)</label>
                                            <input type="text"
                                                class="form-control shadow-none @error('phone') is-invalid @enderror"
                                                name="phone" id="phone" value="{{ old('phone') }}">
                                            @error('phone')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group mb-2">
                                            <label for="make">Make</label>
                                            <input type="text"
                                                class="form-control shadow-none @error('make') is-invalid @enderror"
                                                name="make" id="make" value="{{ old('make') }}">
                                            @error('make')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">

                                        <div class="form-group mb-2">
                                            <label for="model">Model</label>
                                            <input type="text"
                                                class="form-control shadow-none @error('model') is-invalid @enderror"
                                                name="model" id="model" value="{{ old('model') }}">
                                            @error('model')
                                                <span class="invalid-feedback" role="alert" >
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">

                                        <div class="form-group mb-2">
                                            <label for="year">Year</label>
                                            <input type="text" 
                                                class="form-control shadow-none @error('year') is-invalid @enderror"
                                                name="year" id="year" value="{{ old('year') }}">
                                            @error('year')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-2">
                                            <label for="vin">Vin#</label>
                                            <input type="text" 
                                                class="form-control shadow-none @error('vin') is-invalid @enderror"
                                                name="vin" id="vin" value="{{ old('vin') }}">
                                            @error('vin')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div id="lastVisit" class="col-md-6 hidden">
                                        <div class="form-group mb-2">
                                            <label for="last_visit">last Visit#</label>
                                            <input type="text"  class="form-control shadow-none"
                                                name="last_visit" id="last_visit" disabled value="{{ old('last_visit') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group mb-2">
                                            <label for="complaint">Complaint/ service</label>
                                            <textarea  class="form-control shadow-none @error('complaint') is-invalid @enderror" name="complaint" id="complaint"></textarea>
                                            @error('complaint')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-2">
                                            <label for="complaint">Upload Images</label>
                                            <input type="file" value="" class="form-control " name="file[]"
                                                id="file" multiple style="height: 43px;">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group mb-2">
                                            <button type="submit" class="btn btn-success">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('page-script')
    <script type="text/javascript">
        $(document).ready(function() {
            $(":input").inputmask();
        });
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#license_plate').on('change', function() {
            var license_plate = $(this).val();

            $('#spinner').removeClass('hidden');
            $('.card').addClass('overlay');

            $.ajax({
                type: 'post',
                url: "{{ route('ajax.search') }}",
                data: {
                    license_no: license_plate,
                },
                success: function(data) {
                    setTimeout(() => {
                        $('#vehicle_id').val(data.id);
                        $('#name').val(data.name);
                        $('#email').val(data.email);
                        $('#phone').val(data.phone);
                        $('#make').val(data.make);
                        $('#model').val(data.model);
                        $('#year').val(data.year);
                        $('#vin').val(data.vin);
                        $('#spinner').addClass('hidden');
                        $('.card').removeClass('overlay');
                        if (data) {
                            $('#lastVisit').removeClass('hidden');
                            $('#last_visit').val(data.last_visit);
                        }

                    }, 1000);

                }
            });
        })
    </script>
@endsection
