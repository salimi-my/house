<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    protected $fillable = ['type', 'bedrooms', 'bathrooms', 'carparks', 'area', 'address', 'city', 'zip_code', 'state', 'country', 'price'];
}
