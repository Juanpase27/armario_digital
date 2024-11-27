<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GarmentCategory extends Model
{
    use HasFactory;
    protected $table = 'garment_categories';
    protected $fillable = ['name', 'description'];

    /**
     * Relación: Una categoría tiene muchas prendas (Garments).
     */
    public function garments()
    {
        return $this->hasMany(Garment::class, 'category_id');
    }
}
