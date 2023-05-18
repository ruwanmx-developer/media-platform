<?php

namespace App\Http\Controllers;

use App\Models\Feed;
use App\Models\FeedComment;
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
        $feeds = Feed::with('user')->get();
        $user_comments = FeedComment::where('user_id', '=', Auth::user()->id)->get();
        return view('user.feed', ['feeds' => $feeds, 'user_comments' => $user_comments]);
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

    public function view_comment()
    {
        if (!Auth::check()) {
            return redirect('/')->with('message', 'You have to login to use this function!');
        }
        if (Auth::user()->role != 1) {
            return redirect('/')->with('message', 'You have no access to this area!');
        }
        $post = Feed::with('user')->where('user_id', '=', Auth::user()->id)->with('comments', 'comments.user')->first();
        return view('user.feed-comment', ['post' => $post]);
    }

    public function add_comment(Request $request)
    {

        $comment = new FeedComment();
        $comment->feed_id = $request->feed_id;
        $comment->comment = $request->comment;
        $comment->user_id = Auth::user()->id;

        try {
            $comment->save();
            return response()->json(['added' => true]);
        } catch (\Exception $e) {
            return response()->json(['added' => false]);
        }
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