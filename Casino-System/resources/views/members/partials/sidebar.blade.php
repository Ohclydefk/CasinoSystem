<!-- Sidebar -->
<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-dark sidebar">
    <div class="position-sticky pt-3 mt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a href="{{ route('members.index') }}"
                   class="nav-link d-flex align-items-center {{ request()->routeIs('members.index') ? 'active text-white' : 'text-light' }}">
                    <i class="fas fa-users me-2"></i> Members
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('members.create') }}"
                   class="nav-link d-flex align-items-center {{ request()->routeIs('members.create') ? 'active text-white' : 'text-light' }}">
                    <i class="fas fa-user-plus me-2"></i> Add Member
                </a>
            </li>
        </ul>
    </div>
</nav>
