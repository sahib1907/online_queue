<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class MailController extends Controller
{
    public function get_send($email, $to, $subject, $message)  {
        $data = [
            'data' => $message
        ];
        Mail::send('emails.mail',['data'=>$data],function ($message) use ($subject, $to, $email) {
            $message->to($email, $to)->subject($subject);
            $message->from('websdragons@gmail.com', "OnlineQueue");
        });
    }
}
