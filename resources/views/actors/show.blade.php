<h1>{{$actor->name}} {{$actor->surname}}</h1>
<h2>Lista Film</h2>
<ul>
    @foreach($actor->movies as $movie)
        <li>{{$movie->title}}</li>
    @endforeach
</ul>

