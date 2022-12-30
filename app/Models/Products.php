<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $table="products";
    protected $fillable=["name","cena","src","alt","kategorija_id","created_at","updated_at"];


    public function category(){
        return $this->belongsTo(Categories::class, 'kategorija_id');
    }

    public function order(){

    }


}
