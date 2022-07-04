@extends('layouts.registerform')
@section('content')
    <section class="registration-form mt-5">

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card border-0 shadow-lg">
                        @include('../partials.navigation')
                        <div class="card-body">
                            <form action="{{ route('vehicle.register.post') }}" method="post" class=" mt-4">
                                @csrf
                                <input type="hidden" name="vehicle_id" id="vehicle_id">
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
                                <div class="row align-items-center">
                                    <div class="col-md-6">
                                        <div class="form-group mb-2">
                                            <label for="license_plate">License plate#</label>
                                            <input type="text" value="" data-inputmask="'mask': '99-99 A'"
                                                class="form-control shadow-none" name="license_plate" id="license_plate">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <i id="spinner" class="fa fa-spinner loader hidden"></i>
                                    </div>
                                </div>
                                <div class="row ">
                                    <div class="col-md-6">
                                        <div class="form-group mb-2">
                                            <label for="name">Name:</label>
                                            <input type="text" value="" class="form-control shadow-none" name="name" id="name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-2">
                                            <label for="email">Email</label>
                                            <input type="email" value="" class="form-control shadow-none" name="email" id="email">
                                        </div>
                                    </div>
        
                                    <div class="col-md-6">
                                        <div class="form-group mb-2">
                                            <label for="phone">Phone# (WhatsApp)</label>
                                            <input type="text" value="" class="form-control shadow-none" name="phone" id="phone">
                                        </div>
                                    </div>
        
        
                                    <div class="col-md-6">
                                        <div class="form-group mb-2">
                                            <label for="make">Make</label>
                                            <input type="text" value="" class="form-control shadow-none" name="make" id="make">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
        
                                        <div class="form-group mb-2">
                                            <label for="model">Model</label>
                                            <input type="text" value="" class="form-control shadow-none" name="model" id="model">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
        
                                        <div class="form-group mb-2">
                                            <label for="year">Year</label>
                                            <input type="text" value="" class="form-control shadow-none" name="year" id="year">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-2">
                                            <label for="vin">Vin#</label>
                                            <input type="text" value="" class="form-control shadow-none" name="vin" id="vin">
                                        </div>
                                    </div>
                                    <div id="lastVisit" class="col-md-6 hidden">
                                        <div class="form-group mb-2">
                                            <label for="last_visit">last Visit#</label>
                                            <input type="text" value="" class="form-control shadow-none" name="last_visit"
                                                id="last_visit" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group mb-2">
                                            <label for="complaint">Complaint/ service</label>
                                            <textarea value="" class="form-control shadow-none" name="complaint" id="complaint"></textarea>
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
            $('#spinner').removeClass('hidden');
            $('.card').addClass('overlay');
            var license_plate = $(this).val();
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
                        if(data){
                            $('#lastVisit').removeClass('hidden');
                        $('#last_visit').val(data.last_visit);
                        }
                        
                    }, 1000);

                }
            });
        })
    </script>
@endsection
