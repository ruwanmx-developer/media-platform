<?php

namespace App\Http\Controllers;

use App\Models\Feed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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

    public function add_new_feed()
    {
        if (!Auth::check()) {
            return redirect('/')->with('message', 'You have to login to use this function!');
        }
        if (Auth::user()->role != 1) {
            return redirect('/')->with('message', 'You have no access to this area!');
        }
        return view('user.add-new-feed');
    }

    public function user_feeds()
    {
        if (!Auth::check()) {
            return redirect('/')->with('message', 'You have to login to use this function!');
        }
        if (Auth::user()->role != 1) {
            return redirect('/')->with('message', 'You have no access to this area!');
        }
        $feeds = Feed::with('user')->where('user_id', '=', Auth::user()->id)->get();
        return view('user.my-feeds', ['feeds' => $feeds]);
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'description' => 'required|string|max:255',
            'source_url' => 'required|mimes:mp4,mov,avi|max:20000',
        ]);

        if ($validator->fails()) {
            return redirect('add-feed')
                ->withErrors($validator)
                ->withInput();
        }

        $validatedData = $validator->validated();


        $file = $request->file('source_url');
        $newFileName = time() . Auth::user()->id . '.' . $file->getClientOriginalExtension();
        $file->storeAs('public/uploads/feeds', $newFileName);

        $feed = new Feed();
        $feed->description = $validatedData['description'];
        $feed->source_url = $newFileName;
        $feed->user_id = Auth::user()->id;

        try {
            $feed->save();
            return redirect('add-feed')->with('message', 'Your process was successful!');
        } catch (\Exception $e) {
            return redirect('add-feed')->with('message', 'Your process was faild! Try Again!');
        }
    }
}
