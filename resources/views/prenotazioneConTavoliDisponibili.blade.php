@extends('layouts.app')

@section('content')

@auth

<div class="container">
    <div class="row">
        <div class="col-md-12 d-flex justify-content-center">
            <h1 class="my-4">Tavoli disponibili</h1>
        </div>
        <div class="col-md-12 d-flex justify-content-center"> 
                <ul>
                    @foreach ($tavoliLiberi as $tavoliLibero)
                    <a href="{{route('inserisciNomiClienti', ['numeroClienti' => $numeroClienti, 'ora' => $ora, 'giorno' => $giorno, 'tavololibero' => $tavoliLibero])}}">
                        <li>Il tavolo n.{{$tavoliLibero ->id}} é  disponibile per la sua prenotazione.</li>
                    </a>
                    @endforeach
                </ul>
        </div>
    </div>
</div>
   
@endauth
@guest

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                

                Fai login per visualizzare le funzionalitá del sito
               

            </div>
        </div>
    </div>
</div>
@endguest
@endsection