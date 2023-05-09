@extends('layouts.app')

@section('content')
    <div id="company-job-index">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                </div>
                <div class="col-12">
                    <img src="{{ asset('images/man.png') }}" alt="">
                    <div class="name">{{ $user->name }}</div>
                    <div class="name">{{ $user->email }}</div>
                    <div class="name">{{ $user->mobile }}</div>
                </div>
            </div>
        </div>
    </div>
@endsection
