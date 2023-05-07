@extends('layouts.app')

@section('content')
    <div id="register">
        <section class="section-1">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-5">

                        <form action="{{ route('register') }}" class="reg-form" method="POST">
                            @csrf
                            <div class="form-caption">Register Form</div>
                            <div class="mb-3">
                                <input name="email" type="email" class="form-control"
                                    placeholder="Enter your email address">
                                @error('email')
                                    <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                                @enderror
                            </div>
                            <div class="row mb-3">
                                <div class="col-6">
                                    <input name="password" type="password" class="form-control"
                                        placeholder="Enter your password">
                                </div>
                                <div class="col-6">
                                    <input name="password_confirmation" type="password" class="form-control"
                                        placeholder="Confirm your password">
                                </div>
                            </div>
                            <div class="mb-3">
                                <select name="role" id="acc_type" class="form-select" onchange="changeFields()">
                                    <option selected>Select the Account Type</option>
                                    <option value="1">Common User</option>
                                    <option value="2">Mentor</option>
                                    <option value="3">Company</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <input name="name" type="text" class="form-control"
                                    placeholder="Enter Account/Comapny Name">
                            </div>
                            <div class="mb-3">
                                <input name="address" type="text" class="form-control"
                                    placeholder="Enter Account/Comapny Address">
                            </div>
                            <div class="mb-3">
                                <input name="description" type="text" class="form-control"
                                    placeholder="Enter Account/Comapny Description">
                            </div>
                            <div class="row mb-3">
                                <div class="col-6">
                                    <input name="mobile" type="text" class="form-control"
                                        placeholder="Enter Account/Comapny Mobile">
                                </div>
                                <div class="col-6">
                                    <select name="district" class="form-select">
                                        <option selected>Select your District</option>
                                        <option value="1">Common User</option>
                                        <option value="2">Mentor</option>
                                        <option value="3">Company</option>
                                    </select>
                                </div>
                            </div>

                            <div>
                                <input type="submit" class="btn btn-primary w-100" value="REGISTER">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
