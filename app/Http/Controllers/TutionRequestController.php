<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Feed;
use App\Models\FeedComment;
use App\Models\Question;
use App\Models\TutionRequest;
use App\Models\User;
use Illuminate\Http\Request;

class TutionRequestController extends Controller
{
    public function mentor_index(Request $request)
    {
        $crequests = TutionRequest::where('class_id', '=', $request->id)->where('state', '!=', 'DELETED')->with('user')->get();
        return view('mentor.class-request', ['crequests' => $crequests]);
    }

    public function mentor_view_user(Request $request)
    {
        $user = User::where('id', '=', $request->id)->first();
        $crequest = TutionRequest::where('id', '=', $request->crequest)->first();
        $crequest->state = "VIEWED";
        $crequest->save();

        $feed_count = count(Feed::where('user_id', '=', $request->id)->get());
        $quiz_count = count(Question::where('user_id', '=', $request->id)->get());
        $anaswer_count = count(Answer::where('user_id', '=', $request->id)->get());

        return view('user.view-profile')
            ->with('user', $user)
            ->with('feed_count', $feed_count)
            ->with('quiz_count', $quiz_count)
            ->with('anaswer_count', $anaswer_count);
    }

    public function mentor_hide(Request $request)
    {
        $crequest = TutionRequest::where('id', '=', $request->id)->first();
        $crequest->state = "DELETED";
        try {
            $crequest->save();
            return response()->json(['deleted' => true]);
        } catch (\Exception $e) {
            return redirect('mentor-class-index')->with('message', 'Your process was faild! Try Again!');
        }
    }
}
