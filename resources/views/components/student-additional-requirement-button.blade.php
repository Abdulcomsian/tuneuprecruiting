@props(['apply', 'formatting', 'userId'])

@if(!empty($apply))
    @php
        $isAccepted = isAccepted($apply);
        $hasRequirements = checkForApplyRequirements($apply->id);
        $applyId = empty($apply->apply_id) ? $apply->id : $apply->apply_id;
    @endphp

    @if ($isAccepted && $hasRequirements)
        <li class="edit">
            <a href="{{ url('/student/apply/requirements/form/'.encrypt($applyId)) }}" title="Submit Requirements">
                <i class="icofont icofont-file-document {{ $formatting['textColor'] }}"></i>
            </a>
        </li>
    @endif
@endif
