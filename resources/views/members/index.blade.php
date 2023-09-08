@extends('layout.layout')
@section('title', 'Registered Members')
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

                                    </tr>
                                </thead>
                                <tbody>

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

                                        </tr>
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

    </section>
@endsection
