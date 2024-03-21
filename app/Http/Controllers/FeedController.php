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

    public function showFeedData(int $id)
    {
        $feed = Feed::with('animals')->find($id);

        if ($feed === null) {
            return response('Feed not found', 404);
        }

        return view('feedData', ['feed' => $feed]);
    }
}
