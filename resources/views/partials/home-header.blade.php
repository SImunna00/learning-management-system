
<nav class=" app-header navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
    <div class="container-fluid">

        <!-- Brand -->
        <a href="#" class="navbar-brand fw-bold">
            <i class="bi bi-mortarboard-fill me-2"></i> LMS
        </a>

        <!-- Navbar items (right-aligned) -->
        <ul class="navbar-nav ms-auto align-items-center">

            <!-- Home -->
            <li class="nav-item">
                <a class="nav-link text-white" href="#">
                    <i class="bi bi-house-door me-1"></i> Home
                </a>
            </li>

            <!-- Courses -->
            <li class="nav-item">
                <a class="nav-link text-white" href="#">
                    <i class="bi bi-journal-bookmark me-1"></i> Courses
                </a>
            </li>

            <!-- Search Icon -->
            <li class="nav-item">
                <a class="nav-link text-white" href="#" title="Search">
                    <i class="bi bi-search"></i>
                </a>
            </li>

            <!-- Fullscreen Toggle -->
            <li class="nav-item">
              <a class="nav-link text-white" href="#" data-lte-toggle="fullscreen">
                <i data-lte-icon="maximize" class="bi bi-arrows-fullscreen"></i>
                <i data-lte-icon="minimize" class="bi bi-fullscreen-exit" style="display: none"></i>
              </a>
            </li>

            <!-- Login -->
            <li class="nav-item">
                <a class="nav-link text-white fw-semibold" href="{{ route('login') }}">
                    <i class="bi bi-box-arrow-in-right me-1"></i> Login
                </a>
            </li>

            <!-- Register -->
            <li class="nav-item">
                <a class="btn btn-light btn-sm ms-2 fw-semibold" href="{{ route('register') }}">
                    <i class="bi bi-person-plus-fill me-1"></i> Register
                </a>
            </li>
        </ul>
    </div>
</nav>