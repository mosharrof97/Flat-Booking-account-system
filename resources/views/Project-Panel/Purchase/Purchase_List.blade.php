@extends('Project-Panel.Partial.Layout')
@section('content')
<div class="row justify-content-center">
    <div class="col-lg-12 col-sm-12">
        <div class="card p-4">
            <div class="card-header">
                <h4>Purchase List</h4>
                <a class="btn btn-primary" href="{{ route('project.purchase') }}">
                    <span class="nav-text">New purchase</span>
                </a>
            </div>
            <div class="card-body">
                <div class="">
                    {{-- <table class="table"> --}}
                    <table id="projectExpenseTable" class="display nowrap" style="width:100%">
                        <thead>

                            <tr>
                                <th scope="col" class="flex-wrap">SL</th>
                                <th scope="col" class="flex-wrap">Order No</th>
                                <th scope="col" class="flex-wrap">Memo No</th>
                                <th scope="col" class="flex-wrap">Vendor Name</th>
                                <th scope="col" class="flex-wrap">Phone</th>
                                <th scope="col" class="flex-wrap">Amount</th>
                                <th scope="col" class="flex-wrap">Date</th>
                                <th scope="col" class="flex-wrap">Created By</th>
                                <th scope="col" class="flex-wrap">Action</th>
                            </tr>
                        </thead>

                        <tbody >
                            @foreach ($purchases as $key => $purchase )
                            <tr>
                                <th scope="row">{{  $key + 1 }}</th>

                                {{-- <td>{{ $purchase->order_no }}</td> --}}
                                <td>{{  $purchase->id }}</td>
                                <td>{{ $purchase->memo_no  }}</td>
                                <td>{{ $purchase->vendor->name  }}</td>
                                <td>{{ $purchase->vendor->phone }}</td>
                                <td>{{ $purchase->total }}</td>
                                <td>{{ $purchase->date }}</td>
                                <td>{{ $purchase->created_by }}</td>

                                {{-- @php
                                    // $names = explode("**",$purchase->name);

                                    $names = json_decode($purchase->name);
                                    $quantitys = json_decode($purchase->quantity);
                                    $units = json_decode($purchase->unit);
                                    $prices = json_decode($purchase->price);
                                    $total_prices = json_decode($purchase->total_price);
                                @endphp
                                <td>
                                    @foreach ( $names as $key => $name)
                                        <p class="p-0 m-0">({{ $key+ 1}}). {{ $name }}, </p>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach ( $quantitys as $key => $quantity)
                                        <p class="p-0 m-0">({{ $key+ 1}}). {{ $quantity }}, </p>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach ( $units as $key => $unit)
                                        <p class="p-0 m-0">({{ $key+ 1}}). {{ $unit }}, </p>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach ( $prices as $key => $price)
                                        <p class="p-0 m-0">({{ $key+ 1}}). {{ $price }}, </p>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach ( $total_prices as $key => $totalPrice)
                                        <p class="p-0 m-0">({{ $key+ 1}}). {{ $totalPrice }}, </p>
                                    @endforeach
                                </td>
                                <td>{{ $purchase->total }}</td> --}}
                                <td>
                                    <a href="{{ route('project.purchase.view',$purchase->id) }} " class="btn btn-success">View</a>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    new DataTable('#projectExpenseTable'
    // , {
    //     layout: {
    //         topStart: {
    //             buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
    //         }
    //     }
    // }
    );
</script>
@endsection