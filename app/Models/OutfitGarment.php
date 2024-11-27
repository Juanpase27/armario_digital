<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OutfitGarment extends Model
{
    use HasFactory;

    protected $fillable = ['outfit_id', 'garment_id'];

    public function outfit()
    {
        return $this->belongsTo(Outfit::class);
    }

    public function garment()
    {
        return $this->belongsTo(Garment::class);
    }
}
