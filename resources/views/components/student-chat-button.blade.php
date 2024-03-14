@props(['apply', 'formatting', 'userId'])

@php
    $isChatLinkActive = !empty($apply) && $apply->status != 'Submitted' && $apply->trash == 'active';
@endphp

@if ($isChatLinkActive)
    <li class="edit">
        <a class="{{ $formatting['textColor'] }}" title="Chat"
           href="{{ route('chat', encrypt($userId)) }}">
            <i class="icofont icofont-chat {{ $formatting['textColor'] }}"></i>
        </a>
    </li>
@endif
