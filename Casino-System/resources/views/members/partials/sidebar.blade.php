<!-- Sidebar -->
<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-dark sidebar">
    <div class="position-sticky pt-3 mt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a href="{{ route('members.index') }}"
                    class="nav-link {{ request()->routeIs('members.index') ? 'active text-white' : 'text-light' }}">
                    <span class="d-flex align-items-center">
                        <i class="fas fa-users me-2"></i>
                        <span>Members</span>
                    </span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('members.create') }}"
                    class="nav-link {{ request()->routeIs('members.create') ? 'active text-white' : 'text-light' }}">
                    <span class="d-flex align-items-center">
                        <i class="fas fa-user-plus me-2"></i>
                        <span>Add Member</span>
                    </span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('members.manage') }}"
                    class="nav-link {{ request()->routeIs('members.manage') || request()->routeIs('members.edit') ? 'active text-white' : 'text-light' }}">
                    <span class="d-flex align-items-center">
                        <i class="fa-sharp fa-solid fa-users-gear me-2"></i>
                        <span>Manage Members</span>
                    </span>
                </a>
            </li>

        </ul>
    </div>
</nav>
