<?php

namespace App\Http\Controllers;

use App\Models\Dating;
use App\Models\Login;
use App\Models\Start;
use Illuminate\Http\Request;

class homeController extends Controller
{
    public function index(){

        $login = Login::where('authorization', true)->first();
        if(!$login){
            return redirect()->route('viewLog.index');
        }
        $datings = Dating::all();
        
        $events = [];

        foreach($datings as $dating){

            $dateTime = $dating->date . 'T' . $dating->time;

            $events[] =[
                'title' => $dating->title,
                'start' => $dateTime,
                // 'startTime' => $dating->time
            ];
        }

        $login->authorization = false;  
        $login->save();  
        return view('dashboard',compact('events')); 
    }

}
