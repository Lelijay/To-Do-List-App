<header>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand fw-bolder fs-3" href="#">Todo list App </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                </ul>

                <!-- Bootstrap 5 Search Form -->
                <div class="ms-auto">
                    <a href="{{ route('add.task') }}" class="btn btn-outline-success" type="submit">Add Task</a>
                    <a href="{{ route('logout') }}" class="btn btn-outline-danger " type="submit">Logout</a>
                </div>
            </div>
        </div>
    </nav>
</header>
