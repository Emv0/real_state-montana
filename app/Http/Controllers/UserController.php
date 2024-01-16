<?php

namespace App\Http\Controllers;

use App\Models\TypesUsers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::join('types_users', 'types_users.id', '=', 'users.type_user')
        ->select("users.*","types_users.type_user")
        ->get();

        $types = TypesUsers::all();
        
        // return print_r($types); 
        return view('users.index', compact('users','types'));
    }
            
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required'
        ]);

        if($validator->fails()){
            $errors = $validator->errors();
            return response()->json([
                'name' => $errors->first('name')
            ]);
        }

        $user = new User();

        $user->name = $request->name;
        $user->identification = $request->identification;
        $user->age = $request->age;
        $user->email = $request->email;
        $user->phone = $request->phone;
        if($request->type_user != "Seleccionar Usuario"){

            $user->type_user = $request->type_user;


        }else{

            $user->type_user = null;

        }

        $user->save();

        return redirect()->route('user.index');

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {

        $user = User::find($id);

        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($user)
    {        
        $types = TypesUsers::all();
        $user = User::find($user);

        return view('users.edit',compact('user','types'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
