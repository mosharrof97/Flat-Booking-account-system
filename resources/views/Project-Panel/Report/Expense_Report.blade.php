@extends('Project-Panel.Partial.Layout')
@section('content')
<div class="row justify-content-center">
    <div class="col-lg-12 col-sm-12">

        <div class="card p-4">
            <div class="card-header ">
                <div class="col-sm-12 text-center">
                    <h3 class=" font-weight-bold font-italic mt-3">Expense Report</h3>
                </div>
            </div>
            <div class="card-body">
                <div class="">
                    <form action="{{ route('expense.report') }}" method="get">
                        @csrf
                        <div class="row">
                            <div class="col-lg-4 mt-3">
                                <select name="name" id="name" class="form-select" value="{{ old('name') }}">>
                                    <option value="">All Client</option>
                                    {{-- @foreach($client as $key => $value)
                                    <option value="{{ $value->id }}">{{ $value->name }}</option >
                                    @endforeach --}}
                                </select>
                            </div>

                            <div class="col-lg-4 mt-3">
                                <input type="date" name="start_date" id="start_date" class="form-control" value="{{ old('start_date') }}">
                            </div>

                            <div class="col-lg-4 mt-3">
                                <input type="date" name="end_date" id="end_date" class="form-control" value="{{ old('end_date') }}">
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
                                <th scope="col" style="min-width: 50px">SL</th>
                                <th scope="col">Expense Date</th>
                                <th scope="col">Name</th>
                                <th scope="col">Total Price</th>
                                <th scope="col">Created by</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($expense as $key => $value)
                            @php
                                $names = json_decode($value->name)
                            @endphp
                            <tr>
                                <th scope="row" style="min-width:50px;">{{ $key + 1 }}</th>
                                <td>{{ $value->date->format('d-M-y') }}</td>
                                <td>
                                    @foreach($names as $key => $name)
                                        <span>{{ $name }}, </span>
                                    @endforeach
                                </td>
                                <td>{{ $value->total}}</td>
                                <td>{{ $value->project->user->name}}</td>
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

