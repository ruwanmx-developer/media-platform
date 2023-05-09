<?php

namespace App\Http\Controllers;

use App\Models\Vacancy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Vacancy::where('user_id', '=', Auth::user()->id)->get();
        return view('company.job-index', ['jobs' => $jobs]);
    }

    public function add()
    {
        $jobs = Vacancy::where('user_id', '=', Auth::user()->id)->get();
        return view('company.job-add', ['jobs' => $jobs]);
    }

    public function edit(Request $request)
    {
        $job = Vacancy::where('id', '=', $request->id)->first();
        return view('company.job-edit', ['job' => $job]);
    }

    public function delete(Request $request)
    {
        $vacancy = Vacancy::where('id', '=', $request->id)->first();
        try {
            $vacancy->delete();
            return redirect('company-job-index')->with('success', 'Your process was successful!');
        } catch (\Exception $e) {
            return redirect('company-job-index')->with('error', 'Your process was faild! Error: ' . $e->getMessage());
        }
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'salary' => 'required|numeric|min:0|max:999999',
            'state' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('company-job-edit')
                ->withErrors($validator)
                ->withInput();
        }

        $validatedData = $validator->validated();

        $vacancy = Vacancy::where('id', '=', $request->id)->first();
        $vacancy->title = $validatedData['title'];
        $vacancy->type = $validatedData['type'];
        $vacancy->location = $validatedData['location'];
        $vacancy->salary = $validatedData['salary'];
        $vacancy->user_id = Auth::user()->id;
        $vacancy->state = $validatedData['state'];

        try {
            $vacancy->save();
            return redirect('company-job-index')->with('success', 'Your process was successful!');
        } catch (\Exception $e) {
            return redirect('company-job-edit')->with('error', 'Your process was faild! Error: ' . $e->getMessage());
        }
    }

    public function job_create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'salary' => 'required|numeric|min:0|max:999999',
        ]);

        if ($validator->fails()) {
            return redirect('company-job-add')
                ->withErrors($validator)
                ->withInput();
        }

        $validatedData = $validator->validated();

        $vacancy = new Vacancy;
        $vacancy->title = $validatedData['title'];
        $vacancy->type = $validatedData['type'];
        $vacancy->location = $validatedData['location'];
        $vacancy->salary = $validatedData['salary'];
        $vacancy->user_id = Auth::user()->id;
        $vacancy->state = "ACTIIVE";

        try {
            $vacancy->save();
            return redirect('company-job-index')->with('success', 'Your process was successful!');
        } catch (\Exception $e) {
            return redirect('company-job-add')->with('error', 'Your process was faild! Error: ' . $e->getMessage());
        }
    }
}
