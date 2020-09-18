<?php

namespace App\Models\Service;

use App\Models\Service\Traits\Relations\ServiceRelations;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use ServiceRelations, SoftDeletes;
}
