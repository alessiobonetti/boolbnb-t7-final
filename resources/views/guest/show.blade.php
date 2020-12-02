@extends('layouts.main')
@section('title')
    BoolBnB - Singolo 
@endsection

@section('content')
<div class="container">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="d-block w-100" src="{{ filter_var($apartment->cover, FILTER_VALIDATE_URL) ?  $apartment->cover : asset('storage/' . $apartment->cover) }}" alt="First slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="{{ filter_var($apartment->cover, FILTER_VALIDATE_URL) ?  $apartment->cover : asset('storage/' . $apartment->cover) }}" alt="Second slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="{{ filter_var($apartment->cover, FILTER_VALIDATE_URL) ?  $apartment->cover : asset('storage/' . $apartment->cover) }}" alt="Third slide">
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
      <h2 class="card-title">{{$apartment->title}}</h2>

      <div class="container_card">
        <div class="row">
            <div class="card_descrition col-md-6 col-12">
                <p>Descrizione: <span> {{$apartment->description}}</span></p>
            </div>
            <div class="card_services col-md-6 col-12">
                <p>Servizi:
                    <span>
                        @foreach ($apartment->services as $service)
                            {{ $service->name }}
                        @endforeach
                    </span>
                </p>
                <p>Stanze:<span> {{$apartment->rooms}} </span></p>
                <p>Letti: <span>{{$apartment->beds}} </span> </p>
                <p> Bagni: <span> {{$apartment->baths}} </span></p>
                <p> Mq: <span>{{$apartment->mq}}</span></p>
                <p> Indirizzo: <span>{{$apartment->address}}</span></p>
            </div>
        </div>
      </div>
      <div class="container_maps_form">
        <div class="row container_row">
          <div class="maps col-md-6 col-12">

          </div>
          <div class="form_message col-md-6 col-12">
            <form method="POST" action="{{ route('') }}">
              @csrf
              @method('POST')
                <div class="form-group">
                    <h4>Scrivi al proprietario per maggiori informazioni</h4>
                  <label for="exampleInputEmail1">Email address</label>
                  <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Example textarea</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                  </div>
                <button type="submit" class="button_submit btn btn-primary">Submit</button>
              </form>
          </div>
            </div>
        </div>
        <a href="{{url('')}}"><button type="button" class="btn btn-outline-primary">Torna alla Home</button></a>
      </div>

    </div>
@endsection
