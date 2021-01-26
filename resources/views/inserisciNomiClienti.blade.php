@extends('layouts.app')

@section('content')

@auth

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div>
                
                <form action="{{route('salvaNomiClienti',['giorno' => $giorno, 'ora' => $ora])}}" method="post">
                    @csrf
                    @method('post')


                    
                   

                    @for ($i = 0; $i < $numeroClienti; $i++)
                    <div id="{{$i}}">
                        <div>
                            <label for="firstname">Nome</label>
                            <input type="text" name="firstname[]">
                        </div>
                        <div>
                            <label for="lastname">Cognome</label>
                            <input type="text" name="lastname[]">
                        </div>
                        <div style="display: none;">
                            <label for="desk_id">xxx</label>
                            <input type="text" name="desk_id" value="{{$tavololiberoID}}">
                        </div>

                    </div>
                        
                    @endfor
                    <button type="submit">Prenota</button>
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