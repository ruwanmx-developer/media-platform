@extends('layouts.app')

@section('content')
    <div id="qna" class="pages">
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
                <div class="col-12">

                    <form action="{{ route('quiz-create') }}" method="POST">
                        @csrf
                        <div class="input-group mb-1">
                            <span class="input-group-text @error('quiz') is-invalid @enderror">Question</span>
                            <input name="quiz" type="text" class="form-control"
                                placeholder="Enter your question here..." value="{{ old('quiz') }}">
                            <button class="btn btn-light" type="submit">Submit</button>

                            @error('quiz')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                    </form>
                </div>
                <div class="col-12">
                    <div class="row">
                        @foreach ($quizes as $quiz)
                            <div class="col-12  mb-2">
                                <div class="class-card" onclick="addAnswer({{ $quiz->id }})">

                                    <div class="row">
                                        <div class="col-12">
                                            <div id="q_{{ $quiz->id }}" class="quiz">{{ $quiz->question }}</div>
                                        </div>

                                        @foreach ($quiz->answers as $answer)
                                            <div class="col-12 mt-1">
                                                @php
                                                    $role = '';
                                                    if ($answer->user->role == 0) {
                                                        $role = 'ADMIN';
                                                    } elseif ($answer->user->role == 1) {
                                                        $role = 'USER';
                                                    } elseif ($answer->user->role == 2) {
                                                        $role = 'MENTOR';
                                                    } elseif ($answer->user->role == 3) {
                                                        $role = 'COMPANY';
                                                    }
                                                @endphp
                                                <div class="answer"><span>[{{ $role }}] {{ $answer->user->name }} :
                                                    </span>
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
    <script>
        function addAnswer(x) {

            let quiz = document.getElementById("q_" + x).innerHTML;

            Swal.fire({

                text: quiz,
                icon: 'info',
                input: 'text',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Save Answer',
                preConfirm: (login) => {
                    const xhr = new XMLHttpRequest();
                    const url = '/add-answer/' + x;
                    const formData = new FormData();
                    formData.append('id', x);
                    formData.append('answer', login);
                    xhr.open('POST', url);
                    xhr.setRequestHeader('X-CSRF-TOKEN', $('meta[name="csrf-token"]').attr('content'));
                    xhr.onreadystatechange = function() {
                        if (this.readyState === 4 && this.status === 200) {
                            var response = JSON.parse(this.responseText);
                            if (response.added == true) {
                                location.reload();
                            }
                        }
                    };
                    xhr.send(formData);
                },
            })
        }
    </script>
@endsection
