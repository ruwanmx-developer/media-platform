<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">MICHROPHONESTUDIO.COM</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                @if (Auth::check())
                    @if (Auth::user()->role == 0)
                        <li class="nav-item">
                            <a class="nav-link" href="#">User Management</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Internship Management</a>
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
                        <button type="submit" class="btn btn-primary">Logout</button>
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
