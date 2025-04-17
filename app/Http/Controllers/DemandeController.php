<?php

namespace App\Http\Controllers;

use App\Models\Demande;
use Illuminate\Http\Request;

class DemandeController extends Controller
{
    public function index()
    {
        // Vous pouvez passer des données dynamiques ici si nécessaire
        return view('admin.demandes');
    }

    public function create()
    {
        // Affiche le formulaire de demande
        return view('user.demande');
    }

    public function store(Request $request)
    {
        // Valider les données du formulaire
        $request->validate([
            'prenom' => 'required|string|max:255',
            'nom' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'filiere' => 'required|string|max:255',
            'niveau' => 'required|string|max:255',
            'diplome' => 'required|string|max:255',
            'type_stage' => 'required|string',
            'statut_stage' => 'required|string',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date|after_or_equal:date_debut',
            'contact' => 'required|string|max:20',
            'pdf' => 'required|file|mimes:pdf|max:2048', // Limite de 2 Mo pour le fichier PDF
        ]);

        // Gérer le téléchargement du fichier PDF
        $pdfPath = $request->file('pdf')->store('demandes', 'public');

        // Enregistrer les données dans la base de données
        Demande::create([
            'prenom' => $request->prenom,
            'nom' => $request->nom,
            'email' => $request->email,
            'filiere' => $request->filiere,
            'niveau' => $request->niveau,
            'diplome' => $request->diplome,
            'type_stage' => $request->type_stage,
            'statut_stage' => $request->statut_stage,
            'date_debut' => $request->date_debut,
            'date_fin' => $request->date_fin,
            'contact' => $request->contact,
            'pdf_path' => $pdfPath,
        ]);

        // Rediriger avec un message de succès
        return redirect()->route('demande.create')->with('success', 'Votre demande a été soumise avec succès.');
    }
}
