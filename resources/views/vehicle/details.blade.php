@extends('layouts.registerform')
@section('content')
    <section class="registration-form mt-5">

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card border-0 shadow-lg">
                        <div class="card-header text-center">
                           <a href="{{URL('/')}}"><img src="{{ asset('assets/images/logo.png') }}" alt=""></a> 
                            <h2>Vehicle Registration</h2>
                            @include('../partials.navigation')
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="user-detail vehicle-detail-title mb-5">
                                        <h5 class="text-uppercase mb-3">User Detail</h5>
                                        <div class="detail-text">
                                            <strong>Name:</strong>
                                            <span class="ml-3">{{$vehicle->name}}</span>
                                        </div>
                                        <div class="detail-text">
                                            <strong>Email:</strong>
                                            <span class="ml-3">{{$vehicle->email}}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="vehicle-detail vehicle-detail-title">
                                        <h5 class="text-uppercase mb-3">Vehicle Detail - {{$vehicle->vin}}</h5>
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
                                </div>
                            </div>
                            <div class="table-responsive">
                                <h5 class="text-uppercase mb-3">Complains</h5>
                                <table class="table vehicle-table table-detail ">
                                    <thead class="text-white">
                                        <tr>
                                            <th width="60%">Detail</th>
                                            <th>Status</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($vehicle->complains as $complain)
                                    <tr>
                                        <td>{{$complain->complain}}</td>
                                        <td>

                                            @if ($complain->status == 'Open')
                                                <span class="badge badge-success">{{ $complain->status }}</span>
                                            @elseif($complain->status == 'Paused')
                                                <span class="badge badge-warning">{{ $complain->status }}</span>
                                            @elseif($complain->status == 'Pending')
                                                <span class="badge badge-secondary">{{ $complain->status }}</span>
                                                @else 
                                                <span class="badge badge-danger">{{ $complain->status }}</span>
                                                
                                            @endif
                                        </td>
                                        <td>{{ \Carbon\Carbon::parse($complain->created_at)->toFormattedDateString() }}
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

