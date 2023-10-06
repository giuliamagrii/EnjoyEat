@extends('layouts.master')

@section('titolo') 
Elimina profilo
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
                <h3 class="text-center" style="margin-bottom:30px;" >Sei sicuro di voler eliminare l'account?</h3>
                <div style="display: flex; justify-content: center; align-items: center;">
                    <form action="{{ route('owner.delete', ['id' => $id]) }}" method="get">
                        @csrf
                        <button class="me-3 mb-2 btn btn-outline-secondary rounded-3" style="margin-right:20px; font-size:20px;" type="submit">Sì</button>
                    </form>
                    <a href="{{ route('owner.settings', ['id' => $id]) }}" class="mb-2 btn pink rounded-3 color-white" style="font-size:20px;" type="submit">No</a>
                </div>
            </div>
        </div>
@endsection