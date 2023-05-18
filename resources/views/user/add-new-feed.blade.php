@extends('layouts.app')

@section('content')
    <div id="feed" class="pages">
        <div class="container">
            <div class="row mb-3">
                <div class="col-12">
                    <div class="desc-wrap">
                        <img class="d-block mx-auto mb-1" src="{{ asset('images/logo.png') }}" alt="" width="35">
                        <h3 class="fw-bold p-0 m-0 mb-5  text-center">Add New Feed</h3>
                        <div class="row justify-content-center mb-5">
                            <div class="col-12 col-lg-8">
                                <form action="{{ route('feed-create') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="input-group mb-3">
                                        <span
                                            class="input-group-text @error('description') is-invalid @enderror">Description</span>
                                        <input name="description" type="text" class="form-control"
                                            placeholder="Enter the feed description" value="{{ old('description') }}">
                                        @error('description')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                    <div class="input-group mb-3">
                                        <span
                                            class="input-group-text @error('source_url') is-invalid @enderror">Content</span>
                                        <input name="source_url" type="file" class="form-control"
                                            value="{{ old('source_url') }}">
                                        @error('source_url')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>

                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-success">Upload Feed</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
