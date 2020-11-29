@extends('layouts.main')
@section('title')
    BoolBnB - Singolo Prodotto
@endsection

@section('content')
<div class="container">
    <div class="info_list">
        <ul>
            <li><h2>{{$apartment->title}}</h2></li>
            <li><h5>Descrizione: <span> {{$apartment->description}}</span></h5></li>
            <li><h5>Servizi:
                    <span>
                        @foreach ($apartment->services as $service)
                            {{ $service->name }}
                        @endforeach
                    </span>
                </h5></li>
            <li><h5>Stanze:<span> {{$apartment->rooms}} </span></h5><li>
            <li><h5>Letti: <span>{{$apartment->beds}} </span> </h5></li>
            <li><h5> Bagni: <span> {{$apartment->baths}} </span></h5></li>
            <li><h5> Mq: <span>{{$apartment->mq}}</span></h5></li>
            <li><h5> Indirizzo: <span>{{$apartment->address}}</span></h5></li>
            <li><a class="btn btn-success" href="{{url('')}}" role="button">Torna alla home </a></li>
        </ul>
        <ul>
            <li class="cover_show"><img src="{{asset('storage/'.$apartment->cover)}}" alt="cover"></li> 
        </ul>
    </div>
</div>
@endsection