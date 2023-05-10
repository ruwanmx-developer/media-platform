<?php

namespace App\Http\Controllers;

use App\Models\Tution;
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
        return view('user.mentor', ['classes' => $classes]);
    }
}