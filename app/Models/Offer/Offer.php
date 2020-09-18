<?php

namespace App\Models\Offer;

use App\Models\Offer\Traits\Relations\OfferRelations;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Offer extends Model
{
    use OfferRelations, SoftDeletes;

    protected $fillable = [
        'id', 'name', 'creator_id', 'company_id', 'main_photo', 'photos', 'price', 'views', 'is_active',
        'is_promoted', 'expiration', 'category_id', 'excerpt', 'text'
    ];

    protected $casts = [
        'photos' => 'array'
    ];
}
