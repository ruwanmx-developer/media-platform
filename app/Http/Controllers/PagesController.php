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

        } else if (Auth::check() && Auth::user()->role == 1) { // common user
        } else if (Auth::check() && Auth::user()->role == 0) { // admin user
        } else { // unregisterd user
        }



        $events = Event::orderBy('created_at', 'desc')
            ->take(3)
            ->get();

        return view('home', ['events' => $events]);
    }
}
