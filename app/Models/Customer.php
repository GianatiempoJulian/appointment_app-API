<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Customer extends Model
{
    use HasFactory;
    protected $fillable = ['name','phone','email','lastname'];

    public function appointments(): HasMany
    {
        return $this->hasMany(Appointment::class);
    }


}
