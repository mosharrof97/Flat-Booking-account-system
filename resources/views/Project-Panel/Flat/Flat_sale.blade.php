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

                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="text-center">
                            <h4 class="fw-bold">{{ $project->projectName }}</h4>
                            <h5>Address: {{ $project->address.', '.$project->city.', '.$project->address }}</h5>
                            <h5>{{ $project->district->name.'- '.$project->zipCode}}</h5>

                        </div>
                    </div>
                    <div class="col-md-8 col-sm-12 border py-3">
                        @foreach($flats as $key => $flat)
                            @if ($flat->sale_status == 0)
                                <a href="{{ route('flat.sale.form',$flat->id) }}" class="btn btn-success rounded">{{ $flat->name }}</a>
                            @elseif($flat->sale_status == 1)
                                <a href="{{ route('booking_view',$flat->id) }}" class="btn btn-warning rounded">{{ $flat->name }}</a>
                            @elseif($flat->sale_status == 2)
                                <a href="{{ route('flat.sale',$flat->id) }}" class="btn btn-danger rounded">{{ $flat->name }}</a>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

</script>
@endsection

