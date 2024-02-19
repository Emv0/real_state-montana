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
        $sendMail   = new EmailController();

        if (!$user) {
            return response()->json('Número de documento no encontrado', 401);
        }

        $sentEmail = $sendMail->sendMail($user->email);

        if ($sentEmail) {
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

        if (!$exist) {
            return response()->json(["Código invalido"], 401);
        }
        return response()->json(["Ingresaste correctamente"],200);
    }
}
