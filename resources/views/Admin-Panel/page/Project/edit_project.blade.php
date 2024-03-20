@extends('Admin-Panel.partial.Layout')
@section('content')
<div class="row justify-content-center">
    <div class="col-lg-10 col-sm-12">

        <div class="card p-4">
            <div class="card-header">
                <h3>Add New Project</h3>
            </div>
            <div class="card-body">
                <form class="" action="{{ route('project.update',$project->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="projectName" class="form-label">Project Name</label>
                            <input type="text" class="form-control" id="projectName" name="projectName" value="{{ $project->projectName }}">
                            @error('projectName')
                                <span class="form-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="status" class="form-label">Project Status</label>
                            <select name="status" id="status" class="form-select bg-light">
                                <option value="0" {{$project->status == 0  ? 'selected' : ''}}>On Going</option>
                                <option value="1" {{$project->status == 1  ? 'selected' : ''}}>Completed</option>
                            </select>
                            @error('status')
                                <span class="form-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="budget" class="form-label">Project Budget</label>
                            <input type="text" class="form-control" id="budget" name="budget" value="{{ $project->budget }}">
                            @error('budget')
                                <span class="form-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="land_area" class="form-label">Land Area</label>
                            <input type="text" class="form-control" id="land_area" name="land_area" value="{{ $project->land_area }}">

                            @error('land_area')
                                <span class="form-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="duration" class="form-label">Project Duration</label>
                            <input type="text" class="form-control" id="duration" name="duration" value="{{ $project->duration }}">

                            @error('duration')
                                <span class="form-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="floor" class="form-label">Floor</label>
                            <input type="text" class="form-control" id="floor" name="floor" value="{{ $project->floor }}">

                            @error('floor')
                                <span class="form-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="flat" class="form-label">Flat</label>
                            <input type="text" class="form-control" id="flat" name="flat" value="{{ $project->flat }}">

                            @error('flat')
                                <span class="form-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="flat_area" class="form-label">Flat Area</label>
                            <input type="text" class="form-control" id="flat_area" name="flat_area" value="{{ $project->flat_area }}">

                            @error('flat_area')
                                <span class="form-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="start_date" class="form-label">Project Start Date</label>
                            <input type="date" class="form-control" id="start_date" name="start_date" value="{{ $project->start_date }}">

                            @error('start_date')
                                <span class="form-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="end_date" class="form-label">Project End Date</label>
                            <input type="date" class="form-control" id="end_date" name="end_date" value="{{ $project->end_date }}">

                            @error('end_date')
                                <span class="form-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>


                        <div class="col-12">
                            <hr>
                            <h4>Location</h4>
                            <hr>
                        </div>
                        <div class="col-12">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" class="form-control" id="address" placeholder="1234 Main St" name="address" value="{{ $project->address }}">

                            @error('address')
                                <span class="form-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="city" class="form-label">City</label>
                            <input type="text" class="form-control" id="city" name="city" value="{{ $project->city }}">

                            @error('city')
                                <span class="form-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="district" class="form-label">District</label>
                            <select name="district_id" id="district" class="form-select bg-light">
                                <option value="">Select Dristrict.......</option>
                                @foreach ( $districts as $district)
                                    <option value="{{ $district->id }}" {{$project->district_id == $district->id  ? 'selected' : ''}}>{{ $district->name }}</option>
                                @endforeach
                            </select>
                            <div class="mr-1 ">
                                @error('district_id')
                                    <span class="form-text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-2">
                            <label for="zipCode" class="form-label">Zip Code</label>
                            <input type="text" class="form-control" id="zipCode" name="zipCode" value="{{ $project->zipCode }}">
                            @error('zipCode')
                                <span class="form-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" class="form-control" id="image" name="image" value="{{ $project->image }}">
                            @error('image')
                                <span class="form-text text-danger">{{ $message }}</span>
                            @enderror

                            <img src="{{ asset('upload/Project/'.$project->image) }}" alt="No Image" width="150" height="150">
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
