<div class='entry'>
    <h3>{{ $food->date }}</h3>
    <ul>
        <li><em>{{ $food->food }}</em> - {{ $food->meal }}</li>
        {{-- <li>Added {{ $food->created_at->format('m/d/y g:ia') }}</li>  --}}
    </ul>
    <a href='/edit/{{$food->id}}'>Edit</a>
</div>