@extends('layouts.app')

@section('content')
    <div class="page-header d-flex justify-content-between align-items-center">
        <h2 class="page-title">
            <i class="fa-sharp fa-solid fa-users-gear me-2"></i>
            Manage Members
        </h2>

        <!-- Search Bar -->
        <div class="search-bar position-relative w-50">
            <input type="search" class="form-control ps-5" placeholder="Search members..." aria-label="Search">
            <i class="fas fa-search position-absolute top-50 start-0 translate-middle-y text-muted ms-2"></i>
        </div>
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
            <i class="fas fa-check-circle me-2"></i>
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="members-container mt-4 shadow-sm">
        <div class="table-card shadow-sm rounded-5">
            <div class="table-responsive">
                <table class="table table-hover align-middle table-custom table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th><i class="fa-sharp fa-solid fa-address-card"></i> ID No.</th>
                            <th><i class="fa-sharp fa-solid fa-user me-2"></i>Name</th>
                            <th><i class="fa-sharp fa-solid fa-envelope me-2"></i>Email</th>
                            <th><i class="fa-sharp fa-solid fa-mobile-alt me-2"></i>Mobile</th>
                            <th><i class="fa-sharp fa-solid fa-flag me-2"></i>Nationality</th>
                            <th><i class="fa-sharp fa-solid fa-cogs me-2"></i>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($members as $member)
                            <tr>
                                <td><span class="member-id-badge">{{ $member->id_no }}</span></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <span class="status-online"></span>
                                        <div>
                                            <div class="fw-semibold">{{ $member->first_name }} {{ $member->last_name }}
                                            </div>
                                            <small class="text-muted">{{ $member->email }}</small>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $member->email }}</td>
                                <td><a href="tel:{{ $member->mobile_no }}"
                                        class="text-decoration-none">{{ $member->mobile_no }}</a></td>
                                <td><span class="badge bg-light text-dark">{{ $member->nationality }}</span></td>
                                <td>
                                    <button type="button" class="btn btn-action btn-outline-secondary rounded-0"
                                        title="Manage User" data-bs-toggle="modal"
                                        data-bs-target="#memberActionsModal{{ $member->id }}">
                                        <i class="fa-sharp fa-solid fa-user-gear"></i> Manage
                                    </button>

                                    <!-- Manage Member Modal -->
                                    @include('members.modals.manage-member-modal', ['member' => $member])
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6">
                                    <div class="empty-state">
                                        <i class="fas fa-users"></i>
                                        <h6>No Members Found</h6>
                                        <p class="text-muted">No members have been added yet.</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-center mt-4">
        <div class="pagination-wrapper">
            {{ $members->links('pagination::bootstrap-5') }}
        </div>
    </div>
@endsection


{{-- <script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.toggle-actions').forEach(function(btn) {
            btn.addEventListener('click', function(e) {
                e.stopPropagation();
                // Hide all other popups
                document.querySelectorAll('.action-popup').forEach(function(popup) {
                    popup.classList.add('d-none');
                });
                // Show this popup
                btn.nextElementSibling.classList.toggle('d-none');
            });
        });
        // Hide popup when clicking outside
        document.addEventListener('click', function() {
            document.querySelectorAll('.action-popup').forEach(function(popup) {
                popup.classList.add('d-none');
            });
        });
    });
</script> --}}
