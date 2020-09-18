<?php


namespace App\Models\User\Traits\Relations;


use App\Models\Chat\Chat;
use App\Models\Company\Company;
use App\Models\Message\Message;

trait UserRelations
{
    public function company()
    {
        return $this->hasOne(Company::class, 'id', 'company_id');
    }

    public function messages()
    {
        return $this->hasMany(Message::class, 'user_id', 'id');
    }

    public function chat()
    {
        return $this->belongsToMany(Chat::class, 'chat_users', 'user_id', 'chat_id');
    }
}
