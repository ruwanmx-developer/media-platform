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
                    <div class="form-title">Update Profile</div>
                    <form action="{{ route('user-profile-update') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $user->id }}">
                        <div class="input-group mb-3">
                            <span class="input-group-text @error('email') is-invalid @enderror">User Email Address</span>
                            <input name="email" readonly type="email" value="{{ $user->email }}"
                                class="form-control @error('email') is-invalid @enderror"
                                placeholder="Enter your email address">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text @error('name') is-invalid @enderror">User Name</span>
                            <input name="name" type="text" value="{{ old('name', $user->name) }}"
                                class="form-control  @error('name') is-invalid @enderror"
                                placeholder="Enter Account/Comapny Name">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text @error('address') is-invalid @enderror">Address</span>
                            <input name="address" type="text" value="{{ old('address', $user->address) }}"
                                class="form-control  @error('address') is-invalid @enderror"
                                placeholder="Enter Account/Comapny Address">
                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text @error('description') is-invalid @enderror">Description</span>
                            <input name="description" type="text" value="{{ old('description', $user->description) }}"
                                class="form-control  @error('description') is-invalid @enderror"
                                placeholder="Enter Account/Comapny Description">
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text @error('mobile') is-invalid @enderror">Mobile Number</span>
                            <input name="mobile" type="text" value="{{ old('mobile', $user->mobile) }}"
                                class="form-control  @error('mobile') is-invalid @enderror"
                                placeholder="Enter Account/Comapny Mobile">
                            @error('mobile')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text @error('district') is-invalid @enderror">District</span>
                            <select name="district" class="form-select   @error('district') is-invalid @enderror">
                                <option selected>-- Select your District --</option>
                                @foreach (['Ampara', 'Anuradhapura', 'Badulla', 'Batticaloa', 'Colombo', 'Galle', 'Gampaha', 'Hambantota', 'Jaffna', 'Kalutara', 'Kandy', 'Kegalle', 'Kilinochchi', 'Kurunegala', 'Mannar', 'Matale', 'Matara', 'Moneragala', 'Mullaitivu', 'Nuwara Eliya', 'Polonnaruwa', 'Puttalam', 'Ratnapura', 'Trincomalee', 'Vavuniya'] as $district)
                                    <option value="{{ $district }}"
                                        {{ old('district', $user->district) == $district ? 'selected' : '' }}>
                                        {{ $district }}
                                    </option>
                                @endforeach
                            </select>
                            @error('district')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <div class="col-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-success">Update Existing Class</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
