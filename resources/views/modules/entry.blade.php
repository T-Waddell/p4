<div class='entry'>
    <h3>{{ $food->date }}</h3>
        <p><em>{{ $food->food }}</em> - {{ $food->meal }}</p>
        <lp>{{ $food->servings }} servings</p>
    <a href='/foods/{{$food->id}}/edit'>Edit</a>    |    <a href='/foods/{{$food->id}}/delete'>Delete</a>
</div>