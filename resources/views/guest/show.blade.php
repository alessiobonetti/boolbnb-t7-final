@extends('layouts.main')
@section('title')
    BoolBnB - Singolo 
@endsection

@section('content')
<div class="container">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        </ol>
        <div class="carousel-inner">
          @foreach($apartment->images as  $key=> $image)
          <div class="carousel-item {{$key == 1 ? 'active' : '' }}">
                <img class="d-block w-100" src="{{ filter_var($image->media, FILTER_VALIDATE_URL) ?  $image->media : asset('storage/' . $image->media) }}">
          </div>
          @endforeach
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
          {{-- maps show htlm + js --}}
          <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/5.x/5.64.0/maps/maps-web.min.js"></script>
          <link rel='stylesheet' type='text/css' href='https://api.tomtom.com/maps-sdk-for-web/cdn/5.x/5.64.0/maps/maps.css'>
          <div class="maps col-md-6 col-12">
            <div id="map" style="width: 100%; height: 100%;"></div>
            <script>
              var localita = [{{$apartment->lng}}, {{$apartment->lat}}];
              var map = tt.map({
                  key: "qSDJhLAxaQVApzhQYzYHIRVtb03Dnkqm",
                  container: "map",
                  center: localita,
                  zoom: 7
              });
              var marker = new tt.Marker().setLngLat(localita).addTo(map);

              var popupOffsets = {
                top: [0, 0],
                bottom: [0, -70],
                'bottom-right': [0, -70],
                'bottom-left': [0, -70],
                left: [25, -35],
                right: [-25, -35]
              }

              var popup = new tt.Popup({offset: popupOffsets})/* .setHTML({{$apartment->lng}});
              marker.setPopup(popup).togglePopup(); */

          </script>
          </div>
           {{-- maps show htlm + js --}}
          <div class="form_message col-md-6 col-12">
            <form method="POST" {{-- action="{{ route('') }}" --}}>
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
