@extends('layouts.admin')

@section('content')
    <div class="container">
        <form action="{{route('admin.apartments.update', $apartment->id)}}" method="POST" enctype="multipart/form-data">

            @csrf
            @method('PUT')

            {{-- Title --}}
            <div class="form-group">
              <label for="title">Titolo</label>
              <input type="text" class="form-control" id="title" name="title" placeholder="Insert title" value="{{old("title") ? old("title") : $apartment->title }}">
            </div>
            {{-- /Title --}}

            {{-- Description --}}
            <div class="form-group">
                <label for="description">Descrizione</label>
                <textarea type="text" class="form-control" name="description" id="description" placeholder="Contenuto" cols="30" rows="4" required> {{old("description") ?? $apartment->description }}</textarea>
            </div>
            {{-- /Description --}}

            {{-- Address --}}
            <div class="form-group">
                <label for="address">Indirizzo</label>
                <input  name="address" value="{{old("address") ?? $apartment->address }}" type="text" class="form-control" id="address"  placeholder="Indirizzo (Via, N.Civico, Città, Cap, Nazione)" required>
            </div>
            {{-- /Address --}}

            {{-- Cover --}}
            <div class="form-group">
                    <label for="cover">Cover</label>
                    <input  type="file" value="{{asset('storage/'.$apartment->cover)}}" name="cover" class="form-control" id="cover" required accept="image/*">
            </div>
            {{-- /Cover --}}

            {{-- App Details --}}
            <div class="form-row">
                <div class="col-2">
                    <label for="rooms">Numero Stanze:</label>
                    <input name="rooms" value="{{old("rooms") ?? $apartment->rooms}}" id="rooms" type="number" class="form-control" placeholder="n. stanze" min="1" required>
                </div>

                <div class="col-2">
                    <label for="beds">Numero Letti:</label>
                    <input name="beds" type="number" value="{{ old('beds') ?? $apartment->beds}}" id="beds" class="form-control" placeholder="n. letti" min="1" required>
                </div>

                <div class="col-2">
                    <label for="baths">Numero Bagni:</label>
                    <input name="baths" type="number" value="{{ old('baths') ?? $apartment->baths}}" id="baths" class="form-control" placeholder="n. bagni" min="1" required>
                </div>

                <div class="col-2 offset-col-4">
                    <label for="mq">Metri Quadri:</label>
                    <input name="mq" type="number" value="{{ old('mq') ?? $apartment->mq}}" id="mq" class="form-control" placeholder="mq" min="1" required>
                </div>
            </div>
            {{-- /App Details --}}

            {{-- Services --}}
            <div class="form-group">
                @foreach ($services as $service)
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="services[]" id="genre-{{ $service->id }}" value="{{ $service->id }}"
                    {{-- per tenere il valore checkato --}}
                    {{ in_array($service->id, $apartment_services) ? 'checked' : ' ' }}>
                    <label class="form-check-label" for="genre-{{ $service->id }}">{{ $service->name }}</label>
                    {{-- per tenere il valore checkato --}}
                    </div>
                @endforeach
            </div>
            <div class="form-group mt-3">
                <div class="form-check">
                    @php
                        $checked = old('published') !== null ? old('published') :   $apartment->published;
                        @endphp
                    <input class="form-check-input" type="checkbox" name="published" id="published" value= "1" {{ $checked == 1 ? 'checked' : '' }}>
                    <label class="form-check-labe" for="published">Pubblicato</label>
                </div>
            </div>
            {{-- /Services --}}

            {{-- Button --}}
            <div class="form-group mt-3">
                <button type="submit" class="btn btn-primary">Salva</button>
            </div>
            {{-- /Button --}}

            {{-- Errors --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            {{-- /Errors --}}
        </form>
    </div>
@endsection
