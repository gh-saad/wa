@extends('layouts.app')

@push('css')
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <link rel="stylesheet" href="{{ url('assets/css/style.css') }}">
    <style>
        .content {
            padding: 1rem 1rem 1.5rem !important;
        }
    </style>
@endpush

@section('content')
    <!-- char-area -->
    <section class="message-area">
        <div class="row">
            <div class="col-12">
                <div class="chat-area">
                    <!-- chatlist -->
                    <div class="chatlist shadow">
                        <div class="modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="chat-header">
                                    <div class="msg-search">
                                        <input type="text" class="form-control" id="inlineFormInputGroup"
                                            placeholder="Search" aria-label="search">
                                        </div>

                                    <hr>
                                </div>

                                <div class="modal-body">
                                    <!-- chat-list -->
                                    @include('inbox.sidebar')
                                    <!-- chat-list -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- chatlist -->

                    <!-- chatbox -->
                    <div class="chatbox">
                        <div class="modal-dialog-scrollable bg-light">

                        </div>
                    </div>
                </div>
                <!-- chatbox -->


            </div>
        </div>
    </section>
    <!-- char-area -->



    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@endsection
