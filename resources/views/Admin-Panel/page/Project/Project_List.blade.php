@extends('Admin-Panel.partial.Layout')
@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-12 col-sm-12">
            <div class="card p-4">
                <div class="card-header">
                    <h4>Project List</h4>
                    <a class="btn btn-primary" href="{{ route('create.project') }}">Add New Project</a>
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
                        <table id="projectTable" class="display nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th rowspan="" class="text-nowrap">SL</th>
                                    <th rowspan="" class="text-nowrap">Project Name</th>
                                    <th rowspan="" class="text-nowrap">Image</th>
                                    <th rowspan="" class="text-nowrap">Status</th>
                                    <th rowspan="" class="text-nowrap">Update Status</th>
                                    <th rowspan="" class="text-nowrap">Project Budget</th>
                                    <th rowspan="" class="text-nowrap">Land Area</th>
                                    <th rowspan="" class="text-nowrap">Project Duration</th>
                                    <th rowspan="" class="text-nowrap">Floor</th>
                                    <th rowspan="" class="text-nowrap">Flat</th>
                                    {{-- <th rowspan="" class="text-nowrap">Flat Area</th> --}}
                                    <th rowspan="" class="text-nowrap">Start Date</th>
                                    <th rowspan="" class="text-nowrap">End Date</th>
                                    <th rowspan="" class="text-nowrap">Address</th>
                                    <th colspan="4" class="text-nowrap">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($projects as $key => $project)
                                    <tr>
                                        <th scope="row">{{ $key + 1 }}</th>
                                        <td>{{ $project->projectName }}</td>
                                        <td>
                                            <img src="{{ asset('upload/Project/' . $project->image) }}" alt="No Image"
                                                width="35" height="35">
                                        </td>
                                        @if ($project->status == 0)
                                            <td>On Going</td>
                                        @else
                                            <td>Completed</td>
                                        @endif

                                        <td>
                                            {{-- <a href="#" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal" type="button"><span class="fa fa-check"></span></a> --}}
                                            <button type="button" class="btn btn-sm btn-info" data-project_id="{{ $project->id }}" data-bs-toggle="modal" data-bs-target="#projectStatusModal">
                                                <span class="fa fa-check"></span>
                                              </button>
                                        </td>
                                        <td>{{ $project->budget }}</td>
                                        <td>{{ $project->land_area }} Squer Fit</td>
                                        <td>{{ $project->duration }} Year</td>
                                        <td>{{ $project->floor }} Floor</td>
                                        <td>{{ $project->flat }} Flat</td>
                                        {{-- <td>{{ $project->flat_area }} Squer Fit</td> --}}
                                        <td>{{ $project->start_date }}</td>
                                        <td>{{ $project->end_date }}</td>
                                        <td>{{ $project->address .', '. $project->city .', '. $project->district->name .', '. $project->zipCode}}</td>
                                        <td>
                                            <a href="{{ route('project.dashboard', $project->id) }} "
                                                class="btn btn-success me-2">
                                                <i class="fa-solid fa-right-to-bracket"></i>
                                            </a>
                                            {{-- <a href="{{ route('project.dashboard', ['name' => $project->projectName, 'id' => $project->id]) }}" class="btn btn-success me-2">Dashboard</a> --}}

                                        </td>

                                        <td>
                                            <a href="{{ route('project.view', $project->id) }} "
                                                class="btn btn-success me-2">
                                                <i class="fa-solid fa-eye"></i>
                                            </a>
                                        </td>

                                        <td>
                                            <a href="{{ route('project.edit', $project->id) }} "
                                                class="btn btn-success me-2">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <form action="{{ route('project.delete', $project->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-success me-2">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </form>
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

    {{---- Status Modal ----}}
    <div class="modal fade" id="projectStatusModal" tabindex="-1" aria-labelledby="projectStatusModalLabel" aria-hidden="true">
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
      </div>
    {{---- Status Modal ----}}




    <script>
        new DataTable('#projectTable', {
            layout: {
                topStart: {
                    buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
                }
            }
        });
    </script>
@endsection
