<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Outfit extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'name', 'image_path', 'description'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function garments()
    {
        return $this->belongsToMany(Garment::class, 'outfit_garment');
    }

    public function calendarEvents()
    {
        return $this->hasMany(CalendarEvent::class);
    }
}
