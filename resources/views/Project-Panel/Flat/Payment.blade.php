@extends('Project-Panel.Partial.Layout')
@section('content')
<div class="row justify-content-center">
    <div class="col-lg-10 col-sm-12">

        <div class="card p-4">

            <div class="card-body">

                @php
                    // dd($flat);
                @endphp
                <div class="col-md-12">
                    <div class="text-center">
                        <h1 class="fw-bold">Flat Booking System</h1>
                        <h3 class="fw-bold"><b>Email :</b> flat@bookingsystem.com</h3>
                        <h4 class="fw-bold"><b>Project :</b> {{ $flat->project->projectName }}</h3>
                            <h4><b>Address:</b> {{ $flat->project->address.', '.$flat->project->city.', '.$flat->project->address }}</h4>
                            <h4>{{ $flat->project->district->name.'- '.$flat->project->zipCode}}</h4>
                    </div>
                </div>

                <div class="my-4">
                    <h3 class="fw-bold fst-italic text-center">Payment</h3>
                </div>

                <form class="" action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row g-3">
                        {{-- Project Investment Installment--}}
                        {{-- <hr>
                        <div class="col-md-12">
                            <h4> Payment </h4>
                        </div> --}}

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

                                <div class="col-md-6">
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
                            </div>
                        </div>
                        {{--*********** Bank Details *************--}}


                        {{--*********** Check Details *************--}}
                        <div class="mt-3" id="check_details" style="display: none">
                            <h4>Check Details</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="bank_name" class="form-label">Bank Name</label>
                                    <input type="text" class="form-control" id="bank_name" placeholder="Installment amount" name="bank_name">

                                    @error('bank_name')
                                        <span class="form-text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="check_number" class="form-label">Check Number</label>
                                    <input type="number" class="form-control" id="check_number" placeholder="Installment amount" name="check_number">

                                    @error('check_number')
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
                            </div>
                        </div>
                        {{--*********** Check Details *************--}}


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
    $(document).on('change', '#payment_type', function(){
        var payment_type = $(this).val();
        if(payment_type == 'bank'){
            $('#bank_details').css('display', 'block');
            $('#check_details').css('display', 'none');
        } else if(payment_type == 'check'){
            $('#check_details').css('display', 'block');
            $('#bank_details').css('display', 'none');

        }

    })

    $(document).ready(function(){
        $('#installment_amount').on('change', function(){
            var amount = $(this).val();
            var total_Investment = $('#total_Investment').val();
            if(total_Investment <= amount){
                alert("Installment Amount is greater than or equal to Total Investment");
            }
        });
    });
</script>


@endsection
