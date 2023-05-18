<?php

namespace App\Http\Controllers;

use App\Models\JobApplications;
use App\Models\Vacancy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InternshipController extends Controller
{
    public function internship()
    {
        if (!Auth::check()) {
            return redirect('/')->with('message', 'You have to login to use this function!');
        }
        $jobs = Vacancy::where('state', '=', 'ACTIVE')->with('user')->get();
        $user_requests = JobApplications::where('user_id', '=', Auth::user()->id)
            ->where(function ($query) {
                $query->where('state', '=', 'PENDING')
                    ->orWhere('state', '=', 'VIEWED');
            })->get();
        return view('user.internship', ['jobs' => $jobs, 'user_requests' => $user_requests]);
    }

    public function add_job_request(Request $request)
    {
        $job_id = $request->id;
        $vacancy = Vacancy::where('id', '=', $job_id)->first();
        if ($vacancy) {
            $job_request = new JobApplications();
            $job_request->user_id = Auth::user()->id;
            $job_request->vacancy_id = $job_id;
            $job_request->state = "PENDING";
            $pending_request = JobApplications::where('user_id', '=', $job_request->user_id)
                ->where('vacancy_id', '=',    $job_request->vacancy_id)
                ->where('state', '=', $job_request->state)->get();
            if (count($pending_request) == 0) {
                $job_request->save();
                return redirect('internship')->with('message', 'Your request has been sent successfully!');
            } else {
                return redirect('internship')->with('message', 'You have already sent a request. Company will contact you within 2 days!');
            }
        } else {
            return redirect('internship')->with('message', 'Your selected internship is not available!');
        }
    }

    public function user_requests()
    {
        if (!Auth::check()) {
            return redirect('/')->with('message', 'You have to login to use this function!');
        }
        if (Auth::user()->role != 1) {
            return redirect('/')->with('message', 'You have no access to this area!');
        }
        $user_requests = JobApplications::where('user_id', '=', Auth::user()->id)
            ->with('vacancy')->with('vacancy.user')->get();
        return view('user.my-internships', ['user_requests' => $user_requests]);
    }
}
