@extends('layouts.app')

@section('content')
<div class="container-fluid p-0">

    <h1 class="h3 mb-3">Contacts Imports</h1>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <!-- <div class="card-header">
                    <h5 class="card-title mb-0">Empty card</h5>
                </div> -->
                <div class="card-body">
                    <form action="{{route('backend-contact-upload')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="csvFile" class="form-label">Choose CSV File</label>
                            <input type="file" class="form-control" id="csvFile" name="contact-file" accept=".csv" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Upload CSV</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

</div>
@endsection