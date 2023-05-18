<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Feed;
use App\Models\JobApplications;
use App\Models\Question;
use App\Models\User;
use Illuminate\Http\Request;

class JobApplicationController extends Controller
{
    public function company_index(Request $request)
    {
        $applications = JobApplications::where('vacancy_id', '=', $request->id)->where('state', '!=', 'DELETED')->with('user')->get();
        return view('company.job-application', ['applications' => $applications]);
    }

    public function company_view_user(Request $request)
    {
        $user = User::where('id', '=', $request->id)->first();
        $application = JobApplications::where('id', '=', $request->application)->first();
        $application->state = "VIEWED";
        $application->save();

        $feed_count = count(Feed::where('user_id', '=', $request->id)->get());
        $quiz_count = count(Question::where('user_id', '=', $request->id)->get());
        $anaswer_count = count(Answer::where('user_id', '=', $request->id)->get());

        return view('user.view-profile')
            ->with('user', $user)
            ->with('feed_count', $feed_count)
            ->with('quiz_count', $quiz_count)
            ->with('anaswer_count', $anaswer_count);
    }

    public function company_hide(Request $request)
    {
        $application = JobApplications::where('id', '=', $request->id)->first();
        $application->state = "DELETED";
        try {
            $application->save();
            return response()->json(['deleted' => true]);
        } catch (\Exception $e) {
            return redirect('company-job-index')->with('message', 'Your process was faild! Try Again!');
        }
    }
}
