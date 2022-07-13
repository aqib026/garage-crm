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
                            <div class="d-flex justify-content-start mt-3">
                                <h4> Add Parts Order</h4>
                            </div>
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
                            <form action="{{ route('parts.orders.store') }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="billing_no">Billing No:</label>
                                            <input type="text" name="billing_no" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="customer_name">Customer Name:</label>
                                            <input type="text" name="customer_name" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="vehicle_id">Vehicle:</label>
                                            <select name="vehicle_id" id="vehicle_id" class="form-control">
                                                @foreach ($vehicles as $item)
                                                    <option value="{{ $item->id }}">
                                                        {{ $item->make . ' ' . $item->model }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                </div>

                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h5> Order Parts</h5>
                                    </div>
                                    <div class="">
                                        <a id="add_new_product" class="rv-btn" url="{!! url('/new-row') !!}">Add New</a>

                                    </div>
                                </div>
                                <div class="row m-3">
                                    <table class="table-bordered order-table">
                                        <thead class="">
                                            <tr class="text-dark">
                                                <th>Dealer</th>
                                                <th>Product Name</th>
                                                <th>Quantity</th>
                                                <th>Price</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-center">
                                            <tr id="row_id_1">
                                                <td>
                                                    <select name="dealer_id[]" id="dealer_id_1" class="form-control">
                                                        <option value="" disabled>select Dealer</option>
                                                        @foreach ($dealers as $item)
                                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td>
                                                    <input type="text" name="product_name[]" class="form-control">
                                                </td>
                                                <td>
                                                    <input type="number" name="qty[]" class="form-control">

                                                </td>
                                                <td>
                                                    <input type="text" name="price[]" class="form-control">
                                                </td>
                                                <td>
                                                    <span class="product_delete" data-id="0"><i
                                                            class="fa fa-trash"></i></span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                </div>

                                <div class="col-md-6">
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
        <!-- /page content -->
    @endsection
    @section('page-script')
        <script>
            $("#add_new_product").click(function() {
                var row_id = $(".order-table > tbody > tr").length;
                var url = $(this).attr('url');
                $.ajax({
                    type: 'GET',
                    url: url,
                    data: {
                        row_id: row_id
                    },


                    success: function(response) {

                        $('.order-table > tbody').append(response.html);
                    }
                });
            })

            $('body').on('click', '.product_delete', function() {

                var row_id = $(this).attr('data-id');
                alert(row_id);

                $('table.order-table tr#row_id_' + row_id).fadeOut();

                return false;
            });
        </script>
    @endsection
