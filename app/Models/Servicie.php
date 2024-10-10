<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Servicie extends Model
{
    use HasFactory;
    protected $fillable = ['name','duration','typeServicie_id','price'];
    
    public function appointments(): HasMany
    {
        return $this->hasMany(Appointment::class);
    }

    public function typeServicie(): BelongsTo
    {
        return $this->belongsTo(TypeServicie::class, 'typeServicie_id');
    }
    

}
