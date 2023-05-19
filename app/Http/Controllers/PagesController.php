<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Event;
use App\Models\Feed;
use App\Models\FeedComment;
use App\Models\JobApplications;
use App\Models\Question;
use App\Models\Tution;
use App\Models\TutionRequest;
use App\Models\Tutorial;
use App\Models\User;
use App\Models\Vacancy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PagesController extends Controller
{
    public function index()
    {
        $events = Event::orderBy('created_at', 'desc')
            ->take(4)
            ->get();
        return view('home', ['events' => $events]);
    }

    public function internship()
    {
        if (!Auth::check()) {
            return redirect('/')->with('message', 'You have to login to use this function!');
        }
        if (Auth::user()->role != 1) {
            return redirect('/')->with('message', 'You have no access to this area!');
        }
        return view('user.internship');
    }

    public function learn()
    {
        if (!Auth::check()) {
            return redirect('/')->with('message', 'You have to login to use this function!');
        }
        return view('user.learn');
    }

    public function counsil()
    {
        if (!Auth::check()) {
            return redirect('/')->with('message', 'You have to login to use this function!');
        }
        $mentors = User::where('role', '=', 2)->get();
        return view('user.counselling', ['mentors' => $mentors]);
    }

    public function event(Request $request)
    {
        if (!Auth::check()) {
            return redirect('/')->with('message', 'You have to login to use this function!');
        }
        $event = Event::find($request->id);
        return view('user.event', ['event' => $event]);
    }

    public function events(Request $request)
    {
        if (!Auth::check()) {
            return redirect('/')->with('message', 'You have to login to use this function!');
        }
        $events = Event::all();
        return view('user.events', ['events' => $events]);
    }

    public function edit_profile(Request $request)
    {
        if (!Auth::check()) {
            return redirect('/')->with('message', 'You have to login to use this function!');
        }
        $user = User::find(Auth::user()->id);
        return view('user.profile-edit', ['user' => $user]);
    }

    public function profile(Request $request)
    {
        if (!Auth::check()) {
            return redirect('/')->with('message', 'You have to login to use this function!');
        }
        $user = User::find(Auth::user()->id);
        //admin
        $feed_comment_count = count(FeedComment::where('user_id', '=', Auth::user()->id)->get());
        $event_count = count(Event::all());
        $internship_count = count(Vacancy::where('user_id', '=', Auth::user()->id)->get());
        $tuition_count = count(Tution::where('user_id', '=', Auth::user()->id)->get());
        $tutorial_count = count(Tutorial::where('user_id', '=', Auth::user()->id)->get());
        // user
        $feed_count = count(Feed::where('user_id', '=', Auth::user()->id)->get());
        $internship_request_count = count(JobApplications::where('user_id', '=', Auth::user()->id)->get());
        $tuition_request_count = count(TutionRequest::where('user_id', '=', Auth::user()->id)->get());
        $quiz_count = count(Question::where('user_id', '=', Auth::user()->id)->get());
        $anaswer_count = count(Answer::where('user_id', '=', Auth::user()->id)->get());

        return view('user.profile')
            ->with('user', $user)
            ->with('feed_count', $feed_count)
            ->with('internship_request_count', $internship_request_count)
            ->with('tuition_request_count', $tuition_request_count)
            ->with('quiz_count', $quiz_count)
            ->with('anaswer_count', $anaswer_count)
            ->with('feed_comment_count', $feed_comment_count)
            ->with('event_count', $event_count)
            ->with('internship_count', $internship_count)
            ->with('tuition_count', $tuition_count)
            ->with('tutorial_count', $tutorial_count);
    }

    public function view_profile(Request $request)
    {
        if (!Auth::check()) {
            return redirect('/')->with('message', 'You have to login to use this function!');
        }
        $user = User::find($request->id);
        $feed_comment_count = count(FeedComment::where('user_id', '=', Auth::user()->id)->get());
        $event_count = count(Event::all());
        $internship_count = count(Vacancy::where('user_id', '=', Auth::user()->id)->get());
        $tuition_count = count(Tution::where('user_id', '=', Auth::user()->id)->get());
        $tutorial_count = count(Tutorial::where('user_id', '=', Auth::user()->id)->get());
        $feed_count = count(Feed::where('user_id', '=', Auth::user()->id)->get());
        $internship_request_count = count(JobApplications::where('user_id', '=', Auth::user()->id)->get());
        $tuition_request_count = count(TutionRequest::where('user_id', '=', Auth::user()->id)->get());
        $quiz_count = count(Question::where('user_id', '=', Auth::user()->id)->get());
        $anaswer_count = count(Answer::where('user_id', '=', Auth::user()->id)->get());

        return view('user.view-profile')
            ->with('user', $user)
            ->with('feed_count', $feed_count)
            ->with('internship_request_count', $internship_request_count)
            ->with('tuition_request_count', $tuition_request_count)
            ->with('quiz_count', $quiz_count)
            ->with('anaswer_count', $anaswer_count)
            ->with('feed_comment_count', $feed_comment_count)
            ->with('event_count', $event_count)
            ->with('internship_count', $internship_count)
            ->with('tuition_count', $tuition_count)
            ->with('tutorial_count', $tutorial_count);
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string',],
            'mobile' => ['required', 'string', 'min:10', 'max:10'],
            'district' => ['required', 'string'],
            'description' => ['required', 'string'],
        ]);

        if ($validator->fails()) {
            return redirect()->route('edit-profile', ['id' => $request->id])
                ->withErrors($validator)
                ->withInput();
        }

        $validatedData = $validator->validated();

        $user = User::where('id', '=', $request->id)->first();
        $user->name = $validatedData['name'];
        $user->address = $validatedData['address'];
        $user->mobile = $validatedData['mobile'];
        $user->district = $validatedData['district'];
        $user->description = $validatedData['description'];

        try {
            $user->save();
            return redirect('profile')->with('message', 'Your process was successful!');
        } catch (\Exception $e) {
            return redirect('profile')->with('message', 'Your process was faild! Try Again!');
        }
    }
}
