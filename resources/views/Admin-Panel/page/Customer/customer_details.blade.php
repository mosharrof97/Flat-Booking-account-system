@extends('Admin-Panel.partial.Layout')
@section('content')
<div class="row justify-content-center">
    <div class="col-lg-10 col-sm-12">
        <div class="card p-4">
            <div class="card-header">
                <h3>Investor Information</h3>
            </div>
            <div class="card-body">
                <div class="mb-5">
                    <style>
                        .table-information {
                            width: 100%;
                            margin-bottom: 1rem;
                            color: #BDBDC7;
                        }

                        .table-information th,
                        .table-information td {
                            padding: 0.2rem !important;
                        }

                    </style>
                    <table class="table-information table table-borderless">
                        <tr>
                            <th scope="row" style="width: 20%">Name </th>
                            <td colspan="" style="width: 3%">:</td>
                            <td colspan="3" style="width: 77%">Md. Rakid Hasan</td>
                        </tr>
                        <tr>
                            <th scope="row" style="width: 20%">Phone</th>
                            <td colspan="" style="width: 3%">:</td>
                            <td colspan="3" style="width: 77%">0214587842</td>
                        </tr>
                        <tr>
                            <th scope="row" style="width: 20%">Email</th>
                            <td colspan="" style="width: 3%">:</td>
                            <td colspan="3" style="width: 77%">Rakid@mdo.com</td>
                        </tr>
                        <tr>
                            <th scope="row" style="width: 20%">NID</th>
                            <td colspan="" style="width: 3%">:</td>
                            <td colspan="3" style="width: 77%">0312546548</td>
                        </tr>
                        <tr>
                            <th scope="row" style="width: 20%">Flat Booking</th>
                            <td colspan="" style="width: 3%">:</td>
                            <td colspan="3" style="width: 77%">3 Flat</td>
                        </tr>

                    </table>
                </div>
                <div class="row mt-4">
                    <div class="col-md-5 col-12">
                        <div class="card">
                            <div class="card-body">
                                <table class="table table-borderless">
                                    <tr>
                                        <th scope="row" style="width: 20%">Address</th>
                                        <td colspan="" style="width: 3%">:</td>
                                        <td colspan="3" style="width: 77%">Dhaka - 1205</td>
                                    </tr>
                                    <tr>
                                        <th scope="row" style="width: 20%">ZIP Code</th>
                                        <td colspan="" style="width: 3%">:</td>
                                        <td colspan="3" style="width: 77%"> 1205</td>
                                    </tr>
                                    <tr>
                                        <th scope="row" style="width: 20%">City</th>
                                        <td colspan="" style="width: 3%">:</td>
                                        <td colspan="3" style="width: 77%">Dhaka</td>
                                    </tr>
                                    <tr>
                                        <th scope="row" style="width: 20%">District</th>
                                        <td colspan="" style="width: 3%">:</td>
                                        <td colspan="3" style="width: 77%">Dhaka</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">SL</th>
                                                <th scope="col">Project Name</th>
                                                <th scope="col">Floor</th>
                                                <th scope="col">flat</th>
                                                <th scope="col">flat Area</th>
                                                <th scope="col">flat Price</th>
                                                <th scope="col">Pay Amount</th>
                                                <th scope="col">Due Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>Coder De Dhaka</td>
                                                <td>3rd Floor</td>
                                                <td>302 </td>
                                                <td>5000 Squer Fit</td>
                                                <td>5000000Tk</td>
                                                <td>3000000</td>
                                                <td>2000000</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
