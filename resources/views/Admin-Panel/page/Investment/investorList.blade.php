@extends('Admin-Panel.partial.Layout')
@section('content')
<div class="row justify-content-center">
    <div class="col-lg-10 col-sm-12">
        <div class="card p-4">
            <div class="card-header">
                <h3>Investor List</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col" class="text-nowrap">SL</th>
                                <th scope="col" class="text-nowrap">Name</th>
                                <th scope="col" class="text-nowrap">Phone</th>
                                <th scope="col" class="text-nowrap">Email</th>
                                <th scope="col" class="text-nowrap">Total Invest Project</th>
                                <th scope="col" class="text-nowrap">Investment Total Amount</th>
                                <th scope="col" class="text-nowrap">Total Installment</th>
                                <th scope="col" class="text-nowrap">Total Paid Amount</th>
                                <th scope="col" class="text-nowrap">Total Due Amount</th>
                                <th scope="col" class="text-nowrap">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $datas as $data )
                            <tr>
                                <th scope="row">1</th>
                                <td>{{ $data->name }}</td>
                                <td>{{ $data->phone }}</td>
                                <td>{{ $data->email }}</td>
                                <td>{{ $data->phone }} TK</td>
                                <td>{{ $data->phone }} TK</td>
                                <td>3</td>
                                <td>3000000 TK</td>
                                <td>2000000 TK</td>
                                <td>
                                    <a href="{{route('investor.view',$data->id)}}" class="btn btn-success">View</a>
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

@endsection
