<?php

namespace App\Http\Controllers;

use App\Models\CalendarEvent;
use App\Models\Outfit;
use Illuminate\Http\Request;

class CalendarEventController extends Controller
{
    /**
     * Muestra la lista de eventos del calendario.
     */
    public function index()
    {
        $events = CalendarEvent::with('outfit')->where('user_id', auth()->id())->get();
        return view('calendar_events.index', compact('events'));
    }

    /**
     * Muestra el formulario para crear un nuevo evento.
     */
    public function create()
    {
        $outfits = Outfit::where('user_id', auth()->id())->get();
        return view('calendar_events.create', compact('outfits'));
    }

    /**
     * Almacena un nuevo evento en la base de datos.
     */
    public function store(Request $request)
    {
        $request->validate([
            'event_name' => 'required|string|max:255',
            'event_date' => 'required|date|after_or_equal:today',
            'description' => 'nullable|string|max:255',
            'outfit_id' => 'nullable|exists:outfits,id',
        ]);

        CalendarEvent::create([
            'user_id' => auth()->id(),
            'event_name' => $request->event_name,
            'event_date' => $request->event_date,
            'description' => $request->description,
            'outfit_id' => $request->outfit_id,
        ]);

        return redirect()->route('calendar-events.index')->with('success', 'Evento creado con éxito.');
    }

    /**
     * Muestra un evento específico.
     */
    public function show(CalendarEvent $event)
    {
        return view('calendar_events.show', compact('event'));
    }

    /**
     * Muestra el formulario para editar un evento.
     */
    public function edit(CalendarEvent $event)
    {
        $outfits = Outfit::where('user_id', auth()->id())->get();
        return view('calendar_events.edit', compact('event', 'outfits'));
    }

    /**
     * Actualiza un evento en la base de datos.
     */
    public function update(Request $request, CalendarEvent $event)
    {
        $request->validate([
            'event_name' => 'required|string|max:255',
            'event_date' => 'required|date|after_or_equal:today',
            'description' => 'nullable|string|max:255',
            'outfit_id' => 'nullable|exists:outfits,id',
        ]);

        $event->update($request->all());

        return redirect()->route('calendar-events.index')->with('success', 'Evento actualizado con éxito.');
    }

    /**
     * Elimina un evento de la base de datos.
     */
    public function destroy(CalendarEvent $event)
    {
        $event->delete();
        return redirect()->route('calendar-events.index')->with('success', 'Evento eliminado con éxito.');
    }
}
