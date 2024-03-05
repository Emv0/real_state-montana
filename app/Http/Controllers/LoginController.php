<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Mail\CodesMailable;
use App\Models\Login;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{

	public function sendIdentification(Request $request, Login $login)
	{

		$user = User::where('identification', $request->identification)->first();

		if (!$user) {
			return response()->json('Número de documento no registrado', 403);
		}

		if ($user->type_user == 2) {
			return response()->json('No tienes los permisos para acceder', 403);
		}

		//se consulta la tabla login buscando un usuario existente.
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
		try {
			$user = User::where('identification', $request->identification)->first();


			$login = Login::where('code', $request->code)
				->where('identification', $user->id)
				->first();

			if (!$login) {
				return response()->json(["Código invalido"], 401);
			}

			Auth::login($user);
			Log::info(Auth::user());

			return response()->json(['redirect' => route('home.index')]);
		} catch (\Throwable $th) {
			Log::error($th);
		}
	}


	public function logout()
	{
		Auth::logout();
		return response()->json(['redirect' => route('viewLog.index')]);
	}
}
