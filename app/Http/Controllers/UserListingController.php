<?php

namespace App\Http\Controllers;

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
                ->paginate(9)
                ->withQueryString()
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Listing $listing)
    {
        $listing->deleteOrFail();

        return redirect()->back()->with('success', 'Your Property ID: ' . $listing->id . ' successfully deleted!');
    }
}
