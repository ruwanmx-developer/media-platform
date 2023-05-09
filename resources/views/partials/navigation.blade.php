<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">MediaMix</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                @if (Auth::check())
                    @if (Auth::user()->role == 3)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('company-job-index') }}">Job Management</a>
                        </li>
                    @elseif (Auth::user()->role == 2)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('mentor-class-index') }}">Class Management</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Events</a>
                    </li>
                @endif

            </ul>
            @if (Auth::user() != null)
                <div class="d-flex">
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-danger">Logout</button>
                    </form>

                </div>
            @else
                <div class="d-flex">
                    <a class="btn btn-primary" href="{{ route('login') }}">Login</a>
                </div>
            @endif

        </div>
    </div>
</nav>
