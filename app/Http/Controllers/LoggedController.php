<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Desk;
use App\Guest;
use Illuminate\Http\Request;
use Symfony\Component\Console\Helper\DescriptorHelper;
use Illuminate\Support\Facades\DB;

use Carbon\Carbon;

class LoggedController extends Controller
{
    public function impostaTavoli(){
        return view('impostaTavoli');
    }

    public function tavoliPost(Request $request){
        $data = $request -> all();
        $array=[];
        for ($i=0; $i < $data['desks'] ; $i++) { 
            Desk::create([
                
                'slots' => rand(1,12)
            ]);       
        }

        return redirect() -> route('index');
      
    }

    public function controlloTavoli(Request $request){

        $data = $request ->all();
        $giorno = $data['giorno'];
        $ora =$data['ora'].':00:00';
        $timeControllo = $giorno .' '. $ora;
        
        
        $numeroClienti = $request->guest;
        
        
        $tavoliGiusti = DB::table('desks')
        ->select ('*')
        ->where('slots', '>=', $numeroClienti)
        ->get();
        
        
        
        $tavoliGiustiBooking = Booking::whereIn('desk_id', array_map(function($i){
            return $i->id;
        }, $tavoliGiusti -> toArray() )) //e'come un for.
        ->get();
       
        
        $tavoliGiustiBookingData = Booking::select('desk_id', 'date')-> where('date', '=', $timeControllo )
        ->get();
        
        $array= [];
        for ($i=0; $i < count($tavoliGiusti) ; $i++) { 
            array_push($array, ($tavoliGiusti[$i]->id));
        }
        
        $array2= [];
        for ($i=0; $i < count($tavoliGiustiBookingData) ; $i++) { 
            array_push($array2, ($tavoliGiustiBookingData[$i]->desk_id));
        }
        
        $tavoliDisponibili = array_diff($array,$array2);

       

        $tavoliLiberi = DB::table('desks')->whereIn('id' ,$tavoliDisponibili)->get();
            
    
        
        // dd($array,$array2,$tavoliDisponibili,$tavoliLiberi);
        
        
        

       return view('prenotazioneConTavoliDisponibili', compact('tavoliGiusti', 'numeroClienti','giorno', 'tavoliLiberi', 'ora'));


    }


    public function inserisciNomiClienti(Request $request){
        $data = $request ->all();
        $giorno = $data['giorno'];
        $ora =$data['ora'];
        $tavololiberoID=$data['tavololibero']['id'];
      

        $numeroClienti = $request-> numeroClienti;
        $desk_id = $request-> desk_id;

        return view('inserisciNomiClienti', compact('numeroClienti', 'desk_id','giorno', 'ora','tavololiberoID' ));
    }

    public function salvaNomiClienti(Request $request){
        $firstname = $request -> firstname;
        $lastname = $request -> lastname;

        $data = $request->all();
        
       
        $giorno = $data['giorno'];
        $ora =$data['ora'];

        
        $oraTime = $giorno.' '.$ora;
       
        

        $booking = Booking::create([
            'desk_id' => $request -> desk_id,
            'date' => $oraTime
        ]);
            

        for ($i=0; $i < count($firstname) ; $i++) { 
           Guest::create([
               'booking_id' => $booking -> id,
               'firstname' => $firstname[$i],
               'lastname' => $lastname[$i]
           ]);

        }
        
        
       
        return redirect() ->route('index');
    }

    public function visualizzaStatistiche(){
        // Realizzare una pagina all'interno della quale è possibile visualizzare lo storico della prenotazioni suddiviso per giorno

      
        $prenotazioniPerGiorno = Guest::groupBy('firstname')
        ->get();
        
        

        dd($prenotazioniPerGiorno);


        return view('visualizzaStatistiche');
    }
}
