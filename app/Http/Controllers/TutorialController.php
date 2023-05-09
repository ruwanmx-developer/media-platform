<?php

namespace App\Http\Controllers;

use App\Models\Tutorial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class TutorialController extends Controller
{
    public function index()
    {
        $tutorials = Tutorial::where('user_id', '=', Auth::user()->id)->get();
        return view('mentor.tutorial-index', ['tutorials' => $tutorials]);
    }

    public function add()
    {
        $tutorials = Tutorial::where('user_id', '=', Auth::user()->id)->get();
        return view('mentor.tutorial-add', ['tutorials' => $tutorials]);
    }

    public function edit(Request $request)
    {
        $tutorial = Tutorial::where('id', '=', $request->id)->first();
        return view('mentor.tutorial-edit', ['tutorial' => $tutorial]);
    }

    public function delete(Request $request)
    {
        $tutorial = Tutorial::where('id', '=', $request->id)->first();

        Storage::delete("public/uploads/tutorials/" . $tutorial->source_url);
        try {
            $tutorial->delete();
            return redirect('mentor-tutorial-index')->with('success', 'Your process was successful!');
        } catch (\Exception $e) {
            return redirect('mentor-tutorial-index')->with('error', 'Your process was faild! Error: ' . $e->getMessage());
        }
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'state' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('mentor-tutorial-edit')
                ->withErrors($validator)
                ->withInput();
        }

        $validatedData = $validator->validated();

        $tutorial = Tutorial::where('id', '=', $request->id)->first();
        $tutorial->title = $validatedData['title'];
        $tutorial->description = $validatedData['description'];
        $tutorial->state = $validatedData['state'];

        try {
            $tutorial->save();
            return redirect('mentor-tutorial-index')->with('success', 'Your process was successful!');
        } catch (\Exception $e) {
            return redirect('mentor-tutorial-edit')->with('error', 'Your process was faild! Error: ' . $e->getMessage());
        }
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'source_url' => 'required|mimes:mp4,mov,avi|max:20000',
        ]);

        if ($validator->fails()) {
            return redirect('mentor-tutorial-add')
                ->withErrors($validator)
                ->withInput();
        }

        $validatedData = $validator->validated();

        $file = $request->file('source_url');
        $newFileName = time() . Auth::user()->id . '.' . $file->getClientOriginalExtension();
        $file->storeAs('public/uploads/tutorials', $newFileName);


        $tutorial = new Tutorial();
        $tutorial->title = $validatedData['title'];
        $tutorial->description = $validatedData['description'];
        $tutorial->source_url = $newFileName;
        $tutorial->views = 0;
        $tutorial->user_id = Auth::user()->id;
        $tutorial->state = "ACTIVE";

        try {
            $tutorial->save();
            return redirect('mentor-tutorial-index')->with('success', 'Your process was successful!');
        } catch (\Exception $e) {
            return redirect('mentor-tutorial-add')->with('error', 'Your process was faild! Error: ' . $e->getMessage());
        }
    }
}