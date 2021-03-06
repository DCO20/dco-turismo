@extends('layouts.master')

@section('content')

    <section class="slide"></section>
    <div class="actions-form">
        <h2>Encontre: </h2>
        <form action="{{ route('search.flights') }}" class="form-home text-center" method="post">

            {{-- Elementos Ocultos --}}
            @csrf

            {{-- Cidades origin --}}
            <div class="form-group">
                <input type="text" name="origin" list="cities_origin" class="form-control" placeholder="Cidade Origem" required>
                <datalist id="cities_origin">

                    @foreach ($airports as $airport)

                        <option value="{{ $airport->id }} - {{ $airport->city->name }} / {{ $airport->name }}">

                    @endforeach

                </datalist>
            </div>

            {{-- Cidades destino --}}
            <div class="form-group">
                <input type="text" name="destination" list="cities_destination" class="form-control" placeholder="Cidade Destino" required>
                <datalist id="cities_destination">

                    @foreach ($airports as $airport)

                        <option value="{{ $airport->id }} - {{ $airport->city->name }} / {{ $airport->name }}">

                    @endforeach

                </datalist>
            </div>

            {{-- Data --}}
            <div class="form-group">
                <input type="date" name="date" class="form-control" placeholder="Data" min="{{ SiteHelper::minDate() }}" required>
            </div>

            {{-- Botão pesquisa --}}
            <a href="index.php?pg=resultados-pesquisa">
                <button class="btn" type="submit">
                    Procurar <i class="fa fa-search" aria-hidden="true"></i>
                </button>
            </a>

        </form>
    </div>

    <div class="rectangle"></div>
    <div class="clear"></div>
    <section class="banner">
        <div class="container banner-ctc-background-over-white card">
            <div class="row">
                <div class="col-md-3 text-center">
                    <img class="banner-ctc-img" src="{{ asset('imgs/cards.png') }}">
                </div>
                <div class="col-md-7">

                    <div class="banner-ctc-titulo-contenedor"><span>Que tal ver as promoções?</span></div>

                    <div>
                        <p>VIAGE MAIS BARATO!</p>
                    </div>
                </div>
                <div class="col-md-2">
                    <a href="{{ route('promotions') }}" target="_blank" class="btn pull-right btn-flat flat-medium third-level">
                        <span>Saiba Mais</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

@endsection
