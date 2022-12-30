<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Users extends Model
{
    use HasFactory;

    protected $table="user";
    protected $fillable=["name_user", "last_name", "email_user", "password_user", "id_roles", "time_register"];
    protected $primaryKey="id_user";

    public function messages(): HasMany
    {
        return $this->hasMany(Message::class,'id_msg','id_user');
    }

    public function  role(){
        return $this->belongsTo(Roles::class, "id_roles");
    }

    public function  activity(){
        return $this->hasMany(UsersActivity::class);
    }

}
