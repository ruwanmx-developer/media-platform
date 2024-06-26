@extends('layouts.app')

@section('content')
    <div id="mentor" class="pages">
        <div class="container">
            <div class="row mb-3">
                <div class="col-12 text-center">
                    <div class="desc-wrap">
                        <img class="d-block mx-auto mb-1" src="{{ asset('images/logo.png') }}" alt="" width="35">
                        <h3 class="fw-bold p-0 m-0">Counseling Programe</h3>
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
                @foreach ($mentors as $mentor)
                    <div class="col-4">
                        <div class="class-card">
                            <div class="row">
                                <div class="col-2">
                                    <div class="card-profile-img">
                                        <img src="{{ asset('storage/uploads/profile/' . $mentor->image) }} ">
                                    </div>
                                </div>
                                <div class="col-10 d-flex align-items-center">
                                    <div class="name">{{ $mentor->name }}</div>
                                </div>
                            </div>

                            <div class="location">Email : <span>{{ $mentor->email }}</span></div>
                            <div class="location">District : <span>{{ $mentor->district }}</span></div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
