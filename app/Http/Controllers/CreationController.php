<?php

namespace App\Http\Controllers;

use App\Models\Creation;
use Illuminate\Http\Request;

class CreationController extends Controller
{
    public function index()
    {
        return view('creation.index', [
            'creations' => Creation::paginate(6)->withQueryString(),
        ]);
    }

    public function show(Creation $creation)
    {
        return view('creation.show', [
            "creation" => $creation,
        ]);
    }
}
