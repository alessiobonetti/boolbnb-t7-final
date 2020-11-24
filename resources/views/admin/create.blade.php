@extends('layouts.app')

@section('content')
<div class="container">

    <main>
        <form method="POST" action="{{ route('admin.store') }}" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="form-group">
                <label for="title">Titolo</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Titolo" value="{{ old(
                'title') }}" required>
            </div>
            <div class="form-group">
                <label for="description">Descrizione</label>
                <textarea type="text" class="form-control" name="description" id="description" placeholder="Contenuto" cols="30" rows="4" required>{{ old('description') }}</textarea>
            </div>
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
            <div class="form-group">
                <label for="address">Indirizzo</label>
                <input  name="address" value="{{ old('address') }}" type="text" class="form-control" id="address"  placeholder="Indirizzo (Via, N.Civico, Città, Cap, Nazione)" required>
            </div>


        <div class="form-group mt-3">
            <button type="submit" class="btn btn-primary">Salva</button>
        </div>
</form>




            @if ($errors->any())
                <div class="alert alert-danger mt-2">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

        </form>
        </main>
</div>
@endsection
