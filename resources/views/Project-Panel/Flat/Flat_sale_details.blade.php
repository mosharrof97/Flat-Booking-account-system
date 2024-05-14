@extends('Project-Panel.Partial.Layout')
@section('content')
<div class="row justify-content-center">
    <div class="col-lg-12 col-sm-12">
        <div class="card mb-2">
            <div class="card-header justify-content-end py-3">
                <div class="">
                    <a class="btn btn-success" href="{{ route('payment.from', $flat->id) }}">Payment</a>
                    <a class="btn btn-success" href="{{ route('return', $flat->id.'part=021364') }}">Flat Return</a>
                    <a class="btn btn-danger" href="{{ url()->previous() }}">back</a>
                </div>
            </div>
        </div>
        <div class="card p-4" id="saleDetails">
            <div class="card-header justify-content-center">
                <div class="text-center">
                    <img src="{{ asset('upload/CompanyInfo/'. $comInfo->logo) }}" alt="" width="100">
                    <h2 class="fw-bold">{{ $comInfo->name }}</h2>
                    <h4 class="fw-semibold"><b>Email: </b> {{ $comInfo->email }}</h4>
                    <h3 class="fw-bold"><b>Project:</b>{{ $flat->project->projectName }}</h3>
                    <h4><b>Address:</b> {{ $flat->project->address.', '.$flat->project->city.', '.$flat->project->address }}</h4>
                    <h4>{{ $flat->project->district->name.'- '.$flat->project->zipCode}}</h4>
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

                <div class="col-sm-12 p-2 " style="background-color: #c0f0fc">
                    <h4 class="fst-italic fw-bold p-0">Flat Information</h3>
                </div>

                <div class="col-lg-3  col-md-4 col-sm-6">
                    <table class="table table-borderless">
                        <tbody>

                            <style>
                                th,
                                td {
                                    padding: 0.2rem !important;
                                }

                            </style>

                            
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
                            @php
                                $address =$flat->client->clientAddress;
                            @endphp
                            <tr>
                                <th scope="row" style="width: 20%">Address</th>
                                <td colspan="" style="width: 3%">:</td>
                                <td colspan="3" style="width: 77%">{{ $address->pre_address.', '. $address->pre_city.', '.$address->pre_district.'- '.$address->pre_zipCode}}</td>
                            </tr>
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
                                <td>{{ $flatSale->price }}</td>
                            </tr>

                            <tr>
                                <th colspan="">Paid </th>
                                <td><b>:</b></td>
                                <td>{{ $payments->sum('amount')}}</td>
                            </tr>

                            <tr>
                                <th colspan="">Due </th>
                                <td><b>:</b></td>
                                <td>{{ $flatSale->price - $payments->sum("amount") }}</td>
                            </tr>
                                
                        </tbody>
                    </table>
                </div>
                
                <div class="my-4 bg-success p-2" style="background-color: #abecfc">
                    <h4 class="fw-bold fst-italic text-center">Payment</h4>
                </div>
                <div class="">
                    <table class="table table-bordered">
                        <thead class="table-primary">
                            <tr>
                                <th scope="col" class="flex-wrap">SL</th>
                                <th scope="col" class="flex-wrap">Date</th>
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
                                <th scope="row">{{ $key + 1 }}</th>
                                <td>{{ $payment->created_at->format('d-M-y') }}</td>
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
                                <td colspan="7" class="text-right"> Total </td>
                                <td colspan="">{{ $payments->sum('amount') }}.00</td>
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
        <div class="">
            <button class="btn btn-info" onclick="printDiv('saleDetails')">Print</button>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {



    });

</script>
@endsection
