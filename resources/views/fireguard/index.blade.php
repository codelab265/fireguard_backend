@extends('layout.layout')
@section('title', 'Fireguards')
@section('body')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-10">
                    <h1>
                        @yield('title')
                    </h1>
                </div>
                <div class="col-sm-2">
                    <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#create">
                        <i class="fa fa-plus-circle"></i>
                        Create
                    </button>

                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <div class="card-body">
                            <table id="datatable" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Full Name</th>
                                        <th>Email</th>
                                        <th>Phone Number</th>
                                        <th>Gender</th>
                                        <th>Age</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $page = 'fireguard';
                                    @endphp
                                    @foreach ($users as $user)
                                        @php
                                            $id = $user->id;
                                        @endphp
                                        <tr>
                                            <td>{{ $user->first_name . ' ' . $user->last_name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->phone_number }}</td>
                                            <td>{{ $user->gender }}</td>
                                            <td>{{ $user->age }}</td>

                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-primary btn-sm"
                                                        data-toggle="modal" data-target="#update{{ $id }}">
                                                        <i class="fa fa-edit"></i> Edit
                                                    </button>
                                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                        data-target="#delete{{ $id }}">
                                                        <i class="fa fa-trash"></i> Delete
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                        @include('fireguard.update')
                                        @include('delete_modal')
                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        @include('fireguard.create')
        <!-- /.container-fluid -->
    </section>
@endsection
