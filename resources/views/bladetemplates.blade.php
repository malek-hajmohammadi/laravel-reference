<h1>{{$heading}}</h1>
@php
$test=1;
@endphp

{{$test}}

@if(count($listings)==0)
    <p>No listings found</p>
@endif

@foreach($listings as $listing)
    <h2>
        {{$listing['title']}}
    </h2>
    <p>
        {{$listing['description']}}
    </p>
@endforeach

{{------------}}
{{--having unless template--}}
@unless(count($listings)==0)
    <p></p>
@else
<p> </p>
@endunless
