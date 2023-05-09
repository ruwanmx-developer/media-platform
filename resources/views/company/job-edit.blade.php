@extends('layouts.app')

@section('content')
    <div id="company-job-index">
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
                    <div class="form-title">Update Job Vacancy</div>
                    <form action="{{ route('company-job-update', $job->id) }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $job->id }}">
                        <div class="input-group mb-3">
                            <span class="input-group-text @error('title') is-invalid @enderror">Job Title</span>
                            <input name="title" type="text" class="form-control" placeholder="Enter the job title"
                                value="{{ old('title', $job->title) }}">
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text @error('type') is-invalid @enderror">Job Type</span>
                            <select name="type" class="form-select">
                                <option value="">-- Select Job Type --</option>
                                @foreach (['Part Time', 'Full Time', 'Project Wise', 'Task Wise'] as $type)
                                    <option value="{{ $type }}"
                                        {{ old('type', $job->type) == $type ? 'selected' : '' }}>
                                        {{ $type }}</option>
                                @endforeach
                            </select>
                            @error('type')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text @error('location') is-invalid @enderror">Location
                                (District)</span>
                            <select name="location" class="form-select">
                                <option value="">-- Select Location --</option>
                                @foreach (['Ampara', 'Anuradhapura', 'Badulla', 'Batticaloa', 'Colombo', 'Galle', 'Gampaha', 'Hambantota', 'Jaffna', 'Kalutara', 'Kandy', 'Kegalle', 'Kilinochchi', 'Kurunegala', 'Mannar', 'Matale', 'Matara', 'Moneragala', 'Mullaitivu', 'Nuwara Eliya', 'Polonnaruwa', 'Puttalam', 'Ratnapura', 'Trincomalee', 'Vavuniya'] as $location)
                                    <option value="{{ $location }}"
                                        {{ old('location', $job->location) == $location ? 'selected' : '' }}>
                                        {{ $location }}</option>
                                @endforeach
                            </select>
                            @error('location')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text @error('salary') is-invalid @enderror">Salary</span>
                            <input name="salary" type="text" class="form-control" placeholder="Enter the job salary"
                                value="{{ old('title', $job->salary) }}">
                            @error('salary')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text @error('state') is-invalid @enderror">Vacancy State</span>
                            <select name="state" class="form-select">
                                @foreach (['ACTIVE', 'INACTIVE'] as $state)
                                    <option value="{{ $state }}"
                                        {{ old('state', $job->state) == $state ? 'selected' : '' }}>
                                        {{ $state }}</option>
                                @endforeach
                            </select>
                            @error('state')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <div class="col-12 d-flex justify-content-end">
                            <a href="{{ route('company-job-index') }}" type="button" class="btn btn-primary">Go Back</a>
                            <button type="submit" class="btn btn-primary">Update Existing Job</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
