@extends('Project-Panel.Partial.Layout')
@section('content')
<div class="row justify-content-center">
    <div class="col-lg-10 col-sm-12">

        <div class="card p-4">
            <div class="card-header">
                <h3>Investment Information</h3>
                <a href="{{ url()->previous() }}" class="btn btn-danger">back</a>

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
                            <th scope="row" style="width: 20%">Name </th>
                            <td colspan="" style="width: 3%">:</td>
                            <td colspan="3" style="width: 77%">{{ $investment->client->name }}</td>
                        </tr>
                        <tr>
                            <th scope="row" style="width: 20%">Phone</th>
                            <td colspan="" style="width: 3%">:</td>
                            <td colspan="3" style="width: 77%">{{ $investment->client->phone }}</td>
                        </tr>
                        <tr>
                            <th scope="row" style="width: 20%">Email</th>
                            <td colspan="" style="width: 3%">:</td>
                            <td colspan="3" style="width: 77%">{{ $investment->client->email }}</td>
                        </tr>
                        <tr>
                            <th scope="row" style="width: 20%">Project Name</th>
                            <td colspan="" style="width: 3%">:</td>
                            <td colspan="3" style="width: 77%">{{ $investment->project->projectName }}</td>
                        </tr>
                        <tr>
                            <th scope="row" style="width: 20%">Project Status </th>
                            <td colspan="" style="width: 3%">:</td>
                            @if ($investment->project->status == 0)
                                <td colspan="3" style="width: 77%">
                                    <div class="d-flex align-items-center">
                                        <span class="bg-info p-2 me-1 rounded-circle "></span>
                                        <span class="text-info">On going</span>
                                    </div>
                                </td>
                            @elseif ($investment->project->status == 1)
                                <td colspan="3" style="width: 77%">
                                    <div class="d-flex align-items-center">
                                        <span class="bg-success p-2 me-1 rounded-circle">.</span>
                                        <span class="text-success">Complete</span>
                                    </div>
                                </td>
                            @endif

                        </tr>
                        <tr>
                            <th scope="row" style="width: 20%">Investment Total Amount</th>
                            <td colspan="" style="width: 3%">:</td>
                            <td colspan="3" style="width: 77%">{{ $investment->total_Investment }} BDT</td>
                        </tr>
                        <tr>
                            <th scope="row" style="width: 20%">Installment</th>
                            <td colspan="" style="width: 3%">:</td>
                            <td colspan="3" style="width: 77%">{{ $installment->count() }} Installment</td>
                        </tr>
                        <tr>
                            <th scope="row" style="width: 20%">Paid Amount</th>
                            <td colspan="" style="width: 3%">:</td>
                            <td colspan="3" style="width: 77%">{{ $installment->sum('installment_amount') }} BDT</td>
                        </tr>
                        <tr>
                            <th scope="row" style="width: 20%">Due Amount</th>
                            <td colspan="" style="width: 3%">:</td>
                            <td colspan="3" style="width: 77%">{{ $investment->total_Investment - $installment->sum('installment_amount') }} BDT</td>
                        </tr>

                    </table>
                </div>
                <div class="mt-3">
                    <div class="d-flex align-items-center bg-success p-2 my-3">
                        {{-- <h4>Project Name:</h4>
                        <span class="ms-2 h6 text-dark">{{ $investment->project->projectName }}</span>--}}
                        <h4 class="m-0">Installment List</h4>
                    </div>
                    <table class="table">
                        <thead>
                            <tr class="table-success">
                                <th scope="col">SL</th>
                                <th scope="col">Date</th>
                                <th scope="col">Time</th>
                                <th scope="col">Installment</th>
                                <th scope="col">Paid Amount</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider border-dark">
                        {{-- <tbody> --}}
                            @foreach ($installment as $key => $data )
                            <tr>
                                <th scope="row" style="border-right: 1px solid #000000 !important">{{ $key + 1 }}</th>
                                <td>{{ $data->created_at->format('d-m-Y') }}</td>
                                <td>{{ $data->created_at->format('h:i A') }}</td>
                                <td>{{ $key+1}} Installment</td>
                                <td>{{ $data->installment_amount }}</td>
                            </tr>
                            @endforeach

                            <tr class="" style="border-top: 2px solid #000000 !important" >
                                <th scope="row"></th>
                                <td></td>
                                <td colspan="">
                                    <h4>Total</h4>
                                </td>
                                <td>{{ $installment->count() }} Installment</td>
                                <td>{{ $installment->sum('installment_amount') }}.00</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <hr>
                <form class="" action="{{ route('store.project.installment') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                        {{-- Project Investment Installment--}}
                        <hr>
                        <div class="col-md-12 bg-info py-2 mb-2">
                            <h4 class="m-0"> Project Investment </h4>
                        </div>
                        {{-- Investment Id --}}
                            <input type="hidden" class="form-control" id="" name="investment_id" value="{{ $investment->id }}">
                        {{-- Investment Id --}}

                        <div class="col-md-12">
                            <label for="installment_amount" class="form-label">Installment Amount</label>
                            <input type="text" class="form-control" id="installment_amount" placeholder="Installment amount" name="installment_amount">
                        </div>
                        <hr>
                        <div class="col-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="gridCheck">
                                <label class="form-check-label" for="gridCheck">
                                    Check me out
                                </label>
                            </div>
                        </div>

                        <div class="col-12 text-end">
                            <button type="submit " class="btn btn-primary ">Submit</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection
