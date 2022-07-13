@extends('layouts.registerform')
@section('content')
    <section class="registration-form mt-5">

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="card border-0 shadow-lg">
                        @include('../partials.navigation')
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="user-detail vehicle-detail-title mb-5">
                                        <h5 class="text-uppercase mb-3">Part Order Detail</h5>
                                        <div class="detail-text">
                                            <strong>Customer Name:</strong>
                                            <span class="ml-3">{{$details->customer_name}}</span>
                                        </div>
                                        <div class="detail-text">
                                            <strong>Billing No:</strong>
                                            <span class="ml-3">{{$details->billing_no}}</span>
                                        </div>
                                        <div class="detail-text">
                                            <strong>Vehicle Vin:</strong>
                                            <span class="ml-3">{{$details->vehicle->vin}}</span>
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="col-md-6">
                                    <div class="vehicle-detail vehicle-detail-title">
                                        <h5 class="text-uppercase mb-3">Vehicle Detail -  {{$vehicle->vin}}</h5>
                                        <div class="detail-text">
                                            <strong>Make:</strong>
                                            <span class="ml-3">{{$vehicle->make}}</span>
                                        </div>
                                        <div class="detail-text">
                                            <strong>Model:</strong>
                                            <span class="ml-3">{{$vehicle->model}}</span>
                                        </div>
                                        <div class="detail-text">
                                            <strong>Year:</strong>
                                            <span class="ml-3">{{$vehicle->year}}</span>
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                            <div class="table-responsive">
                                <h5 class="text-uppercase mb-3">Parts</h5>
                                <table class="table vehicle-table table-detail ">
                                    <thead class="text-white">
                                        <tr>
                                            <th width="40%">Dealer</th>
                                            <th>Part Name</th>
                                            <th>Price</th>
                                            <th>QTY</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($details->Parts as $part)
                                    <tr>
                                        <td>{{$part->dealer->name}}</td>
                                        <td>{{$part->product_name}}</td>
                                        <td>{{$part->price}}</td>
                                        <td>{{$part->quantity}}</td>
                                      
                                        <td>{{ \Carbon\Carbon::parse($part->created_at)->toFormattedDateString() }}
                                    </tr>
                                    @endforeach
                                        
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

