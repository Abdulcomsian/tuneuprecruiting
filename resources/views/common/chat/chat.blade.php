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
                            {!! generateBreadcrumbs(["Chat"]) !!}
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="row">
                <div class="col call-chat-sidebar col-sm-12">
                    <div class="card">
                        <div class="card-body chat-body">
                            <div class="chat-box">
                                <!-- Chat left side Start-->
                                <div class="chat-left-aside">
                                    <div class="people-list" id="people-list">
                                        <ul class="list theme-scrollbar">
                                            @forelse($users as $user)
                                                <li class="clearfix">
                                                    <a href="{{ route('chat', [ 'id' => encrypt($user->id), 'type' => ucfirst($user->role) ]) }}">
                                                        @php $image = ($user->role == 'admin') ? 'default.jpg' : $user->profile_image; @endphp
                                                        <img class="rounded-circle user-image" src="{{ asset('uploads/users_image/'.$image ?? '') }}" alt="">
                                                        <div class="about">
                                                            <div class="name">{{ $user->role == 'admin' ? $user->name : $user->first_name }}</div>
                                                            <div class="status">{{ $user->role == 'admin' ? 'Admin' : $user->last_name }}</div>
                                                        </div>
                                                    </a>
                                                </li>
                                            @empty
                                                <li>No user found.</li>
                                            @endforelse
                                        </ul>
                                    </div>
                                </div>
                                <!-- Chat left side Ends-->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col call-chat-body">
                    <div class="card">
                        <div class="card-body p-0">
                            @if(!empty($receiver) && !empty($sender))
                                <div class="row chat-box">
                                    <!-- Chat right side start-->
                                    <div class="col pe-0 chat-right-aside">
                                        <!-- chat start-->
                                        <div class="chat">
                                            <!-- chat-header start-->
                                            @php $receiverImage = ($receiver->profile_image) ? $receiver->profile_image : 'default.jpg' @endphp
                                            <div class="chat-header clearfix"><img class="rounded-circle" src="{{ asset('uploads/users_image/'.$receiverImage ?? '') }}" alt="">
                                                <div class="about">
                                                    <div class="name">{{ ($receiver->first_name) ? $receiver->first_name : $receiver->name }}</div>
                                                    <div class="status">{{ $receiver->last_name }}</div>
                                                </div>
                                                <ul class="list-inline float-start float-sm-end chat-menu-icons">

                                                </ul>
                                            </div>
                                            <!-- chat-header end-->
                                            <div class="chat-history chat-msg-box custom-scrollbar"  id="chat-container">
                                                <ul id="chatUl">
                                                    @forelse($messages as $message)
                                                        @php $className = ($message->sender_type == $sender->role) ? 'my-message' : 'other-message pull-right'; @endphp
                                                        @php $float = ($message->sender_type == $sender->role) ? 'float-start' : 'float-end'; @endphp
                                                        @php $textEnd = ($message->sender_type == $sender->role) ? 'text-end' : ''; @endphp
                                                        @php $clearFix = ($message->sender_type == $sender->role) ? '' : 'clearfix'; @endphp
                                                        @php $profileImage = ($message->sender_type == $sender->role) ? $sender->profile_image : $receiver->profile_image; @endphp
                                                        <li class="{{ $clearFix }}">
                                                            <div class="message {{ $className }}">
                                                                <img class="rounded-circle {{ $float }} chat-user-img img-30" src="{{ asset('uploads/users_image/'.$profileImage) }}" alt="">
                                                                <div class="message-data {{ $textEnd }}"><span class="message-data-time">{{ $message->created_at }}</span></div>
                                                                {{ $message->message }}
                                                            </div>
                                                        </li>
                                                    @empty
                                                        <li>No message found.</li>
                                                    @endforelse
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
                                                            <input type="hidden" id="receiver-id" value="{{ encrypt($receiver->id) }}">
                                                            <input type="hidden" id="user-id" value="{{ $sender->id }}">
                                                            <input type="hidden" id="user-image-link" value="{{ asset('uploads/users_image/'.$sender->profile_image) }}">
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
                            @else
                                <h3>No message found.</h3>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->
    </div>
</x-app-layout>
