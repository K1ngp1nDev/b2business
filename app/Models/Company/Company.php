<?php

namespace App\Models\Company;

use App\Models\Company\Traits\Relations\CompanyRelations;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use CompanyRelations, SoftDeletes;

    protected $fillable = [
        'name', 'edrpou', 'ipn', 'p_c', 'company_phone', 'director_id', 'is_premium', 'expiration'
    ];
}
