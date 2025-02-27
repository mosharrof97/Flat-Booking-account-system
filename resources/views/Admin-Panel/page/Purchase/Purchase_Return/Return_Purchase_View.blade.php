@extends('Admin-Panel.partial.Layout')
@section('content')
<div class="row justify-content-center">
    <div class="col-lg-12 col-sm-12">
        <div class="card p-4">
            <div class="card-header bg-info">
                <h3>Purchase Information</h3>
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
                            <th scope="row" style="width: 20%">Create Purchase</th>
                            <td colspan="" style="width: 3%">:</td>
                            <td colspan="3" style="width: 77%">{{ $purchase->user->name }}</td>
                        </tr>
                        <tr>
                            <th scope="row" style="width: 20%">vendor</th>
                            <td colspan="" style="width: 3%">:</td>
                            <td colspan="3" style="width: 77%">{{ $purchase->vendor->name .' - '. $purchase->vendor->phone}}</td>
                        </tr>

                        <tr>
                            <th scope="row" style="width: 20%">Purchase Date</th>
                            <td colspan="" style="width: 3%">:</td>
                            <td colspan="3" style="width: 77%">{{ $purchase->date  }}</td>
                        </tr>

                    </table>
                </div>
                <div class="">
                    @php
                        $names = json_decode($purchase->name);
                        $quantitys = json_decode($purchase->quantity);
                        $units = json_decode($purchase->unit);
                        $prices = json_decode($purchase->price);
                        $total_prices = json_decode($purchase->total_price);

                        // dd($prices);
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
                                <td>{{number_format( $prices[$key] ,2,'.',',')}}</td>
                                <td>{{ $quantitys[$key] }} {{ $units[$key] }}</td>
                                <td>{{ number_format($total_prices[$key] ,2,'.',',')}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>

                            <tr>
                                <td colspan="4" class="text-right"> Total </td>
                                <td colspan="">{{ number_format($purchase->total ,2,'.',',') }}</td>
                            </tr>
                            <tr>
                                <td colspan="4" class="text-right"> Service Charge </td>
                                <td>{{ number_format($purchase->service_charge,2,'.',',')  }}</td>
                            </tr>
                            <tr>
                                <td colspan="4" class="text-right"> Shipping Charge </td>
                                <td>{{ number_format($purchase->shipping_charge ,2,'.',',') }}</td>
                            </tr>

                            <tr>
                                <td colspan="4" class="text-right"> Total Amount </td>
                                <td>{{ number_format($purchase->total_amount,2,'.',',')  }}</td>
                            </tr>

                            <tr>
                                <td colspan="4" class="text-right"> Discount </td>
                                <td>{{ number_format($purchase->discount,2,'.',',')  }}</td>
                            </tr>
                            <tr>
                                <td colspan="4" class="text-right"> Paid </td>
                                <td>{{ number_format($purchase->paid ,2,'.',',') }}</td>
                            </tr>
                            <tr>
                                <td colspan="4" class="text-right"> Due </td>
                                <td>{{number_format( $purchase->due,2,'.',',')  }}</td>
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
