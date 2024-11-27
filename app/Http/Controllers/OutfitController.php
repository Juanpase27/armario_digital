<?php

namespace App\Http\Controllers;

use App\Models\Outfit;
use App\Models\Garment;
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
        return view('outfits.index', compact('outfits'));
    }

    public function create()
    {
        $garments = Garment::where('user_id', auth()->id())->get();
        return view('outfits.create', compact('garments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->only(['name']);
        $data['user_id'] = auth()->id();

        if ($request->hasFile('image_path')) {
            $data['image_path'] = $request->file('image_path')->store('outfits', 'public');
        }

        $outfit = Outfit::create($data);

        return redirect()->route('outfits.index')->with('success', 'Outfit creado con éxito.');
    }

    public function show(Outfit $outfit)
    {
        $outfit->load('garments');
        return view('outfits.show', compact('outfit'));
    }

    public function edit(Outfit $outfit)
    {
        $garments = Garment::where('user_id', auth()->id())->get();
        $outfit->load('garments');
        return view('outfits.edit', compact('outfit', 'garments'));
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
    /*
    public function update(Request $request, Outfit $outfit)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->only(['name']);

        if ($request->hasFile('image_path')) {
            if ($outfit->image_path) {
                \Storage::disk('public')->delete($outfit->image_path);
            }
            $data['image_path'] = $request->file('image_path')->store('outfits', 'public');
        }

        $outfit->update($data);

        return redirect()->route('outfits.index')->with('success', 'Outfit actualizado con éxito.');
    }
*/
    public function destroy(Outfit $outfit)
    {
        $outfit->delete();
        return redirect()->route('outfits.index')->with('success', 'Outfit eliminado con éxito.');
    }
}
