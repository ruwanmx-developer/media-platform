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
                    <div class="form-title">Add New Class</div>
                    <form action="{{ route('mentor-class-create') }}" method="POST">
                        @csrf
                        <div class="input-group mb-3">
                            <span class="input-group-text @error('class_name') is-invalid @enderror">Class Name</span>
                            <input name="class_name" type="text" class="form-control" placeholder="Enter the class name"
                                value="{{ old('class_name') }}">
                            @error('class_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text @error('time_from') is-invalid @enderror">Class Starting
                                Time</span>
                            <input name="time_from" type="time" class="form-control"
                                placeholder="Enter the class start time" value="{{ old('time_from') }}">
                            @error('time_from')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text @error('time_to') is-invalid @enderror">Class Closing
                                Time</span>
                            <input name="time_to" type="time" class="form-control"
                                placeholder="Enter the class close time" value="{{ old('time_to') }}">
                            @error('time_to')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text @error('day') is-invalid @enderror">Day of the Week</span>
                            <select name="day" class="form-select">
                                <option value="">-- Select day --</option>
                                @foreach (['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'] as $day)
                                    <option value="{{ $day }}" {{ old('day') == $day ? 'selected' : '' }}>
                                        {{ $day }}</option>
                                @endforeach
                            </select>
                            @error('day')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text @error('location') is-invalid @enderror">Location (Building
                                Name)</span>
                            <input name="location" type="text" class="form-control"
                                placeholder="Enter the class location"value="{{ old('location') }}">
                            @error('location')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text @error('district') is-invalid @enderror">Location
                                (District)</span>
                            <select name="district" class="form-select">
                                <option value="">-- Select district --</option>
                                @foreach (['Ampara', 'Anuradhapura', 'Badulla', 'Batticaloa', 'Colombo', 'Galle', 'Gampaha', 'Hambantota', 'Jaffna', 'Kalutara', 'Kandy', 'Kegalle', 'Kilinochchi', 'Kurunegala', 'Mannar', 'Matale', 'Matara', 'Moneragala', 'Mullaitivu', 'Nuwara Eliya', 'Polonnaruwa', 'Puttalam', 'Ratnapura', 'Trincomalee', 'Vavuniya'] as $district)
                                    <option value="{{ $district }}"
                                        {{ old('district') == $district ? 'selected' : '' }}>{{ $district }}</option>
                                @endforeach
                            </select>
                            @error('district')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <div class="col-12 d-flex justify-content-end">
                            <a href="{{ route('mentor-class-index') }}" type="button" class="btn btn-danger me-2">Go
                                Back</a>
                            <button type="submit" class="btn btn-success">Save New Class</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
