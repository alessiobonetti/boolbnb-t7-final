@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-1 col-md-1 mb-4">
           <div class="card border-left-primary shadow h-100 py-2">
               <div class="card-body">
                   <div class="row no-gutters align-items-center">
                       <div class="col mr-2">
                           <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                               Tot annunci</div>
                           <div class="h5 mb-0 font-weight-bold text-gray-800 text-center">{{ count($apartments) }}</div>
                       </div>
                   </div>
               </div>
           </div>
        </div>
        <div class="col-xl-1 col-md-1 mb-4">
           <div class="card border-left-primary shadow h-100 py-2">
               <div class="card-body">
                   <div class="row no-gutters align-items-center">
                       <div class="col mr-2">
                           <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                               Tot messaggi</div>
                           <div class="h5 mb-0 font-weight-bold text-gray-800 text-center"></div>
                       </div>
                   </div>
               </div>
           </div>
        </div>
    </div>

    </div>

    <table class="table" >
        <thead>
            <tr>
                <th scope="col">Titolo</th>
                <th scope="col">Stanze</th>
                <th scope="col">Letti</th>
                <th scope="col">Bagni</th>
                <th scope="col">Mq</th>
                <th scope="col">Indirizzo</th>
                <th scope="col">Pubblicato</th>
                <th scope="col">Views</th>
                <th scope="col">Message</th>

            </tr>
        </thead>
        <tbody>
            {{-- // Ciclo gli appartamenti --}}
            @foreach ($apartments as $apartment)

            <tr>
                {{-- <td><img src="{{ filter_var($apartment->cover, FILTER_VALIDATE_URL) ?  $apartment->cover : asset('storage/' . $apartment->cover) }}" alt="cover" class="img-thumbnail"></td> --}}
                <td>{{$apartment->title}}</td>
                {{-- // Estraggo i servizi legati all'appartamento --}}
                <td>{{ $apartment->rooms }}</td>
                <td>{{ $apartment->beds }}</td>
                <td>{{ $apartment->baths }}</td>
                <td>{{ $apartment->mq }}</td>
                <td>{{ $apartment->address }}</td>
                <td>{{ $apartment->published }}</td>
                <td>
                    @if ($apartment->views->count())
                        {{ $apartment->views->count() }}
                    @else
                        0
                    @endif
                </td>
                <td>
                    {{ $apartment->messages->count() }}
                </td>
                <td>
                    <a href="{{ route('admin.apartments.show', $apartment->id) }}"><button class="badge badge-info">Info</button></a>
                    <a href="{{ route('admin.apartments.edit', $apartment->id) }}"><button class="badge badge-secondary">Edita</button></a>
                    <form action="{{ route('admin.apartments.destroy', $apartment->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="badge badge-warning" class="btn btn-warning" type="submit">Elimina</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

@endsection


