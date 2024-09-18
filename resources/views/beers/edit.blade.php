@extends('layouts.main')

@section('content')
    <div class="container">
        {{-- stampa di errori in testa alla pagina --}}
        @if ($errors->any())
            {{-- @dump($errors->all()) --}}
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('beers.update', $beer) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Nome</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                    placeholder="Inserisci nome" value="{{ old('name', $beer->name) }}">
                @error('name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="price">Prezzo</label>
                <input type="text" class="form-control @error('price') is-invalid @enderror" id="price"
                    name="price" placeholder="Inserisci nome" value="{{ old('price', $beer->price) }}">
                @error('price')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="average">Voto</label>
                <input type="text" class="form-control @error('average') is-invalid @enderror" id="average"
                    name="average" placeholder="Inserisci nome" value="{{ old('average', $beer->average) }}">
                @error('average')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="image">Immagine</label>
                <input type="text" class="form-control @error('image') is-invalid @enderror" id="image"
                    name="image" placeholder="Inserisci nome" value="{{ old('image', $beer->image) }}">
                @error('image')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">MODIFICA</button>
            <button type="reset" class="btn btn-warning">ANNULLA</button>
        </form>
    </div>
@endsection
