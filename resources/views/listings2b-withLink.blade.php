

@foreach($listings as $listing)
    <h2><a href="/list-single-Item/{{$listing['id']}}">{{$listing['title']}}</a> </h2>
    <p>{{$listing['description']}}</p>
@endforeach
