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
                    <form>
                        <div class="mb-3">
                            <label for="name" class="form-label">Name:</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="template" class="form-label">Template:</label>
                            <select class="form-select" id="template" name="template" required>
                                <option>Select a Template</option>
                                @foreach($templates as $template)
                                    <option value="{{ $template['id'] }}">{{ $template['name'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="list" class="form-label">List:</label>
                            <select class="form-select" id="list" name="list" required>
                                <option value="">Select a List</option>
                                <option value="list1">List 1</option>
                                <option value="list2">List 2</option>
                                <option value="list3">List 3</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="schedule" class="form-label">Schedule:</label>
                            <input type="datetime-local" class="form-control" id="schedule" name="schedule" required>
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