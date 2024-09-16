<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;



class Employee extends Model
{
    use HasFactory;
    protected $fillable = ['name','speciality_id'];

    public function appointments(): HasMany
    {
        return $this->hasMany(Appointment::class);
    }

    public function speciality(): BelongsTo
    {
        return $this->belongsTo(Speciality::class, 'speciality_id');
    }

}
