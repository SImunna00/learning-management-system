<style>

.user-footer .btn {
    margin-top: 10px;
    width: 100%;
    font-weight:bold; 
}

</style>
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
                <a class="nav-link text-white" href="{{ route('student.home') }}">
                    <i class="bi bi-house-door me-1"></i> Home
                </a>
            </li>

            <!-- Courses -->
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('student.available.course') }}">
                    <i class="bi bi-journal-bookmark me-1"></i> Courses
                </a>
            </li>

            <!-- Search Icon -->
          

            <!-- Fullscreen Toggle -->
            <li class="nav-item">
              <a class="nav-link text-white" href="#" data-lte-toggle="fullscreen">
                <i data-lte-icon="maximize" class="bi bi-arrows-fullscreen"></i>
                <i data-lte-icon="minimize" class="bi bi-fullscreen-exit" style="display: none"></i>
              </a>
            </li>

            <!-- Login -->
            <li class="nav-item">
                <a class="nav-link text-white fw-semibold" href="{{ route('student.dashboard') }}">
                    <i class="bi bi-box-arrow-in-right me-1"></i> Dashboard
                </a>
            </li>

            <!-- profile -->
            <li class="nav-item dropdown user-menu">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                    <img id="photoPreview" src="{{  auth()->user()->photo ? asset('storage/' . auth()->user()->photo):  asset('assests/image/2.jpg')}}" class="user-image rounded-circle shadow"
                        alt="User Image" />

                </a>
                <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                    <!--begin::User Image-->
                    <li class="user-header text-bg-primary">
                        <img id="photoPreview" src="{{  auth()->user()->photo ? asset('storage/' . auth()->user()->photo) :  asset('assests/image/2.jpg')}}" class="rounded-circle shadow" alt="User Image" />
                        <p>
                        {{ auth()->user()->name }}
                            <small>{{ auth()->user()->email }}</small>
                        </p>
                    </li>
                    <!--end::User Image-->
                    <!--begin::Menu Body-->

                    <!--end::Menu Body-->
                    <!--begin::Menu Footer-->
                    <li class="user-footer">
                        <a href="{{ route('student.profile') }}" class="btn btn-default btn-flat">Profile</a>
                        <a href="{{ route('student.settings') }}" class="btn btn-default btn-flat">Settings</a>

                        <!-- Logout Form -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-flat ms-auto d-block">
                                <span>Logout</span>
                            </button>
                        </form>
                    </li>
                    <!--end::Menu Footer-->
                </ul>
            </li>
        </ul>
    </div>
</nav>