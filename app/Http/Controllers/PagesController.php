<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        $events = Event::orderBy('created_at', 'desc')
            ->take(3)
            ->get();

        return view('home', ['events' => $events]);
    }
}
