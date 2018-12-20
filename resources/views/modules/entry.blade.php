<div class='entry'>
    <h3>{{ $food->date }}</h3>
        <p><em>{{ $food->food }}</em> - {{ $food->meal }}</p>
        <p>{{ $food->servings }} servings</p>
        @foreach($food->tags as $tag)
            <p>Tag: {{ $tag->name }}</p>
        @endforeach
    <a href='/foods/{{$food->id}}/edit'>Edit</a>    |    <a href='/foods/{{$food->id}}/delete'>Delete</a>
</div>