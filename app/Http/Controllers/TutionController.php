<?php

namespace App\Http\Controllers;

use App\Models\Tution;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TutionController extends Controller
{
    public function index()
    {
        $classes = Tution::where('user_id', '=', Auth::user()->id)->get();
        return view('mentor.class-index', ['classes' => $classes]);
    }

    public function add()
    {
        $classes = Tution::where('user_id', '=', Auth::user()->id)->get();
        return view('mentor.class-add', ['classes' => $classes]);
    }

    public function edit(Request $request)
    {
        $class = Tution::where('id', '=', $request->id)->first();
        return view('mentor.class-edit', ['class' => $class]);
    }
    public function delete(Request $request)
    {
        $class = Tution::where('id', '=', $request->id)->first();
        try {
            $class->delete();
            return redirect('mentor-class-index')->with('message', 'Your process was successful!');
        } catch (\Exception $e) {
            return redirect('mentor-class-index')->with('message', 'Your process was faild! Try Again!');
        }
    }
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'class_name' => 'required|string|max:255',
            'time_from' => 'required|date_format:H:i',
            'time_to' => 'required|date_format:H:i',
            'day' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'district' => 'required|string|max:255',
            'state' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('mentor-class-add')
                ->withErrors($validator)
                ->withInput();
        }

        $validatedData = $validator->validated();

        $tution = Tution::where('id', '=', $request->id)->first();
        $tution->class_name = $validatedData['class_name'];
        $tution->time_to = $validatedData['time_to'];
        $tution->time_from = $validatedData['time_from'];
        $tution->day = $validatedData['day'];
        $tution->location = $validatedData['location'];
        $tution->district = $validatedData['district'];
        $tution->user_id = Auth::user()->id;
        $tution->state = $validatedData['state'];

        try {
            $tution->save();
            return redirect('mentor-class-index')->with('message', 'Your process was successful!');
        } catch (\Exception $e) {
            return redirect('mentor-class-add')->with('message', 'Your process was faild! Try Again!');
        }
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'class_name' => 'required|string|max:255',
            'time_from' => 'required|date_format:H:i',
            'time_to' => 'required|date_format:H:i',
            'day' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'district' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect('mentor-class-add')
                ->withErrors($validator)
                ->withInput();
        }

        $validatedData = $validator->validated();

        $tution = new Tution();
        $tution->class_name = $validatedData['class_name'];
        $tution->time_to = $validatedData['time_to'];
        $tution->time_from = $validatedData['time_from'];
        $tution->day = $validatedData['day'];
        $tution->location = $validatedData['location'];
        $tution->district = $validatedData['district'];
        $tution->user_id = Auth::user()->id;
        $tution->state = "ACTIVE";

        try {
            $tution->save();
            return redirect('mentor-class-index')->with('message', 'Your process was successful!');
        } catch (\Exception $e) {
            return redirect('mentor-class-add')->with('message', 'Your process was faild! Try Again!');
        }
    }
}
