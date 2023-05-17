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
                <div class="col-12">
                    <div class="form-title">Update Class</div>
                    <form action="{{ route('admin-event-update') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $event->id }}">
                        <div class="input-group mb-3">
                            <span class="input-group-text @error('name') is-invalid @enderror">Event Name</span>
                            <input name="name" type="text" class="form-control" placeholder="Enter the class name"
                                value="{{ old('name', $event->name) }}">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text @error('event_date') is-invalid @enderror">Event Date</span>
                            <input name="event_date" type="date" class="form-control"
                                placeholder="Enter the class start time"
                                value="{{ old('event_date', $event->event_date) }}">
                            @error('event_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text @error('location') is-invalid @enderror">Location</span>
                            <input name="location" type="text" class="form-control"
                                placeholder="Enter the class close time" value="{{ old('location', $event->location) }}">
                            @error('location')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text @error('description') is-invalid @enderror">Description</span>
                            <input name="description" type="text" class="form-control"
                                placeholder="Enter the class close time"
                                value="{{ old('description', $event->description) }}">
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text @error('organizer') is-invalid @enderror">Organizer</span>
                            <input name="organizer" type="text" class="form-control"
                                placeholder="Enter the class location"value="{{ old('organizer', $event->organizer) }}">
                            @error('organizer')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text @error('state') is-invalid @enderror">Event State</span>
                            <select name="state" class="form-select">
                                @foreach (['ACTIVE', 'INACTIVE'] as $state)
                                    <option value="{{ $state }}"
                                        {{ old('state', $event->state) == $state ? 'selected' : '' }}>
                                        {{ $state }}</option>
                                @endforeach
                            </select>
                            @error('state')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <div class="col-12 d-flex justify-content-end">
                            <a href="{{ route('admin-event-index') }}" type="button" class="btn btn-danger me-2">Go
                                Back</a>
                            <button type="submit" class="btn btn-success">Update Event</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
