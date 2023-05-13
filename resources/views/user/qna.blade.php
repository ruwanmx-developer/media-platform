@extends('layouts.app')

@section('content')
    <div id="quiz" class="pages">
        <div class="container">
            <div class="row mb-3">
                <div class="col-12 text-center">
                    <div class="desc-wrap">
                        <img class="d-block mx-auto mb-1" src="{{ asset('images/logo.png') }}" alt="" width="35">
                        <h3 class="fw-bold p-0 m-0">Q & A Programe</h3>
                        <h6 class="fw-bold ">By Media Mix</h6>
                        <div class="col-lg-8 mx-auto">
                            <p class="lead mb-4">Welcome to our internship program! We offer a unique opportunity for
                                students and recent graduates to gain hands-on experience and develop their skills in a
                                dynamic and challenging environment. As an intern, you'll work alongside experienced
                                professionals on real-world projects, contributing to the success of our organization while
                                learning from the best in the industry.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row gy-3 gx-3">
                <div class="col-8">
                    <div class="row">
                        @foreach ($quizes as $quiz)
                            <div class="col-12">
                                <div class="class-card">

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="quiz">{{ $quiz->question }}</div>
                                        </div>

                                        @foreach ($quiz->answers as $answer)
                                            <div class="col-12 mt-1">
                                                <div class="answer"><span>[ADMIN] {{ $answer->user->name }} : </span>
                                                    {{ $answer->answer }}
                                                </div>
                                            </div>
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-4">

                </div>

            </div>
        </div>
    </div>
@endsection
