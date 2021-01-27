@extends('layouts.app')

@section('content')

@auth

    <div class="sfondo d-flex justify-content-center align-items-center" style="height: 100vh;">
        <h1 style="font-family: 'great vibes'; font-size: 60px; color:white;"> MyRestaurant</h1>
    </div>
    <div class="container">
        <div class="row ">
            <div class="col-md-6 d-flex justify-content-center d-flex align-items-center flex-column mb-5">
               
                    @if(count($tavoli)> 0)
                        <h1>Hai {{ count($tavoli) }} tavoli:</h1>
                        <ul>
                            @foreach($tavoli as $tavolo)
                                <li>Il tavolo {{ $tavolo ->id }} ha {{ $tavolo -> slots }} posti a sedere.
                                </li>
                            @endforeach
                        </ul>

                    @else
                        <a class="btn btn-danger"  href="{{ route('impostaTavoli') }}">Imposta tavoli</a>
                    @endif

            </div>
            <div class="col-md-6 d-flex justify-content-center d-flex align-items-center flex-column mb-5">

                    <form action="{{ route('controlloTavoli') }}" method="post">
                        @csrf
                        @method('post')

                        <h2>Prenotazione</h2>
                        <div>
                            <label for="date">Che giorno?</label>
                            <input type="date" id='giornoSelezionato' name="giorno">
                        </div>

                        <div>
                            A che ora volete arrivare?
                            <select name="ora" id="target"></select>
                        </div>

                        <h4>Quanti sono i clienti?</h4>


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
