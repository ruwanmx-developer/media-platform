<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    public function index()
    {

        if (Auth::check() && Auth::user()->role == 3) { // job user
            return redirect('/company-dashboard');
        } else if (Auth::check() && Auth::user()->role == 2) { // mentor user
            return redirect('/mentor-dashboard');
        } else if (Auth::check() && Auth::user()->role == 1) { // common user
        } else if (Auth::check() && Auth::user()->role == 0) { // admin user
        } else { // unregisterd user
        }



        $events = Event::orderBy('created_at', 'desc')
            ->take(3)
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
        if (Auth::user()->role != 1) {
            return redirect('/')->with('message', 'You have no access to this area!');
        }


        return view('user.learn');
    }
}