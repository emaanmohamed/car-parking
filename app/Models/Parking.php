<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parking extends Model
{
    use HasFactory;

    public function zone()
    {
        return $this->belongsTo(Zone::class);
    }

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }

    protected static function booted()
    {
        static::addGlobalScope('user', function (Builder $builder) {
            $builder->where('user_id', auth()->id());
        });
    }
}
