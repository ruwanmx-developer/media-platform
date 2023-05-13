@extends('layouts.app')

@section('content')
    <div id="feed" class="pages">
        <div class="container">
            <div class="row mb-3">
                <div class="col-12 text-center">
                    <div class="desc-wrap">
                        <img class="d-block mx-auto mb-1" src="{{ asset('images/logo.png') }}" alt="" width="35">
                        <h3 class="fw-bold p-0 m-0">Feed Programe</h3>
                        <h6 class="fw-bold ">By Media Mix</h6>
                        <div class="col-lg-8 mx-auto">
                            <p class="lead mb-4">The feed page of a website is the hub of all the latest updates and
                                activities. It is a dynamic platform that presents a user with a stream of constantly
                                updated content, including posts, articles, news, and events. The feed page is designed to
                                keep the user engaged by providing them with personalized and relevant content based on
                                their preferences and interests.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row gy-3 gx-3">
                @foreach ($feeds as $feed)
                    <div class="col-4">
                        <div class="class-card">

                            <div class="row video-det">
                                <div class="col-12">
                                    <div class="name">{{ $feed->user->name }}</div>
                                </div>
                                <div class="col-10">
                                    <div class="video-by">By : {{ $feed->description }}</div>
                                </div>
                                <div class="col-2 d-flex justify-content-end">
                                    <i class="bi bi-hand-thumbs-up-fill"></i>
                                </div>
                            </div>
                            @php
                                $isVideo = substr($feed->source_url, -4) === '.mp4';
                            @endphp
                            @if ($isVideo)
                                <div class="video-wrap">
                                    <video class="video" controls>
                                        <source src="{{ asset('storage/uploads/feeds/' . $feed->source_url) }} "
                                            type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                </div>
                            @else
                                <div class="image-wrap">
                                    <img src="{{ asset('storage/uploads/feeds/' . $feed->source_url) }} " alt="">
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
