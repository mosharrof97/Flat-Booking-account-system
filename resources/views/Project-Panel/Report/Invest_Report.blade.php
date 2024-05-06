@extends('Project-Panel.Partial.Layout')
@section('content')
<div class="row justify-content-center">
    <div class="col-lg-11 col-sm-12">

        <div class="card p-4">
            <div class="card-header ">
                <div class="col-sm-12 text-center">
                    <h4 class=" font-weight-bold font-italic mt-3">Investment Report</h4>
                </div>
            </div>
            <div class="card-body">
                <div class="">
                    <form action="" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-lg-4 mt-3">
                                <select name="name" id="name" class="form-select">
                                    <option value="">All Client</option>
                                    <option value="">All Client</option>
                                </select>
                            </div>

                            <div class="col-lg-4 mt-3">
                                <input type="date" name="start_date" id="start_date" class="form-control">
                            </div>

                            <div class="col-lg-4 mt-3">
                                <input type="date" name="end_date" id="end_date" class="form-control">
                            </div>

                            <div class="col-lg-4 mt-3 text-end">
                                <input type="submit" class="btn btn-primary" value="Submit">
                            </div>
                        </div>
                    </form>
                </div>

                <div class="table-responsive bg-white" data-mdb-perfect-scrollbar="true" style="position: relative; height: 445px;">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">SL</th>
                                <th scope="col">Client Name</th>
                                <th scope="col">invest</th>
                                <th scope="col">profit (Fixed/Percentage)</th>
                                <th scope="col">Date</th>
                                <th scope="col">invest Amount</th>
                                <th scope="col">Method</th>
                                <th scope="col">Received by</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($installment as $key => $value)
                            <tr>
                                <th scope="row" style="color: #666666;">{{ $key + 1 }}</th>
                                <td>{{ $value->investment->client->name }}</td>
                                <td>{{ $value->investment->total_Investment }}</td>
                                @if($value->investment->profit == 'fixed')
                                <td>{{ $value->investment->profit }}</td>
                                @elseif($value->investment->profit == 'percentage')
                                <td>{{ $value->investment->profit }}</td>
                                @endif

                                <td>{{ $value->created_at->format('d-M-y') }}</td>
                                <td>{{ $value->installment_amount }}</td>
                                <td>{{ $value->payment_type }}</td>
                                <td>Admin</td>
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
