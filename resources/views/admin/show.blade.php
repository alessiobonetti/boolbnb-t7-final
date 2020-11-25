@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{$apartment->title}}</h1>
        <div>
            <img src="{{asset('storage/'.$apartment->cover)}}" alt="cover">
        </div>
        <div>
            <h5>Descrizione: <span> {{$apartment->description}}</span> </h5>
        </div>
        <div>
            <h5>
                Servizi: <span>
                    @foreach ($apartment->services as $service)
                        {{ $service->name }}
                    @endforeach
                </span>
            </h5>
        </div>
        <div>
            <h5>Stanze:<span> {{$apartment->rooms}} </span></h5>
        </div>
        <div>
            <h5>Letti: <span>{{$apartment->beds}} </span> </h5>
        </div>
        <div>
            <h5> Bagni: <span> {{$apartment->baths}} </span> </h5>
        </div>
        <div>
            <h5> Mq: <span>{{$apartment->mq}}</span></h5>
        </div>
        <div>
            <h5> Indirizzo: <span>{{$apartment->address}}</span></h5>
        </div>
        <div>
            <h5> Annuncio Pubblicato: <span>{{$apartment->published ? 'Si' : 'No'}}</span> </h5>
        </div>
        <div>
            <h5>
                Visualizzazioni:
                <span>
                    @if ($apartment->views->count())
                        {{ $apartment->views->count() }}
                    @else
                        0
                    @endif
                </span>
            </h5>
        </div>
        <div>
            <h5> Messaggi: <span> {{ $apartment->messages->count() }} </span> </h5>
        </div>
        <a class="btn btn-success" href="{{route('admin.apartments.index')}}" role="button">Torna ai tuoi appartamenti </a>
        <style>
            .btn-success{
                margin:25px 0;
            }
        </style>
    </div>
@endsection