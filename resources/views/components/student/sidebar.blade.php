<style>
    .sidebar-link {
        color: #000;
        padding: 8px 12px;
        border-radius: 6px;
        transition: all 0.2s ease;
        display: block;
        /* Make the whole area clickable */
    }

    .sidebar-link:hover {
        background-color: #f0f0f0;
        /* Light gray */
        color: #0d6efd;
    }

    .sidebar-link.active {
        /* Light blue for active */
        color: #0d6efd !important;
        font-weight: 600;
    }
</style>


<div class="col-md-3 mb-4 py-2">
    <div class="card shadow rounded-3">
        <div class="card-body">
            <h5 class="card-title">Menu</h5>
            <ul class="nav flex-column">
                <a class="nav-link sidebar-link {{ request()->is('dashboard') ? 'active' : '' }}"
                    href="{{ route('dashboard') }}">
                    Dashboard
                </a>

                <a class="nav-link sidebar-link {{ request()->routeIs('lead.*') ? 'active' : '' }}"
                    href="{{ route('lead.index') }}">
                    Interested Students
                </a>

                <a class="nav-link sidebar-link {{ request()->routeIs('student.*') ? 'active' : '' }}"
                    href="{{ route('student.index') }}">
                    Students
                </a>
                <a class="nav-link sidebar-link {{ request()->routeIs('payments.*') ? 'active' : '' }}"
                    href="{{ route('payments.index') }}">
                    Payments
                </a>
                <!-- Add more links here -->
            </ul>
        </div>
    </div>
</div>
