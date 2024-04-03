@extends('Admin-Panel.partial.Layout')
@section('content')
<div class="row justify-content-center">
    <div class="col-lg-12 col-sm-12">
        <div class="card p-4">
            <div class="card-header">
                <h3>Project Details Information</h3>
                <a href="{{ route('list.project') }}" class="btn btn-danger">Back</a>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8 col-12">
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
                                <td colspan="3" style="width: 77%">{{ $project->projectName }}</td>
                            </tr>
                            <tr>
                                <th scope="row" style="width: 20%">Project Status </th>
                                <td colspan="" style="width: 3%">:</td>
                                @if ($project->status === 0)
                                <td colspan="3" style="width: 77%">On Going</td>
                                @elseif ($project->status === 1)
                                <td colspan="3" class="text-success" style="width: 77%">completed</td>
                                @endif

                            </tr>
                            <tr>
                                <th scope="row" style="width: 20%">Project Budget</th>
                                <td colspan="" style="width: 3%">:</td>
                                <td colspan="3" style="width: 77%">{{ $project->budget }} TK</td>
                            </tr>
                            <tr>
                                <th scope="row" style="width: 20%">Land Area</th>
                                <td colspan="" style="width: 3%">:</td>
                                <td colspan="3" style="width: 77%">{{ $project->land_area }} Squer Fit</td>
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
                                <td colspan="3" style="width: 77%">{{ $project->floor }} Floor</td>
                            </tr>
                            <tr>
                                <th scope="row" style="width: 20%">Flat </th>
                                <td colspan="" style="width: 3%">:</td>
                                <td colspan="3" style="width: 77%">{{ $project->flat }} flat</td>
                            </tr>
                            <tr>
                                <th scope="row" style="width: 20%">Flat Area</th>
                                <td colspan="" style="width: 3%">:</td>
                                <td colspan="3" style="width: 77%">{{ $project->flat_area }} Squer Fit</td>
                            </tr>
                            <tr>
                                <th scope="row" style="width: 20%">Start Date</th>
                                <td colspan="" style="width: 3%">:</td>
                                <td colspan="3" style="width: 77%">{{ $project->start_date }}</td>
                            </tr>

                            <tr>
                                <th scope="row" style="width: 20%">End Date</th>
                                <td colspan="" style="width: 3%">:</td>
                                <td colspan="3" style="width: 77%">{{ $project->end_date }}</td>
                            </tr>

                            <tr>
                                <th scope="row" style="width: 20%">Address</th>
                                <td colspan="" style="width: 3%">:</td>
                                <td colspan="3" style="width: 77%">{{ $project->address }}</td>
                            </tr>

                            <tr>
                                <th scope="row" style="width: 20%">City</th>
                                <td colspan="" style="width: 3%">:</td>
                                <td colspan="3" style="width: 77%">{{ $project->city }}</td>
                            </tr>
                            <tr>
                                <th scope="row" style="width: 20%">District</th>
                                <td colspan="" style="width: 3%">:</td>
                                <td colspan="3" style="width: 77%">{{ $project->district->name }}</td>
                            </tr>
                            <tr>
                                <th scope="row" style="width: 20%">Postal Code</th>
                                <td colspan="" style="width: 3%">:</td>
                                <td colspan="3" style="width: 77%">{{ $project->zipCode }}</td>
                            </tr>

                        </table>
                    </div>
                    <div class="col-md-4 col-12 text-end">
                        <img src="{{ asset('upload/Project/'.$project->image) }}" alt="No Image" width="300px" height="">
                    </div>
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
