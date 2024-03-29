@extends('layouts.registerform')
@section('content')
    <section class="registration-form mt-5">

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="card border-0 shadow-lg" style="box-shadow:3px 6px 7px #d4d2d2;">
                        @include('../partials.navigation')
                        <div class="card-body">
                            <div class="back-button text-left mb-3">
                                <a href="{{route('vehicle.register')}}" class="rv-btn text-decoration-none">Register Vehicle
                                    <i class="fa fa-plus ml-1"></i>
                                </a>
                            </div>
                            <div class="table-responsive">
                                <table class="table text-center vehicle-table">
                                    <thead class="text-uppercase ">
                                        <tr class="text-white">
                                            <th>S.no#</th>
                                            <th>License #</th>
                                            <th>VIN</th>
                                          
                                            <th>Make</th>
                                            <th>Model</th>
                                            <th>Year</th>
                                            <th>date</th>
                                            <th>action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($vehicles as $item)
                                            <tr>
                                                <td>{{$item->id}}</td>
                                                <td>{{$item->license_no}}</td>
                                                <td>{{$item->vin}}</td>
                                                <td>{{$item->make}}</td>
                                                <td>{{$item->model}}</td>
                                                <td>{{$item->year}}</td>
                                                <td>{{\Carbon\Carbon::parse($item->created_at)->toFormattedDateString();}}</td>
                                                <td>
                                                    <a class="v-details edit" href="{{route('vehichle.show',$item->id)}}"><i class="fa fa-eye"></i></a>
                                                </td>
                                                
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
