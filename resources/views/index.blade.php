@extends('layouts.app')

@section('content')

@auth

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div>
                

                @if (count($tavoli)> 0)
                <h1>Hai {{count($tavoli)}} tavoli:</h1>
                <ul>
                    @foreach ($tavoli as $tavolo)
                    <li>Questo tavolo ha {{$tavolo -> slots}} posti a sedere.</li>
                    @endforeach
                </ul>

                @else
                <a href="{{route('impostaTavoli')}}">Imposta tavoli</a>
                @endif



                <h2>Prenotazione</h2>
                <h4>Quanti sono i clienti?</h4>
                <form action="{{route('controlloTavoli')}}" method="post">
                    @csrf
                    @method('post')

                    <div>
                        <label for="guest">Quanti sono i clienti?</label>
                        <input type="number" name="guest">
                    </div>
                    <button type="submit">Controlla</button>
                </form>

                                     
            
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