<?php

namespace App\Http\Controllers;

use App\Models\Feed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeedController extends Controller
{
    public function feed()
    {
        if (!Auth::check()) {
            return redirect('/')->with('message', 'You have to login to use this function!');
        }
        if (Auth::user()->role != 1) {
            return redirect('/')->with('message', 'You have no access to this area!');
        }
        $feeds = Feed::with('user')->get();
        return view('user.feed', ['feeds' => $feeds]);
    }
}
