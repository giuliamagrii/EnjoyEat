@extends('layouts.master')

@section('titolo') 
Profilo ristoratore
@endsection

@section('stile', 'style.css')

@section('breadcrumb')
<li class="breadcrumb-item active" aria-current="page">
<a class="link-body-emphasis" href="{{ route('owner.myprofile') }}">Profilo</a> 
</li>
@endsection

@section('corpo')
    <div class="hero-unit" style="margin-bottom:300px;">
        <h3 style="margin-bottom:150px;">Ciao {{ $owner->name }}!</h3>
        <div class="row">
          <div class="col-md-4 text-center big" style="margin-bottom:20px;">
        <a href="{{ route('owner.restaurantinfo', $owner->id) }}">
            <button class="btn btn-link">
                <svg class="bi d-block mx-auto mb-1 navpink" width="50" height="50"><use xlink:href="#ristoranti"/></svg>
            </button>
        </a>
        <h3>Il mio ristorante</h3>
    </div>
    <div class="col-md-4 text-center big" style="margin-bottom:20px;">
        <a href="{{ route('owner.receivedreviews', $owner->id) }}">
            <button class="btn btn-link">
                <svg class="bi d-block mx-auto mb-1 navpink" width="50" height="50"><use xlink:href="#recensioni"/></svg>
            </button>
        </a>
        <h3>Recensioni ricevute </h3>
    </div>
    <div class="col-md-4 text-center big" style="margin-bottom:20px;">
        <a href="{{ route('owner.settings', $owner->id) }}">
            <button class="btn btn-link">
                <svg class="bi d-block mx-auto mb-1 navpink" width="50" height="50"><use xlink:href="#settings"/></svg>
            </button>
        </a>
        <h3>Impostazioni </h3>
    </div>
</div>
</div>
@endsection



