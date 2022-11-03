<?php

namespace App\Http\Controllers;

use App\Models\Devis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DevisController extends Controller
{
    public function index()
    {
        return view('devis.index');
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'Name' => 'required|min:3',
            'Description' => 'required|min:10',
            'fichier3d' => 'nullable|image|max:2048',
            'Type' => 'required|min:3',
            'couleurfil' => 'required|min:3',
            'couleurpeint' => 'required|min:3',
            
        ]);

        $validated['user_id'] = Auth::user()->id;


        if ($request->hasFile('fichier3d')) {
            $validated['fichier3d'] = '/storage/'.$request->file('fichier3d')->store('/fichier3d');
           
        }

        $devis = Devis::create(collect($validated)->all());

        return redirect()->route('home');



    }
}
