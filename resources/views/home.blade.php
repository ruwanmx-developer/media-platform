@extends('layouts.app')

@section('content')
    <div id="home">
        <section class="section-1">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="title mb-2">Looking For A ?</div>
                    </div>
                    <div class="col-12 col-md-4  d-flex justify-content-start">
                        <a href="{{ route('feed') }}" class="no-link">
                            <div class="globe-card">
                                <div class="g-c g-c-1"></div>
                                <div class="txt">Feed</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-12 col-md-4 d-flex justify-content-start ">
                        <a href="{{ route('internship') }}" class="no-link">
                            <div class="globe-card">
                                <div class="g-c g-c-2"></div>
                                <div class="txt">Internship</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-12 col-md-4  d-flex justify-content-start ">
                        <a href="{{ route('mentor') }}" class="no-link">
                            <div class="globe-card">
                                <div class="g-c g-c-3"></div>
                                <div class="txt">Mentor</div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="row mt-1">
                    <div class="col-12 col-md-4 d-flex justify-content-end">
                        <a href="{{ route('learn') }}" class="no-link">
                            <div class="globe-card">
                                <div class="g-c g-c-4"></div>
                                <div class="txt">Learn</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-12 col-md-4 d-flex justify-content-end">
                        <a href="{{ route('quiz') }}" class="no-link">
                            <div class="globe-card">
                                <div class="g-c g-c-5"></div>
                                <div class="txt">Discussion</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-12 col-md-4 d-flex justify-content-end">
                        <a href="{{ route('quiz') }}" class="no-link">
                            <div class="globe-card">
                                <div class="g-c g-c-6"></div>
                                <div class="txt">Counseling</div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-2">
            <div class="event-wrap">
                <div class="container-fluid">
                    <div class="row gy-3 gx-3 ">
                        <div class="col-12">
                            <div class="s-title">Events</div>
                        </div>
                        @foreach ($events as $event)
                            <div class="col-3">@include('components.event.event-card')</div>
                        @endforeach
                    </div>
                </div>

            </div>
        </section>
    </div>
@endsection
