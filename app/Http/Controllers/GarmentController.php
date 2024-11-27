<?php

namespace App\Http\Controllers;

use App\Models\Garment;
use Illuminate\Http\Request;

class GarmentController extends Controller
{
    /*public function __construct()
    {
        $this->middleware('auth');
    }*/
    public function index()
    {
        return "Hello";
    }
    /*public function index()
    {
        $garments = Garment::where('id', auth()->id())->get();
        return view('garments.index', compact('garments'));
    }

    public function create()
    {
        return view('garments.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:100',
            'color' => 'nullable|string|max:100',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $garment = new Garment($request->all());
        $garment->user_id = auth()->id();
        $garment->save();

        return redirect()->route('garments.index')->with('success', 'Prenda creada con éxito.');
    }

    public function show(Garment $garment)
    {
        return view('garments.show', compact('garment'));
    }

    public function edit(Garment $garment)
    {
        return view('garments.edit', compact('garment'));
    }

    public function update(Request $request, Garment $garment)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:100',
            'color' => 'nullable|string|max:100',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $garment->update($request->all());

        return redirect()->route('garments.index')->with('success', 'Prenda actualizada con éxito.');
    }

    public function destroy(Garment $garment)
    {
        $garment->delete();
        return redirect()->route('garments.index')->with('success', 'Prenda eliminada con éxito.');
    }*/
}
