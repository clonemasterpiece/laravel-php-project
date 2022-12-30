<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;

    protected $table="category";
    protected $fillable=["name_cat", "created_at", "updated_at", "deleted_at"];
    protected $primaryKey="id_cat";

    public function products(){
        return $this->hasMany(Products::class);
    }

}
