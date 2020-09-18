<?php

namespace App\Models\Service;

use App\Models\Service\Traits\Relations\PurchasedServiceRelations;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PurchasedService extends Model
{
    use PurchasedServiceRelations, SoftDeletes;
}
