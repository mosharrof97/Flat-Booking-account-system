@extends('Project-Panel.Partial.Layout')
@section('content')
<div class="row justify-content-center">
    <div class="col-lg-12 col-sm-12">
        <div class="card p-4">
            <div class="card-header bg-info">
                <h3>Expense Information</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
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
                            <th scope="row" style="width: 20%">Project Name</th>
                            <td colspan="" style="width: 3%">:</td>
                            <td colspan="3" style="width: 77%"> {{ $expense->project->projectName }} </td>
                        </tr>
                        <tr>
                            <th scope="row" style="width: 20%">Project Status </th>
                            <td colspan="" style="width: 3%">:</td>
                            @if ($expense->project->status === 0)
                                <td colspan="3" style="width: 77%">
                                    <div class="d-flex align-items-center">
                                        <span class="bg-info p-2 me-1 rounded-circle "></span>
                                        <span class="text-info">On going</span>
                                    </div>
                                </td>
                            @elseif ($expense->project->status === 1)
                                <td colspan="3" class="text-success" style="width: 77%">
                                    <div class="d-flex align-items-center">
                                        <span class="bg-info p-2 me-1 rounded-circle "></span>
                                        <span class="text-info">completed</span>
                                    </div>
                                </td>
                            @endif
                        </tr>

                        <tr>
                            <th scope="row" style="width: 20%">Create Expense</th>
                            <td colspan="" style="width: 3%">:</td>
                            <td colspan="3" style="width: 77%">{{ $expense->created_by }}</td>
                        </tr>
                        <tr>
                            <th scope="row" style="width: 20%">vendor</th>
                            <td colspan="" style="width: 3%">:</td>
                            <td colspan="3" style="width: 77%">{{ $expense->vendor->name .' - '. $expense->vendor->phone}}</td>
                        </tr>

                        <tr>
                            <th scope="row" style="width: 20%">Expense Date</th>
                            <td colspan="" style="width: 3%">:</td>
                            <td colspan="3" style="width: 77%">{{ $expense->date  }}</td>
                        </tr>

                    </table>
                </div>
                <div class="">
                    @php
                        $names = json_decode($expense->name);
                        $quantitys = json_decode($expense->quantity);
                        $units = json_decode($expense->unit);
                        $prices = json_decode($expense->price);
                        $total_prices = json_decode($expense->total_price);
                    @endphp
                    <table class="table table-bordered">
                        <thead class="table-primary">
                            <tr>
                                <th scope="col" class="flex-wrap">SL</th>
                                <th scope="col" class="flex-wrap">Material Name</th>
                                <th scope="col" class="flex-wrap">Price</th>
                                <th scope="col" class="flex-wrap">Quantity & Unit</th>
                                <th scope="col" class="flex-wrap">Total Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (  $names  as $key => $name )
                            <tr>
                                <td scope="row">{{ $key + 1 }}</td>
                                <td>{{ $name }}</td>
                                <td>{{ $prices[$key] }}.00</td>
                                <td>{{ $quantitys[$key] }} {{ $units[$key] }}</td>
                                <td>{{ $total_prices[$key] }}.00</td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>

                            <tr>
                                <td colspan="4" class="text-right"> Total </td>
                                <td colspan="">{{ $expense->total  }}</td>
                            </tr>
                            <tr>
                                <td colspan="4" class="text-right"> Service Charge </td>
                                <td>{{ $expense->service_charge  }}</td>
                            </tr>
                            <tr>
                                <td colspan="4" class="text-right"> Shipping Charge </td>
                                <td>{{ $expense->shipping_charge  }}</td>
                            </tr>

                            <tr>
                                <td colspan="4" class="text-right"> Total Amount </td>
                                <td>{{ $expense->total_amount  }}</td>
                            </tr>

                            <tr>
                                <td colspan="4" class="text-right"> Discount </td>
                                <td>{{ $expense->discount  }}</td>
                            </tr>
                            <tr>
                                <td colspan="4" class="text-right"> Paid </td>
                                <td>{{ $expense->paid  }}</td>
                            </tr>
                            <tr>
                                <td colspan="4" class="text-right"> Due </td>
                                <td>{{ $expense->due  }}</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                <a href="{{ url()->previous() }}" class="btn btn-danger">back</a>
            </div>
        </div>
    </div>
</div>

@endsection
