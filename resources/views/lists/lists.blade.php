@extends('layouts.app')

@section('content')
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3">Lists</h1>
        <a href="{{ route('backend-list-create') }}" class="btn btn-primary">Import</a>
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-body">
                        @if (count($data) > 0)
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Upload</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($data as $list)
                                        <tr>
                                            <td>{{ $list->name }}</td>
                                            <td></td>
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
