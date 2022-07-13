@extends('layouts.registerform')
@section('content')
    <section class="registration-form mt-5">

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
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
                                <a class="rv-btn" href="{{route('dealer.create')}}">Add Dealer</a>
                            </div>
                            <div class="table-responsive">
                                <table class="vehicle-table table text-center">
                                    <thead class="text-uppercase">
                                        <tr class="text-white">
                                            <th>S.no#</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>status</th>
                                            <th>date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($dealers as $item)
                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->email }}</td>
                                                <td>

                                                    @if ($item->status == 'Active')
                                                        <span class="badge badge-success">{{ $item->status }}</span>
                                                    @elseif($item->status == 'In Active')
                                                        <span class="badge badge-danger">{{ $item->status }}</span>
                                                    @elseif($item->status == 'Pending')
                                                    @endif
                                                </td>
                                                <td>{{ \Carbon\Carbon::parse($item->created_at)->toFormattedDateString() }}
                                                </td>
                                                <td>
                                                    <a class="v-details edit" href="{{URL('/edit-dealer',$item->id)}}"><i class="fa fa-edit"></i></a>
                                                    <a class="v-details delete" href="{{URL('/dealer/delete',$item->id)}}"><i class="fa fa-trash"></i></a>
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
