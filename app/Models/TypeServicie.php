<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeServicie extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function servicies(): HasMany
    {
        return $this->hasMany(Servicie::class);
    }

}
