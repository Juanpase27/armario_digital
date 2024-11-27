<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Garment extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'name', 'category_id', 'color', 'image_path'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(GarmentCategory::class, 'category_id');
    }

    public function outfits()
    {
        return $this->belongsToMany(Outfit::class, 'outfit_garment');
    }

    public function usageHistory()
    {
        return $this->hasMany(GarmentUsageHistory::class);
    }
}
