@extends('layouts.registerform')
@section('content')
    <section class="registration-form mt-5">

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card border-0 shadow-lg">
                        <div class="card-header text-center">
                            <img src="{{ asset('assets/images/logo.png') }}" alt="">
                            <h2>Vehicle Registration</h2>
                            @include('../partials.navigation')
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="user-detail vehicle-detail-title mb-5">
                                        <h5 class="text-uppercase mb-3">User Detail</h5>
                                        <div>
                                            <strong>Name:</strong>
                                            <span class="ml-3">Waqar Hanif</span>
                                        </div>
                                        <div>
                                            <strong>Email:</strong>
                                            <span class="ml-3">waqar.vu113@gmail.com</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="vehicle-detail vehicle-detail-title">
                                        <h5 class="text-uppercase mb-3">Vehicle Detail</h5>
                                        <div>
                                            <strong>Name:</strong>
                                            <span class="ml-3">Waqar Hanif</span>
                                        </div>
                                        <div>
                                            <strong>Email:</strong>
                                            <span class="ml-3">waqar.vu113@gmail.com</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <h5 class="text-uppercase mb-3">Complains</h5>
                                <table class="table table-detail table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Complains Detail</th>
                                            <th>Complains Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

