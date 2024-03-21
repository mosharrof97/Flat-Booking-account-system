@extends('Admin-Panel.partial.Layout')
@section('content')
<div class="row justify-content-center">
    <div class="col-lg-11 col-sm-12">
        <div class="card p-4">
            <div class="card-header">
                <h3>Investment List</h3>
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

                <div class=" table-responsive">
                    <table class="table border table-striped">
                        <thead>
                            <tr>
                                <th rowspan="" class="text-nowrap">SL</th>
                                <th rowspan="" class="text-nowrap">Project Name</th>
                                <th rowspan="" class="text-nowrap">Image</th>
                                <th rowspan="" class="text-nowrap">Status</th>
                                <th rowspan="" class="text-nowrap">Project Budget</th>
                                <th rowspan="" class="text-nowrap">Land Area</th>
                                <th rowspan="" class="text-nowrap">Project Duration</th>
                                <th rowspan="" class="text-nowrap">Floor</th>
                                <th rowspan="" class="text-nowrap">Flat</th>
                                <th rowspan="" class="text-nowrap">Flat Area</th>
                                <th rowspan="" class="text-nowrap">Start Date</th>
                                <th rowspan="" class="text-nowrap">End Date</th>
                                <th rowspan="" class="text-nowrap">Address</th>
                                <th rowspan="" class="text-nowrap">City</th>
                                <th rowspan="" class="text-nowrap">District</th>
                                <th rowspan="" class="text-nowrap">Zip Code</th>
                                <th colspan="4" class="text-nowrap">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $projects as $key => $project )
                            <tr>
                                <th scope="row">{{ $key+1 }}</th>
                                <td>{{ $project->projectName }}</td>
                                <td>
                                    <img src="{{ asset('upload/Project/'.$project->image) }}" alt="No Image" width="35" height="35">
                                </td>
                                @if ($project->status == 0)
                                    <td>On Going</td>
                                @else
                                    <td>Completed</td>
                                @endif

                                <td>{{ $project->budget }}</td>
                                <td>{{ $project->land_area }} Squer Fit</td>
                                <td>{{ $project->duration }} Year</td>
                                <td>{{ $project->floor }} Floor</td>
                                <td>{{ $project->flat }} Flat</td>
                                <td>{{ $project->flat_area }} Squer Fit</td>
                                <td>{{ $project->start_date }}</td>
                                <td>{{ $project->end_date }}</td>
                                <td>{{ $project->address }}</td>
                                <td>{{ $project->city }}</td>
                                <td>{{ $project->district->name }}</td>
                                <td>1{{ $project->zipCode }}</td>
                                <td>
                                    <a href="{{route('project.dashboard',['name' => $project->projectName, 'id' => $project->id])}} " class="btn btn-success me-2">Dashboard</a>
                                    {{-- <a href="{{ route('project.dashboard', ['name' => $project->projectName, 'id' => $project->id]) }}" class="btn btn-success me-2">Dashboard</a> --}}

                                </td>

                                <td>
                                    <a href="{{route('project.view',$project->id)}} " class="btn btn-success me-2">View</a>
                                </td>

                                <td>
                                    <a href="{{route('project.edit',$project->id)}} " class="btn btn-success me-2">edit</a>
                                </td>
                                <td>
                                    <form action="{{route('project.delete',$project->id)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <input type="submit"  class="btn btn-success me-2" value="Delete">
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

@endsection
