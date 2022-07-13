@extends('layouts.registerform')
@section('content')
    <section class="registration-form mt-5">

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="card border-0 shadow-lg" style="box-shadow:3px 6px 7px #d4d2d2;">
                        @include('../partials.navigation')
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="vehicle-table table text-center">
                                    <thead class="text-uppercase">
                                        <tr class="text-white">
                                            <th>S.no#</th>
                                            <th>Details</th>
                                            <th>vehicle</th>
                                            <th>status</th>
                                            <th>date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($complains as $item)
                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->complain }}</td>
                                                <td>{{ $item->vehicle->model }}</td>
                                                <td>

                                                    @if ($item->status == 'Open')
                                                        <span class="badge badge-success">{{ $item->status }}</span>
                                                    @elseif($item->status == 'Paused')
                                                        <span class="badge badge-warning">{{ $item->status }}</span>
                                                    @elseif($item->status == 'Pending')
                                                        <span class="badge badge-secondary">{{ $item->status }}</span>
                                                        @else 
                                                        <span class="badge badge-danger">{{ $item->status }}</span>
                                                        
                                                    @endif
                                                </td>
                                                <td>{{ \Carbon\Carbon::parse($item->created_at)->toFormattedDateString() }}
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
