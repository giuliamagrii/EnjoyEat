@extends('layouts.master')

@section('titolo') 
Recensioni ricevute
@endsection

@section('stile', 'style.css')

@section('breadcrumb')
<li class="breadcrumb-item">
    <a class="link-body-emphasis" href="{{ route('owner.myprofile') }}">
        Profilo
    </a>
</li>
<li class="breadcrumb-item active" aria-current="page">
     Recensioni ricevute
</li>
@endsection

@section('corpo')
        <div class="card-container custom-container">
        @if ($reviews)
        <div class="row" style="margin-bottom:20px;">
        @foreach ($reviews as $review)
        <div class="col-md-4">
          <div class="card custom-recensione">
          <div class="row">
            <div class="col-md-6">
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
                    <h5>{{ $review->comment }}</h5>
                </div>
            </div>
        </div>
        <div class="col-md-6">
              <div class="align-items-center mb-2" style="display: flex;">
                  <img src="{{ asset('img/chef_10167720.png') }}" style="margin-right:10px; margin-bottom:10px;" class="img-fluid" width="21" height="21" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Cucina">
                  @foreach (range(1, 5) as $i)
                  <svg class="bi d-block other" style="margin-right:10px; margin-top:4px;" width="14" height="14">
                    @if ($review->menu_score >= $i)
                        <use xlink:href="#full-circle"/>
                    @elseif ($review->menu_score > $i - 1)
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
                  <svg class="bi d-block other" style="margin-right:10px; margin-top:4px;" width="14" height="14">
                    @if ($review->service_score >= $i)
                        <use xlink:href="#full-circle"/>
                    @elseif ($review->service_score > $i - 1)
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
                  <svg class="bi d-block other" style="margin-right:10px; margin-top:4px;" width="14" height="14">
                    @if ($review->bill_score >= $i)
                        <use xlink:href="#full-circle"/>
                    @elseif ($review->bill_score > $i - 1)
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
                  <svg class="bi d-block other" style="margin-right:10px; margin-top:4px;" width="14" height="14">
                    @if ($review->location_score >= $i)
                        <use xlink:href="#full-circle"/>
                    @elseif ($review->location_score > $i - 1)
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
    @if($loop->iteration % 3 == 0) 
            </div><div class="row" style="margin-bottom:20px;">
    @endif
    @endforeach
    </div>
    <div class="d-flex justify-content-center mt-3">
          {{ $reviews->links('pagination.paginator') }} 
    </div>
    @else
        @if($restaurant)
        <div class="text-center" style="margin-bottom:550px;">
            <h3 style="margin-bottom:30px;">Non hai ancora ricevuto nessuna recensione!</h3>
        </div>
        @else
        <div class="text-center" style="margin-bottom:500px;">
            <h4 style="margin-bottom:30px;">Aggiungi il tuo ristorante per poter ricevere delle recensioni!</h4>
            <a href="{{ route('owner.restaurantinfo', $owner->id) }}" class="btn btn-lg rounded-3 pink shadow">Aggiungi</a>
        </div>
        @endif
    @endif
</div>
@endsection