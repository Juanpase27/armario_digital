<?php

namespace App\Http\Controllers;

use App\Models\Garment;
use App\Models\GarmentCategory;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class GarmentController extends Controller
{
    use AuthorizesRequests;
    /*public function __construct()
    {
        $this->middleware('auth');
    }*/

    public function index()
    {
        // Obtener todas las prendas del usuario autenticado con su categoría
        $garments = Garment::with('category')->where('user_id', auth()->id())->get();

        return view('garments.index', compact('garments'));
    }


    public function create()
    {
        // Obtener todas las categorías disponibles
        $categories = GarmentCategory::all();
        return view('garments.create', compact('categories'));
    }

    public function store(Request $request)
    {
        // Validar datos del formulario
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:garment_categories,id',
            'color' => 'nullable|string|max:100',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->only(['name', 'category_id', 'color']);
        $data['user_id'] = auth()->id();

        // Guardar la imagen si existe
        if ($request->hasFile('image_path')) {
            $data['image_path'] = $request->file('image_path')->store('garments', 'public');
        }

        Garment::create($data);

        return redirect()->route('garments.index')->with('success', 'Prenda creada con éxito.');
    }

    public function show(Garment $garment)
    {
        // Verificar que la prenda pertenece al usuario autenticado
        $this->authorize('view', $garment);

        return view('garments.show', compact('garment'));
    }

    public function edit(Garment $garment)
    {
        // Verificar que la prenda pertenece al usuario autenticado
        $this->authorize('update', $garment);

        // Obtener todas las categorías disponibles
        $categories = GarmentCategory::all();

        return view('garments.edit', compact('garment', 'categories'));
    }

    /*public function update(Request $request, Garment $garment)
    {
        // Verificar que la prenda pertenece al usuario autenticado
        $this->authorize('update', $garment);

        // Validar datos del formulario
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:garment_categories,id',
            'color' => 'nullable|string|max:100',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->only(['name', 'category_id', 'color']);

        // Actualizar la imagen si se sube una nueva
        if ($request->hasFile('image_path')) {
            // Eliminar la imagen anterior si existe
            if ($garment->image_path) {
                \Storage::disk('public')->delete($garment->image_path);
            }
            $data['image_path'] = $request->file('image_path')->store('garments', 'public');
        }

        $garment->update($data);

        return redirect()->route('garments.index')->with('success', 'Prenda actualizada con éxito.');
    }

    public function destroy(Garment $garment)
    {
        // Verificar que la prenda pertenece al usuario autenticado
        $this->authorize('delete', $garment);

        // Eliminar la imagen si existe
        if ($garment->image_path) {
            \Storage::disk('public')->delete($garment->image_path);
        }

        $garment->delete();

        return redirect()->route('garments.index')->with('success', 'Prenda eliminada con éxito.');
    }*/
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
    }
}
