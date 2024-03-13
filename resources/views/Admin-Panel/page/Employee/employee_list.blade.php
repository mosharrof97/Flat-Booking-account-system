@extends('Admin-Panel.partial.Layout')
@section('content')
<div class="row justify-content-center">
    <div class="col-lg-10 col-sm-12">
        <div class="card p-4">
            <div class="card-header">
                <h3>Employee List</h3>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">SL</th>
                            <th scope="col">Name</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Email</th>
                            <th scope="col">NID</th>
                            <th>Designation</th>
                            <th scope="col">Image</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Md. Rakid Hasan</td>
                            <td>0214587842</td>
                            <td>Rakid@mdo.com</td>
                            <td>0214587842</td>
                            <td>Project Manager</td>
                            <td><img src="#" alt="" sizes="100" srcset=""></td>
                            <td><a href="{{ route('employee.details') }}" class="btn btn-info">View</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
