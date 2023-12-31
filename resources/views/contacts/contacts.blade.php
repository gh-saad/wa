@extends('layouts.app')

@section('content')
<div class="container-fluid p-0">

    <a href="{{ route('backend-list-create') }}" class="btn btn-primary float-end mt-n1"><i class="fas fa-plus"></i> Import</a>
    <h1 class="h3 mb-3">Contacts</h1>

    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="card-body">
                    @if (count($data) > 0)
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Number</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $contact)
                        <tr>
                            <td>{{ $contact->name }}</td>
                            <td>{{ $contact->number }}</td>
                            <td>{{ $contact->status }}</td>
                            <td>
                                <a href="#">Edit</a>
                                <a href="#">Delete</a>
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
