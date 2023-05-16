<?php

namespace App\Http\Controllers;

use App\Models\Tution;
use App\Models\TutionRequest;
use App\Models\Vacancy;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MentorController extends Controller
{
    public function index()
    {
        return view('company.dashboard');
    }

    public function mentor()
    {
        if (!Auth::check()) {
            return redirect('/')->with('message', 'You have to login to use this function!');
        }
        if (Auth::user()->role != 1) {
            return redirect('/')->with('message', 'You have no access to this area!');
        }
        $classes = Tution::where('state', '=', 'ACTIVE')->with('user')->get();
        $user_requests = TutionRequest::where('user_id', '=', Auth::user()->id)
            ->where(function ($query) {
                $query->where('state', '=', 'PENDING')
                    ->orWhere('state', '=', 'VIEWED');
            })->get();
        return view('user.mentor', ['classes' => $classes, 'user_requests' => $user_requests]);
    }

    public function add_class_request(Request $request)
    {
        $class_id = $request->id;
        $tution = Tution::where('id', '=', $class_id)->first();
        if ($tution) {
            $class_request = new TutionRequest();
            $class_request->user_id = Auth::user()->id;
            $class_request->class_id = $class_id;
            $class_request->state = "PENDING";
            $pending_request = TutionRequest::where('user_id', '=', $class_request->user_id)
                ->where('class_id', '=',    $class_request->class_id)
                ->where('state', '=', $class_request->state)->get();
            if (count($pending_request) == 0) {
                $class_request->save();
                return redirect('mentor')->with('message', 'Your request has been sent successfully!');
            } else {
                return redirect('mentor')->with('message', 'You have already sent a request. Mentor will contact you within 2 days!');
            }
        } else {
            return redirect('mentor')->with('message', 'Your selected class is not available!');
        }
    }

    public function user_mentors()
    {
        if (!Auth::check()) {
            return redirect('/')->with('message', 'You have to login to use this function!');
        }
        if (Auth::user()->role != 1) {
            return redirect('/')->with('message', 'You have no access to this area!');
        }
        $user_requests = TutionRequest::where('user_id', '=', Auth::user()->id)
            ->with('tution')->with('tution.user')->get();
        return view('user.my-mentors', ['user_requests' => $user_requests]);
    }
}
