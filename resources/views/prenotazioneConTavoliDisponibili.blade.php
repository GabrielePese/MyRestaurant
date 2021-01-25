@extends('layouts.app')

@section('content')

@auth

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div>
               
                <ul>
                    @foreach ($tavoliGiusti as $tavologiusto)
                    <a href="{{route('inserisciNomiClienti', ['numeroClienti' => $numeroClienti, 'desk_id'=> $tavologiusto -> id])}}">
                        <li>Il tavolo n.{{$tavologiusto -> id}} e'disponibile ed ha {{$tavologiusto -> slots}} posti.</li>
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