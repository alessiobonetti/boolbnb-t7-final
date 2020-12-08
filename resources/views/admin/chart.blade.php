@extends('layouts.admin')

@section('content')

<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<div class="bootstrap-select-wrapper">
    <label>Scegli l'Appartamento</label>
    <select title="Scegli una opzione">
        @foreach ($apartments as $apartment)
        <option value={{$apartment['id']}}></option>
      @endforeach
    </select>
    {{-- <select title="Scegli una opzione">
      <option value="Value 1">Opzione 1</option>
      <option value="Value 2">Opzione 2</option>
      <option value="Value 3">Opzione 3</option>
      <option value="Value 4">Opzione 4</option>
      <option value="Value 5">Opzione 5</option>
    </select> --}}
  </div>
<div class="container">
    <canvas id="myChartView"></canvas>
    <canvas id="myChartMex"></canvas>
</div>
@endsection