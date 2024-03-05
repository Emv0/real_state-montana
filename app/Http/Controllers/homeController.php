<?php

namespace App\Http\Controllers;

use App\Models\Dating;
use App\Models\Login;
use App\Models\Property;
use App\Models\Start;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class homeController extends Controller
{
    public function index(){


        $date = Carbon::now();
        $dateMiliseconds = $date->timestamp * 1000;
        $datings = Dating::all();
        $countProperties = Property::count();
        $countClients = User::where('type_user',2)
                        ->count();
        $n = 0;

        $events = [];

        foreach($datings as $dating){

            $dateTime = $dating->date . 'T' . $dating->time;
            $parseDate = $dateTime;
            $dateDB = Carbon::parse($parseDate);
            $milisecondsData = $dateDB->timestamp * 1000;
            if ($dateMiliseconds <= $milisecondsData){
                $n = $n+1;
            }
            $events[] =[
                'title' => $dating->title,
                'start' => $dateTime,
            ];
        }
        return view('dashboard',compact('events','n','countProperties','countClients')); 
    }

}
