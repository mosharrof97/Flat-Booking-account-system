@extends('Admin-Panel.partial.Layout')
@section('content')
    {{-- <div class="row justify-content-center">
    <div class="col-lg-10 col-sm-12"> --}}

    {{-- <div class="container mt-5">
        <a href="{{ url('roles') }}" class="btn btn-primary mx-1">Roles</a>
        <a href="{{ url('permissions') }}" class="btn btn-info mx-1">Permissions</a>
        <a href="{{ url('users') }}" class="btn btn-warning mx-1">Users</a>
    </div> --}}

    <div class="container mt-2">
        <div class="row">
            <div class="col-md-12">

                @if (session('status'))
                    <div class="alert alert-success">{{ session('status') }}</div>
                @endif

                <div class="card mt-3">
                    <div class="card-header">
                        <h4>Employee</h4>
                        {{-- @can('create employee') --}}
                            <a href="{{ route('employee.create') }}" class="btn btn-primary float-end">Add Employee</a>
                        {{-- @endcan --}}
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>designation</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($employees as $employee)
                                    <tr>
                                        <td>{{ $employee->id }}</td>
                                        <td>{{ $employee->name }}</td>
                                        <td>{{ $employee->phone }}</td>
                                        <td>{{ $employee->email }}</td>
                                        <td>{{ $employee->designation }}</td>
                                        <td>{{ $employee->active_status }}</td>
                                        <td>
                                            {{-- @can('update employee') --}}
                                                <a href="{{ route('employee.edit', $employee->id) }}" class="btn btn-success">Edit</a>
                                            {{-- @endcan

                                            {{-- @can('update employee') --}}
                                            <a href="{{ route('employee.view', $employee->id) }}" class="btn btn-info">View</a>
                                            {{-- @endcan

                                            @can('delete employee') --}}
                                                <a href="{{ route('employee.delete', $employee->id) }}"
                                                    class="btn btn-danger mx-2">Delete</a>
                                            {{-- @endcan --}}
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
    {{-- </div>
</div> --}}
@endsection
