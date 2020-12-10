@extends('layouts.admin')

@section('content')

<div class="container">

    <main>
        <form method="POST" action="{{ route('admin.apartments.store') }}" enctype="multipart/form-data">

            @csrf
            @method('POST')

            {{-- Title --}}
            <div class="form-group">
                <label for="title">Titolo</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Titolo" value="{{ old(
                'title') }}" required>
            </div>
            {{-- /Title --}}

            {{-- Description --}}
            <div class="form-group">
                <label for="description">Descrizione</label>
                <textarea type="text" class="form-control" name="description" id="description" placeholder="Contenuto" cols="30" rows="4" required>{{ old('description') }}</textarea>
            </div>
            {{-- /Description --}}

            {{-- Address --}}
            <div class="form-group">
                <label for="address">Indirizzo</label>
                <input  name="address" value="{{ old('address') }}" type="text" class="form-control" id="address_admin"  placeholder="Indirizzo (Via, N.Civico, Città, Cap, Nazione)" required>
                <input name="lng" id="lng_admin" value="" hidden>
                <input name="lat" id="lat_admin" value="" hidden>

            </div>
            {{-- /Address --}}

            {{-- Cover --}}
            <div class="form-group">
                    <label for="cover">Cover</label>
                    <input  name="cover" value="{{ old('cover') }}" type="file" class="form-control" id="cover" required accept="image/*">
            </div>
            {{-- /Cover --}}

            {{-- App Details --}}
            <div class="form-row">
                <div class="col-2">
                    <input name="rooms" value="{{ old('rooms') }}" id="rooms" type="number" class="form-control" placeholder="n. stanze" min="1" required>
                </div>

                <div class="col-2">
                    <input name="beds" type="number" value="{{ old('beds') }}" id="beds" class="form-control" placeholder="n. letti" min="1" required>
                </div>

                <div class="col-2">
                    <input name="baths" type="number" value="{{ old('baths') }}" id="baths" class="form-control" placeholder="n. bagni" min="1" required>
                </div>

                <div class="col-2 offset-col-4">
                    <input name="mq" type="number" value="{{ old('mq') }}" id="mq" class="form-control" placeholder="mq" min="1" required>
                </div>
            </div>
            {{-- /App Details --}}

            {{-- Services --}}
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
                    <input class="form-check-input" type="checkbox" name="published" id="published" value= "1" {{ old('published') ? 'checked' : '' }} >
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
                <div class="alert alert-danger mt-2">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            {{-- /Errors --}}
        </form>
    </main>
</div>
@endsection
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function () {


        $('#address_admin').keyup(function () {

            //    salvare il dato
            var title = $('#address_admin').val();
            $.ajax({
                'url': 'https://api.tomtom.com/search/2/geocode/' + title + '.json?key=qSDJhLAxaQVApzhQYzYHIRVtb03Dnkqm',
                'method': 'GET',
                'success': function (data) {
                    var results = data.results[0].position;
                    $('#lat_admin').val(results.lat);
                    $('#lng_admin').val(results.lon);
                },
                'error': function () {
                    console.log('errore!');
                }
            });

        })
});
</script>
