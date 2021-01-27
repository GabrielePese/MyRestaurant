@extends('layouts.app')

@section('content')

@auth


<div class="container">
    <div class="row justify-content-center">

            <h3> Prenotazioni divise per giorno</h3>
        <ul>
            @foreach ($prenotazioniPerGiorno as $prenotazionePerGiorno)
            <li>Il giorno {{$prenotazionePerGiorno->date}} abbiamo avuto {{$prenotazionePerGiorno->Numero_prenotazioni}} prenotazioni. </li>
            @endforeach
        </ul>
    </div>
     <div class="row justify-content-center">

        <h3>Prenotazioni future</h3>
        <ul>

            @foreach ($prenotazioniFuture as $key => $prenotazioneFuture)
                <li>La prenotazione {{$prenotazioniFuture[$key] -> id}} é per il giorno {{$prenotazioniFuture[$key]-> date}} </li>
            @endforeach
        </ul>

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