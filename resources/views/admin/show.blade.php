@extends('layouts.admin')

@section('content')
    <div class="container">
        <h3 class="mb-4">Riepilogo del Tuo Appartamento</h3>
        <div class="card mb-3">
            <img class="card-img-top" src="{{ filter_var($apartment->cover, FILTER_VALIDATE_URL) ?  $apartment->cover : asset('storage/' . $apartment->cover) }}" alt="Card image cap">
        </div>
        <div class="container_show">
            <h4 class="card-title">{{$apartment->title}}</h4>
        <h5 class="card-title">Descrizione</h5> <p><small class="text-muted">{{$apartment->description}}</small></p>
        <p class="card-text"> Servizi: 
            <span>
                <small class="text-muted">
                @foreach ($apartment->services as $service)
                    {{ $service->name }}
                @endforeach
                </small>
            </span>
        </p>
        <p class="card-text">Stanze:<span><small class="text-muted"> {{$apartment->rooms}} </small></span></p>
        <p class="card-text">Letti:<span><small class="text-muted"> {{$apartment->beds}} </small></span></p>
        <p class="card-text">Bagni:<span><small class="text-muted"> {{$apartment->baths}} </small></span></p>
        <p class="card-text">MQ:<span><small class="text-muted"> {{$apartment->mq}} </small></span></p>
        <p class="card-text">Indirizzo:<span><small class="text-muted"> {{$apartment->address}} </small></span></p>
        <p class="card-text">Annuncio Pubblicato:<span><small class="text-muted"> {{$apartment->published ? 'Si' : 'No'}} </small></span></p>
        <p class="card-text">Visualizzazioni:
            <span>
                <small class="text-muted"> 
                    @if ($apartment->views->count())
                    {{ $apartment->views->count() }}
                    @else
                        0
                    @endif 
                </small>
            </span>
        </p>
        <p class="card-text">Messaggi:<span><small class="text-muted"> {{ $apartment->messages->count() }} </small></span></p>
        <h5 class="card-title mt-4 multi_up_title">Inserisci altre immagini da far visualizzare ai tuoi ospiti</h5>
        <form method="post"  enctype="multipart/form-data" id="multi_upload" action="{{ route('admin.carousel', $apartment) }}">
            @csrf
            @method('POST')
            
            <div class="input hdtuto control-group lst increment" >
                <input type="file" name="filenames[]" class="form-control-sm">
                <div class="input-btn bottone">
                    <button class="btn btn-success btn-sm" type="button"><i class="fldemo glyphicon glyphicon-plus"></i>Add</button>
                </div>
            </div>
            <div class="clone hide">
                <div class="hdtuto control-group lst" style="margin-top:25px">
                    <input type="file" name="filenames[]" class="form-control-sm">
                    <div class="input-btn bottone">
                        <button class="btn btn-danger btn_delete btn-sm" type="button"><i class="fldemo glyphicon glyphicon-remove"></i> Remove</button>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-info bottone" style="margin-top:40px">Submit</button>
        </form>
        <a class="btn btn-success bottone" style="margin-top:20px" href="{{route('admin.apartments.index')}}" role="button">Torna ai tuoi appartamenti </a>

        </div>
        
          

        {{-- Multi Upload --}}
       
        
        {{-- /Multi Upload --}}
    </div>
@endsection
