<?php

namespace App\Http\Controllers;

use App\Models\Dating;
use App\Models\Property;
use App\Models\TypesUsers;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;

use function Laravel\Prompts\error;

class DatingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users      = User::all();
        $properties = Property::all();

        return view('dating.index', compact('users', 'properties'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Dating $dating)
    {
        //Realizo validación de datos recibidos
        $datingExists = Dating::where('date', $request->date)
            ->where('time', Carbon::parse($request->time)->format('H:i:s'))
            ->where('user_id', $request->user_id)
            ->where('adviser_id', $request->adviser_id)
            ->where('property_id', $request->property_id)
            ->first();

        $datingExistsUser = Dating::where('date', $request->date)
            ->where('time', Carbon::parse($request->time)->format('H:i:s'))
            ->where('user_id', $request->user_id)
            ->first();

        $datingExistsAdviser = Dating::where('date', $request->date)
            ->where('time', Carbon::parse($request->time)->format('H:i:s'))
            ->where('adviser_id', $request->adviser_id)
            ->first();

        $datingExistsProperty = Dating::where('date', $request->date)
            ->where('time', Carbon::parse($request->time)->format('H:i:s'))
            ->where('property_id', $request->property_id)
            ->first();


        if ($datingExists || $datingExistsUser || $datingExistsAdviser || $datingExistsProperty) {
            if ($datingExists) {
                $request->validate([
                    'date'        => 'required',
                    'time'        => 'required',
                    'user_id'     => 'required|unique:datings',
                    'adviser_id'  => 'required|unique:datings',
                    'property_id' => 'required|unique:datings'
                ]);
            } else if ($datingExistsUser) {
                $request->validate([
                    'date'        => 'required',
                    'time'        => 'required',
                    'user_id'     => 'required|unique:datings',
                ]);
            } else if ($datingExistsAdviser) {
                $request->validate([
                    'date'        => 'required',
                    'time'        => 'required',
                    'adviser_id'  => 'required|unique:datings',
                ]);
            } else if ($datingExistsProperty) {
                $request->validate([
                    'date'        => 'required',
                    'time'        => 'required',
                    'property_id' => 'required|unique:datings'
                ]);
            }
        } else {
            $dating->title        = $request->title;
            $dating->date         = $request->date;
            $dating->time         = $request->time;
            $dating->description  = $request->description;
            $dating->user_id      = $request->user_id;
            $dating->adviser_id   = $request->adviser_id;
            $dating->property_id  = $request->property_id;
            $dating->availability = $request->availability;
            $dating->save();
            return redirect()->route('home.index');
            /* return redirect()->route('dating.create'); */
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Dating $dating)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dating $dating)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dating $dating)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dating $dating)
    {
        //
    }
}
