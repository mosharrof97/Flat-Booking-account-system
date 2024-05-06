@extends('Project-Panel.Partial.Layout')
@section('content')
<div class="row justify-content-center">
    <div class="col-lg-10 col-sm-12">

        <div class="card p-4">

            <div class="card-body">

                @php
                    // dd($installment->flatSale_id);
                @endphp
                <div class="col-md-12">
                    <div class="text-center">
                        <img src="{{ asset('upload/CompanyInfo/'. $comInfo->logo) }}" alt="" width="100">
                        <h2 class="fw-bold">{{ $comInfo->name }}</h2>
                        <h4 class="fw-semibold"><b>Email: </b> {{ $comInfo->email }}</h4>
                        <h4 class="fw-bold"><b>Project :</b> {{ $flatSaleInfo->flat->project->projectName }}</h3>
                        <h4><b>Address:</b> {{ $flatSaleInfo->flat->project->address.', '.$flatSaleInfo->flat->project->city.', '.$flatSaleInfo->flat->project->address }}</h4>
                        <h4>{{ $flatSaleInfo->flat->project->district->name.'- '.$flatSaleInfo->flat->project->zipCode}}</h4>
                    </div>
                </div>

                <div class="my-4">
                    <h3 class="fw-bold fst-italic text-center">Payment</h3>
                </div>

                <form class="" action="{{ route('payment.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row g-3">
                        {{-- Project Investment Installment--}}
                        {{-- <hr>
                        <div class="col-md-12">
                            <h4> Payment </h4>
                        </div> --}}
                        <input type="hidden" name="flatSaleInfo_id" id="flatSaleInfo_id" value="{{ $flatSaleInfo->id }}">

                        <div class="col-md-6">
                            <label for="payment_type" class="form-label">Payment Type</label>
                            {{-- <input type="text" class="form-control" id="payment_type" placeholder="Installment amount" name="payment_type"> --}}
                            <select name="payment_type" id="payment_type" class="form-select">
                                <option value="">select Payment Type...........</option>
                                <option value="cash">Cash</option>
                                <option value="bank">Bank</option>
                                <option value="check">Check</option>
                            </select>

                            @error('payment_type')
                                <span class="form-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="amount" class="form-label"> Amount</label>
                            <input type="text" class="form-control" id="amount" placeholder="Installment amount" name="amount">

                            @error('amount')
                                <span class="form-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <hr>

                        {{--*********** Bank Details *************--}}
                        <div class="mt-3" id="bank_details" style="display: none">
                            <h4>Bank Details</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="bank_name" class="form-label">Bank Name</label>
                                    <input type="text" class="form-control" id="bank_name" placeholder="Installment amount" name="bank_name">

                                    @error('bank_name')
                                    <span class="form-text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6" id="div_branch" >
                                    <label for="branch" class="form-label">Branch</label>
                                    <input type="text" class="form-control" id="branch" placeholder="Installment amount" name="branch">

                                    @error('branch')
                                    <span class="form-text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="account_number" class="form-label">Account Number</label>
                                    <input type="number" class="form-control" id="account_number" placeholder="Installment amount" name="account_number">

                                    @error('account_number')
                                    <span class="form-text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6" id="div_check_number" style="display: none">
                                    <label for="check_number" class="form-label">Check Number</label>
                                    <input type="number" class="form-control" id="check_number" placeholder="Installment amount" name="check_number">

                                    @error('check_number')
                                    <span class="form-text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        {{--*********** Bank Details *************--}}

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

<script>
    $(document).on('change', '#payment_type', function() {
        var payment_type = $(this).val();
        if (payment_type == 'bank' || payment_type == 'check' ) {
            $('#bank_details').css('display', 'block');
        }
        if (payment_type == 'check') {
            $('#div_check_number').css('display', 'block');
        }else if (payment_type == 'bank') {
            $('#div_check_number').css('display', 'none');
        }
    })
</script>


@endsection