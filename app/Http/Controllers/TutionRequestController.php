<?php

namespace App\Http\Controllers;

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
        return view('mentor.class-request-user', ['user' => $user]);
    }

    public function mentor_hide(Request $request)
    {
        $crequest = TutionRequest::where('id', '=', $request->id)->first();
        $crequest->state = "DELETED";
        try {
            $crequest->save();
            return redirect('mentor-request-index', ['id' => $request->id])->with('message', 'Your process was successful!');
        } catch (\Exception $e) {
            return redirect('mentor-class-index')->with('message', 'Your process was faild! Try Again!');
        }
    }
}
