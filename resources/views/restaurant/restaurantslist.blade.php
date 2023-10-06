@extends('layouts.master')

@section('titolo') 
Ristoranti
@endsection

@section('stile', 'style.css')

@section('breadcrumb')
<li class="breadcrumb-item">
    <a class="link-body-emphasis" href="{{ route('home') }}">Home</a>
</li>
<li class="breadcrumb-item active" aria-current="page">
    Ristoranti
</li>
@endsection

@section('corpo')
@php
  $imagePath = asset('img/BANNER3.png');
@endphp
<div class="hero-unit rounded custom-hero" style="background-image: url('{{ $imagePath }}'); background-size: cover;">
  <div class="d-flex flex-column justify-content-center">
    <div class="container" style="margin-left: 650px;">
      <h3 class="mb-5">Trova il ristorante che fa per te!</h3>
      <form action="{{ route('restaurants.search') }}" method="GET">
        <div class="input-group">
          <input class="form-control me-2 custom-search-form" style="border: none;margin-bottom: 10px; margin-right: 40px;border-radius: 15px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);" type="search" name="query" placeholder="Nome del ristorante, città, ecc" aria-label="Search">
          <div class="input-group-append">
            <button class="btn pink" type="submit">Cerca</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@if ($restaurants==null)
<div class="custom-container"><h2 class="text-center" style="margin-top:40px;">Nessun risultato</h2></div>
@else
<div class="row" id="resultsContainer">
@foreach ($restaurants as $restaurant)
<div class="col-md-6 mb-4">
  <div class="card shadow-sm" style="margin-bottom: 20px;">
    <img src="{{ asset('img/defaultrestaurant.jpg') }}" alt="Default Restaurant Photo" class="bd-placeholder-img img-fluid" style="object-fit: cover; width: 100%; height: 225px;">
    <div class="card-body">
      <p class="card-text" style="font-size:larger;">{{ $restaurant->name }}</p>
      <div class="address-container" style="display: flex;">
            <svg class="bi d-block other" width="20" height="20">
                <use xlink:href="#indirizzo"/>
            </svg>
            <p class="card-text" style="margin-left:10px; font-size:larger;">{{ $restaurant->city }}</p>
      </div>
      <div class="d-flex justify-content-between align-items-center">
        <div class="btn-group">
          <a href="{{ route('restaurant.details', ['id' => $restaurant->id]) }}" class="btn btn-sm pink">Dettagli</a>
        </div>
        <small class="text-body-secondary" style="margin-left:10px;">{{ $restaurant->averageprice }}</small>
      </div>
    </div>
  </div>
</div>
@endforeach
</div>
<div class="d-flex mt-3">
    {{ $restaurants->links('pagination.paginator') }}
</div>
@endif
@endsection