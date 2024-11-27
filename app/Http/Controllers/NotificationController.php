<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /**
     * Muestra la lista de notificaciones del usuario autenticado.
     */
    public function index()
    {
        $notifications = Notification::where('user_id', auth()->id())->orderBy('created_at', 'desc')->get();
        return view('notifications.index', compact('notifications'));
    }

    /**
     * Muestra el formulario para crear una nueva notificación.
     */
    public function create()
    {
        return view('notifications.create');
    }

    /**
     * Almacena una nueva notificación en la base de datos.
     */
    public function store(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:255',
            'is_read' => 'nullable|boolean',
        ]);

        Notification::create([
            'user_id' => auth()->id(),
            'message' => $request->message,
            'is_read' => $request->is_read ?? false,
        ]);

        return redirect()->route('notifications.index')->with('success', 'Notificación creada con éxito.');
    }

    /**
     * Muestra una notificación específica.
     */
    public function show(Notification $notification)
    {
        $this->authorizeAccess($notification);
        return view('notifications.show', compact('notification'));
    }

    /**
     * Muestra el formulario para editar una notificación.
     */
    public function edit(Notification $notification)
    {
        $this->authorizeAccess($notification);
        return view('notifications.edit', compact('notification'));
    }

    /**
     * Actualiza una notificación en la base de datos.
     */
    public function update(Request $request, Notification $notification)
    {
        $this->authorizeAccess($notification);

        $request->validate([
            'message' => 'required|string|max:255',
            'is_read' => 'nullable|boolean',
        ]);

        $notification->update([
            'message' => $request->message,
            'is_read' => $request->is_read ?? $notification->is_read,
        ]);

        return redirect()->route('notifications.index')->with('success', 'Notificación actualizada con éxito.');
    }

    /**
     * Elimina una notificación de la base de datos.
     */
    public function destroy(Notification $notification)
    {
        $this->authorizeAccess($notification);
        $notification->delete();

        return redirect()->route('notifications.index')->with('success', 'Notificación eliminada con éxito.');
    }

    /**
     * Verifica si el usuario tiene acceso a la notificación.
     */
    private function authorizeAccess(Notification $notification)
    {
        if ($notification->user_id !== auth()->id()) {
            abort(403, 'No tienes permiso para acceder a esta notificación.');
        }
    }
}
