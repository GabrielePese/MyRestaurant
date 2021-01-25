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
        $numeroClienti = $request->guest;
        
        $tavoliGiusti = DB::table('desks')
        ->select ('*')
        ->where('slots','>=',$numeroClienti)
        ->get();

       return view('prenotazioneConTavoliDisponibili', compact('tavoliGiusti', 'numeroClienti'));


    }


    public function inserisciNomiClienti(Request $request){
        
        $numeroClienti = $request-> numeroClienti;
        $desk_id = $request-> desk_id;

        return view('inserisciNomiClienti', compact('numeroClienti', 'desk_id'));
    }

    public function salvaNomiClienti(Request $request){
        $firstname = $request -> firstname;
        $lastname = $request -> lastname;
        $data = $request->all();
       
        $oraTime = Carbon::now();


        $booking = Booking::create([
            'desk_id' => $request -> desk_id,
            'date' => $oraTime
        ]);
            

        for ($i=0; $i < count($firstname) ; $i++) { 
           Guest::create([
               'firstname' => $firstname[$i],
               'lastname' => $lastname[$i]
           ]);

        }
        
        $booking = Booking::findOrFail($booking -> id);
        $guest = Guest::findOrFail(22);

        $guest -> bookings() ->attach($booking -> id);
        // $booking -> guests() ->attach($guest);
       
        return redirect() ->route('index');
    }
}
