@extends('Admin-Panel.partial.Layout')
@section('content')
<div class="row justify-content-center">
    <div class="col-lg-10 col-sm-12">

        <div class="card p-4">
            <div class="card-header">
                <h3>Investor Information</h3>
            </div>
            <div class="card-body">
                <div>
                    @if (Session::has('success'))
                    <p class="text-success">{{ Session::get('success') }}</p>
                    @endif

                    @if (Session::has('error'))
                    <p class="text-danger">{{ Session::get('error') }}</p>
                    @endif
                </div>
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
                        <label for="father_name" class="form-label">Father Name</label>
                        <input type="text" class="form-control" id="father_name" name="father_name">
                        @error('father_name')
                        <span id="" class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="mother_name" class="form-label">Mother Name</label>
                        <input type="text" class="form-control" id="mother_name" name="mother_name">
                        @error('mother_name')
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
                        <label for="nid" class="form-label">NID Number</label>
                        <input type="number" class="form-control" id="nid" name="nid">

                        @error('nid')
                        <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="tin" class="form-label">TIN Number</label>
                        <input type="number" class="form-control" id="tin" name="tin">

                        @error('tin')
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
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                        @error('password_confirmation')
                        <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header bg-primary">
                                <h4 class="text-light text-center">Address</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="card shadow-none border">
                                            <div class="card-header bg-info">
                                                <h4 class="text-light text-center">Present Address</h4>
                                            </div>
                                            <div class="card-body">
                                                <div class="mt-3">
                                                    <label for="pre_address" class="form-label">Address</label>
                                                    <input type="text" class="form-control" id="pre_address" placeholder="1234 Main St" name="pre_address">
                                                    @error('pre_address')
                                                    <span class="form-text text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <div class="mt-3">
                                                    <label for="pre_city" class="form-label">City</label>
                                                    <input type="text" class="form-control" id="pre_city" name="pre_city">

                                                    @error('pre_city')
                                                    <span class="form-text text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <div class="mt-3">
                                                    <label for="pre_district" class="form-label">District</label>
                                                    <div class="mr-1 ">
                                                        <input class="form-control bg-light" list="pre_districtOptions" id="pre_district" placeholder="Select District" name="pre_district">
                                                        <datalist id="pre_districtOptions">
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

                                                        @error('pre_district')
                                                        <span class="form-text text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="mt-3">
                                                    <label for="pre_zipCode" class="form-label">Zip Code</label>
                                                    <input type="text" class="form-control" id="pre_zipCode" name="pre_zipCode">

                                                    @error('pre_zipCode')
                                                    <span class="form-text text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card shadow-none border">
                                            <div class="card-header bg-info">
                                                <h4 class="text-light text-center">Permanent address</h4>
                                            </div>
                                            <div class="card-body">
                                                <div class="mt-3">
                                                    <label for="per_address" class="form-label">Address</label>
                                                    <input type="text" class="form-control" id="per_address" placeholder="1234 Main St" name="per_address">
                                                    @error('per_address')
                                                    <span class="form-text text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <div class="mt-3">
                                                    <label for="per_city" class="form-label">City</label>
                                                    <input type="text" class="form-control" id="per_city" name="per_city">

                                                    @error('per_city')
                                                    <span class="form-text text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <div class="mt-3">
                                                    <label for="per_district" class="form-label">District</label>
                                                    <div class="mr-1 ">
                                                        <input class="form-control bg-light" list="per_districtOptions" id="per_district" placeholder="Select per_District" name="per_district">
                                                        <datalist id="per_districtOptions">
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

                                                        @error('per_district')
                                                        <span class="form-text text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="mt-3">
                                                    <label for="per_zipCode" class="form-label">Zip Code</label>
                                                    <input type="text" class="form-control" id="per_zipCode" name="per_zipCode">

                                                    @error('per_zipCode')
                                                    <span class="form-text text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
