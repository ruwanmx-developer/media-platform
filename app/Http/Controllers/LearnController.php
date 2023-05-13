<?php

namespace App\Http\Controllers;

use App\Models\Tutorial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LearnController extends Controller
{
    public function learn()
    {
        if (!Auth::check()) {
            return redirect('/')->with('message', 'You have to login to use this function!');
        }
        if (Auth::user()->role != 1) {
            return redirect('/')->with('message', 'You have no access to this area!');
        }
        $tutorials = Tutorial::where('state', '=', 'ACTIVE')->with('user')->get();
        return view('user.learn', ['tutorials' => $tutorials]);
    }
}
