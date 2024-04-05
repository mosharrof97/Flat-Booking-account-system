@extends('Admin-Panel.partial.Layout')
@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-10 col-sm-12">

            <div class="card p-4">
                <div class="card-header">
                    <h3>Customer Information</h3>
                </div>
                <div class="card-body">
                    <form class="row g-3" action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-12">
                            <label for="name" class="form-label">Full Name</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                        <div class="col-md-6">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="phone" class="form-control" id="phone" name="phone">
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email">
                        </div>
                        <div class="col-md-6">
                            <label for="nid" class="form-label">NID</label>
                            <input type="number" class="form-control" id="nid" name="nid">
                        </div>

                        <div class="col-12">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" class="form-control" id="address" placeholder="1234 Main St"
                                name="address">
                        </div>
                        <div class="col-md-6">
                            <label for="city" class="form-label">City</label>
                            <input type="text" class="form-control" id="city" name="city">
                        </div>
                        <div class="col-md-4">
                            <label for="district" class="form-label">District</label>
                            <div class="mr-1 ">
                                <input class="form-control bg-light" list="districtOptions" id="district"
                                    placeholder="Select District" name="district">
                                <datalist id="districtOptions">
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
                        <div class="col-md-2">
                            <label for="zipCode" class="form-label">Zip Code</label>
                            <input type="text" class="form-control" id="zipCode" name="zipCode">
                        </div>

                        <div class="col-md-12">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" class="form-control" id="image" name="image">
                        </div>
                        {{-- <div class="col-12">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="gridCheck">
                            <label class="form-check-label" for="gridCheck">
                                Check me out
                            </label>
                        </div>
                    </div> --}}
                        <div class="col-12 text-end">
                            <button type="submit " class="btn btn-primary ">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
