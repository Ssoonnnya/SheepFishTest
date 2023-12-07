<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Model\Employees;

class Companies extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'logo',
        'website'
    ];

    public function employee(): HasMany {

        return $this->HasMany(Employees::class);
    }
}
