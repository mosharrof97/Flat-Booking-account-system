@extends('Admin-Panel.partial.Layout')
@section('content')
<div class="row justify-content-center">
    <div class="col-lg-12 col-sm-12">
        <div class="card p-4" id="PurchaseDuePay">
            <div class="card-header justify-content-center">
                <div class="text-center ">
                    <img src="{{ asset('upload/CompanyInfo/'. $comInfo->logo) }}" alt="" width="100">
                    <h2 class="fw-bold">{{ $comInfo->name }}</h2>
                    <h4 class="fw-semibold"><b>Email:</b> {{ $comInfo->email }}</h4>
                    <h4 class="fw-bold"><b>Vendor: </b>{{ $invoice->vendor->name .' ('.$invoice->vendor->name.')' }}</h2>
                    <h4><b>Address:</b> {{ $invoice->address}}</h4>
                </div>
            </div>
            <div class="card-body">
                <div class="">
                    <h4 class="text-center fw-bold">Invoice</h4>
                </div>
                <div class="row mt-3">
                    <div class="col-lg-8 ">
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
                                    <th scope="row" style="width: 20%">Vendor Name</th>
                                    <td colspan="" style="width: 3%">:</td>
                                    <td colspan="3" style="width: 77%"> {{ $invoice->vendor->name .' ('.$invoice->vendor->phone.')'}} </td>
                                </tr>
                                
                                <tr>
                                    <th scope="row" style="width: 20%">Payment by</th>
                                    <td colspan="" style="width: 3%">:</td>
                                    <td colspan="3" style="width: 77%">{{ $invoice->user->name }}</td>
                                </tr>
                                {{-- <tr>
                                    <th scope="row" style="width: 20%">vendor</th>
                                    <td colspan="" style="width: 3%">:</td>
                                    <td colspan="3" style="width: 77%">{{ $invoice->purchase->vendor->name .' - '. $invoice->purchase->vendor->phone}}</td>
                                </tr>

                                <tr>
                                    <th scope="row" style="width: 20%">Purchase Date</th>
                                    <td colspan="" style="width: 3%">:</td>
                                    <td colspan="3" style="width: 77%">{{ $invoice->purchase->date  }}</td>
                                </tr> --}}

                            </table>
                        </div>
                    </div>

                    {{-- <div class="col-lg-4 ">
                        <div class="">
                            <h4 class="fw-bold text-center"> Due Pay</h4>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Amount</th>
                                        <th>Recived By</th>
                                    </tr>
                                </thead>
                                <tbody class="table-group-divider">
                                    <tr>
                                        <td>{{ $invoice->date }}</td>
                                        <td>{{ number_format( $invoice->pay,2,'.',',')}}</td>
                                        <td>{{ $invoice->user->name}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div> --}}
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>pay</th>
                                <th>due</th>
                                <th> Bank</th>
                                <th> Account Number</th>
                                <th> Check Number</th>
                            </tr>                            
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $invoice->date->format('d-M-y')}}</td>
                                <td>{{ $invoice->pay }}</td>
                                <td>{{ $invoice->due }}</td>
                                <td>{{ $invoice->bank_name == null ? '---' : $invoice->bank_name}}</td>
                                <td>{{ $invoice->account_number == null ? '---' : $invoice->account_number }}</td>
                                <td>{{ $invoice->check_number == null ? '---' : $invoice->check_number }}</td>
                            </tr>
                        </tbody>

                    </table>
                </div>

                {{-- <div class="">
                    @php
                        $names = json_decode($invoice->purchase->name);
                        $quantitys = json_decode($invoice->purchase->quantity);
                        $units = json_decode($invoice->purchase->unit);
                        $prices = json_decode($invoice->purchase->price);
                        $total_prices = json_decode($invoice->purchase->total_price);

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
                                <td>{{ number_format($prices[$key] ,2,'.',',')}}</td>
                                <td>{{ $quantitys[$key] }} {{ $units[$key] }}</td>
                                <td>{{ number_format($total_prices[$key],2,'.',',') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>

                            <tr>
                                <td colspan="4" class="text-right"> Total </td>
                                <td colspan="">{{ number_format($invoice->purchase->total ,2,'.',',') }}</td>
                            </tr>
                            <tr>
                                <td colspan="4" class="text-right"> Service Charge </td>
                                <td>{{ number_format($invoice->purchase->service_charge ,2,'.',',') }}</td>
                            </tr>
                            <tr>
                                <td colspan="4" class="text-right"> Shipping Charge </td>
                                <td>{{ number_format($invoice->purchase->shipping_charge,2,'.',',')  }}</td>
                            </tr>

                            <tr>
                                <td colspan="4" class="text-right"> Total Amount </td>
                                <td>{{ number_format($invoice->purchase->total_amount,2,'.',',')  }}</td>
                            </tr>
                            <tr>
                                <td colspan="4" class="text-right"> Discount </td>
                                <td>{{ number_format($invoice->purchase->discount ,2,'.',',') }}</td>
                            </tr>
                            <tr>
                                <td colspan="4" class="text-right"> Payable Amount </td>
                                <td>{{ number_format($invoice->purchase->payable_amount,2,'.',',')  }}</td>
                            </tr>
                            <tr>
                                <td colspan="4" class="text-right"> Paid </td>
                                <td>{{ number_format($invoice->purchase->paid ,2,'.',',') }}</td>
                            </tr>
                            <tr>
                                <td colspan="4" class="text-right"> Due </td>
                                <td>{{ number_format($invoice->purchase->due ,2,'.',',') }}</td>
                            </tr>
                        </tfoot>
                    </table>
                </div> --}}
            </div>

        </div>
        <div class="card-footer">
            <button class="btn-block btn btn-success btn-sm" type="button" onclick="printDiv('PurchaseDuePay')">Print</button>
            {{-- <a href="{{ route('project.purchase.view', $invoice->purchase->id) }}" class="btn-block btn btn-danger btn-sm">back</a> --}}
        </div>
    </div>
</div>

{{-- <script>
    function printDiv(divName) {

        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();
        // $('.example-screen').removeClass("none");

        document.body.innerHTML = originalContents;

    }
 </script> --}}

@endsection
