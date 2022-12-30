<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    use HasFactory;

    protected $table="roles";
    protected $fillable=["role", "created_at", "updated_at", "deleted_at"];
    protected $primaryKey="id_roles";

    public function user(){
        return $this->hasMany(Users::class);
    }
}
