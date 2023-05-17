<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class QuizController extends Controller
{
    public function quiz()
    {
        if (!Auth::check()) {
            return redirect('/')->with('message', 'You have to login to use this function!');
        }
        $quizes = Question::with('user')->with('answers')->with('answers.user')->get();
        return view('user.qna', ['quizes' => $quizes]);
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'quiz' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect('quiz')
                ->withErrors($validator)
                ->withInput();
        }

        $validatedData = $validator->validated();

        $question = new Question();
        $question->question = $validatedData['quiz'];
        $question->user_id = Auth::user()->id;
        $question->state = "ACTIVE";

        try {
            $question->save();
            return redirect('quiz')->with('message', 'Your process was successful!');
        } catch (\Exception $e) {
            return redirect('quiz')->with('message', 'Your process was faild! Try Again!');
        }
    }

    public function add_answer(Request $request)
    {

        $answer = new Answer();
        $answer->answer = $request->answer;
        $answer->question_id = $request->id;
        $answer->user_id = Auth::user()->id;
        $answer->state = "ACTIVE";

        try {
            $answer->save();
            return response()->json(['added' => true]);
        } catch (\Exception $e) {
            return response()->json(['added' => false]);
        }
    }
}
