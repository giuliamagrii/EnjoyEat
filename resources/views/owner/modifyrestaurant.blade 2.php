@extends('layouts.master')

@section('titolo') 
Il mio ristorante
@endsection

@section('stile', 'style.css')

@section('breadcrumb')
<li class="breadcrumb-item">
    <a class="link-body-emphasis" href="{{ route('owner.myprofile') }}">
        Profilo
    </a>
</li>
<li class="breadcrumb-item active" aria-current="page">
     Il mio ristorante
</li>
@endsection

@section('corpo')
@if(!$restaurant)
    <div class="hero-unit shadow p-3 d-flex" style="justify-content: center; align-items: center; text-align: center;">
                <form method="POST" action="{{ route('owner.createrestaurant', $owner->id) }}" enctype="multipart/form-data">
                  @csrf
                  <h2 style="margin-bottom:30px;">Non hai ancora aggiunto il tuo ristorante!</h2>
                  @error('name')
                      <div class="text-danger">{{ $message }}</div>
                  @enderror
                  <div class="form-floating me-3 required" style="margin-bottom:10px;">
                      <input type="text" name="name" class="form-control rounded-3" id="name" placeholder="Name" value="" required>
                  </div>
                  @error('email')
                       <div class="text-danger">{{ $message }}</div>
                  @enderror
                  <div class="form-floating mb-3 required">
                    <input type="email" class="form-control rounded-3" id="email" name="email" placeholder="Email" required>
                  </div>
                  <small id="emailHelpBlock" class="form-text text-muted"style="margin-bottom:10px;">
                      L'email deve essere nel formato <strong>localport@domain</strong>.
                    </small>
                  @error('phonenumber')
                       <div class="text-danger">{{ $message }}</div>
                  @enderror
                  <div class="form-floating mb-3 required" style="margin-bottom:10px;">
                    <input type="text" class="form-control rounded-3" id="phonenumber" name="phonenumber" placeholder="Phone">
                  </div>
                  @error('street')
                       <div class="text-danger">{{ $message }}</div>
                  @enderror
                  <div class="form-floating mb-3 required" style="margin-bottom:10px;">
                    <input type="text" class="form-control rounded-3" id="street" name="street" placeholder="Street">
                  </div>
                  @error('city')
                       <div class="text-danger">{{ $message }}</div>
                  @enderror
                  <div class="form-floating mb-3 required" style="margin-bottom:10px;">
                    <input type="text" class="form-control rounded-3" id="city" name="city" placeholder="City">
                  </div>
                  @error('postalcode')
                       <div class="text-danger">{{ $message }}</div>
                  @enderror
                  <div class="form-floating mb-3 required" style="margin-bottom:10px;">
                    <input type="text" class="form-control rounded-3" id="postalcode" name="postalcode" placeholder="Postal Code">
                  </div>
                  @error('country')
                       <div class="text-danger">{{ $message }}</div>
                  @enderror
                  <div class="form-floating mb-3 required" style="margin-bottom:10px;">
                    <input type="text" class="form-control rounded-3" id="country" name="country" placeholder="Country">
                  </div>
                  @error('description')
                       <div class="text-danger">{{ $message }}</div>
                  @enderror
                  <div class="form-floating mb-3 required" style="margin-bottom:10px;">
                    <textarea class="form-control auto-resize" style="width:100%;" id="description" name="description" placeholder="Description"></textarea>
                  </div>
                  @error('average_price')
                       <div class="text-danger">{{ $message }}</div>
                  @enderror
                  <div class="form-floating mb-3">
                    <select class="form-select custom-select rounded-3 required" style="height:40px; margin-bottom: 10px;" id="averageprice" name="averageprice">
                      <option value="" selected disabled>Seleziona il prezzo medio</option>
                      <option value="€">Basso</option>
                      <option value="€€">Medio</option>
                      <option value="€€€">Alto</option>
                    </select>
                  </div>
                  
                  <div>
                  <h5 style="margin-bottom:10px;"> Ti chiediamo inoltre di selezionare il tipo di cucina che offri</h5>
                  @error('food')
                       <div class="text-danger">{{ $message }}</div>
                  @enderror
                  <select class="form-select custom-select rounded required" style ="margin-bottom:30px;" name="food" id="food">
                    @foreach ($foods as $food)
                    <option value="{{ $food->id }}">{{ $food->name }}</option>
                    @endforeach
                  </select> 
                </div>
                <button class="btn btn-lg rounded-3 pink shadow" type="submit">Conferma</button>
                </form>
            </div>
          </div>

@else
            <div class="hero-unit shadow custom-hero2">
                <form action="{{ route('owner.restaurantupdate', $owner->id ) }}" method="post" enctype="multipart/form-data">
                @csrf
                  @method('PUT')
                    <h3 class="mb-5 mt-5">Modifica ristorante</h3>
                    <h5 class="mb-5" style="margin-bottom:20px;">In questi campi pre-compilati puoi apportare tutte le modifiche relative ai dati del tuo ristorante</h5>
                    @error('name')
                      <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-floating me-3 required" style="margin-bottom:10px;">
                      <input type="text" name="name" class="form-control rounded-3" id="name" placeholder="Name" value="{{ old('name', $restaurant->name) }}">
                    </div>
                    @error('email')
                       <div class="text-danger">{{ $message }}</div>
                    @enderror
                      <div class="form-floating mb-3 required">
                        <input type="email" class="form-control rounded-3" id="email" name="email" placeholder="Email" value="{{ old('email', $restaurant->email) }}">
                      </div>
                      <small id="emailHelpBlock" class="form-text text-muted"style="margin-bottom:10px;">
                        L'email deve essere nel formato <strong>localport@domain</strong>
                      </small>
                    @error('phonenumber')
                       <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-floating mb-3 required" style="margin-bottom:10px;">
                      <input type="text" class="form-control rounded-3" id="phonenumber" name="phonenumber" placeholder="Phone" value="{{ old('phonenumber', $restaurant->phonenumber) }}">
                    </div>
                    @error('street')
                       <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-floating mb-3 required" style="margin-bottom:10px;">
                      <input type="text" class="form-control rounded-3" id="street" name="street" placeholder="Street" value="{{ old('street', $restaurant->street) }}">
                    </div>
                    @error('city')
                      <div class="text-danger">{{ $message }}</div>
                    @enderror
                      <div class="form-floating mb-3 required" style="margin-bottom:10px;">
                        <input type="text" class="form-control rounded-3" id="city" name="city" placeholder="City" value="{{ old('city', $restaurant->city) }}">
                      </div>
                    @error('postalcode')
                      <div class="text-danger">{{ $message }}</div>
                    @enderror
                      <div class="form-floating mb-3 required" style="margin-bottom:10px;">
                        <input type="text" class="form-control rounded-3" id="postalcode" name="postalcode" placeholder="Postal Code" value="{{ old('postalcode', $restaurant->postalcode) }}">
                      </div>
                    @error('country')
                      <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-floating mb-3 required" style="margin-bottom:10px;">
                      <input type="text" class="form-control rounded-3" id="country" name="country" placeholder="Country" value="{{ old('country', $restaurant->country) }}">
                    </div>
                    @error('description')
                      <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-floating mb-3 required" style="margin-bottom:10px;">
                      <textarea class="form-control auto-resize" style="width:100%;" id="description" name="description" placeholder="Description">{{ old('description', $restaurant->description) }}</textarea>
                    </div>
                    @error('average_price')
                      <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-floating mb-3">
                      <select class="form-select custom-select rounded-3 required" style="height:40px; margin-bottom: 10px;" id="averageprice" name="averageprice">
                      <option value="" selected disabled>Seleziona il prezzo medio</option>
                      <option value="€" {{ old('averageprice', $restaurant->averageprice) === '€' ? 'selected' : '' }}>Basso</option>
                      <option value="€€" {{ old('averageprice', $restaurant->averageprice) === '€€' ? 'selected' : '' }}>Medio</option>
                      <option value="€€€" {{ old('averageprice', $restaurant->averageprice) === '€€€' ? 'selected' : '' }}>Alto</option>
                      </select>
                    </div>
                <div>
                  <h5 style="margin-bottom:10px;">Modifica il tipo di cucina che offri</h5>
                  @error('food')
                  <div class="text-danger">{{ $message }}</div>
                  @enderror
                  <select class="form-select custom-select rounded required" style="margin-bottom:30px;" name="food" id="food">
                  @foreach ($foods as $food)
                  <option value="{{ $food->id }}" {{ old('food', $restaurant->food_id) == $food->id ? 'selected' : '' }}>{{ $food->name }}</option>
                  @endforeach
                </select>
              </div>
                <button class="btn btn-lg rounded-3 pink shadow" type="submit">Conferma</button>
                </form>
            </div>
          </div>
@endif
@endsection
   