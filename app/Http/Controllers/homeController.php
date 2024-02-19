<?php

namespace App\Http\Controllers;

use App\Models\Dating;
use App\Models\Start;
use Illuminate\Http\Request;

class homeController extends Controller
{
    public function index(){
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

        return view('dashboard',compact('events')); 
    }

}
