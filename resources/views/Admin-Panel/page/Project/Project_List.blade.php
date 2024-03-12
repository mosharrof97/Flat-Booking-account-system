@extends('Admin-Panel.partial.Layout')
@section('content')
<div class="row justify-content-center">
    <div class="col-lg-10 col-sm-12">
        <div class="card p-4">
            <div class="card-header">
                <h3>Investment List</h3>
            </div>
            <div class="card-body">
                <div class=" table-responsive">
                    <table class="table border table-striped">
                        <thead>
                            <tr>
                                <th rowspan="" class="text-wrap">SL</th>
                                <th rowspan="" class="text-wrap">Project Name</th>
                                <th rowspan="" class="text-wrap">Project Budget</th>
                                <th rowspan="" class="text-wrap">Land Area</th>
                                <th rowspan="" class="text-wrap">Project Duration</th>
                                <th rowspan="" class="text-wrap">Floor</th>
                                <th rowspan="" class="text-wrap">Flat</th>
                                <th rowspan="" class="text-wrap">Flat Area</th>
                                <th rowspan="" class="text-wrap">Start Date</th>
                                <th rowspan="" class="text-wrap">End Date</th>
                                <th rowspan="" class="text-wrap">Address</th>
                                <th rowspan="" class="text-wrap">City</th>
                                <th rowspan="" class="text-wrap">District</th>
                                <th rowspan="" class="text-wrap">Zip Code</th>
                                <th colspan="2" class="text-wrap">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Coder De Dhaka</td>
                                <td>500000000</td>
                                <td>300000 Squer Fit</td>
                                <td>1 Year</td>
                                <td>10 Floor</td>
                                <td>28 Flat</td>
                                <td>9000 Squer Fit</td>
                                <td>02-03-2024</td>
                                <td>02-03-2025</td>
                                <td>Dhaka - 1205</td>
                                <td>Dhaka</td>
                                <td>Dhaka</td>
                                <td>1205</td>
                                <td>
                                    <a href="{{route('project.view')}} " class="btn btn-success me-2">View</a>
                                </td>
                                <td>
                                    <a href="{{route('project.edit')}} " class="btn btn-success me-2">edit</a>
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
