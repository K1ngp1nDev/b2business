<?php

namespace App\Models\Category;

use App\Models\Category\Traits\Relations\CategoryRelations;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use CategoryRelations, SoftDeletes;

    protected $fillable = [
        'name', 'parent_id'
    ];
}
