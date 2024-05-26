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
        <div class="card border-primary dash-card">
            <div class="card-body p-3 d-flex justify-content-between d-flex justify-content-between">
                <div class=" text-center">
                    <h5 class="card-result">{{  $allFlat }}</h5>
                    <h5 class="card-text">Total Flat </h5>
                </div>
                <div class="">
                    <div class="icon-circle bg-primary text-white">
                        <i class="fa-solid fa-download material-icons" width="50"></i> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6">
        <div class="card  dash-card" style="border-color:rgb(163, 80, 3)">
            <div class="card-body p-3 d-flex justify-content-between d-flex justify-content-between">
                <div class=" text-center">
                    <h5 class="card-result">{{  $complete_flat }}</h5>
                    <h5 class="card-text">Complate Flat</h5>
                </div>
                <div class="">
                    <div class="icon-circle  text-white" style="background-color: rgb(163, 80, 3)">
                        <i class="fa-solid fa-download material-icons" width="50"></i> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6">
        <div class="card  dash-card" style="border-color:#9ac500">
            <div class="card-body p-3 d-flex justify-content-between d-flex justify-content-between">
                <div class=" text-center">
                    <h5 class="card-result">{{  $under_contraction_flat }}</h5>
                    <h5 class="card-text">Under Constraction Flat</h5>
                </div>
                <div class="">
                    <div class="icon-circle  text-white" style="background-color: #9ac500">
                        <i class="fa-solid fa-download material-icons" width="50"></i> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6">
        <div class="card  dash-card" style="border-color:#01b4b4">
            <div class="card-body p-3 d-flex justify-content-between d-flex justify-content-between">
                <div class=" text-center">
                    <h5 class="card-result">1000</h5>
                    <h5 class="card-text">Totel Customer</h5>
                </div>
                <div class="">
                    <div class="icon-circle  text-white" style="background-color: #01b4b4">
                        <i class="fa-solid fa-download material-icons" width="50"></i> 
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-sm-6">
        <div class="card border-warning dash-card">
            <div class="card-body p-3 d-flex justify-content-between d-flex justify-content-between">
                <div class=" text-center">
                    <h5 class="card-result">1000</h5>
                    <h5 class="card-text">Totel Investor</h5>
                </div>
                <div class="">
                    <div class="icon-circle bg-warning text-white">
                        <i class="fa-solid fa-download material-icons" width="50"></i> 
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-sm-6">
        <div class="card  dash-card" style="border-color:#4b5819">
            <div class="card-body p-3 d-flex justify-content-between d-flex justify-content-between">
                <div class=" text-center">
                    <h5 class="card-result">{{  $sold_flat }}</h5>
                    <h5 class="card-text">Totel Sold</h5>
                </div>
                <div class="">
                    <div class="icon-circle  text-white" style="background-color: #4b5819">
                        <i class="fa-solid fa-download material-icons" width="50"></i> 
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-sm-6">
        <div class="card  dash-card" style="border-color:#940368">
            <div class="card-body p-3 d-flex justify-content-between d-flex justify-content-between">
                <div class=" text-center">
                    <h5 class="card-result">{{  $unsold_flat  }}</h5>
                    <h5 class="card-text">Totel Unsold Flat</h5>
                </div>
                <div class="">
                    <div class="icon-circle  text-white" style="background-color: #940368">
                        <i class="fa-solid fa-download material-icons" width="50"></i> 
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-sm-6">
        <div class="card  dash-card" style="border-color:#b62c65">
            <div class="card-body p-3 d-flex justify-content-between d-flex justify-content-between">
                <div class=" text-center">
                    <h5 class="card-result">1000</h5>
                    <h5 class="card-text">Totel Invest Amount</h5>
                </div>
                <div class="">
                    <div class="icon-circle  text-white" style="background-color: #b62c65">
                        <i class="fa-solid fa-download material-icons" width="50"></i> 
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-sm-6">
        <div class="card  dash-card" style="border-color:#3c768d">
            <div class="card-body p-3 d-flex justify-content-between d-flex justify-content-between">
                <div class=" text-center">
                    <h5 class="card-result">{{  $totalPurchase }}</h5>
                    <h5 class="card-text">Totel Purchase Amount</h5>
                </div>
                <div class="">
                    <div class="icon-circle  text-white" style="background-color: #3c768d">
                        <i class="fa-solid fa-download material-icons" width="50"></i> 
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-sm-6">
        <div class="card  dash-card" style="border-color:#6c2ffa">
            <div class="card-body p-3 d-flex justify-content-between d-flex justify-content-between">
                <div class=" text-center">
                    <h5 class="card-result">{{  $paidPurchase }}</h5>
                    <h5 class="card-text">Paid Purchase Amount</h5>
                </div>
                <div class="">
                    <div class="icon-circle  text-white" style="background-color: #6c2ffa">
                        <i class="fa-solid fa-download material-icons" width="50"></i> 
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-sm-6">
        <div class="card  dash-card" style="border-color:#53a885">
            <div class="card-body p-3 d-flex justify-content-between d-flex justify-content-between">
                <div class=" text-center">
                    <h5 class="card-result" >{{ $duePurchase }}</h5>
                    <h5 class="card-text" >Due Purchase Amount</h5>
                </div>
                <div class="">
                    <div class="icon-circle  text-white" style="background-color: #53a885">
                        <i class="fa-solid fa-download material-icons" width="50"></i> 
                    </div>
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
                                    <h5 class="card-result">{{  $data->name }} ({{ $data->district->name }})</h5>
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
