<?php


namespace App\Models\Category\Traits\Relations;


use App\Models\Category\Category;

trait CategoryRelations
{
    public function subcategories()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id' );
    }

    public function parent()
    {
        return $this->hasOne(Category::class, 'id', 'parent_id');
    }
}
