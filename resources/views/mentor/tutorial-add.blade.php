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
                    <div class="form-title">Add New Tutorial</div>
                    <form action="{{ route('mentor-tutorial-create') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="input-group mb-3">
                            <span class="input-group-text @error('title') is-invalid @enderror">Tutorial Title</span>
                            <input name="title" type="text" class="form-control" placeholder="Enter the tutorial name"
                                value="{{ old('title') }}">
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text @error('description') is-invalid @enderror">Tutorial
                                Description</span>
                            <input name="description" type="text" class="form-control"
                                placeholder="Enter the tutorial description" value="{{ old('description') }}">
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text @error('source_url') is-invalid @enderror">Tutorial Content</span>
                            <input name="source_url" type="file" class="form-control" placeholder="Enter the class name"
                                value="{{ old('source_url') }}">
                            @error('source_url')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <div class="col-12 d-flex justify-content-end">
                            <a href="{{ route('mentor-tutorial-index') }}" type="button" class="btn btn-danger me-2">Go
                                Back</a>
                            <button type="submit" class="btn btn-success">Save New Tutorial</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
