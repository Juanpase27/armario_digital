<?php

namespace App\Http\Controllers;

use App\Models\Outfit;
use Illuminate\Http\Request;

class OutfitController extends Controller
{
    /*public function __construct()
    {
        $this->middleware('auth');
    }*/
    public function index()
    {
        $outfits = Outfit::with('garments')->get();

        // Retornar la vista con los datos
        return view('outfits.index', compact('outfits'));
    }

    public function create()
    {
        return view('outfits.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $outfit = new Outfit($request->all());
        $outfit->user_id = auth()->id();
        $outfit->save();

        return redirect()->route('outfits.index')->with('success', 'Outfit creado con éxito.');
    }

    public function show(Outfit $outfit)
    {
        return view('outfits.show', compact('outfit'));
    }

    public function edit(Outfit $outfit)
    {
        return view('outfits.edit', compact('outfit'));
    }

    public function update(Request $request, Outfit $outfit)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $outfit->update($request->all());

        return redirect()->route('outfits.index')->with('success', 'Outfit actualizado con éxito.');
    }

    public function destroy(Outfit $outfit)
    {
        $outfit->delete();
        return redirect()->route('outfits.index')->with('success', 'Outfit eliminado con éxito.');
    }
}
