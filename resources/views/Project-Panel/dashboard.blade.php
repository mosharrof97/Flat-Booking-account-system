@extends('Project-Panel.Partial.Layout')
@section('content')
<div class="row mx-0 mb-4">
    <div class="col-12 p-md-0">
        <div class=" bg-info p-2">
            <h4 class="m-0">Project Name: {{ $project->projectName }} </h4>
        </div>

    </div>
</div>
 {{-- Total Report Summary  --}}
 <div class="row page-titles mx-0">
    <div class="col-12 p-md-0">
        <div class=" text-center">
            <h4>Total Report Summary </h4>
        </div>
    </div>
</div>

{{-- <div class="row page-titles mx-0 mb-2 p-2">
    <div class="col-12 p-md-0">
        <div class="d-flex justify-content-end">
            <div class="mr-1 ">
                <input class="form-control bg-light" list="datalistOptions" id="exampleDataList"
                    placeholder="Select Month">
                <datalist id="datalistOptions">
                    <option value="Jan">
                    <option value="Feb">
                    <option value="March">
                    <option value="April">
                    <option value="May">
                </datalist>
            </div>

            <div class="ml-1">
                <input class="form-control bg-light" list="datalistOptions" id="exampleDataList"
                    placeholder="Select Year">
                <datalist id="datalistOptions">
                    <option value="2020">
                    <option value="2021">
                    <option value="2022">
                    <option value="2023">
                    <option value="2024">
                </datalist>
            </div>
        </div>
    </div>
</div> --}}

<div class="row">

    <div class="col-lg-3 col-sm-6">
        <div class="card border-1 border-primary">
            <div class="stat-widget-one card-body p-3">
                <div class=" text-center">
                    <h5>{{ $allFlat }}</h5>
                    <h5>Total Flat </h5>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6">
        <div class="card border-1 border-primary">
            <div class="stat-widget-one card-body p-3">
                <div class=" text-center">
                    <h5>{{ $complete_flat }}</h5>
                    <h5>Complate Flat</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6">
        <div class="card border-1 border-primary">
            <div class="stat-widget-one card-body p-3">
                <div class=" text-center">
                    <h5>{{ $under_contraction_flat }}</h5>
                    <h5>Under Constraction Flat</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6">
        <div class="card border-1 border-primary">
            <div class="stat-widget-one card-body p-3">
                <div class=" text-center">
                    <h5>1000</h5>
                    <h5>Totel Customer</h5>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-sm-6">
        <div class="card border-1 border-primary">
            <div class="stat-widget-one card-body p-3">
                <div class=" text-center">
                    <h5>1000</h5>
                    <h5>Totel Investor</h5>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-sm-6">
        <div class="card border-1 border-primary">
            <div class="stat-widget-one card-body p-3">
                <div class=" text-center">
                    <h5>{{ $sold_flat }}</h5>
                    <h5>Totel Sold</h5>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-sm-6">
        <div class="card border-1 border-primary">
            <div class="stat-widget-one card-body p-3">
                <div class=" text-center">
                    <h5>{{ $unsold_flat  }}</h5>
                    <h5>Totel Unsold Flat</h5>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-sm-6">
        <div class="card border-1 border-primary">
            <div class="stat-widget-one card-body p-3">
                <div class=" text-center">
                    <h5>1000</h5>
                    <h5>Totel Invest Amount</h5>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-sm-6">
        <div class="card border-1 border-primary">
            <div class="stat-widget-one card-body p-3">
                <div class=" text-center">
                    <h5>{{ $totalExpense }}</h5>
                    <h5>Totel Expense Amount</h5>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-sm-6">
        <div class="card border-1 border-primary">
            <div class="stat-widget-one card-body p-3">
                <div class=" text-center">
                    <h5>{{ $paidExpense }}</h5>
                    <h5>Paid Expense Amount</h5>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-sm-6">
        <div class="card border-1 border-primary">
            <div class="stat-widget-one card-body p-3">
                <div class=" text-center">
                    <h5>{{ $dueExpense }}</h5>
                    <h5>Due Expense Amount</h5>
                </div>
            </div>
        </div>
    </div>

</div>
{{-- Total Report Summary  --}}


{{-- All Employee Report --}}
{{-- <div class="row page-titles mx-0">
    <div class="col-12 p-md-0">
        <div class=" text-center">
            <h4>All Employee Report </h4>
        </div>
    </div>
</div> --}}

{{-- <div class="row">
    @foreach ($user as $data)
        <div class="col-lg-3 col-sm-6">
            <div class="card shadow  rounded ">
                <div class="stat-widget-one card-body p-3">

                    <div class="row">
                        <div class="col-12 ">
                            <div class="row align-items-center">
                                <div class="col-4">
                                    <img src="{{ asset('upload/UserImage/' . $data->image) }}" alt=""
                                        width="55" height="50" class="pe-2">
                                </div>
                                <div class="col-8">
                                    <h5>{{ $data->name }} ({{ $data->district->name }})</h5>
                                </div>
                            </div>
                        </div>
                        <div class=" col-12 text-start ">
                            <table class="table">
                                <tr>
                                    <th class="text-dark m-0 p-1">Today Visit- </th>
                                    <td class="p-1">{{ $data->getTodayData() }} </td>
                                </tr>
                                <tr>
                                    <th class="text-dark m-0 p-1">Current Month - </th>
                                    <td class="p-1">{{ $data->runningMonthlyData() }}</td>
                                </tr>
                                <tr>
                                    <th class="text-dark m-0 p-1">Current Year- </th>
                                    <td class="p-1">{{ $data->runningYearlyData() }}</td>
                                </tr>
                                <tr>
                                    <th class="text-dark m-0 p-1">Appointment - </th>
                                    <td class="p-1">{{ $data->runningYearlyData() }}</td>
                                </tr>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div> --}}

@endsection
