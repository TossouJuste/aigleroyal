<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rendezvous;

class RendezvousController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telephone' => 'required|string|max:15',
            'date_rendez_vous' => 'required|date',
            'time_rendez_vous' => 'required',
            'objectof' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        Rendezvous::create($request->all());

        return redirect()->back()->with('success', 'Votre rendez-vous a été enregistré avec succès. Vous recevrez un message de confirmation par email ou par Whatsapp');
    }
}

