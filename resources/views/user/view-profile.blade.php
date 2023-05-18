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
                    <div class="form-title">User Profile</div>
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
                        <div class="title"><span>Account Type : </span>USER Account</div>
                    </div>
                </div>
                <div class="col-5 mb-3">
                    <div class="form-title">User Activities</div>
                    <div class="col-12 mb-4">
                        <div class="dashboard-details-card">
                            <div class="title"><span>Feed Count : </span>{{ $feed_count }}</div>
                            <div class="title"><span>Quiz Count : </span>{{ $quiz_count }}</div>
                            <div class="title"><span>Answer Count : </span>{{ $anaswer_count }}</div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
