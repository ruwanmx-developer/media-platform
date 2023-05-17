<nav class="navbar navbar-expand-lg bg-body-tertiary sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="/"><img src="{{ asset('images/logo.png') }}" alt="">
            MediaMix</a>
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
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('mentor-tutorial-index') }}">Tutorial Management</a>
                        </li>
                    @elseif (Auth::user()->role == 1)
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Feed
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('feed') }}">Go To Feed</a></li>
                                <li><a class="dropdown-item" href="{{ route('add-feed') }}">Add New Feed</a></li>
                                <li><a class="dropdown-item" href="{{ route('my-feeds') }}">View Your Feeds</a></li>
                            </ul>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Internship
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('internship') }}">Go To Internship</a></li>
                                <li><a class="dropdown-item" href="{{ route('my-internships') }}">View Your Requests</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Mentor
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('mentor') }}">Go To Mentor</a></li>
                                <li><a class="dropdown-item" href="{{ route('my-mentors') }}">View Your Requests</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('learn') }}">Learn</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('quiz') }}">Discussion</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Counseling</a>
                        </li>
                    @elseif (Auth::user()->role == 0)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin-event-index') }}">Event Management</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('company-job-index') }}">Job Management</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('mentor-class-index') }}">Class Management</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('mentor-tutorial-index') }}">Tutorial Management</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('quiz') }}">Discussion</a>
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
