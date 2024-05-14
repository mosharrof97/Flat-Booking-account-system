@extends('Project-Panel.Partial.Layout')
@section('content')
<div class="row justify-content-center">
    <div class="col-lg-12 col-sm-12">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('project.investment.list') }}" class="btn btn-danger">Back</a>
                
                @if($investment->total_Investment == $installment->sum('installment_amount'))
                <button class="btn btn-danger">paid</button>
                @else
                <a href="{{ route('project.installment',$investment->id) }}" class="btn btn-success">Installment</a>
                @endif

            </div>
        </div>
        <div class="card p-4">
           
            <div class="card-header flex-column justify-content-center p-4">
                <div style=" text-align: center; ">
                    <img src="{{ asset('upload/CompanyInfo/'. $comInfo->logo) }}"
                        style="width: 200px;height: 125px;/* background: #262323; */" alt="">
                    <div style=" font-size: 23px; font-weight: 700; ">
                        <h2 class="fw-bold">{{ $comInfo->name }}</h2>
                        <h4 class="fw-semibold"> {{ $comInfo->email }}</h4>
                        <h4 class="fw-semibold">{{ $comInfo->address }}.</h4>
                    </div>  
                    {{--  <div style=" font-size: 23px; font-weight: 700; ">Mobile : 01700-672492</div><br>  --}}
                </div>

                <center>
                    <h3 class="mb-0"><b><u>Payment Voucher</u></b></h3>
                </center>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <style>
                        /* .table-information {
                            width: 100%;
                            margin-bottom: 1rem;
                            color: #BDBDC7;
                        } */

                        .table-information tbody th,
                        .table-information tbody td {
                            padding: 0.2rem !important;
                        }

                    </style>
                    <div class="col-lg-3  col-md-4 col-sm-6">
                        <table class="table-information table table-borderless">
                            <tbody>
                                <tr>
                                    <th scope="row" ><h4>Name</h4> </th>
                                    <td colspan="" >:</td>
                                    <td colspan="3" >{{ $investment->client->name }}</td>
                                </tr>
                                <tr>
                                    <th scope="row" ><h4>Phone</h4></th>
                                    <td colspan="" >:</td>
                                    <td colspan="3" >{{ $investment->client->phone }}</td>
                                </tr>
                                <tr>
                                    <th scope="row" ><h4>Email</h4></th>
                                    <td colspan="" >:</td>
                                    <td colspan="3" >{{ $investment->client->email }}</td>
                                </tr>
                                <tr>
                                    <th scope="row" >Project Name</th>
                                    <td colspan="" >:</td>
                                    <td colspan="3" >{{ $investment->project->projectName }}</td>
                                </tr>
                                <tr>
                                    <th scope="row" >Project Status </th>
                                    <td colspan="" >:</td>
                                    @if ($investment->project->status == 0)
                                        <td colspan="3" >
                                            <div class="d-flex align-items-center">
                                                <span class="bg-info p-2 me-1 rounded-circle "></span>
                                                <span class="text-info">On going</span>
                                            </div>
                                        </td>
                                    @elseif ($investment->project->status == 1)
                                        <td colspan="3" >
                                            <div class="d-flex align-items-center">
                                                <span class="bg-success p-2 me-1 rounded-circle">.</span>
                                                <span class="text-success">Complete</span>
                                            </div>
                                        </td>
                                    @endif

                                </tr>
                                <tr>
                                    <th scope="row" >Investment Total Amount</th>
                                    <td colspan="" >:</td>
                                    <td colspan="3" >{{ $investment->total_Investment }} BDT</td>
                                </tr>
                                <tr>
                                    <th scope="row" >Installment</th>
                                    <td colspan="" >:</td>
                                    <td colspan="3" >{{ $installment->count() }} Installment</td>
                                </tr>
                                <tr>
                                    <th scope="row" >Paid Amount</th>
                                    <td colspan="" >:</td>
                                    <td colspan="3" >{{ $installment->sum('installment_amount') }} BDT</td>
                                </tr>
                                <tr>
                                    <th scope="row" >Due Amount</th>
                                    <td colspan="" >:</td>
                                    <td colspan="3" >{{ $investment->total_Investment - $installment->sum('installment_amount') }} BDT</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
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
            </div>
        </div>
    </div>
</div>

@endsection
