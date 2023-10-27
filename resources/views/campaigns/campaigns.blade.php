@extends('layouts.app')

@section('content')
<div class="container-fluid p-0">

    <a href="{{ route('backend-campaign-create') }}" class="btn btn-primary float-end mt-n1"><i class="fas fa-plus"></i> Add New</a>
    <h1 class="h3 mb-3">Campaigns</h1>

    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="card-body">
                    @if (count($data) > 0)
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Template</th>
                                    <th>List</th>
                                    <th>Status</th>
                                    <th>Last Modified</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $campaign)
                                    <tr>
                                        <td>{{ $campaign->name }}</td>
                                        <td>{{ $campaign->t_name }}</td>
                                        <td>{{ $campaign->l_name }}</td>
                                        <td>{{ ($campaign->status == 0) ? "Waiting" : "Completed" }}</td>
                                        <td>{{ $campaign->updated_at->diffForHumans()}}</td>
                                        <td>
                                            @if ($campaign->status == 0)
                                            <a href="{{ route('backend-campaign-run', $campaign->id) }}">Run</a>
                                            |
                                            <a href="#">Edit</a>
                                            |
                                            <a href="#">Delete</a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <h3>No Recordes Found</h3>
                    @endif
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
