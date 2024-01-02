<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">Notes</a>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav flex-grow-1">

                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login.show') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('profile.create') }}">Register</a>
                    </li>

                @endguest

                @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('homePage') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('note.create') }}">Create note</a>
                    </li>
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            {{ auth()->user()->email }}
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
                        </ul>
                    </div>
                @endauth

            </ul>
        </div>
    </div>
</nav>
