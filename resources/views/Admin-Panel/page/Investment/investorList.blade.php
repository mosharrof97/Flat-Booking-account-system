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
                                <th scope="col" class="text-wrap">SL</th>
                                <th scope="col" class="text-wrap">Name</th>
                                <th scope="col" class="text-wrap">Phone</th>
                                <th scope="col" class="text-wrap">Email</th>
                                <th scope="col" class="text-wrap">Total Invest Project</th>
                                <th scope="col" class="text-wrap">Investment Total Amount</th>
                                <th scope="col" class="text-wrap">Total Installment</th>
                                <th scope="col" class="text-wrap">Total Paid Amount</th>
                                <th scope="col" class="text-wrap">Total Due Amount</th>
                                <th scope="col" class="text-wrap">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Md. Rakid Hasan</td>
                                <td>0214587842</td>
                                <td>Rakid@mdo.com</td>
                                <td>2 Project</td>
                                <td>5000000Tk</td>
                                <td>3</td>
                                <td>3000000</td>
                                <td>2000000</td>
                                <td>
                                    <a href="{{route('investor.view')}}" class="btn btn-success">View</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection
