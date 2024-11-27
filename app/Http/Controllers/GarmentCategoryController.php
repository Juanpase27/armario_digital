<?php

namespace App\Http\Controllers;

use App\Models\GarmentCategory;
use Illuminate\Http\Request;

class GarmentCategoryController extends Controller
{
    /**
     * Muestra una lista de todas las categorías de prendas.
     */
    public function index()
    {
        $categories = GarmentCategory::all();
        return view('garment_categories.index', compact('categories'));
    }

    /**
     * Muestra el formulario para crear una nueva categoría.
     */
    public function create()
    {
        return view('garment_categories.create');
    }

    /**
     * Almacena una nueva categoría en la base de datos.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:garment_categories',
            'description' => 'nullable|string|max:255',
        ]);

        GarmentCategory::create($request->all());

        return redirect()->route('garment_categories.index')->with('success', 'Categoría creada con éxito.');
    }

    /**
     * Muestra el formulario para editar una categoría existente.
     */
    public function edit(GarmentCategory $garmentCategory)
    {
        return view('garment_categories.edit', compact('garmentCategory'));
    }

    /**
     * Actualiza una categoría existente en la base de datos.
     */
    public function update(Request $request, GarmentCategory $garmentCategory)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:garment_categories,name,' . $garmentCategory->id,
            'description' => 'nullable|string|max:255',
        ]);

        $garmentCategory->update($request->all());

        return redirect()->route('garment_categories.index')->with('success', 'Categoría actualizada con éxito.');
    }

    /**
     * Elimina una categoría de la base de datos.
     */
    public function destroy(GarmentCategory $garmentCategory)
    {
        $garmentCategory->delete();

        return redirect()->route('garment_categories.index')->with('success', 'Categoría eliminada con éxito.');
    }
}
