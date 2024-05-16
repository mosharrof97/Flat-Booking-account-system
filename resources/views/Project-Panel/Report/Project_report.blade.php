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
                        {{-- Vendor Report --}}
                        <div class="col-md-6">
                            <div class="">
                                <h4>Vendor Report</h4>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
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
                                        @foreach ($purchases as $key => $purchase)
                                            <tr>
                                                <th scope="row" style="min-width:50px;">{{ $key + 1 }}</th>
                                                <td>{{ $purchase->vendor->name }}</td>
                                                <td>{{ $purchase->total_payable_amount }}</td>
                                                <td>{{ $purchase->total_paid }}</td>
                                                <td>{{ $purchase->total_due }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr class="">
                                            <th>SL</th>
                                            <th>Total</th>
                                            <th>{{ $purchases->SUM('total_payable_amount') }}</th>
                                            <th>{{ $purchases->SUM('total_paid') }}</th>
                                            <th>{{ $purchases->SUM('total_due') }}</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="mt-3">
                                {{ $purchases->links('pagination::bootstrap-5') }}
                            </div>
                        </div>

                        {{-- Purchase Total Report --}}
                        <div class="col-md-6">
                            <div class="">
                                <h4>Purchase Report</h4>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr class="table-info">
                                            <th>SL</th>
                                            <th>Date</th>
                                            <th>Purchase</th>
                                            <th>debit</th>
                                            <th>credit</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($purchaseReport as $key => $value)
                                            <tr>
                                                <th scope="row" style="min-width:50px;">{{ $key + 1 }}</th>
                                                <td>{{ $value->date }}</td>
                                                <td>{{ $value->total_payable_amount }}</td>
                                                <td>{{ $value->total_paid }}</td>
                                                <td>{{ $value->total_due }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr class="">
                                            <th>SL</th>
                                            <th>Total</th>
                                            <th>{{ $purchaseReport->SUM('total_payable_amount') }}</th>
                                            <th>{{ $purchaseReport->SUM('total_paid') }}</th>
                                            <th>{{ $purchaseReport->SUM('total_due') }}</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="mt-3">
                                {{ $purchaseReport->links('pagination::bootstrap-5') }}
                            </div>
                        </div>

                        {{-- Expense Total Report --}}
                        <div class="col-md-6">
                            <div class="">
                                <h4>Expense Report</h4>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr class="table-info">
                                            <th>SL</th>
                                            <th>Date</th>
                                            <th>Expense</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($expenses as $key => $expense)
                                            <tr>
                                                <th scope="row" style="min-width:50px;">{{ $key + 1 }}</th>
                                                <td>{{ $expense->date->format('d-M-y') }}</td>
                                                <td>{{ $expense->total_amount }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr class="">
                                            <th>SL</th>
                                            <th>Total</th>
                                            <th>{{ $expenses->SUM('total_amount') }}</th>
                                        </tr>
                                    </tfoot>
                                    </tbody>
                                </table>
                            </div>
                            <div class="mt-3">
                                {{ $expenses->links('pagination::bootstrap-5') }}
                            </div>
                        </div>

                        {{-- Flat Sale Total Report --}}
                        <div class="col-md-6">
                            <div class="">
                                <h4>Flat Sale Report</h4>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr class="table-info">
                                            <th>SL</th>
                                            <th>Flat & Client Name</th>
                                            <th>Sold Price</th>
                                            <th>debit</th>
                                            <th>credit</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($flats as $key => $flat)
                                            <tr>
                                                <th scope="row" style="min-width:50px;">{{ $key + 1 }}</th>
                                                <td>{{ $flat->name .'-'. $flat->client->name }}</td>
                                                <td>{{ $flat->flatSaleInfo->SUM('price') }}</td>
                                                <td>{{ $flat->payment->SUM('amount') }}</td>
                                                <td>{{ $flat->flatSaleInfo->SUM('price') - $flat->payment->SUM('amount') }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr class="">
                                            <th>SL</th>
                                            <th>Total</th>
                                            <th>{{ $flats->flatSaleInfo->SUM('price') }}</th>
                                            <th>{{ $flats->payment->SUM('amount') }}</th>
                                            <th>{{ $flats->flatSaleInfo->SUM('price') - $flat->payment->SUM('amount') }}</th>
                                        </tr>
                                    </tfoot>
                                    </tbody>
                                </table>
                            </div>
                            <div class="mt-3">
                                {{ $expenses->links('pagination::bootstrap-5') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
