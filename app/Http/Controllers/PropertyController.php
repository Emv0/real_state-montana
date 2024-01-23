<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $properties = Property::all();

        return view('state.index',compact('properties'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'propertiesType' => ['required','not in'=>['']],
            'zone' => 'required',
            'description' => 'required',
            'address' => 'required',
            'propertyImage' => 'required'
        ]);


        $property = new Property();
        $property->propertiesType = $request->propertiesType;
        $property->zone = $request->zone;
        $property->description = $request->description;
        $property->address = $request->address;
        $property->propertyImage = $request->propertyImage;
        $property->save();

        return redirect()->route('property.show',$property->id);

    }

    /**
     * Display the specified resource.
     */
    public function show($property)
    {
        $property = Property::find($property);

        return view('state.show',compact('property'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Property $property)
    {

        return view('state.edit',compact('property'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Property $property)
    {

        // $request->validate([
        //     'propertiesType' => 'required',
        //     'zone' => 'required',
        //     'description' => 'required',
        //     'address' => 'required',
        //     'propertyImage' => 'required'
        // ]);

        $property->propertiesType = $request->propertiesType;
        $property->zone = $request->zone;
        $property->description = $request->description;
        $property->address = $request->address;

        $property->save();

        return redirect()->route('property.show', $property->id);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Property $property)
    {
        
        $property->delete();

        return redirect()->route('property.index');

    }
}
