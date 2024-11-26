<?php

namespace App\Http\Controllers;

use App\Models\CalendarEvent;
use Illuminate\Http\Request;

class CalendarEventController extends Controller
{
    /*public function __construct()
    {
        $this->middleware('auth');
    }*/
    public function index()
    {
        $events = CalendarEvent::where('id', auth()->id())->get();
        return view('calendar_events.index', compact('events'));
    }

    public function create()
    {
        return view('calendar_events.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'event _name' => 'required|string|max:255',
            'event_date' => 'required|date',
            'description' => 'nullable|string',
        ]);

        $event = new CalendarEvent($request->all());
        $event->user_id = auth()->id();
        $event->save();

        return redirect()->route('calendar-events.index')->with('success', 'Evento creado con éxito.');
    }

    public function show(CalendarEvent $event)
    {
        return view('calendar_events.show', compact('event'));
    }

    public function edit(CalendarEvent $event)
    {
        return view('calendar_events.edit', compact('event'));
    }

    public function update(Request $request, CalendarEvent $event)
    {
        $request->validate([
            'event_name' => 'required|string|max:255',
            'event_date' => 'required|date',
            'description' => 'nullable|string',
        ]);

        $event->update($request->all());

        return redirect()->route('calendar-events.index')->with('success', 'Evento actualizado con éxito.');
    }

    public function destroy(CalendarEvent $event)
    {
        $event->delete();
        return redirect()->route('calendar-events.index')->with('success', 'Evento eliminado con éxito.');
    }
}
