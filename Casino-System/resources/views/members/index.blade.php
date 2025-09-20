@extends('layouts.app')

@section('styles')
    <style>
        /* Improved Table Styling */
        .table-card {
            background: #fff;
            border-radius: 1rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.10);
            overflow: hidden;
            border: none;
        }

        /* Action buttons fix */
        .action-btn-group {
            display: flex;
            gap: 0.25rem;
            justify-content: center;
            flex-wrap: nowrap;
        }

        .btn-action {
            padding: 0.5rem 0.75rem;
            font-size: 1rem;
            border-radius: 0.5rem;
            border: none;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 38px;
            height: 38px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.07);
        }

        .btn-view {
            background: #0d6efd;
            color: #fff !important;
        }

        .btn-edit {
            background: #ffc107;
            color: #212529 !important;
        }

        .btn-delete {
            background: #dc3545;
            color: #fff !important;
        }

        .btn-action i {
            font-size: 1.1rem;
        }

        .btn-action:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15);
            opacity: 0.95;
        }

        .btn-view:hover,
        .btn-delete:hover {
            color: #fff !important;
        }

        .btn-edit:hover {
            color: #212529 !important;
        }

        /* Responsive fix for action buttons */
        @media (max-width: 768px) {
            .action-btn-group {
                flex-direction: row;
                gap: 0.15rem;
            }

            .btn-action {
                min-width: 32px;
                height: 32px;
                font-size: 0.9rem;
                padding: 0.3rem 0.5rem;
            }
        }
    </style>
@endsection

@section('content')
    <div class="page-header d-flex justify-content-between align-items-center">
        <h2 class="page-title">
            <i class="fas fa-users me-2"></i>
            Members Directory
        </h2>
        <a href="{{ route('members.create') }}" class="btn-add-new">
            <i class="fas fa-plus me-2"></i>
            Add New Member
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle me-2"></i>
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="members-container mt-4">
        <div class="table-card shadow-sm">
            <div class="table-responsive">
                <table class="table table-hover align-middle table-custom table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th><i class="fas fa-id-badge me-2"></i>ID No.</th>
                            <th><i class="fas fa-user me-2"></i>Name</th>
                            <th><i class="fas fa-envelope me-2"></i>Email</th>
                            <th><i class="fas fa-mobile-alt me-2"></i>Mobile</th>
                            <th><i class="fas fa-flag me-2"></i>Nationality</th>
                            <th class="text-center"><i class="fas fa-cogs me-2"></i>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($members as $member)
                            <tr>
                                <td>
                                    <span class="member-id-badge">{{ $member->id_no }}</span>
                                </td>
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
                                <td>
                                    <p class="p-0 m-0 text-decoration-none">
                                        {{ $member->email }}
                                    </p>
                                </td>
                                <td>
                                    <a href="tel:{{ $member->mobile_no }}" class="text-decoration-none">
                                        {{ $member->mobile_no }}
                                    </a>
                                </td>
                                <td>
                                    <span class="badge bg-light text-dark">{{ $member->nationality }}</span>
                                </td>
                                <td>
                                    <div class="action-btn-group">
                                        <button class="btn btn-action btn-view btn-secondary rounded-3" data-bs-toggle="modal"
                                            data-bs-target="#viewMemberModal{{ $member->id }}" title="View Details">
                                            View
                                        </button>
                                    
                                        <button class="btn btn-action btn-delete btn-dark rounded-3"
                                            onclick="confirmDelete({{ $member->id }})" title="Delete Member">
                                           Delete
                                        </button>
                                    </div>

                                    <!-- Hidden delete form -->
                                    <form id="delete-form-{{ $member->id }}"
                                        action="{{ route('members.destroy', $member->id) }}" method="POST"
                                        style="display: none;">
                                        @csrf @method('DELETE')
                                    </form>

                                    <!-- Enhanced View Modal -->
                                    <div class="modal fade" id="viewMemberModal{{ $member->id }}" tabindex="-1"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-xl modal-dialog-scrollable">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">
                                                        <i class="fas fa-user-circle me-2"></i>
                                                        {{ $member->first_name }} {{ $member->last_name }}
                                                        <small class="ms-2 opacity-75">#{{ $member->id_no }}</small>
                                                    </h5>
                                                    <button type="button" class="btn-close"
                                                        data-bs-dismiss="modal"></button>
                                                </div>
                                                <div class="modal-body p-0">
                                                    <!-- Enhanced Tabs -->
                                                    <ul class="nav nav-tabs" id="memberTab{{ $member->id }}"
                                                        role="tablist">
                                                        <li class="nav-item" role="presentation">
                                                            <button class="nav-link active"
                                                                id="basic-tab{{ $member->id }}" data-bs-toggle="tab"
                                                                data-bs-target="#basic{{ $member->id }}" type="button"
                                                                role="tab">
                                                                <i class="fas fa-user me-2"></i>Basic Info
                                                            </button>
                                                        </li>
                                                        <li class="nav-item" role="presentation">
                                                            <button class="nav-link" id="business-tab{{ $member->id }}"
                                                                data-bs-toggle="tab"
                                                                data-bs-target="#business{{ $member->id }}"
                                                                type="button" role="tab">
                                                                <i class="fas fa-briefcase me-2"></i>Business
                                                            </button>
                                                        </li>
                                                        <li class="nav-item" role="presentation">
                                                            <button class="nav-link" id="employment-tab{{ $member->id }}"
                                                                data-bs-toggle="tab"
                                                                data-bs-target="#employment{{ $member->id }}"
                                                                type="button" role="tab">
                                                                <i class="fas fa-building me-2"></i>Employment
                                                            </button>
                                                        </li>
                                                        <li class="nav-item" role="presentation">
                                                            <button class="nav-link" id="political-tab{{ $member->id }}"
                                                                data-bs-toggle="tab"
                                                                data-bs-target="#political{{ $member->id }}"
                                                                type="button" role="tab">
                                                                <i class="fas fa-landmark me-2"></i>Political
                                                            </button>
                                                        </li>
                                                        <li class="nav-item" role="presentation">
                                                            <button class="nav-link"
                                                                id="emergency-tab{{ $member->id }}"
                                                                data-bs-toggle="tab"
                                                                data-bs-target="#emergency{{ $member->id }}"
                                                                type="button" role="tab">
                                                                <i class="fas fa-phone-alt me-2"></i>Emergency
                                                            </button>
                                                        </li>
                                                    </ul>

                                                    <div class="tab-content" id="memberTabContent{{ $member->id }}">
                                                        <!-- Basic Info Tab -->
                                                        <div class="tab-pane fade show active"
                                                            id="basic{{ $member->id }}" role="tabpanel">
                                                            <h6 class="section-title">Personal Information</h6>
                                                            <div class="detail-grid">
                                                                <div class="detail-item">
                                                                    <p class="detail-label">ID Number:</p>
                                                                    <p class="detail-value">
                                                                        {{ $member->id_no ?: 'Not provided' }}</p>
                                                                </div>
                                                                <div class="detail-item">
                                                                    <p class="detail-label">Full Name:</p>
                                                                    <p class="detail-value">{{ $member->first_name }}
                                                                        {{ $member->middle_name }}
                                                                        {{ $member->last_name }}</p>
                                                                </div>
                                                                <div class="detail-item">
                                                                    <p class="detail-label">Alternative Name:</p>
                                                                    <p class="detail-value">
                                                                        {{ $member->alt_name ?: 'Not provided' }}</p>
                                                                </div>
                                                                <div class="detail-item">
                                                                    <p class="detail-label">Email:</p>
                                                                    <p class="detail-value">
                                                                        {{ $member->email ?: 'Not provided' }}</p>
                                                                </div>
                                                                <div class="detail-item">
                                                                    <p class="detail-label">Mobile:</p>
                                                                    <p class="detail-value">
                                                                        {{ $member->mobile_no ?: 'Not provided' }}</p>
                                                                </div>
                                                                <div class="detail-item">
                                                                    <p class="detail-label">Birthdate:</p>
                                                                    <p class="detail-value">
                                                                        {{ $member->birthdate ?: 'Not provided' }}</p>
                                                                </div>
                                                                <div class="detail-item">
                                                                    <p class="detail-label">Birthplace:</p>
                                                                    <p class="detail-value">
                                                                        {{ $member->birthplace ?: 'Not provided' }}</p>
                                                                </div>
                                                                <div class="detail-item">
                                                                    <p class="detail-label">Civil Status:</p>
                                                                    <p class="detail-value">
                                                                        {{ $member->civil_status ?: 'Not provided' }}</p>
                                                                </div>
                                                                <div class="detail-item">
                                                                    <p class="detail-label">Nationality:</p>
                                                                    <p class="detail-value">
                                                                        {{ $member->nationality ?: 'Not provided' }}</p>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Business Tab -->
                                                        <div class="tab-pane fade" id="business{{ $member->id }}"
                                                            role="tabpanel">
                                                            @if ($member->businessDetail)
                                                                <h6 class="section-title">Business Information</h6>
                                                                <div class="detail-grid">
                                                                    <div class="detail-item">
                                                                        <p class="detail-label">Business Name:</p>
                                                                        <p class="detail-value">
                                                                            {{ $member->businessDetail->business_name ?: 'Not provided' }}
                                                                        </p>
                                                                    </div>
                                                                    <div class="detail-item">
                                                                        <p class="detail-label">Nature of Business:</p>
                                                                        <p class="detail-value">
                                                                            {{ $member->businessDetail->business_nature ?: 'Not provided' }}
                                                                        </p>
                                                                    </div>
                                                                    <div class="detail-item">
                                                                        <p class="detail-label">ID Presented:</p>
                                                                        <p class="detail-value">
                                                                            {{ $member->businessDetail->id_presented ?: 'Not provided' }}
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            @else
                                                                <div class="empty-state">
                                                                    <i class="fas fa-briefcase"></i>
                                                                    <h6>No Business Information</h6>
                                                                    <p class="text-muted">Business details have not been
                                                                        provided for this member.</p>
                                                                </div>
                                                            @endif
                                                        </div>

                                                        <!-- Employment Tab -->
                                                        <div class="tab-pane fade" id="employment{{ $member->id }}"
                                                            role="tabpanel">
                                                            @if ($member->employmentDetail)
                                                                <h6 class="section-title">Employment Information</h6>
                                                                <div class="detail-grid">
                                                                    <div class="detail-item">
                                                                        <p class="detail-label">Employer Name:</p>
                                                                        <p class="detail-value">
                                                                            {{ $member->employmentDetail->employer_name ?: 'Not provided' }}
                                                                        </p>
                                                                    </div>
                                                                    <div class="detail-item">
                                                                        <p class="detail-label">Nature of Work:</p>
                                                                        <p class="detail-value">
                                                                            {{ $member->employmentDetail->nature_of_work ?: 'Not provided' }}
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            @else
                                                                <div class="empty-state">
                                                                    <i class="fas fa-building"></i>
                                                                    <h6>No Employment Information</h6>
                                                                    <p class="text-muted">Employment details have not been
                                                                        provided for this member.</p>
                                                                </div>
                                                            @endif
                                                        </div>

                                                        <!-- Political Tab -->
                                                        <div class="tab-pane fade" id="political{{ $member->id }}"
                                                            role="tabpanel">
                                                            @if ($member->politicalExposure)
                                                                <h6 class="section-title">Political Exposure Information
                                                                </h6>
                                                                <div class="detail-grid">
                                                                    <div class="detail-item">
                                                                        <p class="detail-label">Politically Exposed:</p>
                                                                        <p class="detail-value">
                                                                            <span
                                                                                class="badge {{ $member->politicalExposure->is_exposed ? 'bg-warning text-dark' : 'bg-success' }}">
                                                                                {{ $member->politicalExposure->is_exposed ? 'Yes' : 'No' }}
                                                                            </span>
                                                                        </p>
                                                                    </div>
                                                                    @if ($member->politicalExposure->is_exposed)
                                                                        <div class="detail-item">
                                                                            <p class="detail-label">Relationship:</p>
                                                                            <p class="detail-value">
                                                                                {{ $member->politicalExposure->relationship ?: 'Not specified' }}
                                                                            </p>
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            @else
                                                                <div class="empty-state">
                                                                    <i class="fas fa-landmark"></i>
                                                                    <h6>No Political Information</h6>
                                                                    <p class="text-muted">Political exposure details have
                                                                        not been provided for this member.</p>
                                                                </div>
                                                            @endif
                                                        </div>

                                                        <!-- Emergency Tab -->
                                                        <div class="tab-pane fade" id="emergency{{ $member->id }}"
                                                            role="tabpanel">
                                                            @if ($member->emergencyContact)
                                                                <h6 class="section-title">Emergency Contact Information
                                                                </h6>
                                                                <div class="detail-grid">
                                                                    <div class="detail-item">
                                                                        <p class="detail-label">Contact Name:</p>
                                                                        <p class="detail-value">
                                                                            {{ $member->emergencyContact->name ?: 'Not provided' }}
                                                                        </p>
                                                                    </div>
                                                                    <div class="detail-item">
                                                                        <p class="detail-label">Relationship:</p>
                                                                        <p class="detail-value">
                                                                            {{ $member->emergencyContact->relationship ?: 'Not provided' }}
                                                                        </p>
                                                                    </div>
                                                                    <div class="detail-item">
                                                                        <p class="detail-label">Contact Number:</p>
                                                                        <p class="detail-value">
                                                                            @if ($member->emergencyContact->contact_number)
                                                                                <a href="tel:{{ $member->emergencyContact->contact_number }}"
                                                                                    class="text-decoration-none">
                                                                                    {{ $member->emergencyContact->contact_number }}
                                                                                </a>
                                                                            @else
                                                                                Not provided
                                                                            @endif
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            @else
                                                                <div class="empty-state">
                                                                    <i class="fas fa-phone-alt"></i>
                                                                    <h6>No Emergency Contact</h6>
                                                                    <p class="text-muted">Emergency contact details have
                                                                        not been provided for this member.</p>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">
                                                        <i class="fas fa-times me-2"></i>Close
                                                    </button>
                                                    <a href="{{ route('members.edit', $member->id) }}"
                                                        class="btn btn-primary">
                                                        <i class="fas fa-edit me-2"></i>Edit Member
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6">
                                    <div class="empty-state">
                                        <i class="fas fa-users"></i>
                                        <h6>No Members Found</h6>
                                        <p class="text-muted">No members have been added yet. Click "Add New Member" to get
                                            started.</p>
                                        <a href="{{ route('members.create') }}" class="btn btn-primary mt-2">
                                            <i class="fas fa-plus me-2"></i>Add First Member
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Enhanced Pagination -->
    <div class="d-flex justify-content-center mt-4">
        <div class="pagination-wrapper">
            {{ $members->links('pagination::bootstrap-5') }}
        </div>
    </div>
@endsection

@section('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function confirmDelete(id) {
            Swal.fire({
                title: 'Delete Member?',
                text: "This action cannot be undone!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#ff6b6b',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Yes, Delete!',
                cancelButtonText: 'Cancel',
                customClass: {
                    confirmButton: 'btn-delete-confirm',
                    cancelButton: 'btn-cancel-confirm'
                },
                buttonsStyling: false
            }).then((result) => {
                if (result.isConfirmed) {
                    // Show loading state
                    Swal.fire({
                        title: 'Deleting...',
                        text: 'Please wait while we process your request.',
                        icon: 'info',
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                        showConfirmButton: false,
                        didOpen: () => {
                            Swal.showLoading();
                        }
                    });

                    // Submit the form
                    document.getElementById('delete-form-' + id).submit();
                }
            });
        }

        // Enhanced tab functionality
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize tooltips
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl);
            });

            // Handle modal show events
            var memberModals = document.querySelectorAll('.modal');
            memberModals.forEach(function(modalEl) {
                modalEl.addEventListener('shown.bs.modal', function() {
                    // Activate first tab
                    var firstTab = modalEl.querySelector('.nav-tabs .nav-link');
                    if (firstTab && !firstTab.classList.contains('active')) {
                        var tab = new bootstrap.Tab(firstTab);
                        tab.show();
                    }

                    // Add entrance animation
                    modalEl.querySelector('.modal-content').style.transform = 'scale(0.7)';
                    modalEl.querySelector('.modal-content').style.opacity = '0';

                    setTimeout(() => {
                        modalEl.querySelector('.modal-content').style.transition =
                            'all 0.3s ease';
                        modalEl.querySelector('.modal-content').style.transform =
                            'scale(1)';
                        modalEl.querySelector('.modal-content').style.opacity = '1';
                    }, 10);
                });

                // Handle tab changes with smooth transitions
                modalEl.addEventListener('shown.bs.tab', function(e) {
                    const targetPane = document.querySelector(e.target.getAttribute(
                        'data-bs-target'));
                    if (targetPane) {
                        targetPane.style.opacity = '0';
                        targetPane.style.transform = 'translateY(20px)';

                        setTimeout(() => {
                            targetPane.style.transition = 'all 0.3s ease';
                            targetPane.style.opacity = '1';
                            targetPane.style.transform = 'translateY(0)';
                        }, 10);
                    }
                });
            });

            // Add loading states to action buttons
            document.querySelectorAll('.btn-action').forEach(button => {
                button.addEventListener('click', function() {
                    if (!this.classList.contains('btn-delete')) {
                        const originalHtml = this.innerHTML;
                        this.innerHTML = '<i class="fas fa-spinner fa-spin"></i>';
                        this.disabled = true;

                        setTimeout(() => {
                            this.innerHTML = originalHtml;
                            this.disabled = false;
                        }, 1000);
                    }
                });
            });
        });

        // Add custom styles for SweetAlert2
        const style = document.createElement('style');
        style.textContent = `
            .btn-delete-confirm {
                background: linear-gradient(135deg, #ff6b6b 0%, #ee5a24 100%) !important;
                border: none !important;
                border-radius: 0.5rem !important;
                padding: 0.75rem 1.5rem !important;
                color: white !important;
                font-weight: 600 !important;
                transition: all 0.3s ease !important;
            }
            
            .btn-delete-confirm:hover {
                transform: translateY(-2px) !important;
                box-shadow: 0 4px 15px rgba(255, 107, 107, 0.3) !important;
            }
            
            .btn-cancel-confirm {
                background: #6c757d !important;
                border: none !important;
                border-radius: 0.5rem !important;
                padding: 0.75rem 1.5rem !important;
                color: white !important;
                font-weight: 600 !important;
                transition: all 0.3s ease !important;
            }
            
            .btn-cancel-confirm:hover {
                transform: translateY(-2px) !important;
                box-shadow: 0 4px 15px rgba(108, 117, 125, 0.3) !important;
            }
            
            .pagination-wrapper .pagination .page-link {
                border: none;
                border-radius: 0.5rem !important;
                margin: 0 0.25rem;
                color: #667eea;
                font-weight: 500;
                transition: all 0.3s ease;
            }
            
            .pagination-wrapper .pagination .page-item.active .page-link {
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                color: white;
                box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
            }
            
            .pagination-wrapper .pagination .page-link:hover {
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                color: white;
                transform: translateY(-2px);
                box-shadow: 0 4px 15px rgba(102, 126, 234, 0.2);
            }
        `;
        document.head.appendChild(style);
    </script>
@endsection
