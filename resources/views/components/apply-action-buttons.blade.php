@props(['apply'])

<li class="edit" style="margin-right: 8px">
    <a href="{{ url('apply/status/'.encrypt($apply->apply_id).'/favourite') }}" title="Favourite">
        @if($apply->star == 'star')
            <i class="icofont icofont-heart-alt"></i>
    </a>
    @else
        <i class="fa fa-heart-o"></i>
    @endif

</li>
<li class="edit" style="margin-right: 8px">
    <a href="{{ route('chat', encrypt($apply->student_id)) }}" title="Chat">
        @if($apply->talking == 'talking')
            <i class="icofont icofont-ui-text-chat"></i>
        @else
            <i class="icofont icofont-chat"></i>
    </a>
    @endif
</li>
<li class="edit" style="margin-right: 8px">
    <a href="{{ url('/apply/view/'. encrypt($apply->apply_id)) }}" title="View">
        <i class="icofont icofont-eye-alt"></i>
    </a>
</li>
@if($apply->status == 'Submitted')
    <li class="edit">
        <a href="{{ url('apply/status/'.encrypt($apply->apply_id).'/accept') }}" onclick="return confirm('Are you sure?')" title="Accept">
            <i class="icofont icofont-ui-check"></i>
        </a>
    </li>
@else
    <li class="edit">
        <a href="{{ route('apply.request.requirement', encrypt($apply->apply_id)) }}" title="Request Additional Requirements">
            <i class="icofont icofont-file-document"></i>
        </a>
    </li>
@endif
<li class="delete">
    <form method="POST" action="{{ route('apply.destroy', ['id' => encrypt($apply->apply_id)]) }}" onsubmit='return confirm("Are you sure?")'>
        @csrf
        @method('DELETE')
        <a href="#" onclick="$(this).closest('form').submit();" title="Delete">
            <i class="fa fa-trash"></i>
        </a>
    </form>
</li>
