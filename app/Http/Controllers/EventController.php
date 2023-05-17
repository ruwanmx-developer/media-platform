<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::orderBy('event_date', 'desc')->get();
        return view('admin.event-index', ['events' => $events]);
    }

    public function add()
    {
        $events = Event::orderBy('event_date', 'desc')->get();
        return view('admin.event-add', ['events' => $events]);
    }

    public function edit(Request $request)
    {
        $event = Event::where('id', '=', $request->id)->first();
        return view('admin.event-edit', ['event' => $event]);
    }

    public function delete(Request $request)
    {
        $event = Event::where('id', '=', $request->id)->first();
        try {
            $event->delete();
            return redirect('admin-event-index')->with('message', 'Your process was successful!');
        } catch (\Exception $e) {
            return redirect('admin-event-index')->with('message', 'Your process was faild! Try Again!');
        }
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'organizer' => 'required|string|max:255',
            'event_date' => 'required|date',
            'state' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin-event-edit', ['id' => $request->id])
                ->withErrors($validator)
                ->withInput();
        }

        $validatedData = $validator->validated();

        $event = Event::where('id', '=', $request->id)->first();
        $event->name = $validatedData['name'];
        $event->event_date = $validatedData['event_date'];
        $event->location = $validatedData['location'];
        $event->description = $validatedData['description'];
        $event->organizer = $validatedData['organizer'];
        $event->state = $validatedData['state'];

        try {
            $event->save();
            return redirect('admin-event-index')->with('message', 'Your process was successful!');
        } catch (\Exception $e) {
            return redirect('admin-event-edit')->with('message', 'Your process was faild! Try Again!');
        }
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'organizer' => 'required|string|max:255',
            'event_date' => 'required|date',
        ]);

        if ($validator->fails()) {
            return redirect('admin-event-add')
                ->withErrors($validator)
                ->withInput();
        }

        $validatedData = $validator->validated();

        $event = new Event();
        $event->name = $validatedData['name'];
        $event->event_date = $validatedData['event_date'];
        $event->location = $validatedData['location'];
        $event->description = $validatedData['description'];
        $event->organizer = $validatedData['organizer'];
        $event->state = "ACTIVE";

        try {
            $event->save();
            return redirect('admin-event-index')->with('message', 'Your process was successful!');
        } catch (\Exception $e) {
            return redirect('admin-event-add')->with('message', 'Your process was faild! Try Again!');
        }
    }
}
