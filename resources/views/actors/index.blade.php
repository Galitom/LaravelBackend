<ul>
@foreach($actors as $actor)
    <li>{{$actor->name}} {{$actor->surname}}</li>
    <ul>
        @forelse($actor->movies as $movie)
           <li>{{$movie->title}}</li>
            @empty
                <p>Non ci sono film </p>
        @endforelse
    </ul>
@endforeach
</ul>
