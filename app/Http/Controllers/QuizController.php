<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
}
