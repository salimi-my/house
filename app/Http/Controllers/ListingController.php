<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    /**
     * Authorizing resource controller.
     */
    public function __construct()
    {
        $this->authorizeResource(Listing::class, 'listing');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filters = $request->only([
            'search', 'priceFrom', 'priceTo', 'bedrooms', 'bathrooms', 'areaFrom', 'areaTo'
        ]);

        return inertia('Listing/Index', [
            'title' => 'Houses Listing | House',
            'description' => 'Online House Listing.',
            'filters' => $filters,
            'listings' => Listing::with('images')
                ->latest()
                ->filter($filters)
                ->paginate(12)
                ->withQueryString()
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Listing $listing)
    {
        return inertia('Listing/Show', [
            'title' => 'House Details | House',
            'description' => 'Online House Listing.',
            'listing' => $listing
        ]);
    }
}
