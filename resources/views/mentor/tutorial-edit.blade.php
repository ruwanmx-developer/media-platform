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
                    <div class="form-title">Edit Existing Tutorial</div>
                    <form action="{{ route('mentor-tutorial-update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $tutorial->id }}">
                        <div class="input-group mb-3">
                            <span class="input-group-text @error('title') is-invalid @enderror">Tutorial Title</span>
                            <input name="title" type="text" class="form-control" placeholder="Enter the tutorial name"
                                value="{{ old('title', $tutorial->title) }}">
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text @error('description') is-invalid @enderror">Tutorial
                                Description</span>
                            <input name="description" type="text" class="form-control" placeholder="Enter the class name"
                                value="{{ old('description', $tutorial->description) }}">
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text @error('state') is-invalid @enderror">Vacancy State</span>
                            <select name="state" class="form-select">
                                @foreach (['ACTIVE', 'INACTIVE'] as $state)
                                    <option value="{{ $state }}"
                                        {{ old('state', $tutorial->state) == $state ? 'selected' : '' }}>
                                        {{ $state }}</option>
                                @endforeach
                            </select>
                            @error('state')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <div class="col-12 d-flex justify-content-end">
                            <a href="{{ route('mentor-tutorial-index') }}" type="button" class="btn btn-primary">Go
                                Back</a>
                            <button type="submit" class="btn btn-primary">Update Existing Tutorial</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
