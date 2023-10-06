@extends('layouts.master')

@section('titolo') 
Dettagli ristorante
@endsection

@section('stile', 'style.css')

@section('breadcrumb')
<li class="breadcrumb-item">
    <a class="link-body-emphasis" href="{{ route('home') }}">
        Home
    </a>
</li>
<li class="breadcrumb-item">
    <a class="link-body-emphasis" href="{{ route('restaurants.list') }}">
        Ristoranti
    </a>
</li>
<li class="breadcrumb-item active" aria-current="page">
    Dettagli ristorante
</li>
@endsection

@section('corpo')
@php
  $imagePath = asset('img/defaultrestaurant.jpg');
@endphp
<div class="hero-unit rounded mb-3" style="display: flex; height: 200px; background-size: cover; background-image: url('{{ $imagePath }}');"></div>
<h3 class="mb-3">{{ $restaurant->name }}</h3>
<div class="align-items-stretch d-flex justify-content-between" style="margin-bottom:20px;">
        <button class="btn little-food custom-background" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{ $food->name }}">
            <img src="{{ asset('img/' . $food->image) }}" class="img-fluid" width="30" height="30">
        </button>
    @if($logged && $user_type=='customer')
    </h3>
    <div class="quote-container mb-3">
    <form method="POST" action="{{ route('customer.favoritetoggle', ['id' => $restaurant->id]) }}">
        @csrf
        @method('POST')
        <button type="submit" class="btn heart custom-background" data-bs-toggle="tooltip" data-bs-placement="bottom"
            title="{{ $isFavorite ? 'Rimuovi dai preferiti' : 'Aggiungi ai preferiti' }}">
            <svg class="bi d-block mb-1 other" width="24" height="24">
                <use xlink:href="{{ $isFavorite ? '#full-heart' : '#cuore' }}"/>
            </svg>
        </button>
      </form>
    </div>
    @endif
</div>
    <div class="row">
        <div class="col-md-5">
            <div class="price-container" style="display: flex;align-items: center; margin-bottom:20px;">
                <span>Fascia di prezzo: </span>
                <span style="margin-left:10px;">{{ $restaurant->averageprice }}</span>
            </div>
            <div class="address-container" style="display: flex;align-items: center; margin-bottom:10px;">
                <svg class="bi d-block mb-1 other" width="20" height="20">
                  <use xlink:href="#indirizzo"/>
                </svg>
                <div class="d-flex">
                <span style="margin-left: 10px;">{{ $restaurant->street }},</span>
                <span style="margin-left: 10px;">{{ $restaurant->city }},</span>
                <span style="margin-left: 10px;">{{ $restaurant->postalcode }},</span>
                <span style="margin-left: 10px;">{{ $restaurant->country }}</span>
                </div>
            </div>
            <div class="phone-container mb-3" style="display: flex;align-items: center; margin-bottom:10px;">
                <svg class="bi d-block mb-1 other" width="20" height="20">
                  <use xlink:href="#phone"/>
                </svg>
                <span style="margin-left: 10px;">{{ $restaurant->phonenumber }}</span>
            </div>
            <div class="email-container mb-3" style="display: flex;align-items: center; margin-bottom:10px;">
                <svg class="bi d-block mb-1 other" width="20" height="20">
                  <use xlink:href="#email"/>
                </svg>
                <span style="margin-left: 10px;">{{ $restaurant->email }}</span>
            </div>
            <div class="info-container mb-5" style="display: flex;align-items: center; margin-bottom:10px;">
                <svg class="bi d-block mb-1 other" width="20" height="20">
                  <use xlink:href="#info"/>
                </svg>
                <span style="margin-left: 10px;"> {{ $restaurant->description }} </span>
            </div>
          </div>
          <div class="col-md-7">
          <div class="row">
              <div class="col-md-5">
                <div class="point-container mb-3" style="display: flex;align-items: center; margin-bottom:15px;">
                  <svg class="bi d-block other" width="20" height="20">
                    <use xlink:href="#punti"/>
                  </svg>
                  <span style="margin-left: 10px;"> {{ number_format($averageScore, 1) }} </span>
                </div>
                <div class="quote-container mb-3" style="display: flex;align-items: center; margin-bottom:15px;">
                  <svg class="bi d-block mb-1 other" width="20" height="20">
                    <use xlink:href="#quote"/>
                  </svg>
                  <span style="margin-left: 10px;"> {{ $reviewCount }} </span>
                </div>
                <div class="quote-container mb-3" style="display: flex;align-items: center; margin-bottom:10px;">
                  <svg class="bi d-block other" width="20" height="20">
                    <use xlink:href="#recensioni"/>
                  </svg>
                  @if($logged)
                      @if ($user_type == 'owner')
                      <span class="ms-2 color-black" style="margin-left: 10px;">Non puoi scrivere recensioni</span>
                      @else
                      <a class="ms-2 color-black" style="margin-left: 10px;" href="{{ route('customer.writereview', $customer->id) }}">Scrivi una recensione</a>
                      @endif
                  @else
                  <span class="ms-2 color-black" style="margin-left: 10px;">Accedi per scrivere una recensione</span>
                  @endif
                </div>
              </div>
              <div class="col-md-7">
              <div class="align-items-center mb-2" style="display: flex;">
                  <img src="{{ asset('img/chef_10167720.png') }}" style="margin-right:10px; margin-bottom:10px;" class="img-fluid" width="21" height="21" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Cucina">
                  @foreach (range(1, 5) as $i)
                  <svg class="bi d-block mx-auto other" style="margin-right:10px; margin-top:4px;" width="14" height="14">
                    @if ($menuScore >= $i)
                        <use xlink:href="#full-circle"/>
                    @elseif ($menuScore > $i - 1)
                        <use xlink:href="#half-circle"/>
                    @else
                        <use xlink:href="#empty-circle"/>
                    @endif
                    </svg>
                  @endforeach
                </div>
                <div class="align-items-center mb-2" style="display: flex;">
                    <img src="{{ asset('img/food-tray_2022197.png') }}"  style="margin-right:10px; margin-bottom:10px;" class="img-fluid" width="21" height="21" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Servizio">
                  @foreach (range(1, 5) as $i)
                  <svg class="bi d-block mx-auto mb-1 other" style="margin-right:10px; margin-top:4px;" width="14" height="14">
                    @if ($serviceScore >= $i)
                        <use xlink:href="#full-circle"/>
                    @elseif ($serviceScore > $i - 1)
                        <use xlink:href="#half-circle"/>
                    @else
                        <use xlink:href="#empty-circle"/>
                    @endif
                    </svg>
                  @endforeach
                </div>
                <div class="align-items-center mb-2" style="display: flex;">
                    <img src="{{ asset('img/coin_2529396.png') }}" style="margin-right:10px; margin-bottom:10px;" class="img-fluid" width="21" height="21" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Qualità/prezzo">
                  @foreach (range(1, 5) as $i)
                  <svg class="bi d-block mx-auto mb-1 other" style="margin-right:10px; margin-top:4px;" width="14" height="14">
                    @if ($billScore >= $i)
                        <use xlink:href="#full-circle"/>
                    @elseif ($billScore > $i - 1)
                        <use xlink:href="#half-circle"/>
                    @else
                        <use xlink:href="#empty-circle"/>
                    @endif
                    </svg>
                  @endforeach
                </div>
                <div class="align-items-center mb-2" style="display: flex;">
                    <img src="{{ asset('img/restaurant_5193674.png') }}" style="margin-right:10px; margin-bottom:10px;" class="img-fluid" width="21" height="21" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Location">
                  @foreach (range(1, 5) as $i)
                  <svg class="bi d-block mx-auto mb-1 other" style="margin-right:10px; margin-top:4px;" width="14" height="14">
                    @if ($locationScore >= $i)
                        <use xlink:href="#full-circle"/>
                    @elseif ($locationScore > $i - 1)
                        <use xlink:href="#half-circle"/>
                    @else
                        <use xlink:href="#empty-circle"/>
                    @endif
                    </svg>
                  @endforeach
                </div>
              </div>
            </div>
          </div>
       </div>

        <h3 style="margin-bottom:20px;">Recensioni</h3>
        <div class="reviews-row">
          @foreach ($reviews as $review)
          <div class="card custom-recensione" style="border-radius:15%; border-color:black;">
              <div class="d-flex align-items-center">
                <div class="card-body">
                    <div class="icon-and-text mb-2 d-flex">
                        <svg class="bi d-block mb-1 other" width="20" height="20">
                            <use xlink:href="#profilo"/>
                        </svg>
                        <span style="margin-left: 5px;">{{ $review->customer->username }}</span>
                    </div>
                    <div class="mb-2" style="display: flex; align-items: baseline;">
                        <div style="font-size: 14px; color: gray; margin-right: 10px;">{{ $review->date }}</div>
                    </div>
                    <div class="d-flex mb-2">
                        @foreach (range(1, 5) as $i)
                            <svg class="bi mb-1 other me-1" width="10" height="10">
                                @if ($review->score >= $i)
                                    <use xlink:href="#full-star"/>
                                @else
                                    <use xlink:href="#star"/>
                                @endif
                            </svg>
                        @endforeach
                    </div>
                    <p>{{ $review->comment }}</p>
                </div>
            </div>
        </div>
    @endforeach
</div>
<div class="d-flex mt-3">
    {{ $reviews->links('pagination.paginator') }}
</div>
@endsection