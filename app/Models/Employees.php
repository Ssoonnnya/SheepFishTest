<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Companies;

class Employees extends Model
{
    use HasFactory;
    protected $fillable = [
        'firstName',
        'lastName',
        'company_id',
        'email',
        'phone'
    ];

    public function company(): BelongsTo {

        return $this->BelongsTo(Companies::class);
    }

}
