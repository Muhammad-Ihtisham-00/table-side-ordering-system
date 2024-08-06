<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    public function food_item()
    {
        return $this->belongsTo(Food_item::class, 'prod_id', 'id');
    }
}
