@extends('Project-Panel.Partial.Layout')
@section('content')
<div class="row justify-content-center">
    <div class="col-lg-12 col-sm-12">
        <div class="card p-4">
            <div class="card-header">
                <h3>Expense List</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col" class="flex-wrap">SL</th>
                                <th scope="col" class="flex-wrap">Project</th>
                                <th scope="col" class="flex-wrap">Date</th>
                                <th scope="col" class="flex-wrap">Name</th>
                                <th scope="col" class="flex-wrap">Quantity</th>
                                <th scope="col" class="flex-wrap">Unit</th>
                                <th scope="col" class="flex-wrap">Price</th>
                                <th scope="col" class="flex-wrap">Total price</th>
                                <th scope="col" class="flex-wrap">Total </th>
                                <th scope="col" class="flex-wrap">Action</th>
                            </tr>
                        </thead>
                        <tbody >
                            @foreach ($expenses as $expense )
                            <tr>
                                <th scope="row">{{  $expense->id }}</th>

                                <td>{{ $expense->project_id }}</td>
                                <td>{{ $expense->date }}</td>
                                @php
                                    // $names = explode("**",$expense->name);

                                    $names = json_decode($expense->name);
                                    $quantitys = json_decode($expense->quantity);
                                    $units = json_decode($expense->unit);
                                    $prices = json_decode($expense->price);
                                    $total_prices = json_decode($expense->total_price);
                                @endphp
                                <td>
                                    @foreach ( $names as $key => $name)
                                        <p class="p-0 m-0">{{ $key+ 1}}. {{ $name }}, </p>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach ( $quantitys as $key => $quantity)
                                        <p class="p-0 m-0">{{ $key+ 1}}. {{ $name }}, </p>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach ( $units as $key => $unit)
                                        <p class="p-0 m-0">{{ $key+ 1}}. {{ $unit }}, </p>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach ( $prices as $key => $price)
                                        <p class="p-0 m-0">{{ $key+ 1}}. {{ $price }}, </p>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach ( $total_prices as $key => $totalPrice)
                                        <p class="p-0 m-0">{{ $key+ 1}}. {{ $totalPrice }}, </p>
                                    @endforeach
                                </td>
                                <td>{{ $expense->total }}</td>
                                <td>
                                    <a href="{{ route('project.expense.view',$expense->id) }} " class="btn btn-success">View</a>
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

@endsection
