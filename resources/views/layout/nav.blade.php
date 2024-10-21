<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
        <a class="navbar-brand fw-bold text-danger me-5" href="{{ route('dashboard') }}">MHRA</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('users') }}">Users</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('blogs') }}">Blogs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('comments') }}">Comments</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('events') }}">Events</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('conferences') }}">Conferences</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('speakers') }}">Speakers</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('settings', 1) }}">Settings</a>
                </li>

            </ul>
            <a href="{{ route('logout') }}" class="btn btn-danger text-white">Log Out</a>
        </div>
    </div>
</nav>
