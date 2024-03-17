@extends('Admin-Panel.partial.Layout')
@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-10 col-sm-12">

            <div class="card p-4">
                <div class="card-header">
                    <h3>Investor Information</h3>
                </div>
                <div class="card-body">
                    <form class="row g-3" action="{{ route('store_investor') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-12">
                            <label for="name" class="form-label">Full Name</label>
                            <input type="text" class="form-control" id="name" name="name">
                            @error('name')
                                <span id="" class="form-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="phone" class="form-control" id="phone" name="phone">
                            @error('phone')
                                <span id="" class="form-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email">
                            @error('email')
                                <span class="form-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password">
                            @error('password')
                                <span class="form-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="password_confirmation" class="form-label">Confirmation Password</label>
                            <input type="password" class="form-control" id="password_confirmation"
                                name="password_confirmation">
                            @error('password_confirmation')
                                <span class="form-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" class="form-control" id="address" placeholder="1234 Main St"
                                name="address">
                            @error('address')
                                <span class="form-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        {{-- <div class="col-12">
                        <label for="inputAddress2" class="form-label">Address 2</label>
                        <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
                    </div> --}}
                        <div class="col-md-6">
                            <label for="city" class="form-label">City</label>
                            <input type="text" class="form-control" id="city" name="city">

                            @error('city')
                                <span class="form-text text-danger">{{ $message }}</span>
                            @enderror
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

                                @error('district')
                                    <span class="form-text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-2">
                            <label for="zipCode" class="form-label">Zip Code</label>
                            <input type="text" class="form-control" id="zipCode" name="zipCode">

                            @error('zipCode')
                                <span class="form-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>


                        <div class="col-md-12">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" class="form-control" id="image" name="image">

                            @error('image')
                                <span class="form-text text-danger">{{ $message }}</span>
                            @enderror
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
