@extends('Project-Panel.Partial.Layout')
@section('content')
<div class="row justify-content-center">
    <div class="col-lg-12 col-sm-12">

        <div class="card p-4">
            <div class="card-header ">
                <div class="col-sm-12 text-center">
                    <h3 class=" font-weight-bold font-italic mt-3">Project Report</h3>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="">
                            <h4>Vendor Report</h4>
                        </div>
                        <div class="table-responsive">
                            <table class="table" >
                                <thead>
                                    <tr class="table-info">
                                        <th>SL</th>
                                        <th>Name</th>
                                        <th>Purchase</th>
                                        <th>debit</th>
                                        <th>credit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($purchases as $key => $purchase)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $purchase->vendor->name }}</td>
                                        <td>{{ $purchase->total_payable_amount }}</td>
                                        <td>{{ $purchase->total_paid }}</td>
                                        <td>{{ $purchase->total_due }}</td>
                                    </tr>
                                    @endforeach                                    
                                </tbody>                                
                            </table>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="">
                            <h4>Vendor Report</h4>
                        </div>
                        <div class="table-responsive">
                            <table class="table" >
                                <thead>
                                    <tr class="table-info">
                                        <th>SL</th>
                                        <th>Name</th>
                                        <th>Purchase</th>
                                        <th>debit</th>
                                        <th>credit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($purchases as $key => $purchase)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $purchase->vendor->name }}</td>
                                        <td>{{ $purchase->total_payable_amount }}</td>
                                        <td>{{ $purchase->total_paid }}</td>
                                        <td>{{ $purchase->total_due }}</td>
                                    </tr>
                                    @endforeach                                    
                                </tbody>                                
                            </table>
                        </div>
                    </div>
                </div>            
            </div>
        </div>
    </div>
</div>
@endsection
