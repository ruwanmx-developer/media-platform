@extends('layouts.app')

@section('content')
    <div id="learn" class="pages">
        <div class="container">
            <div class="row mb-3">
                <div class="col-12 text-center">
                    <div class="desc-wrap">
                        <img class="d-block mx-auto mb-1" src="{{ asset('images/logo.png') }}" alt="" width="35">
                        <h3 class="fw-bold p-0 m-0">Learn Programe</h3>
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
                @foreach ($tutorials as $tutorial)
                    <div class="col-4">
                        <div class="class-card">

                            <div class="row video-det">
                                <div class="row">
                                    <div class="col-2">
                                        <div class="card-profile-img small">
                                            <img src="{{ asset('storage/uploads/profile/' . $tutorial->user->image) }} ">
                                        </div>
                                    </div>
                                    <div class="col-10 d-flex align-items-center">
                                        <div class="name">{{ $tutorial->title }}</div>
                                    </div>
                                </div>
                                <div class="col-8">
                                    <div class="video-by">By : {{ $tutorial->user->name }}</div>
                                </div>
                                <div class="col-3 d-flex justify-content-start">
                                    <i class="bi bi-eye-fill"></i>&nbsp;&nbsp;{{ $tutorial->views }}
                                </div>
                                {{-- <div class="col-1 d-flex justify-content-end">
                                    <i class="bi bi-hand-thumbs-up-fill"></i>
                                </div> --}}
                            </div>
                            <div class="video-wrap">
                                <video class="video" controls>
                                    <source src="{{ asset('storage/uploads/tutorials/' . $tutorial->source_url) }} "
                                        type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
