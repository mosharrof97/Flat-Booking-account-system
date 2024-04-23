@extends('Project-Panel.Partial.Layout')
@section('content')
<div class="row justify-content-center">
    <div class="col-lg-12 col-sm-12">

        <div class="card p-4">
            <div class="card-header">
                <h3>Add New Project</h3>
            </div>
            <div class="card-body">
                <div>
                    @if (Session::has('message'))
                        <h4 class="text-success">{{ Session::get('message') }}</h4>
                    @endif

                    @if (Session::has('error'))
                        <h4 class="text-danger">{{ Session::get('error') }}</h4>
                    @endif
                </div>
                <form class="" action="{{ route('flat.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="name" class="form-label">Flat Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="" placeholder="Flat Name.....">
                            @error('name')
                                <span class="form-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="flat_area" class="form-label">Flat Area</label>
                            <input type="number" class="form-control" id="flat_area" name="flat_area" value="" placeholder="Flat Area.....">
                            @error('flat_area')
                                <span class="form-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="price" class="form-label">Price Per squer Fit </label>
                            <input type="decimal" class="form-control" id="price" name="price" value="" placeholder="Price Per squer Fit.....">

                            @error('price')
                                <span class="form-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="room" class="form-label">Number of Room</label>
                            <input type="number" class="form-control" id="room" name="room" value="" placeholder="Number of Room.....">
                            @error('room')
                                <span class="form-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="dining_space" class="form-label">Dining Space</label>
                            <input type="number" class="form-control" id="dining_space" name="dining_space" value="" placeholder="Dining space.....">
                            @error('dining_space')
                                <span class="form-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="bath_room" class="form-label">Number of Bath Room</label>
                            <input type="number" class="form-control" id="bath_room" name="bath_room" value="" placeholder="Flat Area.....">
                            @error('bath_room')
                                <span class="form-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="image" class="form-label">image</label>
                            <input type="text" class="form-control" id="image" name="image" value="" placeholder="120 Feet Wide.....">

                            @error('image')
                                <span class="form-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="description" class="form-label">Flat Description</label>
                            <textarea name="description" id="description" cols="30" rows="10"></textarea>

                            @error('description')
                                <span class="form-text text-danger">{{ $message }}</span>
                            @enderror
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
