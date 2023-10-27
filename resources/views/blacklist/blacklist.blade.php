@extends('layouts.app')

@section('content')
<div class="container-fluid p-0">

    <a href="{{ route('backend-blacklist-create') }}" class="btn btn-primary float-end mt-n1"><i class="fas fa-plus"></i> Import</a>
    <h1 class="h3 mb-3">Blacklist</h1>

    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="card-body">
                    @if (count($data) > 0)
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Number</th>
                                <th>Last Modified</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $blacklist)
                        <tr>
                            <td>BKL#{{ $blacklist->id }}</td>
                            <td>{{ $blacklist->number }}</td>
                            <td>{{ $blacklist->updated_at->diffForHumans() }}</td>
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
