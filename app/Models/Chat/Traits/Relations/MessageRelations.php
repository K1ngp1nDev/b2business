<?php


namespace App\Models\Chat\Traits\Relations;


use App\Models\User\User;

trait MessageRelations
{
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
