@extends('layouts.app')

@section('content')
    <div id="register">
        <section class="section-1">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <form action="{{ route('register') }}" class="reg-form" method="POST" enctype="multipart/form-data">
                            @csrf
                            <img class="d-block mx-auto mb-1" src="{{ asset('images/logo.png') }}" alt=""
                                width="35">
                            <div class="form-caption">Register Form</div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="row">
                                        <div class="col-12 mb-2">
                                            <label class="form-label">Email address</label>
                                            <input name="email" type="email" value="{{ old('email') }}"
                                                class="form-control @error('email') is-invalid @enderror"
                                                placeholder="Enter your email address">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                        <div class="col-6 mb-2">
                                            <label class="form-label">Password</label>
                                            <input name="password" type="password"
                                                class="form-control  @error('password') is-invalid @enderror"
                                                placeholder="Enter your password">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                        <div class="col-6 mb-2">
                                            <label class="form-label">Confirm Password</label>
                                            <input name="password_confirmation" type="password"
                                                class="form-control  @error('password_confirmation') is-invalid @enderror"
                                                placeholder="Confirm your password">
                                            @error('password_confirmation')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                        <div class="col-12 mb-2">
                                            <label class="form-label">Profile Image</label>
                                            <input name="image" type="file" value="{{ old('image') }}"
                                                class="form-control @error('image') is-invalid @enderror">
                                            @error('image')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label">Account Type</label>
                                            <select name="role" id="acc_type"
                                                class="form-select  @error('role') is-invalid @enderror"
                                                onchange="changeFields()">
                                                <option selected>-- Select the Account Type --</option>
                                                <option value="1">Common User</option>
                                                <option value="2">Mentor</option>
                                                <option value="3">Company</option>
                                            </select>
                                            @error('role')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                    </div>

                                </div>

                                <div class="col-6">
                                    <div class="row">
                                        <div class="col-6 mb-2">
                                            <label class="form-label">Account Name</label>
                                            <input name="name" type="text" value="{{ old('name') }}"
                                                class="form-control  @error('name') is-invalid @enderror"
                                                placeholder="Enter Account/Comapny Name">
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                        <div class="col-6 mb-2">
                                            <label class="form-label">Address</label>
                                            <input name="address" type="text" value="{{ old('address') }}"
                                                class="form-control  @error('address') is-invalid @enderror"
                                                placeholder="Enter Account/Comapny Address">
                                            @error('address')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                        <div class="col-12 mb-2">
                                            <label class="form-label">Description</label>
                                            <input name="description" type="text" value="{{ old('description') }}"
                                                class="form-control  @error('description') is-invalid @enderror"
                                                placeholder="Enter Account/Comapny Description">
                                            @error('description')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                        <div class="col-6 mb-2">
                                            <label class="form-label">Mobile Number</label>
                                            <input name="mobile" type="text" value="{{ old('mobile') }}"
                                                class="form-control  @error('mobile') is-invalid @enderror"
                                                placeholder="Enter Account/Comapny Mobile">
                                            @error('mobile')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                        <div class="col-6">
                                            <label class="form-label">District</label>
                                            <select name="district"
                                                class="form-select   @error('district') is-invalid @enderror">
                                                <option selected>-- Select your District --</option>
                                                @foreach (['Ampara', 'Anuradhapura', 'Badulla', 'Batticaloa', 'Colombo', 'Galle', 'Gampaha', 'Hambantota', 'Jaffna', 'Kalutara', 'Kandy', 'Kegalle', 'Kilinochchi', 'Kurunegala', 'Mannar', 'Matale', 'Matara', 'Moneragala', 'Mullaitivu', 'Nuwara Eliya', 'Polonnaruwa', 'Puttalam', 'Ratnapura', 'Trincomalee', 'Vavuniya'] as $location)
                                                    <option value="{{ $location }}"
                                                        {{ old('location') == $location ? 'selected' : '' }}>
                                                        {{ $location }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('district')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3 justify-content-center">
                                <div class="col-3 d-flex">
                                    <input type="submit" class="btn btn-primary w-100" value="REGISTER">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
