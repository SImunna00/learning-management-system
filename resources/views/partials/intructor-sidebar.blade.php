<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <!--begin::Sidebar Brand-->
    <div class="sidebar-brand">
        <!--begin::Brand Link-->
        <a href="/" class="brand-link">
            <!--begin::Brand Image-->
            <img
                src="../../dist/assets/img/AdminLTELogo.png"
                alt="AdminLTE Logo"
                class="brand-image opacity-75 shadow"
            />
            <!--end::Brand Image-->
            <!--begin::Brand Text-->
           
            <!--end::Brand Text-->
        </a>
        <!--end::Brand Link-->
    </div>
    <!--end::Sidebar Brand-->

    <!--begin::Sidebar Wrapper-->
    <div class="sidebar-wrapper">
        <nav class="mt-2">
            <!--begin::Sidebar Menu-->
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">

                <!-- Dashboard Link for Instructors -->
                <li class="nav-item">
                    <a href="{{ route('instructor.dashboard') }}" class="nav-link">
                        <i class="nav-icon bi bi-house-door"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <!-- Courses Management Section -->
                <li class="nav-item">
                    <a href="{{ route('instructor.manage.courses') }}" class="nav-link">
                        <i class="nav-icon bi bi-book"></i>
                        <p>Manage Courses</p>
                    </a>
                </li>

                <!-- View Enrolled Students Section -->
                <li class="nav-item">
                    <a href="{{ route('instructor.view.students') }}" class="nav-link">
                        <i class="nav-icon bi bi-person-lines-fill"></i>
                        <p>View Students</p>
                    </a>
                </li>

                <!-- Assignments Management Section -->
                <li class="nav-item">
                    <a href="{{ route('instructor.manage.assignments') }}" class="nav-link">
                        <i class="nav-icon bi bi-pencil"></i>
                        <p>Manage Assignments</p>
                    </a>
                </li>

                <!-- Reports Section -->
                <li class="nav-item">
                    <a href="#instructor-reports" class="nav-link">
                        <i class="nav-icon bi bi-bar-chart"></i>
                        <p>Reports</p>
                    </a>
                </li>

                <!-- Profile Section -->
                <li class="nav-item">
                    <a href="{{ route('instructor.profile') }}" class="nav-link">
                        <i class="nav-icon bi bi-person"></i>
                        <p>Profile</p>
                    </a>
                </li>

                <!-- Settings Section -->
                <li class="nav-item">
                    <a href="{{ route('instructor.settings') }}" class="nav-link">
                        <i class="nav-icon bi bi-gear"></i>
                        <p>Settings</p>
                    </a>
                </li>

                <!-- Logout -->
                <li class="nav-item">
                    <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="nav-icon bi bi-box-arrow-right"></i>
                        <p>Logout</p>
                    </a>

                    <!-- Logout Form -->
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
            <!--end::Sidebar Menu-->
        </nav>
    </div>
    <!--end::Sidebar Wrapper-->
</aside>
