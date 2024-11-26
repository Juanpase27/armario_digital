<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /*public function __construct()
    {
        $this->middleware('auth');
    }*/
    public function index()
    {
        $notifications = Notification::where('id', auth()->id())->get();
        return view('notifications.index', compact('notifications'));
    }

    public function create()
    {
        return view('notifications.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:255',
            'is_read' => 'boolean',
        ]);

        $notification = new Notification($request->all());
        $notification->user_id = auth()->id();
        $notification->save();

        return redirect()->route('notifications.index')->with('success', 'Notificación creada con éxito.');
    }

    public function show(Notification $notification)
    {
        return view('notifications.show', compact('notification'));
    }

    public function edit(Notification $notification)
    {
        return view('notifications.edit', compact('notification'));
    }

    public function update(Request $request, Notification $notification)
    {
        $request->validate([
            'message' => 'required|string|max:255',
            'is_read' => 'boolean',
        ]);

        $notification->update($request->all());

        return redirect()->route('notifications.index')->with('success', 'Notificación actualizada con éxito.');
    }

    public function destroy(Notification $notification)
    {
        $notification->delete();
        return redirect()->route('notifications.index')->with('success', 'Notificación eliminada con éxito.');
    }
}
