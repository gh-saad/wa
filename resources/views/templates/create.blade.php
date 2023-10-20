@extends('layouts.app')

@section('content')
<style>
    .conversation {
        height: calc(100% - 12px);
        position: relative;
        background: #efe7dd url(https://cloud.githubusercontent.com/assets/398893/15136779/4e765036-1639-11e6-9201-67e728e86f39.jpg) repeat;
        z-index: 0;
        padding: 12px;
    }

    .message.received {
        background: #fff;
        border-radius: 0px 5px 5px 5px;
        float: left;
    }

    .message {
        color: #000;
        clear: both;
        line-height: 18px;
        font-size: 15px;
        padding: 8px;
        position: relative;
        margin: 8px 0;
        max-width: 85%;
        word-wrap: break-word;
        z-index: -1;
    }

    .message.received:after {
        border-width: 0px 10px 10px 0;
        border-color: transparent #fff transparent transparent;
        top: 0;
        left: -10px;
    }

    .message:after {
        position: absolute;
        content: "";
        width: 0;
        height: 0;
        border-style: solid;
    }

    .metadata {
        display: inline-block;
        float: right;
        padding: 0 0 0 7px;
        position: relative;
        bottom: -4px;
    }

    .metadata .time {
        color: rgba(0, 0, 0, .45);
        font-size: 11px;
        display: inline-block;
    }
</style>
<div class="container-fluid p-0">

    <h1 class="h3 mb-3">Templates</h1>

    <div class="row">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                    <form action="{{ route('backend-templates-create') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="templateName" class="form-label">Template Name:</label>
                            <input type="text" class="form-control" id="templateName" name="template_name" required>
                        </div>
                        <div class="mb-3">
                            <label for="body" class="form-label">Body:</label>
                            <textarea class="form-control" id="body" name="template_body" rows="6" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                </div>
            </div>


        </div>
        <div class="col-md-4">
            <div class="conversation">
                <div class="message received">
                    <span id="random">Ready to sell? We've got you covered. Not ready? Just reply 'no,' and we'll respect your decision.</span>
                    <span class="metadata"><span class="time">4:01 AM</span></span>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection