@if(session('success') || session('danger'))
    @php $className = (session('success')) ? 'success' : 'danger'; @endphp
    @php $message = (session('success')) ? session('success') : session('danger'); @endphp
    <div class="alert alert-{{ $className }}">
        {{ $message }}
    </div>
@endif
