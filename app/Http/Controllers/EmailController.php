<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use App\Mail\CodesMailable;
use App\Mail\DateMailable;
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

    public function sendDate($email){
        $mail = new DateMailable;
        $mail->content()->with(['property_address', 'adviser_name', 'hour', 'date']);
        Mail::to($email)
            ->send($mail);
    }
}
