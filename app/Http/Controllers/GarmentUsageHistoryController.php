<?php

namespace App\Http\Controllers;

use App\Models\GarmentUsageHistory;
use Illuminate\Http\Request;

class GarmentUsageHistoryController extends Controller
{
    /*public function __construct()
    {
        $this->middleware('auth');
    }*/
    public function index()
    {
        $usageHistory = GarmentUsageHistory::where('id', auth()->id())->get();
        return view('garment_usage_history.index', compact('usageHistory'));
    }

    public function create()
    {
        return view('garment_usage_history.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'garment_id' => 'required|exists:garments,id',
            'usage_date' => 'required|date',
            'notes' => 'nullable|string',
        ]);

        $history = new GarmentUsageHistory($request->all());
        $history->user_id = auth()->id();
        $history->save();

        return redirect()->route('garment-usage-history.index')->with('success', 'Registro de uso creado con éxito.');
    }

    public function show(GarmentUsageHistory $history)
    {
        return view('garment_usage_history.show', compact('history'));
    }

    public function edit(GarmentUsageHistory $history)
    {
        return view('garment_usage_history.edit', compact('history'));
    }

    public function update(Request $request, GarmentUsageHistory $history)
    {
        $request->validate([
            'garment_id' => 'required|exists:garments,id',
            'usage_date' => 'required|date',
            'notes' => 'nullable|string',
        ]);

        $history->update($request->all());

        return redirect()->route('garment-usage-history.index')->with('success', 'Registro de uso actualizado con éxito.');
    }

    public function destroy(GarmentUsageHistory $history)
    {
        $history->delete();
        return redirect()->route('garment-usage-history.index')->with('success', 'Registro de uso eliminado con éxito.');
    }
}
