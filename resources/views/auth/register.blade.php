@extends('layouts.app')

@section('content')
    <div id="register">
        <section class="section-1">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-5">

                        <form action="{{ route('register') }}" class="reg-form">
                            @csrf
                            <div class="form-caption">Register Form</div>
                            <div class="mb-3">
                                <input type="email" class="form-control" placeholder="Enter your email address">
                            </div>
                            <div class="row mb-3">
                                <div class="col-6">
                                    <input type="password" class="form-control" placeholder="Enter your password">
                                </div>
                                <div class="col-6">
                                    <input type="password" class="form-control" placeholder="Confirm your password">
                                </div>
                            </div>
                            <div class="mb-3">
                                <select id="acc_type" class="form-select" onchange="changeFields()">
                                    <option selected>Select the Account Type</option>
                                    <option value="1">Common User</option>
                                    <option value="2">Mentor</option>
                                    <option value="3">Company</option>
                                </select>
                            </div>

                            <div class="collapse" id="collapseUser">
                                <div class="row mb-3">
                                    <div class="col-6">
                                        <input type="text" class="form-control" placeholder="Enter your Name">
                                    </div>
                                    <div class="col-6">
                                        <input type="text" class="form-control" placeholder="Enter your Age">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <input type="text" class="form-control" placeholder="Enter your Address">
                                </div>
                                <div class="row mb-3">
                                    <div class="col-6">
                                        <input type="text" class="form-control" placeholder="Enter your Mobile">
                                    </div>
                                    <div class="col-6">
                                        <select class="form-select">
                                            <option selected>Select your District</option>
                                            <option value="1">Common User</option>
                                            <option value="2">Mentor</option>
                                            <option value="3">Company</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="collapse" id="collapseMentor">
                                <div class="row mb-3">
                                    <div class="col-6">
                                        <input type="text" class="form-control" placeholder="Enter your Name">
                                    </div>
                                    <div class="col-6">
                                        <input type="text" class="form-control" placeholder="Enter your Age">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <input type="text" class="form-control" placeholder="Enter your Address">
                                </div>
                                <div class="row mb-3">
                                    <div class="col-6">
                                        <input type="text" class="form-control" placeholder="Enter your Mobile">
                                    </div>
                                    <div class="col-6">
                                        <select class="form-select">
                                            <option selected>Select your District</option>
                                            <option value="1">Common User</option>
                                            <option value="2">Mentor</option>
                                            <option value="3">Company</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="collapse" id="collapseCompany">
                                <div class="mb-3">
                                    <input type="text" class="form-control" placeholder="Enter your Comapany Name">
                                </div>
                                <div class="mb-3">
                                    <input type="text" class="form-control" placeholder="Enter your Comapany Address">
                                </div>
                                <div class="mb-3">
                                    <input type="text" class="form-control"
                                        placeholder="Enter your Comapany Description">
                                </div>
                                <div class="row mb-3">
                                    <div class="col-6">
                                        <input type="text" class="form-control" placeholder="Enter Company Mobile">
                                    </div>
                                    <div class="col-6">
                                        <select class="form-select">
                                            <option selected>Select your District</option>
                                            <option value="1">Common User</option>
                                            <option value="2">Mentor</option>
                                            <option value="3">Company</option>
                                        </select>
                                    </div>
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
    <script>
        function changeFields() {
            let selection = document.getElementById("acc_type").value;
            if (selection == 1) {
                $('#collapseMentor').collapse('hide');
                $('#collapseCompany').collapse('hide');
                $('#collapseUser').collapse('show');
            } else if (selection == 2) {
                $('#collapseUser').collapse('hide');
                $('#collapseCompany').collapse('hide');
                $('#collapseMentor').collapse('show');
            } else if (selection == 3) {
                $('#collapseUser').collapse('hide');
                $('#collapseMentor').collapse('hide');
                $('#collapseCompany').collapse('show');
            }
        }
    </script>
@endsection
