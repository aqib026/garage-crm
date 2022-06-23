@extends('layouts.admin')
@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Users </h3>
                </div>

                <div class="title_right">
                    <form action="{{ route('manage.users') }}" method="get">
                        <div class="col-md-5 col-sm-5  form-group pull-right top_search">
                            <div class="input-group">
                                <input type="text" name="keyword" class="form-control" placeholder="Search for...">
                                <span class="input-group-btn">
                                    <button type="submit" class="btn btn-default" type="button">Go!</button>
                                </span>
                            </div>
                        </div>
                    </form>
                </div>


            </div>
            <div class="clearfix"></div>
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible " role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                            aria-hidden="true">×</span>
                    </button>
                    {{ session()->get('success') }}
                </div>
            @endif

            <div class="row" style="display: block;">
                <div class="col-md-12 col-sm-12  ">
                    <div class="x_panel ">
                        <div class="d-flex justify-content-end">
                            @if (auth()->user()->type = 'Admin')
                            <a href="{{ route('users.add') }}" class="btn btn-dark ">Add User</a>
                        @endif

                        </div>
                   

                        <div class="x_content">

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($users as $user)
                                        <tr>
                                            <th scope="row">{{ $user->id }}</th>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->type }}</td>
                                            <td>
                                                <a href="{{ route('users.edit', $user->id) }}"
                                                    class="btn btn-dark btn-sm"><i class="fa fa-edit"></i></a>
                                                <a href="{{ route('user.delete', $user->id) }}"
                                                    class="btn btn-danger btn-sm"
                                                    onClick="return confirm('Are you sure?');"><i
                                                        class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach



                                </tbody>
                            </table>
                            <div class="mt-5">
                                {{ $users->appends(request()->input())->links() }}

                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- /page content -->
@endsection
