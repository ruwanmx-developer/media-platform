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
                    </div>
                </div>
            </div>
            <div class="row gy-3 gx-3">
                <div class="col-12">
                    <div class="desc-wrap view p-3">
                        @php
                            $isVideo = substr($post->source_url, -4) === '.mp4';
                        @endphp
                        @if ($isVideo)
                            <div class="video-wrap">
                                <video class="video" controls>
                                    <source src="{{ asset('storage/uploads/feeds/' . $post->source_url) }} "
                                        type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                            </div>
                        @else
                            <div class="image-wrap">
                                <img src="{{ asset('storage/uploads/feeds/' . $post->source_url) }} " alt="">
                            </div>
                        @endif
                        <p class="lead mb-4">{{ $post->description }}</p>
                        @foreach ($post->comments as $comment)
                            <div class="col-12 mt-1">
                                @php
                                    $role = '';
                                    if ($comment->user->role == 0) {
                                        $role = 'ADMIN';
                                    } elseif ($comment->user->role == 1) {
                                        $role = 'USER';
                                    } elseif ($comment->user->role == 2) {
                                        $role = 'MENTOR';
                                    } elseif ($comment->user->role == 3) {
                                        $role = 'COMPANY';
                                    }
                                @endphp
                                <div class="answer"><span>[{{ $role }}] {{ $comment->user->name }} :
                                    </span>
                                    {{ $comment->comment }}
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
