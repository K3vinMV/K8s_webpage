<?php

namespace App\Http\Controllers;

use App\Mail\NewsletterSubscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class NewsletterController extends Controller
{
    //
    public function subscribe(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        // Envía el correo de bienvenida
        Mail::to($request->email)->send(new NewsletterSubscription());

        return redirect()->back()->with('success', '¡Te has suscrito a la newsletter con éxito!');
    }
}
