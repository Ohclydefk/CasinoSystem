<!DOCTYPE html>
<html>

<head>
    <title>Casino System - Membership</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/view-member-info.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @if (config('app.fontawesome_kit'))
        <script src="{{ config('app.fontawesome_kit') }}" crossorigin="anonymous"></script>
    @endif

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
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
    integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</html>
