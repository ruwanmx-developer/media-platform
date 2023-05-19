@extends('layouts.app')

@section('content')
    <div id="feed" class="pages">
        <div class="container">
            <div class="row mb-3">
                <div class="col-12 text-center">
                    <div class="desc-wrap">
                        <img class="d-block mx-auto mb-1" src="{{ asset('images/logo.png') }}" alt="" width="35">
                        <h3 class="fw-bold p-0 m-0">Events Programe</h3>
                        <h6 class="fw-bold ">By Media Mix</h6>
                        <div class="col-lg-10 mx-auto">
                            <p class="lead mb-2">The feed page of a website is the hub of all the latest updates and
                                activities. It is a dynamic platform that presents a user with a stream of constantly
                                updated content, including posts, articles, news, and events. The feed page is designed to
                                keep the user engaged by providing them with personalized and relevant content based on
                                their preferences and interests.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row gy-3 gx-3">
                @foreach ($events as $event)
                    <div class="col-4">
                        <div class="class-card" onclick="viewEvent({{ $event->id }})">
                            <div class="name">{{ $event->name }}</div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="time">By : <span>{{ $event->organizer }}</span></div>
                                </div>
                                <div class="col-12">
                                    <div class="time">On : <span>{{ $event->event_date }}</span></div>
                                </div>
                                <div class="col-12">
                                    <div class="time">At : <span>{{ $event->location }}</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <script>
        function viewEvent(x) {
            document.location.href = "view-event/" + x;
        }
    </script>
@endsection
