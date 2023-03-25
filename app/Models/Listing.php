<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Listing extends Model
{
    use HasFactory;

    protected $fillable = ['type', 'bedrooms', 'bathrooms', 'carparks', 'area', 'address', 'city', 'zip_code', 'state', 'country', 'price'];

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
