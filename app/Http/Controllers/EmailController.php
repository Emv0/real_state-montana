<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use App\Mail\CodesMailable;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    public function sendMail($email)
    {
        $mail = new CodesMailable;
        $code = $mail->content()->with['variable'];
        mail::to($email)
            ->send($mail);

        return $code;
    }

}
