@extends('layouts.main')

@section('content')
    <div class="container d-flex flex-wrap">
        @foreach ($beers as $beer)
            <div class="card" style="width: 18rem;">
                <img src="{{ $beer->image }}" class="card-img-top" alt="{{ $beer->name }}">
                <div class="card-body">
                    <h3 class="card-title">{{ $beer->name }}</h3>
                    <h5>Voto Medio: {{ $beer->average }}</h5>
                    <h5>Prezzo: {{ $beer->price }}</h5>
                    <a href="{{ route('beers.show', $beer) }}" class="btn btn-warning">DETTAGLI</a>
                    <a href="{{ route('beers.edit', $beer) }}" class="btn btn-warning">MODIFICA</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
