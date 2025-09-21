<!DOCTYPE html>
<html>

<head>
    <title>Casino System - Membership</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    @if (config('app.fontawesome_kit'))
        <script src="{{ config('app.fontawesome_kit') }}" crossorigin="anonymous"></script>
    @endif
    <style>
        body {
            overflow-x: hidden;
            padding-top: 56px;
            /* height of navbar */
        }

        .sidebar {
            height: 100vh;
            position: fixed;
            left: 0;
            top: 56px;
            /* push down below navbar */
        }

        main {
            margin-left: 16.6667%;
            /* 2 columns (col-md-2) */
        }

        .nav-link.active {
            background-color: #0d6efd;
            border-radius: .375rem;
        }

        .nav-custom-bg {
            background-color: #303742;
        }
    </style>

</head>

<body>
    <!-- Navbar -->
    @include('members.partials.navbar')

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            @include('members.partials.sidebar')

            <!-- Main content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
                @yield('content')
            </main>
        </div>
    </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('js/formats/date_formatter.js') }}"></script> <!-- Custom JS for formatting date-->

</html>
