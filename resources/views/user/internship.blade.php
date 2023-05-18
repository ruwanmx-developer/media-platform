@extends('layouts.app')

@section('content')
    <div id="internship" class="pages">
        <div class="container">
            <div class="row mb-3">
                <div class="col-12 text-center">
                    <div class="desc-wrap">
                        <img class="d-block mx-auto mb-1" src="{{ asset('images/logo.png') }}" alt="" width="35">
                        <h3 class="fw-bold p-0 m-0">Internship Programe</h3>
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
                @foreach ($jobs as $job)
                    <div class="col-4">
                        <div class="class-card">
                            <div class="name">{{ $job->title }}</div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="time">Type : <span>{{ $job->type }}</span></div>
                                </div>
                                <div class="col-6">
                                    <div class="time">Location : <span>{{ $job->location }}</span></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="location">Salary : <span>Rs: {{ $job->salary }} /=</span></div>
                                </div>
                                <div class="col-6">
                                    @if ($user_requests->where('vacancy_id', '=', $job->id)->where('state', '=', 'VIEWED')->first())
                                        <div class="day">Contact : <span>{{ $job->user->mobile }}</span></div>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-8">
                                    <div class="day">By : {{ $job->user->name }}</div>
                                </div>
                                <div class="col-4 d-flex justify-content-end">
                                    @if ($user_requests->where('vacancy_id', '=', $job->id)->where('state', '=', 'PENDING')->first())
                                        <a class="btn btn-warning static">Requested</a>
                                    @elseif ($user_requests->where('vacancy_id', '=', $job->id)->where('state', '=', 'VIEWED')->first())
                                        <a class="btn btn-success static">Viewed</a>
                                    @else
                                        <a href="{{ route('add_job_request', ['id' => $job->id]) }}"
                                            class="btn btn-primary">Request</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
