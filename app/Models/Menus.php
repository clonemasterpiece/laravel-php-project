<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menus extends Model
{
    use HasFactory;
    protected $table="menus";
    protected $fillable=["name_menu", "href_menu","show_menu", "priority_menu"];
    protected $primaryKey="id_menu";
}
