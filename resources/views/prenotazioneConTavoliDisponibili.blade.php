@extends('layouts.app')

@section('content')

@auth

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div>
               
                <ul>
                    @foreach ($tavoliLiberi as $tavoliLibero)
                    <a href="{{route('inserisciNomiClienti', ['numeroClienti' => $numeroClienti, 'ora' => $ora, 'giorno' => $giorno, 'tavololibero' => $tavoliLibero])}}">
                        <li>Il tavolo n.{{$tavoliLibero ->id}} e'disponibile per la sua prenotazione.</li>
                    </a>
                    @endforeach
                </ul>
                        
            
            </div>
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