<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        return inertia('Index/Index', [
            'title' => 'House | Online House Listing',
            'description' => 'Online House Listing.'
        ]);
    }
}
