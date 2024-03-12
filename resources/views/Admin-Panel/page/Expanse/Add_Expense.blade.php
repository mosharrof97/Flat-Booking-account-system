@extends('Admin-Panel.partial.Layout')
@section('content')
<div class="row justify-content-center">
    <div class="col-lg-10 col-sm-12">

        <div class="card p-4">
            <div class="card-header">
                <h3>Add New Project</h3>
            </div>
            <div class="card-body">
                <form class="" action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="projectName" class="form-label">Project Name</label>
                            <input type="text" class="form-control" id="projectName" name="projectName" value="" >
                        </div>

                        <div class="col-md-6">
                            <label for="land_area" class="form-label">Land Area</label>
                            <input type="text" class="form-control" id="land_area" name="land_area" value="" >
                        </div>

                        <div class="col-md-6">
                            <label for="budget" class="form-label">Project Budget</label>
                            <input type="text" class="form-control" id="budget" name="budget" value="" >
                        </div>

                        <div class="col-md-6">
                            <label for="duration" class="form-label">Project Duration</label>
                            <input type="text" class="form-control" id="duration" name="duration" value="" >
                        </div>

                        <div class="col-md-6">
                            <label for="floor" class="form-label">Floor</label>
                            <input type="text" class="form-control" id="floor" name="floor" value="" >
                        </div>

                        <div class="col-md-6">
                            <label for="flat" class="form-label">Flat</label>
                            <input type="text" class="form-control" id="flat" name="flat" value="" >
                        </div>

                        <div class="col-md-6">
                            <label for="flat_area" class="form-label">Flat Area</label>
                            <input type="text" class="form-control" id="flat_area" name="flat_area" value="" >
                        </div>

                        <div class="col-md-6">
                            <label for="start_date" class="form-label">Project Start Date</label>
                            <input type="date" class="form-control" id="start_date" name="start_date" value="" >
                        </div>

                        <div class="col-md-6">
                            <label for="end_date" class="form-label">Project End Date</label>
                            <input type="month" class="form-control" id="end_date" name="end_date" value="" >
                        </div>


                        <div class="col-12">
                            <hr>
                            <h4>Location</h4>
                            <hr>
                        </div>
                        <div class="col-12">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" class="form-control" id="address" placeholder="1234 Main St" name="address" value="" >
                        </div>
                        <div class="col-md-6">
                            <label for="city" class="form-label">City</label>
                            <input type="text" class="form-control" id="city" name="city" value="" >
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
                            <input type="text" class="form-control" id="zipCode" name="zipCode" value="" >
                        </div>

                        <input   type = "number"  min="1" max="10"   value = "1" onclick="Dosmothing()"   />

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
    var currentValue = 1;
function doSomething() {
      if (parseInt($(this).val()) > currentValue) {
            alert("Incremented");
      } else {
            alert("Deccremented");
      }
      currentValue = parseInt($(this).val());
}
</script>
@endsection
