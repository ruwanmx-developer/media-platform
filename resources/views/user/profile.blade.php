@extends('layouts.app')

@section('content')
    <div id="dashboard">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                </div>
                <div class="col-7 mb-5">
                    <div class="form-title">My Profile</div>
                    <div class="dashboard-details-card">
                        <div class="input-group mb-3">
                            <img src="{{ asset('storage/uploads/profile/' . $user->image) }} " class="profile-img">
                        </div>
                        <div class="title"><span>User Name : </span>{{ $user->name }}</div>
                        <div class="title"><span>Email Address : </span>{{ $user->email }}</div>
                        <div class="title"><span>Home Address : </span>{{ $user->address }}</div>
                        <div class="title"><span>Mobile Number : </span>{{ $user->mobile }}</div>
                        <div class="title"><span>District : </span>{{ $user->district }}</div>
                        <div class="title"><span>Description : </span>{{ $user->description }}</div>
                        @php
                            $role = '';
                            if ($user->role == 0) {
                                $role = 'ADMIN';
                            } elseif ($user->role == 1) {
                                $role = 'USER';
                            } elseif ($user->role == 2) {
                                $role = 'MENTOR';
                            } elseif ($user->role == 3) {
                                $role = 'COMPANY';
                            }
                        @endphp
                        <div class="title"><span>Account Type : </span>{{ $role }} Account</div>
                        <div class="col-12 d-flex justify-content-end">
                            <a href="{{ route('mentor-class-index') }}" type="button" class="btn btn-primary ">Update
                                Profile</a>

                        </div>
                    </div>
                </div>
                <div class="col-5 mb-3">
                    <div class="form-title">My Activities</div>
                    <div class="col-12 mb-4">
                        <div class="dashboard-details-card">

                            @if (Auth::user()->role == 0)
                                {{-- admin --}}
                                <div class="title"><span>Feed Comment Count : </span>{{ $feed_comment_count }}</div>
                                <div class="title"><span>Event Count : </span>{{ $event_count }}</div>
                                <div class="title"><span>Internship Count : </span>{{ $internship_count }}</div>
                                <div class="title"><span>Class Count : </span>{{ $tuition_count }}</div>
                                <div class="title"><span>Tutorial Count : </span>{{ $tutorial_count }}</div>
                            @elseif (Auth::user()->role == 1)
                                {{-- user --}}
                                <div class="title"><span>Feed Count : </span>{{ $feed_count }}</div>
                                <div class="title"><span>Internship Request Count : </span>{{ $internship_request_count }}
                                </div>
                                <div class="title"><span>Class Request Count : </span>{{ $tuition_request_count }}</div>
                            @elseif (Auth::user()->role == 2)
                                {{-- mentor --}}
                                <div class="title"><span>Feed Comment Count : </span>{{ $feed_comment_count }}</div>
                                <div class="title"><span>Class Count : </span>{{ $tuition_count }}</div>
                                <div class="title"><span>Tutorial Count : </span>{{ $tutorial_count }}</div>
                            @else
                                {{-- company --}}
                                <div class="title"><span>Feed Comment Count : </span>{{ $feed_comment_count }}</div>
                                <div class="title"><span>Internship Count : </span>{{ $internship_count }}</div>
                            @endif
                            <div class="title"><span>Quiz Count : </span>{{ $quiz_count }}</div>
                            <div class="title"><span>Answer Count : </span>{{ $anaswer_count }}</div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
