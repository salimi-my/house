<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        return inertia('Index/Index', [
            'title' => 'House — Online Property Listing',
            'description' => 'This is an online property listing and marketplace platform app created using Laravel, Vue and Inertia.'
        ]);
    }
}
