@extends('layouts.app')

@section('content')

@auth


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
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
                
                
                
                
                <script>
                    function tellMeHours(){
                        
                        
                        const picker = document.getElementById('giornoSelezionato');
                        picker.addEventListener('input', function(e){
                        var day = new Date(this.value).getUTCDay();
                        if([2].includes(day)){
                          e.preventDefault();
                             this.value = '';
                            alert(`Martedí siamo chiusi, seleziona un'altro giorno`);
                         }
                        });

                        var giorno =  document.getElementById("giornoSelezionato").value;
                        
                        console.log('qui giorno' , giorno);
                        const birthday = new Date(giorno);
                        day1 = birthday.getDay();
                        // Sunday - Saturday : 0 - 6
                        
                        console.log(day1);
                        // expected output: 2
                        select(day1);
                    }
                    
                    
                    
                    function select(){
                        var target = document.getElementById("target")
                        target.innerHTML= '';
                        if (day1 == 1||day1 == 2||day1 == 3||day1 == 4||day1 == 5){
                            
                            for (let i = 0; i < 3; i++) { 
                                var target = document.getElementById("target")
                                var option = document.createElement("option");
                                option.text =  19+i;
                                option.value = 19+i;
                                target.add(option);
                               
                                
                            }
                            
                        }
                        else{
                            for (let i = 0; i < 2; i++) { 
                                
                                var target = document.getElementById("target")
                                var option = document.createElement("option");
                                option.text = 12+i;
                                option.value = 12+i;
                                
                                target.add(option);
                                
                            }
                            
                            var target = document.getElementById("target")
                            var option = document.createElement("option");
                            option.text = 19;
                            option.value = 19;
                            target.add(option);
                            
                            var target = document.getElementById("target")
                            var option = document.createElement("option");
                            option.text = 20;
                            option.value = 20;
                            target.add(option);
                            
                            var target = document.getElementById("target")
                            var option = document.createElement("option");
                            option.text = 21;
                            option.value = 21;
                            target.add(option);
                            
                        }
                        
                           }
                           
                           
                           </script>

<form action="{{route('controlloTavoli')}}" method="post">
    @csrf
    @method('post')
    
    <h2>Prenotazione</h2>
    <div>
        <label for="date">Che giorno?</label>
        <input type="date" id='giornoSelezionato' name="giorno" onchange="tellMeHours()">
    </div>
    
    <div>
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
        <div class="col-md-6 mx-auto">
            <a class="btn btn-primary" href="{{route('visualizzaStatistiche')}}"> Statistiche Clienti</a>
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