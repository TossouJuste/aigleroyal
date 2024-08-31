<?php

namespace App\Http\Controllers;
use App\Models\Contact;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function showContacts()
    {
        // Récupérer tous les contacts depuis la base de données
        $contacts = Contact::all(); 

        // Retourner la vue avec les données des contacts
        return view('admin.evenement', ['contacts' => $contacts]);

    }
    
}
