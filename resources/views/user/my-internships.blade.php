@extends('layouts.app')

@section('content')
    <div id="internship" class=" pages">
        <div class="container">
            <div class="row mb-3">
                <div class="col-12">
                    <div class="desc-wrap">
                        <img class="d-block mx-auto mb-1" src="{{ asset('images/logo.png') }}" alt="" width="35">
                        <h3 class="fw-bold p-0 m-0  text-center mb-5">Internship Programe</h3>
                        <div class="row justify-content-center mb-5">
                            <div class="col-12 col-lg-8">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Internship For</th>
                                            <th scope="col">Applied Date</th>
                                            <th scope="col">Contact</th>
                                            <th scope="col">State</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $count = 1;
                                        @endphp
                                        @foreach ($user_requests as $req)
                                            <tr>
                                                <th scope="row">{{ $count++ }}</th>
                                                <td>{{ $req->vacancy->title }}</td>
                                                <td>{{ $req->created_at }}</td>
                                                <td>{{ $req->state == 'VIEWED' ? $req->vacancy->user->mobile : 'Unavailable' }}
                                                </td>
                                                <td>{{ $req->state }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
