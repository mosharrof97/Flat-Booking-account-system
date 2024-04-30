@extends('Project-Panel.Partial.Layout')
@section('content')
<div class="row justify-content-center">
    <div class="col-lg-12 col-sm-12">
        <div class="card p-4">
            <div class="card-header">
                <h4>Flat Sale</h4>
                <div class="">
                    <a class="btn btn-success" href="{{ route('payment.from', $flat->id) }}">Payment</a>
                    <a class="btn btn-danger" href="{{ url()->previous() }}">back</a>
                </div>
            </div>
            <div class="card-body">
                <div>
                    @if (Session::has('message'))
                    <h4 class="text-success ">{{ Session::get('message') }}</h4>
                    @endif

                    @if (Session::has('error'))
                    <h4 class="text-danger">{{ Session::get('error') }}</h4>
                    @endif
                </div>
                <div class="col-md-12">
                    <div class="text-center">
                        <h2 class="fw-bold">{{ $flat->project->projectName }}</h2>
                        <h4><b>Address:</b> {{ $flat->project->address.', '.$flat->project->city.', '.$flat->project->address }}</h4>
                        <h4>{{ $flat->project->district->name.'- '.$flat->project->zipCode}}</h4>
                    </div>
                </div>

                <div class="col-sm-12 p-2 " style="background-color: #abecfc">
                    <h2 class="fst-italic fw-bold p-0">Flat Information</h2>
                </div>

                <div class="col-lg-3  col-md-4 col-sm-6">
                    <table class="table table-borderless">
                        <tbody>

                            <style>
                                th,
                                td {
                                    padding: 0.4rem !important;
                                }

                            </style>

                            <tr>
                                <th colspan="">Flat Name / Number </th>
                                <td><b>:</b></td>
                                <td>{{ $flat->name }}</td>
                            </tr>

                            <tr>
                                <th colspan="">Floor </th>
                                <td><b>:</b></td>
                                <td>{{ $flat->floor }}</td>
                            </tr>

                            <tr>
                                <th colspan="">Flat Area </th>
                                <td><b>:</b></td>
                                <td>{{ $flat->flat_area }}</td>
                            </tr>

                            <tr>
                                <th colspan="">Price </th>
                                <td><b>:</b></td>
                                <td>{{ $flat->price *  $flat->flat_area}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card-header" style="background-color: #abecfc">
                <h3 class=" fw-bold fst-italic p-0">Client Information</h3>
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
                            <td colspan="3" style="width: 77%">{{ $flat->client->name }}</td>
                        </tr>
                        <tr>
                            <th scope="row" style="width: 20%">Phone</th>
                            <td colspan="" style="width: 3%">:</td>
                            <td colspan="3" style="width: 77%">{{ $flat->client->phone }}</td>
                        </tr>
                        <tr>
                            <th scope="row" style="width: 20%">Email</th>
                            <td colspan="" style="width: 3%">:</td>
                            <td colspan="3" style="width: 77%">{{ $flat->client->email }}</td>
                        </tr>
                        <tr>
                            <th scope="row" style="width: 20%">NID</th>
                            <td colspan="" style="width: 3%">:</td>
                            <td colspan="3" style="width: 77%">{{ $flat->client->nid }}</td>
                        </tr>

                        <tr>
                            <th scope="row" style="width: 20%">TIN</th>
                            <td colspan="" style="width: 3%">:</td>
                            <td colspan="3" style="width: 77%">{{ $flat->client->tin }}</td>
                        </tr>

                        {{-- <tr>
                            <th scope="row" style="width: 20%">Flat Price</th>
                            <td colspan="" style="width: 3%">:</td>
                            <td colspan="3" style="width: 77%">{{ $flat->flatSaleInfo}}</td>
                        </tr> --}}

                        <tr>
                            <th scope="row" style="width: 20%">Active status</th>
                            <td colspan="" style="width: 3%">:</td>
                            <td colspan="3" style="width: 77%">{{ $flat->client->active_status }}</td>
                        </tr>

                    </table>
                </div>

                <div class="row">
                    <div class="col-md-12 mb-4 p-2" style="background-color: #abecfc">
                        <h3 class="fw-bold fst-italic p-0">Address Details</h3>
                    </div>
                    {{-- <table class="table table-borderless"> --}}

                    <div class="col-md-6 col-12">
                        <h4>Present Address</h4>
                        <table class="table">
                            <tr>
                                <th scope="row" style="width: 20%">Address</th>
                                <td colspan="" style="width: 3%">:</td>
                                <td colspan="3" style="width: 77%">{{ $flat->client->clientAddress->pre_address }}</td>
                            </tr>
                            <tr>
                                <th scope="row" style="width: 20%">ZIP Code</th>
                                <td colspan="" style="width: 3%">:</td>
                                <td colspan="3" style="width: 77%"> {{ $flat->client->clientAddress->pre_zipCode}}</td>
                            </tr>
                            <tr>
                                <th scope="row" style="width: 20%">City</th>
                                <td colspan="" style="width: 3%">:</td>
                                <td colspan="3" style="width: 77%">{{ $flat->client->clientAddress->pre_city }}</td>
                            </tr>
                            <tr>
                                <th scope="row" style="width: 20%">District</th>
                                <td colspan="" style="width: 3%">:</td>
                                <td colspan="3" style="width: 77%">{{ $flat->client->clientAddress->pre_district }}</td>
                            </tr>
                        </table>
                    </div>

                    <div class="col-md-6 col-12">
                        <h4>Present Address</h4>
                        <table class="table">
                            <tr>
                                <th scope="row" style="width: 20%">Address</th>
                                <td colspan="" style="width: 3%">:</td>
                                <td colspan="3" style="width: 77%">{{ $flat->client->clientAddress->per_address }}</td>
                            </tr>
                            <tr>
                                <th scope="row" style="width: 20%">ZIP Code</th>
                                <td colspan="" style="width: 3%">:</td>
                                <td colspan="3" style="width: 77%"> {{ $flat->client->clientAddress->per_zipCode}}</td>
                            </tr>
                            <tr>
                                <th scope="row" style="width: 20%">City</th>
                                <td colspan="" style="width: 3%">:</td>
                                <td colspan="3" style="width: 77%">{{ $flat->client->clientAddress->per_city }}</td>
                            </tr>
                            <tr>
                                <th scope="row" style="width: 20%">District</th>
                                <td colspan="" style="width: 3%">:</td>
                                <td colspan="3" style="width: 77%">{{ $flat->client->clientAddress->per_district }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="my-4 bg-success p-2" style="background-color: #abecfc">
                    <h3 class="fw-bold fst-italic text-center">Payment</h3>
                </div>
                <div class="">
                    <table class="table table-bordered">
                        <thead class="table-primary">
                            <tr>
                                <th scope="col" class="flex-wrap">SL</th>
                                <th scope="col" class="flex-wrap">Payment Type</th>
                                <th scope="col" class="flex-wrap">Bank Name</th>
                                <th scope="col" class="flex-wrap">Branch</th>
                                <th scope="col" class="flex-wrap">Account Number</th>
                                <th scope="col" class="flex-wrap">Check Number</th>
                                <th scope="col" class="flex-wrap">Amount</th>
                                {{-- <th scope="col" class="flex-wrap">Received_by</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $payments as $key => $payment )
                            <tr>
                                <td scope="row">{{ $key + 1 }}</td>
                                <td>{{ $payment->payment_type }}</td>
                                <td>{{ $payment->bank_name }}</td>
                                <td>{{ $payment->branch }}</td>
                                <td>{{ $payment->account_number }}</td>
                                <td>{{ $payment->check_number}}</td>
                                <td>{{ $payment->amount}}</td>
                                {{-- <td>{{ $payment->user->name}}</td> --}}
                                {{-- <td>{{ $payment->check_number}}</td>
                                <td>{{ $total_prices[$key] }}.00</td> --}}
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>

                            <tr>
                                <td colspan="6" class="text-right"> Total </td>
                                <td colspan="">{{ $payment->sum('amount') }}</td>
                            </tr>
                            {{-- <tr>
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
                            </tr>--}}
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {



    });

</script>
@endsection
