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
@endpush

@section('content')
    <div class="container-fluid p-0">

        <!-- char-area -->
        <section class="message-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="chat-area">
                            <!-- chatlist -->
                            <div class="chatlist">
                                <div class="modal-dialog-scrollable">
                                    <div class="modal-content">
                                        <div class="chat-header">
                                            <div class="msg-search">
                                                <input type="text" class="form-control" id="inlineFormInputGroup"
                                                    placeholder="Search" aria-label="search">
                                                <a class="add" href="#"><img class="img-fluid"
                                                        src="https://mehedihtml.com/chatbox/assets/img/add.svg"
                                                        alt="add"></a>
                                            </div>

                                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link active" id="Open-tab" data-bs-toggle="tab"
                                                        data-bs-target="#Open" type="button" role="tab"
                                                        aria-controls="Open" aria-selected="true">Lead</button>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link" id="Closed-tab" data-bs-toggle="tab"
                                                        data-bs-target="#Closed" type="button" role="tab"
                                                        aria-controls="Closed" aria-selected="false">Send</button>
                                                </li>
                                            </ul>
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
                                <div class="modal-dialog-scrollable">
                                    <div class="modal-content">
                                        <div class="msg-head">
                                            <div class="row">
                                                <div class="col-8">
                                                    <div class="d-flex align-items-center">


                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <ul class="moreoption">
                                                        <li class="navbar nav-item dropdown">
                                                            <a class="nav-link dropdown-toggle" href="#"
                                                                role="button" data-bs-toggle="dropdown"
                                                                aria-expanded="false"><i class="fa fa-ellipsis-v"
                                                                    aria-hidden="true"></i></a>
                                                            <ul class="dropdown-menu">
                                                                <li><a class="dropdown-item" href="#">Action</a>
                                                                </li>
                                                                <li><a class="dropdown-item" href="#">Another
                                                                        action</a>
                                                                </li>
                                                                <li>
                                                                    <hr class="dropdown-divider">
                                                                </li>
                                                                <li><a class="dropdown-item" href="#">Something else
                                                                        here</a></li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="modal-body">
                                            <div class="msg-body">
                                                <ul>

                                                </ul>
                                            </div>
                                        </div>


                                        <div class="send-box">




                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- chatbox -->


                    </div>
                </div>
            </div>
    </div>
    </section>
    <!-- char-area -->



    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@endsection
