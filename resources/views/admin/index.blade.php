@extends('layouts.app')

@section('content')
<div class="container">
    <table class="table" >
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Cover</th>
                <th scope="col">Titolo</th>
                <th scope="col">Servizi</th>
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
                <td>{{$apartment->id}}</td>
                <td><img src="{{ $apartment->cover }}" alt="cover" class="img-thumbnail"></td>
                <td>{{$apartment->title}}</td>
                {{-- // Estraggo i servizi legati all'appartamento --}}
                <td>
                    <ul style="list-style: none">
                        @foreach ($apartment->services as $service)
                            <li>{{ $service->name }}</li>
                        @endforeach
                    </ul>
                </td>
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
            </tr>
            @endforeach
        </tbody>
        </table>
</div>
@endsection


