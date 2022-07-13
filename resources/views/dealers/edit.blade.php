@extends('layouts.registerform')
@section('content')
    <!-- page content -->
    <section class="registration-form mt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="card border-0 shadow-lg" style="box-shadow:3px 6px 7px #d4d2d2;">
                        @include('../partials.navigation')

                        <div class="card-body">
                            <div class="d-flex justify-content-start">
                                <h3> Edit Dealer</h3>
                                </div>
                            <form action="{{URL('dealer-update',$dealer->id)}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Name:</label>
                                        <input type="text" name="name" value="{{$dealer->name}}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="phone">Phone:</label>
                                        <input type="text" name="phone" value="{{$dealer->phone}}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Email:</label>
                                        <input type="email" name="email" value="{{$dealer->email}}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="address">Addres:</label>
                                        <input type="text" name="address" value="{{$dealer->address}}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-2">
                                        <button type="submit" class="btn btn-success">Update</button>
                                    </div>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->
    @endsection
