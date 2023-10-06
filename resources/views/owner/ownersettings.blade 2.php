@extends('layouts.master')

@section('titolo') 
Impostazioni ristoratore
@endsection

@section('stile', 'style.css')

@section('breadcrumb')
<li class="breadcrumb-item">
    <a class="link-body-emphasis" href="{{ route('owner.myprofile') }}">
        Profilo
    </a>
</li>
<li class="breadcrumb-item active" aria-current="page">
    Impostazioni profilo
</li>
@endsection


@section('corpo')
            <div class="hero-unit shadow">
              <section>
              <div class="container">
                <h2 class="mb-5">Modifica profilo</h2>
                <br>
                <form action="{{ route('owner.update', $owner->id ) }}" method="post">
                  @csrf
                  @method('PUT')
                  @error('name')
                  <div class="text-danger">{{ $message }}</div>
                  @enderror
                  <label for="name" class="control-label">Nome: </label>
                  <div class="form-group required">
                    <input type="text" name="name" class="form-control" placeholder="Name" value="{{ $owner->name }}"/>
                  </div>
                  @error('surname')
                  <div class="text-danger">{{ $message }}</div>
                  @enderror
                  <label for="surname" class="control-label">Cognome: </label>
                  <div class="form-group required">
                    <input type="text" name="surname" class="form-control" placeholder="Surname" value="{{ $owner->surname }}"/>
                  </div>
                  <label for="username" class="control-label">Username: </label>
                  @error('username')
                  <div class="text-danger">{{ $message }}</div>
                  @enderror
                  <div class="form-group required">
                    <input type="text" name="username" class="form-control" placeholder="Username" value="{{ $owner->username }}" required/>
                  </div>
                  <label for="email" class="control-label">Email: </label>
                  @error('email')
                  <div class="text-danger">{{ $message }}</div>
                  @enderror
                  <div class="form-group required">
                    <input type="text" name="email" class="form-control" aria-describedby="emailHelpBlock" placeholder="email" value="{{ $owner->email }}" required/>
                    <small id="emailHelpBlock" class="form-text text-muted">
                      L'email deve essere nel formato <strong>localport@domain</strong>
                    </small>
                  </div>  
                    <button type="submit" class="btn btn-lg rounded-3 pink shadow">Conferma</button>
                  </form>
                </section>

<!-- Change password section -->
<section id="changepassword">
  <div class="container">
    <h2 class="mb-5">Cambia password</h2>
    <br>
    <form action="{{ route('owner.passwordupdate', $owner->id ) }}" method="post">
      @csrf
      @method('PUT')
      
      <label for="oldpassword" class="control-label">Vecchia password: </label>
      @error('oldpassword')
      <div class="text-danger">{{ $message }}</div>
      @enderror
      <div class="form-group required">
        <input type="password" name="oldpassword" class="form-control" aria-describedby="passwordHelpBlock" placeholder="Vecchia password" value="" required/>
      </div>

      <label for="password" class="control-label">Nuova password: </label>
      @error('password')
      <div class="text-danger">{{ $message }}</div>
      @enderror
      <div class="form-group required">
        <input type="password" name="password" class="form-control" aria-describedby="passwordHelpBlock" placeholder="Nuova Password" value="" required/>
        <small id="passwordHelpBlock" class="form-text text-muted">
           La password deve contenere almeno 8 caratteri.
        </small>
      </div>
                    
      <label for="password-confirmation" class="control-label">Conferma password: </label>
      @error('password-confirmation')
      <div class="text-danger">{{ $message }}</div>
      @enderror
      <div class="form-group required">
        <input type="password" name="password-confirmation" class="form-control" placeholder="Conferma password" value="" required/>
      </div>

      <button type="submit" class="btn btn-lg rounded-3 pink shadow">Conferma</button>
    </form>
  </div>
</section>

<!-- Delete account section -->
<section>
  <div class="container">
    <h2 style="margin-bottom:5px;">Elimina account</h2>
    <br>
      <a href="{{ route('owner.deleteaccount', ['id' => $owner->id]) }}" style="margin-bottom:40px;" class="btn btn-lg btn-danger">Elimina profilo</a>
  </div>
</section>
@endsection
