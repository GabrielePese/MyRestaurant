@extends('layouts.app')

@section('content')

@auth

<div class="container">
    <div class="row">
        <div class="col-xs-12 mx-auto text-center">
            <h1>Ricerca clienti nel database</h1>
            
            <ul class="mt-3">
                @if ($result == false)
                @foreach ($risultato as $item)                  
                
                  <li>Il cliente <span style="font-weight: bold">{{$item -> firstname}} {{$item-> lastname}}</span> e' stato nostro cliente il <span style="font-weight: bold">{{$item -> date}}.</span> Prenotazione numero <span style="font-weight: bold">{{$item -> booking_id}}</span></li>
    
                @endforeach
                @else
                'Non ho trovato alcun risultato'
                @endif
                <br><a class="btn btn-primary my-5" href="{{route('visualizzaStatistiche')}}">Torna alla ricerca</a>
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