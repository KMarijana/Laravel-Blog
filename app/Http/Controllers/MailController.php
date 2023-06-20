<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\OrderCategory;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendMail(Request $request)
    {
        $data = $request->all();
        Mail::to('admin@gmail.com')->send(new OrderCategory($data));
        return back()->with('success', 'Zahtev uspešno poslat.');
    }
}
