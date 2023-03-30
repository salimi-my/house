<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\Request;

class UserListingAcceptController extends Controller
{
    public function __invoke(Offer $offer)
    {
        $listing = $offer->listing;
        $this->authorize('update', $listing);

        // Accept selected offer
        $offer->update(['accepted_at' => now()]);

        // Insert sold timestamp to listing
        $listing->sold_at = now();
        $listing->save();

        // Reject all other offers
        $listing->offers()->except($offer)->update(['rejected_at' => now()]);

        // Format amount
        $amount = number_format($offer->amount);

        return redirect()->back()->with('success', "Offer for {$amount} accepted, other offers rejected");
    }
}
