<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserListingController extends Controller
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
        $filters = [
            'deleted' => $request->boolean('deleted'),
            ...$request->only(['by', 'order'])
        ];

        return inertia('UserListing/Index', [
            'title' => 'My Listing | House',
            'description' => 'Online House Listing.',
            'filters' => $filters,
            'listings' => Auth::user()
                ->listings()
                ->filter($filters)
                ->withCount('images')
                ->paginate(9)
                ->withQueryString()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia('UserListing/Create', [
            'title' => 'Add House Listing | House',
            'description' => 'Online House Listing.',
            'countries' => Country::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $id = $request->user()->listings()->create(
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
        )->id;

        return redirect()->route('user-account.my-listing.index')->with('success', 'Your Property ID: ' . $id . ' successfully created!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Listing $listing)
    {
        return inertia('UserListing/Edit', [
            'title' => 'Edit Property | House',
            'description' => 'Online House Listing.',
            'listing' => $listing,
            'countries' => Country::all()
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

        return redirect()->route('user-account.my-listing.index')->with('success', 'Your Property ID: ' . $listing->id . ' successfully edited!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Listing $listing)
    {
        $listing->deleteOrFail();

        return redirect()->back()->with('success', 'Your Property ID: ' . $listing->id . ' successfully deleted!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function restore(Listing $listing)
    {
        $listing->restore();

        return redirect()->back()->with('success', 'Your Property ID: ' . $listing->id . ' successfully restored!');
    }
}
