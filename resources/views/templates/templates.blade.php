@extends('layouts.app')

@section('content')
<div class="container-fluid p-0">

    <h1 class="h3 mb-3">Templates</h1>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="card-body">
                    @if (count($data) > 0)
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>body</th>
                                    <th>Status</th>
                                    <th>Last Modified</th>
                                    {{-- <th>Action</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $template)
                                <tr>
                                    <td>{{ $template->name }}</td>
                                    <td>{{ $template->body }}</td>
                                    <td>{{ $template->status }}</td>
                                    <td>{{ $template->updated_at }}</td>
                                    <td>
                                        {{-- <a href="#">Edit</a>
                                        <a href="#">Delete</a> --}}
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
