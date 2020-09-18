<?php

namespace App\Models\Chat;

use App\Models\Chat\Traits\Relations\MessageRelations;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Message extends Model
{
    use MessageRelations, SoftDeletes;

    protected $fillable = [
        'is_read', 'text', 'chat_id', 'user_id'
    ];
}
