<?php

namespace App\Http\Controllers;

use App\Models\JobApplications;
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
        return view('company.job-application-user', ['user' => $user]);
    }

    public function company_hide(Request $request)
    {
        $application = JobApplications::where('id', '=', $request->id)->first();
        $application->state = "DELETED";
        try {
            $application->save();
            return redirect('company-application-index', ['id' => $request->id])->with('message', 'Your process was successful!');
        } catch (\Exception $e) {
            return redirect('company-job-index')->with('message', 'Your process was faild! Try Again!');
        }
    }
}
