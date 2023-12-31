<div class="chat-lists">

    @foreach ($conversations as $conversation)
    @php
       if($conversation->status == 1){
           $url = route('backend-inbox-show', $conversation->id);
       }else{
            $url = route('backend-inbox-send-show', $conversation->id);
       }
    @endphp

        <!-- chat-list -->
        <div class="chat-list {{ url()->current() == $url ? 'bg-light' : '' }}">
            <a href="{{ $url }}"
                class="d-flex align-items-center">
                <div class="flex-shrink-0">
                    <img class="img-fluid" src="https://mehedihtml.com/chatbox/assets/img/user.png" alt="user img">
                </div>
                <div class="flex-grow-1 ms-3">
                    @php
                        if($conversation->name != null || $conversation->name != ""){
                            $name = $conversation->name;
                        }elseif($conversation->wa_name != null || $conversation->wa_name != ""){
                            $name = $conversation->wa_name;
                        }else{
                            $name = $conversation->number;
                        }
                    @endphp
                    <h3>{{ $name }}</h3>
                    <p>CID#: {{ $conversation->id }} - {{ $conversation->updated_at->diffForHumans() }}</p>
                </div>
            </a>

        </div>
        <!-- chat-list -->
    @endforeach
</div>
