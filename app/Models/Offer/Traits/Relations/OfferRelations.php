<?php


namespace App\Models\Offer\Traits\Relations;


use App\Models\Category\Category;
use App\Models\Chat\Chat;
use App\Models\Company\Company;
use App\Models\Region\Region;
use App\Models\User\User;

trait OfferRelations
{
    public function company()
    {
        return $this->hasOne(Company::class, 'id', 'company_id');
    }

    public function creator()
    {
        return $this->hasOne(User::class, 'id', 'creator_id');
    }

    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    public function chats()
    {
        return $this->hasMany(Chat::class, 'offer_id', 'id');
    }

    public function regions()
    {
        return $this->belongsToMany(Region::class, 'offer_regions', 'offer_id', 'region_id');
    }
}
