@extends('layouts.app')

@section('content')

@auth


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 text-center">
            <h3>Prenotazioni divise per giorno</h3>
        </div>
        <div class="col-md-12 text-center">
            <ul class="">
                @foreach ($prenotazioniPerGiorno as $key => $item)
                   <li style="list-style: none;">Il giorno <span style="font-weight: bold">{{$key}}</span> abbiamo avuto  <span style="font-weight: bold">{{count($item)}}</span> prenotazioni</li>
                @endforeach
            </ul>
        </div>       
    </div>

     <div class="row justify-content-center">
        <div class="col-md-12 text-center">
        <h3>Prenotazioni future</h3>
        </div>
        <div class="col-md-12 text-center">
        <ul>
            @foreach ($prenotazioniFuture as $key => $prenotazioneFuture)
                <li style="list-style: none;">La prenotazione {{$prenotazioniFuture[$key] -> id}} é per il giorno {{$prenotazioniFuture[$key]-> date}} </li>
            @endforeach
        </ul>
        </div>

    </div>

    <div class="row justify-content-center">
        <div class="col-md-12 text-center">
        <h3>Ricerca Cliente</h3>
        </div>
        <div class="col-md-12 text-center">
        <form action="{{route('controlloNomeCognome')}}" method="post">
            @csrf
            @method('post')

            <div>
                <label for="dato">Nome o Cognome</label>
                <input type="text" name="dato" required>

                <button type="submit">Cerca</button>
            </div>

        </form>
        </div>

    </div>
    <div class="row justify-content-center">
        <div class="col-md-12 text-center mt-4">
            <a class="btn btn-primary" href="{{route('index')}}">Tona alla Home</a>
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