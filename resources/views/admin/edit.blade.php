@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{route('admin.apartments.update', $apartment->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
              <label for="title">Titolo</label>
              <input type="text" class="form-control" id="title" name="title" placeholder="Insert title" value="{{old("title") ? old("title") : $apartment->title }}">
            </div>
            <div class="form-group">
                <label for="description">Descrizione</label>
                <textarea type="text" class="form-control" name="description" id="description" placeholder="Contenuto" cols="30" rows="4" required> {{old("description") ?? $apartment->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="address">Indirizzo</label>
                <input  name="address" value="{{old("address") ?? $apartment->address }}" type="text" class="form-control" id="address"  placeholder="Indirizzo (Via, N.Civico, Città, Cap, Nazione)" required>
            </div>
            <div class="form-group">
                    <label for="cover">Cover</label>
                    <input  type="file" value="{{ $apartment->cover }}" name="cover" class="form-control" id="cover" required accept="image/*">
            </div>
            <div class="form-row">
                <div class="col-2">
                 <input name="rooms" value="{{old("rooms") ?? $apartment->rooms}}" id="rooms" type="number" class="form-control" placeholder="n. stanze" min="1" required>
                </div>
                <div class="col-2">
                 <input name="beds" type="number" value="{{ old('beds') ?? $apartment->beds}}" id="beds" class="form-control" placeholder="n. letti" min="1" required>
                </div>
                <div class="col-2">
                 <input name="baths" type="number" value="{{ old('baths') ?? $apartment->baths}}" id="baths" class="form-control" placeholder="n. bagni" min="1" required>
                </div>
                <div class="col-2 offset-col-4">
                 <input name="mq" type="number" value="{{ old('mq') ?? $apartment->mq}}" id="mq" class="form-control" placeholder="mq" min="1" required>
                </div>
            </div>
            <div class="form-group">
            @foreach ($services as $service)
                <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="services[]" id="genre-{{ $service->id }}" value="{{ $service->id }}">
                <label class="form-check-label" for="genre-{{ $service->id }}">{{ $service->name }}</label>
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

            <div class="form-group mt-3">
                <button type="submit" class="btn btn-primary">Salva</button>
            </div>

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        </form>
    </div>
@endsection
