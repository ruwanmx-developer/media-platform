@extends('layouts.app')

@section('content')
    <div id="feed" class="pages">
        <div class="container">
            <div class="row mb-3">
                <div class="col-12 text-center">
                    <div class="desc-wrap">
                        <img class="d-block mx-auto mb-1" src="{{ asset('images/logo.png') }}" alt="" width="35">
                        <h3 class="fw-bold p-0 m-0">Your Uploaded Feeds</h3>
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
