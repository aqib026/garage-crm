@extends('layouts.registerform')
@section('content')
    <section class="registration-form mt-5">

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="card border-0 shadow-lg" style="box-shadow:3px 6px 7px #d4d2d2;">
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
                            <div class="d-flex justify-content-end m-2">
                                <a class="rv-btn" href="{{route('parts.orders.create')}}">Add  Parts Order</a>
                            </div>
                            <div class="table-responsive">
                                <table class="vehicle-table table text-center">
                                    <thead class="text-uppercase">
                                        <tr class="text-white">
                                            <th>Bill no#</th>
                                            <th>Customer name</th>
                                            <th>Vehcile</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($partsOrders as $item)
                                            <tr>
                                                <td>{{ $item->billing_no }}</td>
                                                <td>{{ $item->customer_name }}</td>
                                                <td>{{ $item->vehicle->vin }}</td>
                                             
                                                <td>{{ \Carbon\Carbon::parse($item->created_at)->toFormattedDateString() }}
                                                </td>
                                                <td>
                                                    {{-- <a class="v-details edit" href="{{URL('/edit-parts-orders',$item->id)}}"><i class="fa fa-edit"></i></a> --}}
                                                    <a class="v-details edit" href="{{URL('/view-order',$item->id)}}"><i class="fa fa-eye"></i></a>
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
