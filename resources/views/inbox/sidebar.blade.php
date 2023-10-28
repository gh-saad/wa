<div class="chat-lists">
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="Open" role="tabpanel" aria-labelledby="Open-tab">
            <!-- chat-list -->
            <div class="chat-list">
                @foreach ($conversations as $conversation)
                    @if ($conversation->status == 1)
                        <a href="{{ route('backend-inbox-show', $conversation->id) }}" class="d-flex align-items-center">
                            <div class="flex-shrink-0">
                                <img class="img-fluid" src="https://mehedihtml.com/chatbox/assets/img/user.png"
                                    alt="user img">
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h3>{{ $conversation->name }} - {{ $conversation->wa_name }}</h3>
                                <p>{{ $conversation->number }}</p>
                            </div>
                        </a>
                    @endif
                @endforeach


            </div>
            <!-- chat-list -->
        </div>
        <div class="tab-pane fade" id="Closed" role="tabpanel" aria-labelledby="Closed-tab">

            <!-- chat-list -->
            <div class="chat-list">
                @foreach ($conversations as $conversation)
                    @if ($conversation->status == 0)
                        <a href="{{ route('backend-inbox-show', $conversation->id) }}"
                            class="d-flex align-items-center">
                            <div class="flex-shrink-0">
                                <img class="img-fluid" src="https://mehedihtml.com/chatbox/assets/img/user.png"
                                    alt="user img">
                                {{-- <span class="active"></span> --}}
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h3>{{ $conversation->name }}</h3>
                                <p>{{ $conversation->number }}</p>
                            </div>
                        </a>
                    @endif
                @endforeach



            </div>
            <!-- chat-list -->
        </div>
    </div>

</div>
