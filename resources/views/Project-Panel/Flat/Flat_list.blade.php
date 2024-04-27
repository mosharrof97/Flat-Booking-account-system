@extends('Project-Panel.Partial.Layout')
@section('content')
<div class="row justify-content-center">
    <div class="col-lg-12 col-sm-12">
        <div class="card p-4">
            <div class="card-header">
                <h4>Flat List</h4>
                <a class="btn btn-primary" href="{{ route('flat.add') }}">Add New Project</a>
            </div>
            <div class="card-body">
                <div>
                    @if (Session::has('message'))
                    <h4 class="text-success ">{{ Session::get('message') }}</h4>
                    @endif

                    @if (Session::has('error'))
                    <h4 class="text-danger">{{ Session::get('error') }}</h4>
                    @endif
                </div>

                <div class="table-responsive">
                    {{-- <table class="table border table-striped"> --}}
                    <table id="flatTable" class="display nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th rowspan="" class="text-nowrap">SL</th>
                                <th rowspan="" class="text-nowrap">Flat Name</th>
                                <th rowspan="" class="text-nowrap">Floor</th>
                                <th rowspan="" class="text-nowrap">Flat Area</th>
                                <th rowspan="" class="text-nowrap">Flat price</th>
                                <th rowspan="" class="text-nowrap">Number of room</th>
                                <th rowspan="" class="text-nowrap">Number of Bathroom</th>
                                <th rowspan="" class="text-nowrap">Dining Space</th>
                                <th rowspan="" class="text-nowrap">Status</th>
                                <th rowspan="" class="text-nowrap">Image</th>
                                <th colspan="" class="text-nowrap">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($flats as $key => $flat)
                            <tr>
                                <th scope="row">{{ $key + 1 }}</th>
                                <td>{{ $flat->name }}</td>
                                <td>{{ $flat->floor }} No floor</td>
                                <td>{{ $flat->flat_area }} Squer Fit</td>
                                <td>{{ $flat->price }} Per Squer Fit</td>
                                <td>{{ $flat->room }} Room</td>
                                <td>{{ $flat->bath_room }} Bath Room</td>
                                <td>{{ $flat->dining_space }} Squer Fit</td>
                                <td>{{ $flat->status }} Squer Fit</td>

                                <td>

                                    @php
                                        $images = json_decode($flat->images);
                                        // dd($images);
                                    @endphp

                                    @if($images && is_array($images))
                                        {{-- @foreach($images as $key => $image) --}}
                                        @php
                                        $image = $images[0][0];
                                        @endphp
                                            <img src="{{ asset('upload/Flat/'.$image) }}" alt="No Image" width="35" height="35">

                                        {{-- @endforeach --}}
                                    @else
                                        <p>No images found.</p>
                                    @endif
                                </td>

                                <td>
                                    <a href="{{ route('flat.view', $flat->id) }} " class="btn btn-success me-2">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>

                                    <a href="{{ route('flat.edit', $flat->id) }} " class="btn btn-success me-2">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>

                                    <a href="{{ route('flat.delete', $flat->id) }} " class="btn btn-danger me-2">
                                        <i class="fa-solid fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- -- Status Modal ----}}
{{-- <div class="modal fade" id="projectStatusModal" tabindex="-1" aria-labelledby="projectStatusModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="projectStatusModalLabel">Update Project Status</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form class="" action="" method="post">
                @csrf
                <label for="status">Project Status</label>
                <select class="form-select" name="status" id="status">
                    <option value="0">On Going</option>
                    <option value="1">Completed</option>
                </select>
                <button type="submit" class="btn btn-primary mt-3">Update</button>
              </form>


            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div> --}}
{{---- Status Modal -- --}}




<script>
    new DataTable('#flatTable'
        // , {
        //     layout: {
        //         topStart: {
        //             buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
        //         }
        //     }
        // }
    );

</script>
@endsection
