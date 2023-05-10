@extends('layouts.app')

@section('content')
    <div id="mentor">
        <div class="container">
            <div class="row mb-3">
                <div class="col-12 text-center">
                    <div class="desc-wrap">
                        <img class="d-block mx-auto mb-1" src="{{ asset('images/logo.png') }}" alt="" width="35">
                        <h3 class="fw-bold p-0 m-0">Mentor Programe</h3>
                        <h6 class="fw-bold ">By Media Mix</h6>
                        <div class="col-lg-8 mx-auto">
                            <p class="lead mb-4">Unlock your potential with our expertly crafted classes. From beginner to
                                advanced, we offer courses that are tailored to your needs and designed to help you succeed.
                                Join us today and discover a new world of possibilities!</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row gy-3 gx-3">
                @foreach ($classes as $class)
                    <div class="col-4">
                        <div class="class-card">
                            <div class="name">{{ $class->class_name }}</div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="time">From : <span>{{ $class->time_from }}</span></div>
                                </div>
                                <div class="col-6">
                                    <div class="time">To : <span>{{ $class->time_to }}</span></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="location">Location : <span>{{ $class->district }}</span></div>
                                </div>
                                <div class="col-6">
                                    <div class="day">Every : <span>{{ $class->day }}</span></div>
                                </div>
                            </div>
                            <div class="building">In : <span>{{ $class->location }}</span></div>
                            <div class="row">
                                <div class="col-8">
                                    <div class="day">By : {{ $class->user->name }}</div>
                                </div>
                                <div class="col-4 d-flex justify-content-end">
                                    <a href="" class="btn btn-primary">Request</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
