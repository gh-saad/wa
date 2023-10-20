@extends('layouts.app')

@section('content')
<div class="container-fluid p-0">

    <h1 class="h3 mb-3">Campaigns</h1>
    <a href="{{ route('backend-campaign-create') }}" class="btn btn-primary">Add New</a>
    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="card-body">

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Number</th>
                                <th>Report</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $contact)
                        <tr>
                            <td>{{ $contact->name }}</td>
                            <td>{{ $contact->number }}</td>
                            <td></td>
                            <td>
                                <a href="#">Edit</a>
                                <a href="#">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>

                    <!-- WhatsApp message preview link -->
                    <a href="whatsapp://send?text=Hello%2C%20this%20is%20a%20WhatsApp%20message%20preview." target="_blank">
                        Click here to send a WhatsApp message
                    </a>

                </div>
            </div>
        </div>
    </div>

</div>
@endsection
