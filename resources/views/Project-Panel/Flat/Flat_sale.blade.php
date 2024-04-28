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
                    <div class="col-md-8 col-sm-12 border py-3">
                        @foreach($flats as $key => $flat)
                            @if ($flat->sale_status == 0)
                                <a href="{{ route('flat.sale.edit',$flat->id) }}" class="btn btn-success rounded">{{ $flat->name }}</a>
                            @elseif($flat->sale_status == 1)
                                <a href="{{ route('flat.sale.edit',$flat->id) }}" class="btn btn-warning rounded">{{ $flat->name }}</a>
                            @elseif($flat->sale_status == 2)
                                <a href="{{ route('flat.sale.edit',$flat->id) }}" class="btn btn-danger rounded">{{ $flat->name }}</a>
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

