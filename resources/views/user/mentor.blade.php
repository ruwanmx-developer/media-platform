@extends('layouts.app')

@section('content')
    <div id="mentor" class="pages">
        <div class="container">
            <div class="row mb-3">
                <div class="col-12 text-center">
                    <div class="desc-wrap">
                        <img class="d-block mx-auto mb-1" src="{{ asset('images/logo.png') }}" alt="" width="35">
                        <h3 class="fw-bold p-0 m-0">Mentor Programe</h3>
                        <h6 class="fw-bold ">By Media Mix</h6>
                        <div class="col-lg-10 mx-auto">
                            <p class="lead mb-2">Unlock your potential with our expertly crafted classes. From beginner to
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
                            <div class="row">
                                <div class="col-2">
                                    <div class="card-profile-img">
                                        <img src="{{ asset('storage/uploads/profile/' . $class->user->image) }} ">
                                    </div>
                                </div>
                                <div class="col-10 d-flex align-items-center">
                                    <div class="name">{{ $class->class_name }}</div>
                                </div>
                            </div>
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
                            <div class="row">
                                <div class="col-6">
                                    <div class="building">In : <span>{{ $class->location }}</span></div>
                                </div>
                                <div class="col-6">
                                    @if ($user_requests->where('class_id', '=', $class->id)->where('state', '=', 'VIEWED')->first())
                                        <div class="day">Contact : <span>{{ $class->user->mobile }}</span></div>
                                    @endif
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-8">
                                    <div class="day">By : {{ $class->user->name }}</div>
                                </div>
                                @if (Auth::user()->role == 1)
                                    <div class="col-4 d-flex justify-content-end">
                                        @if ($user_requests->where('class_id', '=', $class->id)->where('state', '=', 'PENDING')->first())
                                            <a class="btn btn-warning static">Requested</a>
                                        @elseif ($user_requests->where('class_id', '=', $class->id)->where('state', '=', 'VIEWED')->first())
                                            <a class="btn btn-success static">Accepted</a>
                                        @else
                                            <a href="{{ route('add_class_request', ['id' => $class->id]) }}"
                                                class="btn btn-primary">Request</a>
                                        @endif
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
