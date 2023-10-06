@extends('layouts.master')

@section('titolo') 
Homepage 
@endsection

@section('stile', 'style.css')

@section('breadcrumb')
<li class="breadcrumb-item active">
      Home
</li>
@endsection

@section('corpo')
  <div class="hero-unit rounded custom-hero" style="background-image: url('img/8488104_3922958-01.png');background-size: cover;">
    <div class="container custom-search">
      <form action="{{ route('restaurants.list') }}" method="GET">
        @csrf
        <select class="form-select input-shorter custom-select rounded" aria-label="Dropdown" name="food_id" id="foodSelect">
          <option selected disabled>Cosa vuoi mangiare?</option>
          @foreach ($foods as $food)
            <option value="{{ $food->id }}">{{ $food->name }}</option>
          @endforeach
        </select>
        <button class="w-10 mb-2 btn btn-lg rounded-3 shadow search" type="submit" disabled>
          <span class="color-white">Cerca</span>
        </button>
      </form>
    </div>
  </div>
  <div class="subtitle">
    <h3> Ristoranti migliori </h3>
  </div>
  <div class="row">
  @foreach ($bestrestaurants as $restaurant)
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
@endsection

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Get references to the selects and the button
    const foodSelect = document.getElementById('foodSelect');
    const cercaButton = document.querySelector('.search');
    const restaurantsList = document.getElementById('restaurantsList');
    const loadMoreButton = document.querySelector('.load-more');

    // Add event listeners to the selects
    foodSelect.addEventListener('change', validateForm);

    // Function to enable/disable the button based on selections
    function validateForm() {
        if (foodSelect.value) {
            cercaButton.removeAttribute('disabled');
        } else {
            cercaButton.setAttribute('disabled', 'disabled');
        }
    }
  })

</script>