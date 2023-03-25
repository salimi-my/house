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
            'listings' => Listing::latest()
                ->filter($filters)
                ->paginate(12)
                ->withQueryString()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia('Listing/Create', [
            'title' => 'Add House Listing | House',
            'description' => 'Online House Listing.'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->user()->listings()->create(
            $request->validate(
                [
                    'type' => 'required|in:Landed,Highrise',
                    'bedrooms' => 'required|integer|min:0|max:100',
                    'bathrooms' => 'required|integer|min:0|max:100',
                    'carparks' => 'required|integer|min:0|max:100',
                    'area' => 'required|integer|min:10|max:10000',
                    'address' => 'required',
                    'city' => 'required',
                    'zip_code' => 'required|numeric',
                    'state' => 'required',
                    'country' => 'required',
                    'price' => 'required|integer|min:1|max:20000000',
                ],
                [
                    'type.in' => 'The type field must be Landed or Highrise',
                    'zip_code.required' => 'The postcode field is required',
                    'zip_code.numeric' => 'The postcode field is must be a number',
                ]
            )
        );

        return redirect()->route('listing.index')->with('success', 'Listing was created!');
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

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Listing $listing)
    {
        return inertia('Listing/Edit', [
            'title' => 'Edit House | House',
            'description' => 'Online House Listing.',
            'listing' => $listing
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Listing $listing)
    {
        $listing->update(
            $request->validate(
                [
                    'type' => 'required|in:Landed,Highrise',
                    'bedrooms' => 'required|integer|min:0|max:100',
                    'bathrooms' => 'required|integer|min:0|max:100',
                    'carparks' => 'required|integer|min:0|max:100',
                    'area' => 'required|integer|min:10|max:10000',
                    'address' => 'required',
                    'city' => 'required',
                    'zip_code' => 'required|numeric',
                    'state' => 'required',
                    'country' => 'required',
                    'price' => 'required|integer|min:1|max:20000000',
                ],
                [
                    'type.in' => 'The type field must be Landed or Highrise',
                    'zip_code.required' => 'The postcode field is required',
                    'zip_code.numeric' => 'The postcode field is must be a number',
                ]
            )
        );

        return redirect()->route('listing.index')->with('success', 'Listing was edited!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Listing $listing)
    {
        $listing->delete();

        return redirect()->back()->with('success', 'Listing was deleted!');
    }
}
