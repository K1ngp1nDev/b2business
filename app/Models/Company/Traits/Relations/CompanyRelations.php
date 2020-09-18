<?php


namespace App\Models\Company\Traits\Relations;


use App\Models\Chat\Chat;
use App\Models\Offer\Offer;
use App\Models\User\User;

trait CompanyRelations
{
    public function director()
    {
        return $this->hasOne(User::class, 'id');
    }

    public function members()
    {
        return $this->hasMany(User::class, 'id');
    }

    public function offers()
    {
        return $this->hasMany(Offer::class, 'company_id', 'id');
    }

    public function chats()
    {
        return $this->hasMany(Chat::class, 'company_id', 'id');
    }
}
