@extends('Project-Panel.Partial.Layout')
@section('content')
<div class="row justify-content-center">
    <div class="col-lg-10 col-sm-12">
        <div class="card p-4">
            <div class="card-header">
                <h3>Investment List</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col" class="flex-wrap">SL</th>
                                <th scope="col" class="flex-wrap">Name</th>
                                <th scope="col" class="flex-wrap">Phone</th>
                                <th scope="col" class="flex-wrap">Email</th>
                                <th scope="col" class="flex-wrap">Project Name</th>
                                <th scope="col" class="flex-wrap">Investment Total Amount</th>
                                {{-- <th scope="col" class="flex-wrap">Installment</th> --}}
                                <th scope="col" class="flex-wrap">Paid Amount</th>
                                <th scope="col" class="flex-wrap">Due Amount</th>
                                <th scope="col" colspan="2" class="flex-wrap">Action</th>
                            </tr>
                        </thead>
                        <tbody >
                            @if($invest->count() > 0 )
                                @foreach ( $invest as $key => $data )
                                <tr>
                                    <th scope="row">{{ $key + 1 }}</th>
                                    <td>{{ $data->investor->name }}</td>
                                    <td>{{ $data->investor->phone }}</td>
                                    <td>{{ $data->investor->email }}</td>
                                    <td>{{ $data->project->projectName }}</td>
                                    <td>{{ $data->total_Investment }}</td>
                                    {{-- @if ( $data->installment->count()  !== null)
                                        <td>{{ optional($data->installment)->count() }}</td>
                                    @else
                                        <td>0</td>
                                    @endif --}}

                                    {{-- <td>{{ $data->installment->sum('installment_amount') }}</td> --}}
                                    <td>2000000</td>
                                    <td>2000000</td>
                                    <td>
                                        <a href="{{ route('project.investment.view',$data->id) }}" class="btn btn-success">View</a>
                                    </td>
                                    <td>
                                        <a href="{{ route('project.installment',$data->id) }}" class="btn btn-success">Installment</a>
                                    </td>
                                </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="9" class="">
                                        <h4>No Data Found</h4>
                                    </td>
                                </tr>
                            @endif

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
