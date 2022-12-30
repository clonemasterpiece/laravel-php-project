<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Message extends Model
{
    use HasFactory;

    protected $table="msguser";
    protected $fillable=["message_user", "id_user", "created_at", "updated_at"];
    protected $primaryKey="id_msg";

    public function user(): BelongsTo
    {
        return $this->belongsTo(Users::class, "id_user");
    }
}
