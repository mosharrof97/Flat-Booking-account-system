@extends('Project-Panel.Partial.Layout')
@section('content')
<div class="row justify-content-center">
    <div class="col-lg-12 col-sm-12">
        <div class="card p-4">
            <div class="card-header">
                <h4>Project List</h4>
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

                <div class="text-center">
                    <h2 class="fw-bold">Flat booking System</h2>
                    <h4 class="fw-medium">Email: flat@gmail.com</h4>
                    <h4>Project: {{ $flat->project->projectName }}</h4>
                    <h5>Address: {{ $flat->project->address.', ',$flat->project->city.', ',$flat->project->address }}</h5>
                    <h5>{{ $flat->project->district->name.'- ',$flat->project->zipCode}}</h5>
                </div>

                <div class="row">
                    <div class="col-md-7">
                        <table class="table-information table table-borderless">
                            <tr>
                                <th scope="row" style="width: 20%">Project Name </th>
                                <td colspan="" style="width: 3%">:</td>
                                <td colspan="3" style="width: 77%">{{ $flat->project->projectName }}</td>
                            </tr>
                            <tr>
                                <th scope="row" style="width: 20%">Floor</th>
                                <td colspan="" style="width: 3%">:</td>
                                <td colspan="3" style="width: 77%">{{ $flat->name}}</td>
                            </tr>
                            <tr>
                                <th scope="row" style="width: 20%">Flat Name</th>
                                <td colspan="" style="width: 3%">:</td>
                                <td colspan="3" style="width: 77%">{{ $flat->name}}</td>
                            </tr>
                            <tr>
                                <th scope="row" style="width: 20%">Email</th>
                                <td colspan="" style="width: 3%">:</td>
                                <td colspan="3" style="width: 77%"></td>
                            </tr>
                            <tr>
                                <th scope="row" style="width: 20%">Project Name</th>
                                <td colspan="" style="width: 3%">:</td>
                                <td colspan="3" style="width: 77%"></td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-5">
                        <div class="row">

                            @php
                            $images = json_decode($flat->images);
                            // dd($images);
                            @endphp

                            {{-- @foreach( as $key => $value)
                            <div class="col-md-6">
                                <img src="{{ asset('upload/Flat/'.$flat->project->name) }}" alt="">
                            </div>
                            @endforeach --}}

                            @if($images && is_array($images))
                                @foreach($images as $key => $image)
                                    @php
                                        $image = $images[0];
                                    @endphp
                                    <div class="col-md-6">
                                        <img src="{{ asset('upload/Flat/'.$image[0]) }}" alt="No Image" width="" height="" style="width: 100%" class="m-2">
                                    </div>
                                @endforeach
                            @else
                            <p>No images found.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

</script>
@endsection
