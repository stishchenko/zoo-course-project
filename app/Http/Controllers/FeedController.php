<?php

namespace App\Http\Controllers;

use App\Models\Feed;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class FeedController extends Controller
{
    public function showAll()
    {
        return view('feeds', ['feeds' => Feed::with('animals')->get()]);
    }
}
