<?php


namespace App\Models\Chat\Traits\Relations;


use App\Models\Company\Company;
use App\Models\Chat\Message;
use App\Models\Offer\Offer;
use App\Models\User\User;

trait ChatRelations
{
    public function offer()
    {
        return $this->hasOne(Offer::class, 'id', 'offer_id');
    }

    public function customer()
    {
        return $this->hasOne(Company::class, 'id', 'customer_id');
    }

    public function seller()
    {
        return $this->hasOne(Company::class, 'id', 'seller_id');
    }

    public function messages()
    {
        return $this->hasMany(Message::class, 'chat_id', 'id');
    }

    public function user()
    {
        return $this->belongsToMany(User::class, 'chat_users', 'chat_id', 'user_id');
    }
}
