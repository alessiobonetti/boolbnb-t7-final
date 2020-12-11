@extends('layouts.admin')

@section('content')

<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<div class="bootstrap-select-wrapper">
    <label>Scegli l'Appartamento</label>
    <select title="Scegli una opzione">
        @foreach ($apartments as $apartment)
            <option >{{$apartment->title}}</option>
        @endforeach
    </select>

  </div>
<div class="container">
    <canvas id="myChartView"></canvas>
    <canvas id="myChartMex"></canvas>
</div>
@endsection
