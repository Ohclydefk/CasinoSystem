<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('members.index') }}">Casino System</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('members.index') ? 'active' : '' }}" href="{{ route('members.index') }}">Members</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('members.create') ? 'active' : '' }}" href="{{ route('members.create') }}">Add Member</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
