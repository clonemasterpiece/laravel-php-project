<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

    protected $table="food_order";
    protected $fillable=["user_id", "user_address", "user_phone", "id_food", "created_at", "updated_at"];
    protected $primaryKey="order_id";
}
