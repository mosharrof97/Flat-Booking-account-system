@extends('Admin-Panel.partial.Layout')
@section('content')
<div class="row justify-content-center">
    <div class="col-lg-10 col-sm-12">

        <div class="card p-4">
            <div class="card-header">
                <h3>Investment Information</h3>
            </div>
            <div class="card-body">
                <form class="" action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="phone" class="form-label">Phone</label>
                            <div class="mr-1 ">
                                <input class="form-control bg-light" list="phoneOptions" id="phone" placeholder="Select phone" name="phone">
                                <datalist id="phoneOptions">
                                    <option value="PRITOM SARKER"> </option>
                                    <option value="Joy Roy 2"></option>
                                    <option value="Labib Kumar"></option>
                                    <option value="Joy Roy"></option>
                                    <option value="Indrajit debnath"></option>
                                    <option value="MEHEDI HASAN"></option>
                                    <option value="DELUARA HOSEN"></option>
                                    <option value="Shahedul Islam"></option>
                                    <option value="Md Ruhul Amin"></option>
                                    <option value="Kanoc Roy"></option>
                                    <option value="Golam Rabbani"></option>
                                    <option value="Joy Karmokar"></option>
                                    <option value="Md.Sabbir Sheikh"></option>
                                    <option value="Md Rasheduzaman"></option>
                                    <option value="Md Mehedi Hasan"></option>
                                    <option value="Zafor Iqbal"></option>
                                    <option value="Md Iqbal Hossain"></option>
                                    <option value="Arifur Rahman Hamza"></option>
                                    <option value="Md shozib hossen"></option>
                                </datalist>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="name" class="form-label">Full Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="" disabled>

                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="" disabled>
                        </div>
                        <div class="col-md-6">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" value="" disabled>
                        </div>

                        <div class="col-12">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" class="form-control" id="address" placeholder="1234 Main St" name="address" value="" disabled>
                        </div>
                        <div class="col-md-6">
                            <label for="city" class="form-label">City</label>
                            <input type="text" class="form-control" id="city" name="city" value="" disabled>
                        </div>
                        <div class="col-md-4">
                            <label for="district" class="form-label">District</label>
                            <input type="text" class="form-control" id="district" name="district" value="" disabled>

                        </div>
                        <div class="col-md-2">
                            <label for="zipCode" class="form-label">Zip Code</label>
                            <input type="text" class="form-control" id="zipCode" name="zipCode" value="" disabled>
                        </div>

                        {{-- Project details & Investment--}}
                        <hr>
                        <div class="col-md-12">
                            <h4>Project details</h4>

                        </div>

                        <div class="col-md-6">
                            <label for="project_id" class="form-label">Project Name</label>
                            {{-- <input type="text" class="form-control" id="name" name="name"> --}}
                            <div class="mr-1 ">
                                <input class="form-control bg-light" list="projectList" id="project_id" name="project_id" placeholder="Select Project Name.....">
                                <datalist id="projectList">
                                    <option value="PRITOM SARKER"> </option>
                                    <option value="Joy Roy 2"></option>
                                    <option value="Labib Kumar"></option>
                                    <option value="Joy Roy"></option>
                                    <option value="Indrajit debnath"></option>
                                    <option value="MEHEDI HASAN"></option>
                                    <option value="DELUARA HOSEN"></option>
                                    <option value="Shahedul Islam"></option>
                                    <option value="Md Ruhul Amin"></option>
                                    <option value="Kanoc Roy"></option>
                                    <option value="Golam Rabbani"></option>
                                    <option value="Joy Karmokar"></option>
                                    <option value="Md.Sabbir Sheikh"></option>
                                    <option value="Md Rasheduzaman"></option>
                                    <option value="Md Mehedi Hasan"></option>
                                    <option value="Zafor Iqbal"></option>
                                    <option value="Md Iqbal Hossain"></option>
                                    <option value="Arifur Rahman Hamza"></option>
                                    <option value="Md shozib hossen"></option>
                                </datalist>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="total_Investment" class="form-label">Investment Total Amount</label>
                            <input type="text" class="form-control" id="total_Investment" name="total_Investment">
                        </div>
                        <div class="col-md-6">
                            <label for="installment_type" class="form-label">Installment Type</label>
                            <select id="installment_type" class="form-select" name="installment_type">
                                <option value="">Select Installment Type.....</option>
                                <option value="fullPaid">Full Paid</option>
                                <option value="installment">Installment</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="profit_type" class="form-label">Profit Type</label>
                            <select  id="profit_type" class="form-select" name="profit_type">
                                <option value="">Select Profit Type.....</option>
                                <option value="percentage">percentage</option>
                                <option value="fixed">fixed</option>
                                <option value="flat">flat</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="profit" class="form-label">Profit</label>
                            <input type="text" class="form-control" id="profit" name="profit" placeholder="profit...">
                        </div>


                         {{-- Project Investment Installment--}}
                        <hr>
                        <div class="col-md-12">
                            <h2> Project Investment </h2>
                        </div>


                        <div class="col-md-6">
                            <label for="installment_amount" class="form-label">Installment Amount</label>
                            <input type="text" class="form-control" id="installment_amount" placeholder="Installment amount" name="installment_amount">
                        </div>

                        <hr>
                        <div class="col-md-12">
                            <div class="my-2">
                                <h3>Installment Details</h3>
                            </div>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Date</th>
                                        <th>Installment</th>
                                        <th>Installment Amoune</th>
                                        <th> Due Amoune</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>01</td>
                                        <td>01/02/2024</td>
                                        <td>1st Installment</td>
                                        <td>500000</td>
                                        <td>1000000</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3"> Total Investment</td>
                                        <td colspan="">500000</td>
                                        <td colspan="">1000000</td>
                                    </tr>
                                </tbody>
                            </table>
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
