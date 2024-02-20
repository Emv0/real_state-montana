<?php

namespace App\Http\Controllers;

use App\Mail\CodesMailable;
use App\Models\Login;
use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{

    public function sendIdentification(Request $request, Login $login)
    {

        $user       = User::where('identification', $request->identification)->first();

        if (!$user) {
            return response()->json('Número de documento no registrado', 403);
        }

        if ($user->type_user != 1 && $user->type_user != 3) {
            return response()->json('No tienes los permisos para acceder', 403);
        }

        //Consultamos la tabla login buscando un usuario existente.
        $exist      = Login::where('identification', $user->id)->first();
        $sendMail   = new EmailController();
        $sentEmail  = $sendMail->sendMail($user->email);

        if ($sentEmail) {
            //Si hay un usuario regitrado con un código se elimina el registro.
            if ($exist) {
                $exist->delete();
            }
            $login->code           = $sentEmail;
            $login->identification = $user->id;
            $login->save();
            return response()->json("Se ha enviado el código al correo $user->email");
        }
    }

    public function sendCode(Request $request)
    {
        $user = User::where('identification', $request->identification)->first();

        $exist = Login::where('code', $request->code)
            ->where('identification', $user->id)
            ->exists();

        $login = Login::where('identification', $user->id)
        ->first();

        if (!$exist) {
            return response()->json(["Código invalido"], 401);
        }

        $login->authorization = true;
        $login->save();
        return response()->json(["Ingresaste correctamente"], 200);
    }
}
