@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>{{$apartment->title}}</h1>
        <div>
            <img src="{{ filter_var($apartment->cover, FILTER_VALIDATE_URL) ?  $apartment->cover : asset('storage/' . $apartment->cover) }}" alt="cover">
        </div>
        {{-- Multi Upload --}}
        <h3 class="well">Inserisci le immagini</h3>
        <form method="post"  enctype="multipart/form-data" id="multi_upload" action="{{ route('admin.carousel', $apartment) }}">
            @csrf
            @method('POST')
            <div class="input-group hdtuto control-group lst increment" >
                <input type="file" name="filenames[]" class="myfrm form-control">
                <div class="input-group-btn">
                    <button class="btn btn-success" type="button"><i class="fldemo glyphicon glyphicon-plus"></i>Add</button>
                </div>
            </div>
            <div class="clone hide">
                <div class="hdtuto control-group lst input-group" style="margin-top:10px">
                    <input type="file" name="filenames[]" class="myfrm form-control">
                    <div class="input-group-btn">
                        <button class="btn btn-danger btn_delete" type="button"><i class="fldemo glyphicon glyphicon-remove"></i> Remove</button>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-info" style="margin-top:10px">Submit</button>
        </form>
        {{-- /Multi Upload --}}
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
