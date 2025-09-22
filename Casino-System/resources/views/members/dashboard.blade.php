@extends('layouts.app')

@section('content')
<div class="container-fluid py-4">
    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">
            <i class="fa-solid fa-chart-line me-2 text-primary"></i>
            Dashboard
        </h2>
        <button class="btn btn-primary">
            <i class="fa-solid fa-file-export me-2"></i> Export Report
        </button>
    </div>

    <!-- Top Stat Cards -->
    <div class="row g-4 mb-4">
        <div class="col-md-3">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body d-flex align-items-center">
                    <div class="me-3 text-primary fs-3">
                        <i class="fa-solid fa-users"></i>
                    </div>
                    <div>
                        <h6 class="text-muted mb-1">Total Members</h6>
                        <h4 class="fw-bold mb-0">1,254</h4>
                        <small class="text-success"><i class="fa-solid fa-arrow-up"></i> +4% this month</small>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-3">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body d-flex align-items-center">
                    <div class="me-3 text-success fs-3">
                        <i class="fa-solid fa-user-check"></i>
                    </div>
                    <div>
                        <h6 class="text-muted mb-1">Active Members</h6>
                        <h4 class="fw-bold mb-0">985</h4>
                        <small class="text-success"><i class="fa-solid fa-arrow-up"></i> +2% this week</small>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-3">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body d-flex align-items-center">
                    <div class="me-3 text-warning fs-3">
                        <i class="fa-solid fa-user-clock"></i>
                    </div>
                    <div>
                        <h6 class="text-muted mb-1">Pending Approvals</h6>
                        <h4 class="fw-bold mb-0">37</h4>
                        <small class="text-danger"><i class="fa-solid fa-arrow-down"></i> -1% this week</small>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-3">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body d-flex align-items-center">
                    <div class="me-3 text-danger fs-3">
                        <i class="fa-solid fa-user-xmark"></i>
                    </div>
                    <div>
                        <h6 class="text-muted mb-1">Inactive Members</h6>
                        <h4 class="fw-bold mb-0">232</h4>
                        <small class="text-muted"><i class="fa-solid fa-minus"></i> No change</small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts + Recent Activity -->
    <div class="row g-4">
        <!-- Chart -->
        <div class="col-lg-8">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white border-0">
                    <h6 class="fw-bold mb-0"><i class="fa-solid fa-chart-pie text-primary me-2"></i> Member Growth</h6>
                </div>
                <div class="card-body">
                    <canvas id="memberGrowthChart" height="120"></canvas>
                </div>
            </div>
        </div>

        <!-- Recent Activity -->
        <div class="col-lg-4">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-header bg-white border-0">
                    <h6 class="fw-bold mb-0"><i class="fa-solid fa-clock-rotate-left text-primary me-2"></i> Recent Activity</h6>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item border-0">
                            <i class="fa-solid fa-user-plus text-success me-2"></i> 
                            John Doe registered <small class="text-muted">2 mins ago</small>
                        </li>
                        <li class="list-group-item border-0">
                            <i class="fa-solid fa-user-pen text-warning me-2"></i> 
                            Jane updated her profile <small class="text-muted">30 mins ago</small>
                        </li>
                        <li class="list-group-item border-0">
                            <i class="fa-solid fa-user-xmark text-danger me-2"></i> 
                            Mike deactivated <small class="text-muted">1 hr ago</small>
                        </li>
                        <li class="list-group-item border-0">
                            <i class="fa-solid fa-user-check text-primary me-2"></i> 
                            Anna got approved <small class="text-muted">2 hrs ago</small>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('memberGrowthChart').getContext('2d');
    new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
            datasets: [{
                label: 'Members',
                data: [120, 190, 300, 500, 700, 900, 1100],
                borderColor: '#0d6efd',
                backgroundColor: 'rgba(13, 110, 253, 0.1)',
                fill: true,
                tension: 0.3
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { display: false }
            },
            scales: {
                y: { beginAtZero: true }
            }
        }
    });
</script>
@endpush
