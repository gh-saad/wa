<div class="chat-lists">

    @foreach ($conversations as $conversation)
        <!-- chat-list -->
        <div class="chat-list {{ url()->current() == route('backend-inbox-show', $conversation->id) ? 'bg-light' : '' }}">
            <a href="{{ route('backend-inbox-show', $conversation->id) }}"
                class="d-flex align-items-center">
                <div class="flex-shrink-0">
                    <img class="img-fluid" src="https://mehedihtml.com/chatbox/assets/img/user.png" alt="user img">
                </div>
                <div class="flex-grow-1 ms-3">
                    <h3>{{ $conversation->wa_name }}</h3>
                    <p>CID#: {{ $conversation->id }} - {{ $conversation->updated_at->diffForHumans() }}</p>
                </div>
            </a>

        </div>
        <!-- chat-list -->
    @endforeach
</div>
