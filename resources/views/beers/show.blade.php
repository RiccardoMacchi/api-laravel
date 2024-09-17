@extends('layouts.main')

@section('content')
    <div class="container text-white text-center my-5">
        <h1>Dettaglio Birra: {{ $beer->name }}</h1>
        <p>Prezzo: {{ $beer->price }} | Voto: {{ $beer->average }}</p>
        <img src="{{ $beer->image }}" alt="{{ $beer->name }}">
    </div>
@endsection
