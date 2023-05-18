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
        $tutorials = Tutorial::where('state', '=', 'ACTIVE')->get();
        foreach ($tutorials as $tut) {
            $tut->views = $tut->views + 1;
            $tut->save();
        }
        $tutorials = Tutorial::where('state', '=', 'ACTIVE')->with('user')->get();
        return view('user.learn', ['tutorials' => $tutorials]);
    }
}
