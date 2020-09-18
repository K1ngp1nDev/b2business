<?php

namespace App\Models\Region;

use App\Models\Region\Traits\Relations\RegionRelations;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Region extends Model
{
    use SoftDeletes, RegionRelations;
}
