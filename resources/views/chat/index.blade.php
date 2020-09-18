@extends('layouts.app', ['nofooter' => true])

@section('css')
    <link rel="stylesheet" href="{{ asset('css/messager.css') }}">
@endsection

@section('content')
    <section class="messager-wrapper">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-sm-5 messager-column-wrapper">
                    <div class="messager-search">
                        <form class="form">
                            <input class="form-control messager-search-input"
                                   type="search" placeholder="Пошук у чаті"
                                   aria-label="Search">
                            <button class="btn btn-outline btn-messager-search" type="submit">
{{--                                <i class="fa fa-search"></i>--}}
                                <img src="{{ asset('img/loopa.svg') }}">
                            </button>
                        </form>
                    </div>
                    <div class="messager-contacts--wrapper">
                        <ul class="messager-contacts-list list-group">

                            @foreach($chats as $chat)
                                <a href="/chat/{{ $chat->id }}">
                                    <li class="messager-contact-item list-group-item d-flex @if($currentChat->id == $chat->id) active" @endif>
                                        <img class="messager-contact-photo" src="/img/photo1.png" alt="">
                                        <span class="messager-contact-name"><strong>{{ $chat->offer->name }}</strong></span>
                                        <span class="messager-contact-text-preview">
                                            @if($user->company_id == $chat->seller_id)
                                                {{ $chat->customer->name }}: {{ $chat->lastMessage()->text }}
                                            @else
                                                {{ $chat->seller->name }}: {{ $chat->lastMessage()->text }}
                                            @endif
                                        </span>
                                        <span class="messager-contact-time">{{ \Carbon\Carbon::parse($chat->lastMessage()->created_at)->format('H:i') }}</span>
                                        @if($count = count($chat->unreadMessages()) > 0)
                                            <div class="messager-contact-count">{{ $count }}</div>
                                        @endif
                                    </li>
                                </a>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-sm-7 messager-window-correspondence">
                    <div class="messager-window">
                        <header class="messager-contact-header">
                            <img class="messager-contact-photo"
                                 src="img/photo1.png" alt="">
                            <span class="messager-contact-name--header"><strong>
{{--                                    Agency--}}
                                    {{ $currentChat->offer->name }}
                                </strong></span>
                            <span class="messager-contact-text-preview--header">
{{--                                Був у мережі 15 хв тому--}}
                                @if($user->company_id == $currentChat->seller_id)
                                    {{ $currentChat->customer->name }}
                                @else
                                    {{ $currentChat->seller->name }}
                                @endif
                            </span>
                        </header>
                        <main class="messager-contact-main" id="messager-contact-main">
                            <div class="message-main--wrapper" >
{{--                                <span class="message-date">Неділя, 20 липня</span>--}}
                                @foreach($messages as $message)
                                <div class="@if($message->user->company_id != auth()->user()->company_id) message-from @else message-to @endif"
                                     id="{{ $message->id }}" data-read="{{ $message->is_read }}">
                                <img class="messager-contact-photo--main"
                                         src="/img/no_image.png" alt="/img/no_image.png">
                                    <div class="messager-contact-text-preview--main">{!! $message->text !!}</div><br>

                                    <p><span class="messager-contact-time--main" autofocus>{{ \Carbon\Carbon::parse($message->created_at)->format('H:i') }}</span></p>
                                </div>
                                <div class="clearfix"></div>
                                @endforeach
                            </div>
                        </main>
                        <footer class="messager-footer">
                            <form action="/chat/{{ $currentChat->id }}/send" method="post">
                                @csrf
                                <div class="form-group row justify-content-center">
                                    <div class="messager-footer--btns col-sm-3">
                                        <div class="btn-group dropup">
                                            <i class="fas fa-plus-circle messager-footer-icons"
                                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>

                                            <div class="dropdown-menu">
                                                <i class="fas fa-plus-circle"></i>
                                                <i class="fas fa-plus-circle"></i>
                                                <i class="fas fa-plus-circle"></i>
                                                <i class="fas fa-plus-circle"></i>
                                                <i class="fas fa-plus-circle"></i>
                                            </div>
                                        </div>
                                        <label for="messager-file-upload--doc">
                                            <img src="{{ asset('img/upload_file.svg') }}" class="messager-footer-icons">
                                            <input type="file" id="messager-file-upload--doc"
                                                    accept=".pdf, .doc, .txt">
                                        </label>
                                        <label for="messager-file-upload--img">
                                        <img src="{{ asset('img/upload_img.svg') }}" class="messager-footer-icons">
                                            <input type="file" id="messager-file-upload--img"
                                                    accept=".jpg, .jpeg, .png">
                                        </label>
                                    </div>

                                    <div class="messager-footer--input col-sm-8">
                                        <textarea id="textarea" class="form-control" name="text"
                                                  placeholder="Повідомлення" autofocus required autocomplete="off"></textarea>
                                        <label for="submit-btn-hidded" >
                                            <button type="submit" id="submit-btn-hidded" style="display: none"></button>
                                            <i class="fas fa-paper-plane messager-footer-send-btn" autofocus></i>
                                        </label>
                                        <span id="textareaFeedback"> осталось 2048 символов</span>
                                    </div>
                                </div>
                            </form>
                        </footer>
                        <div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div id="hidden_token">@csrf</div>
@endsection

@section('js')
    <script>
        var textarea = document.getElementById("textarea");

        textarea.oninput = function() {
            textarea.style.height = "";
            textarea.style.height = Math.min(textarea.scrollHeight, 200) + "px";

        };

        $("#textarea").keypress(function (e) {
            if(e.which == 13 && !e.shiftKey) {
                $(this).closest("form").submit();

                e.preventDefault();
            }
            // else if (e.which == 13 && e.shiftKey) {
                // textarea.value = textarea.value + '\n';
                // console.log(textarea.value, ' textarea');
            // }
        });
        var $area = $("#textarea"), $feed = $("#textareaFeedback"),
            maxLength = 2048;

        $('#textarea').on("input", function(){
            var val = this.value, selStart = this.selectionStart;

            val.length > maxLength && $area
                .val( val.substr(0, maxLength) )
                .prop({
                    selectionStart : selStart,
                    selectionEnd : selStart
                })
            ;

            var remaning = Math.max(maxLength - val.length, 0);
            $feed.html('осталось ' + remaning + ' символов ')
        });
    </script>
    <script>
        let scrollChat = document.getElementById('messager-contact-main');
        let arrMessFrom = document.querySelectorAll('.message-from');
        let ids = [];
        let first;
        let flag = false;

        for( let i = 0; i < arrMessFrom.length; i++ ) {
            for( let j = 0; j < arrMessFrom[i].attributes.length; j++ ) {
                if ( arrMessFrom[i].attributes[j].name === "data-read") {
                    if ( arrMessFrom[i].attributes[j].value == 0 ) {
                        if ( !flag ) {
                            first = arrMessFrom[i];
                        }
                        flag = true;
                        ids.push(arrMessFrom[i].getAttribute('id'))
                    }
                }
            }
        }
        if ( first ) {
            scrollChat.scrollTop = first.offsetTop; // has unread mess
        } else {
            scrollChat.scrollTop = scrollChat.scrollHeight;
        }
        if ( ids.length > 0 ) {

            const token = document.getElementById('hidden_token').firstElementChild.value;
            $.post('/chat/read', {
                    ids: ids,
                    _token: token
                },
                // onAjaxSuccess
            );

            // function onAjaxSuccess(data) {
            //     console.log(data, ' data from server');
            // }
        }

    </script>
@endsection
