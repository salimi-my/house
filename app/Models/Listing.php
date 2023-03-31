<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Listing extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['type', 'bedrooms', 'bathrooms', 'carparks', 'area', 'address', 'city', 'zip_code', 'state', 'country', 'price'];

    protected $sortable = ['price', 'created_at'];

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function images(): HasMany
    {
        return $this->hasMany(ListingImage::class);
    }

    public function offers(): HasMany
    {
        return $this->hasMany(Offer::class);
    }

    public function scopeWithoutSold(Builder $query): Builder
    {
        // return $query->doesntHave('offers')
        //     ->orWhereHas(
        //         'offers',
        //         fn (Builder $query) => $query->whereNull('accepted_at')->whereNull('rejected_at')
        //     );
        return $query->whereNull('sold_at');
    }

    public function scopeFilter(Builder $query, array $filters): Builder
    {
        return $query->when(
            $filters['search'] ?? false,
            fn ($query, $value) => $query->where('address', 'LIKE', '%' . $value . '%')
                ->orWhere('city', 'LIKE', '%' . $value . '%')
                ->orWhere('zip_code', 'LIKE', '%' . $value . '%')
                ->orWhere('state', 'LIKE', '%' . $value . '%')
                ->orWhere('country', 'LIKE', '%' . $value . '%')
        )->when(
            $filters['priceFrom'] ?? false,
            fn ($query, $value) => $query->where('price', '>=', $value)
        )->when(
            $filters['priceTo'] ?? false,
            fn ($query, $value) => $query->where('price', '<=', $value)
        )->when(
            $filters['bedrooms'] ?? false,
            fn ($query, $value) => $query->where('bedrooms', (int)$value < 6 ? '=' : '>=', $value)
        )->when(
            $filters['bathrooms'] ?? false,
            fn ($query, $value) => $query->where('bathrooms', (int)$value < 6 ? '=' : '>=', $value)
        )->when(
            $filters['areaFrom'] ?? false,
            fn ($query, $value) => $query->where('area', '>=', $value)
        )->when(
            $filters['areaTo'] ?? false,
            fn ($query, $value) => $query->where('area', '<=', $value)
        )->when(
            $filters['deleted'] ?? false,
            fn ($query) => $query->withTrashed()
        )->when(
            $filters['by'] ?? false,
            fn ($query, $value) => !in_array($value, $this->sortable) ? $query : $query->orderBy($value, $filters['order'] ?? 'desc')
        );
    }
}
