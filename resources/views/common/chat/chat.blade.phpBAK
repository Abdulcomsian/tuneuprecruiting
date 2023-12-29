<x-app-layout>
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-sm-6 ps-0">
                        <h3>Chat App</h3>
                    </div>
                    <div class="col-sm-6 pe-0">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">
                                    <svg class="stroke-icon">
                                        <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-home') }}"></use>
                                    </svg></a></li>
                            <li class="breadcrumb-item">Chat</li>
                            <li class="breadcrumb-item active"> Chat App</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="row">
                <div class="col call-chat-body">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="row chat-box">
                                <!-- Chat right side start-->
                                <div class="col pe-0 chat-right-aside">
                                    <!-- chat start-->
                                    <div class="chat">
                                        <!-- chat-header start-->
                                        <div class="chat-header clearfix"><img class="rounded-circle" src="{{ asset('assets/images/user/8.jpg') }}" alt="">
                                            <div class="about">
                                                <div class="name">{{ $student->first_name }}   </div>
                                                <div class="status">Last Seen 3:55 PM</div>
                                            </div>
                                            <ul class="list-inline float-start float-sm-end chat-menu-icons">

                                            </ul>
                                        </div>
                                        <!-- chat-header end-->
                                        <div class="chat-history chat-msg-box custom-scrollbar" id="chat-container">
                                            <ul id="chatUl">
                                                @foreach($messages as $message)
                                                    @php $className = ($message->sender == $type) ? 'my-message' : 'other-message pull-right'; @endphp
                                                    @php $float = ($message->sender == $type) ? 'float-start' : 'float-end'; @endphp
                                                    @php $textEnd = ($message->sender == $type) ? 'text-end' : ''; @endphp
                                                    @php $clearFix = ($message->sender == $type) ? '' : 'clearfix'; @endphp
                                                    <li class="{{ $clearFix }}">
                                                        <div class="message {{ $className }}"><img class="rounded-circle {{ $float }} chat-user-img img-30" src="{{ asset('assets/images/user/3.png') }}" alt="">
                                                            <div class="message-data {{ $textEnd }}"><span class="message-data-time">{{ $message->created_at }}</span></div>
                                                            {{ $message->message }}
                                                        </div>
                                                    </li>
                                                @endforeach
{{--                                                <li>--}}
{{--                                                    <div class="message my-message"><img class="rounded-circle float-start chat-user-img img-30" src="../assets/images/user/3.png" alt="">--}}
{{--                                                        <div class="message-data text-end"><span class="message-data-time">10:12 am</span></div>--}}
{{--                                                        Are we meeting today? Project has been already finished and I have results to show you.--}}
{{--                                                    </div>--}}
{{--                                                </li>--}}
{{--                                                <li class="clearfix">--}}
{{--                                                    <div class="message other-message pull-right"><img class="rounded-circle float-end chat-user-img img-30" src="../assets/images/user/12.png" alt="">--}}
{{--                                                        <div class="message-data"><span class="message-data-time">10:14 am</span></div>--}}
{{--                                                        Well I am not sure. The rest of the team is not here yet. Maybe in an hour or so?--}}
{{--                                                    </div>--}}
{{--                                                </li>--}}
                                            </ul>
                                        </div>
                                        <!-- end chat-history-->
                                        <div class="chat-message clearfix">
                                            <div class="row">
                                                <div class="col-xl-12 d-flex">
                                                    <div class="smiley-box bg-primary">
                                                        <div class="picker"><img src="{{ asset('assets/images/smiley.png') }}" alt=""></div>
                                                    </div>
                                                    <div class="input-group text-box">
                                                        <input type="hidden" id="url" value="{{ route('chat.store') }}">
                                                        <input type="hidden" id="user-type" value="{{ $type }}">
                                                        <input type="hidden" id="student-id" value="{{ $studentId }}">
                                                        <input type="hidden" id="user-id" value="{{ $userId }}">
                                                        <input type="hidden" id="user-image-link" value="{{ asset('assets/images/user/3.png') }}">
                                                        <input class="form-control input-txt-bx" id="message-to-send" type="text" name="message-to-send" placeholder="Type a message......">
                                                        <button class="input-group-text btn btn-primary" id="btn-send" type="button">SEND</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end chat-message-->
                                        <!-- chat end-->
                                        <!-- Chat right side ends-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->
    </div>
</x-app-layout>
