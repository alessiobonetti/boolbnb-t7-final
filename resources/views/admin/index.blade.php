@extends('layouts.admin')

@section('content')
{{-- success message --}}
@if (session('success_message'))
<div class="container_message">
    <div class="alert alert-success alert-dismissable">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <h6>{{{ session('success_message') }}}</h6>
    </div>
</div>
@endif
{{-- /success message --}}
<div class="container" style="margin-left: 5px">
    <div class="row">
        <div class="card border-primary mb-3" style="max-width: 10rem; margin-right: 10px">
            <div class="card-body border-left-primary shadow h-100 py-2">
              <h5 class="card-title">Totale Annunci</h5>
              <p class="card-text">{{ count($apartments) }}</p>
            </div>
          </div>
        <div class="card border-primary mb-3" style="max-width: 10rem;">
        <div class="card-body border-left-primary shadow h-100 py-2">
            <h5 class="card-title">Totale Messaggi</h5>
            <p class="card-text"> {{ count($messages) }} </p>
        </div>
        </div>
    </div>

    </div>

    <div class="table">
        <table class="table">
            <thead class="thead">
                <tr>
                    <th scope="col">Titolo</th>
                    <th scope="col" class="d-none d-lg-table-cell">Stanze</th>
                    <th scope="col" class="d-none d-lg-table-cell" >Letti</th>
                    <th scope="col" class="d-none d-lg-table-cell" >Bagni</th>
                    <th scope="col" class="d-none d-lg-table-cell">MQ</th>
                    <th scope="col" class="d-none d-lg-table-cell">Indirizzo</th>
                    <th scope="col" class="d-none d-lg-table-cell">Pubblicato</th>
                    <th scope="col" class="d-none d-lg-table-cell">Visualizzazioni</th>
                    <th scope="col" class="d-none d-lg-table-cell">Messaggi</th>
                    <th scope="col">Modifiche</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($apartments as $apartment)
                    <tr>
                        {{-- <td><img src="{{ filter_var($apartment->cover, FILTER_VALIDATE_URL) ?  $apartment->cover : asset('storage/' . $apartment->cover) }}" alt="cover" class="img-thumbnail"></td> --}}
                        <td>{{$apartment->title}}</td>
                        {{-- // Estraggo i servizi legati all'appartamento --}}
                        <td class="d-none d-lg-table-cell">{{ $apartment->rooms }}</td>
                        <td class="d-none d-lg-table-cell">{{ $apartment->beds }}</td>
                        <td class="d-none d-lg-table-cell">{{ $apartment->baths }}</td>
                        <td class="d-none d-lg-table-cell">{{ $apartment->mq }}</td>
                        <td class="d-none d-lg-table-cell">{{ $apartment->address }}</td>
                        <td class="d-none d-lg-table-cell">{{ $apartment->published ? 'SI' : 'NO'}}</td>
                        <td class="d-none d-lg-table-cell">
                            @if ($apartment->views->count())
                                {{ $apartment->views->count() }}
                            @else
                                0
                            @endif
                        </td>
                        <td class="d-none d-lg-table-cell">
                            {{ $apartment->messages->count() }}
                        </td>
                        <td>
                            <a href="{{ route('admin.apartments.show', $apartment->id) }}"><button class="badge badge-primary">Info</button></a>
                            <a href="{{ route('admin.apartments.edit', $apartment->id) }}"><button class="badge badge-success">Edita</button></a>
                            <form action="{{ route('admin.apartments.destroy', $apartment->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="badge badge-danger" class="btn badge-danger" type="submit">Elimina</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
      </div>
@endsection


