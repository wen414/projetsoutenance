<?php

namespace App\Http\Controllers;

use App\Models\Demande;
use App\Models\Affectation;
use Illuminate\Http\Request;

class AffectationController extends Controller
{
    public function index()
    {
        $demandes = Demande::doesntHave('affectation')->get();
        return view('DPAF.dashboard', compact('demandes'));
    }

    public function affecter(Request $request, $demandeId)
    {
        $request->validate([
            'c_srhds_id' => 'required|exists:users,id',
        ]);

        Affectation::create([
            'demande_id' => $demandeId,
            'c_srhds_id' => $request->c_srhds_id,
            'statut' => 'Affectée',
        ]);

        return redirect()->route('dpaf.dashboard')->with('success', 'Demande affectée avec succès.');
    }

    public function affecterMultiple(Request $request)
    {
        $request->validate([
            'demande_ids' => 'required|array',
            'demande_ids.*' => 'exists:demandes,id',
            'c_srhds_id' => 'required|exists:users,id',
        ]);

        foreach ($request->demande_ids as $demandeId) {
            Affectation::create([
                'demande_id' => $demandeId,
                'c_srhds_id' => $request->c_srhds_id,
                'statut' => 'Affectée',
            ]);
        }

        return redirect()->route('dpaf.dashboard')->with('success', 'Les demandes sélectionnées ont été affectées avec succès.');
    }
}
