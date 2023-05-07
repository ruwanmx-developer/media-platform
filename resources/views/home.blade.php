@extends('layouts.app')

@section('content')
    <div id="home">
        <section class="section-1">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="title mb-5">Looking For A ?</div>
                    </div>
                    <div class="col-12 col-md-4 col-lg-2">
                        <div class="globe-card">
                            Insperation
                        </div>
                    </div>
                    <div class="col-12 col-md-4 col-lg-2">
                        <div class="globe-card">
                            Internship
                        </div>
                    </div>
                    <div class="col-12 col-md-4 col-lg-2">
                        <div class="globe-card">
                            Mentor
                        </div>
                    </div>
                    <div class="col-12 col-md-4 col-lg-2">
                        <div class="globe-card">
                            Learn
                        </div>
                    </div>
                    <div class="col-12 col-md-4 col-lg-2">
                        <div class="globe-card">
                            Q & A
                        </div>
                    </div>
                    <div class="col-12 col-md-4 col-lg-2">
                        <div class="globe-card">
                            Counseling
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-2">
            <div class="event-wrap">
                <div class="container-fluid">
                    <div class="row">
                        @foreach ($events as $event)
                            <div class="col-3">@include('components.event.event-card')</div>
                            <div class="col-3">@include('components.event.event-card')</div>
                            <div class="col-3">@include('components.event.event-card')</div>
                        @endforeach

                    </div>
                </div>

            </div>
        </section>
    </div>
@endsection
