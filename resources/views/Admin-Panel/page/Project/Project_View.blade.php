@extends('Admin-Panel.partial.Layout')
@section('content')
<div class="row justify-content-center">
    <div class="col-lg-10 col-sm-12">
        <div class="card p-4">
            <div class="card-header">
                <h3>Project Details Information</h3>
            </div>
            <div class="card-body">
                <div class="">
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
                            <th scope="row" style="width: 20%">Project Name </th>
                            <td colspan="" style="width: 3%">:</td>
                            <td colspan="3" style="width: 77%">Coder De Dkaka</td>
                        </tr>
                        <tr>
                            <th scope="row" style="width: 20%">Project Status </th>
                            <td colspan="" style="width: 3%">:</td>
                            <td colspan="3" style="width: 77%">On Going</td>
                        </tr>
                        <tr>
                            <th scope="row" style="width: 20%">Project Budget</th>
                            <td colspan="" style="width: 3%">:</td>
                            <td colspan="3" style="width: 77%">500000000 TK</td>
                        </tr>
                        <tr>
                            <th scope="row" style="width: 20%">Land Area</th>
                            <td colspan="" style="width: 3%">:</td>
                            <td colspan="3" style="width: 77%">30000 Squer Fit</td>
                        </tr>

                        <tr>
                            <th scope="row" style="width: 20%">Investor</th>
                            <td colspan="" style="width: 3%">:</td>
                            <td colspan="3" style="width: 77%">1 </td>
                        </tr>

                        <tr>
                            <th scope="row" style="width: 20%">Investment Amount</th>
                            <td colspan="" style="width: 3%">:</td>
                            <td colspan="3" style="width: 77%">25000000 TK</td>
                        </tr>

                        <tr>
                            <th scope="row" style="width: 20%">Floor</th>
                            <td colspan="" style="width: 3%">:</td>
                            <td colspan="3" style="width: 77%">10 Floor</td>
                        </tr>
                        <tr>
                            <th scope="row" style="width: 20%">flat</th>
                            <td colspan="" style="width: 3%">:</td>
                            <td colspan="3" style="width: 77%">28 flat</td>
                        </tr>
                        <tr>
                            <th scope="row" style="width: 20%">Flat</th>
                            <td colspan="" style="width: 3%">:</td>
                            <td colspan="3" style="width: 77%">9000 Squer Fit</td>
                        </tr>
                        <tr>
                            <th scope="row" style="width: 20%">Start Date</th>
                            <td colspan="" style="width: 3%">:</td>
                            <td colspan="3" style="width: 77%">02-03-2024</td>
                        </tr>

                        <tr>
                            <th scope="row" style="width: 20%">End Date</th>
                            <td colspan="" style="width: 3%">:</td>
                            <td colspan="3" style="width: 77%">02-03-2025</td>
                        </tr>

                        <tr>
                            <th scope="row" style="width: 20%">Address</th>
                            <td colspan="" style="width: 3%">:</td>
                            <td colspan="3" style="width: 77%">Dhaka-1205</td>
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
                        <tr>
                            <th scope="row" style="width: 20%">Postal Code</th>
                            <td colspan="" style="width: 3%">:</td>
                            <td colspan="3" style="width: 77%">1205</td>
                        </tr>

                    </table>
                </div>
                <div class="">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">SL</th>
                                    <th scope="col">Investor Name</th>
                                    <th scope="col"> Phone</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Investment Total Amount</th>
                                    <th scope="col">Installment</th>
                                    <th scope="col">Paid Amount</th>
                                    <th scope="col">Due Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Md. Rakid Hasan</td>
                                    <td>0214587842</td>
                                    <td>Rakid@mdo.com</td>
                                    <td>5000000 Tk</td>
                                    <td>3</td>
                                    <td>3000000 TK</td>
                                    <td>2000000 TK</td>
                                </tr>
                                <tr>
                                    <th scope="row"></th>
                                    <td colspan="3">Totel</td>
                                    <td>5000000 Tk</td>
                                    <td></td>
                                    <td>3000000 TK</td>
                                    <td>2000000 TK</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
