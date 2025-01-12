<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderItem extends Model
{
    use HasFactory;

    protected $table = "order_items";


    public function food_item()
    {
        return $this->belongsTo(Food_item::class, 'prod_id', 'id');
    }

    // public function order()
    // {
    //     return $this->belongsTo(Order::class, 'order_id', 'id');
    // }
}
