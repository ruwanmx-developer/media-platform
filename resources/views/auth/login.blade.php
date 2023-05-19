@extends('layouts.app')

@section('content')
    <div id="register">
        <section class="section-1">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-5">
                        <form action="{{ route('login') }}" class="reg-form" method="POST" enctype="multipart/form-data">
                            @csrf
                            <img class="d-block mx-auto mb-1" src="{{ asset('images/logo.png') }}" alt=""
                                width="35">
                            <div class="form-caption">Login Form</div>
                            <div class="row">
                                <div class="col-12 mb-3">
                                    <label class="form-label">Email address</label>
                                    <input name="email" type="email" value="{{ old('email') }}"
                                        class="form-control @error('email') is-invalid @enderror"
                                        placeholder="Enter your email address">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Password</label>
                                    <input name="password" type="password"
                                        class="form-control  @error('password') is-invalid @enderror"
                                        placeholder="Enter your password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mt-3 justify-content-center">
                                <div class="col-3 d-flex">
                                    <input type="submit" class="btn btn-primary w-100" value="LOGIN">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
