<!-- View Modal -->
<div class="modal fade" id="viewMemberModal{{ $member->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content shadow-lg border-0">
            <div class="modal-header bg-dark text-white">
                <h5 class="modal-title">
                    <i class="fas fa-user-circle me-2"></i>
                    {{ $member->first_name }} {{ $member->last_name }}
                    <small class="ms-2 text-muted">#{{ $member->id_no }}</small>
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>

            <!-- Sticky Tabs -->
            <div class="sticky-top bg-white border-bottom">
                <ul class="nav nav-tabs px-3" id="memberTab{{ $member->id }}" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="basic-tab{{ $member->id }}" data-bs-toggle="tab"
                            data-bs-target="#basic{{ $member->id }}" type="button" role="tab">
                            <i class="fas fa-user me-2"></i>Basic Info
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="business-tab{{ $member->id }}" data-bs-toggle="tab"
                            data-bs-target="#business{{ $member->id }}" type="button" role="tab">
                            <i class="fas fa-briefcase me-2"></i>Business
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="employment-tab{{ $member->id }}" data-bs-toggle="tab"
                            data-bs-target="#employment{{ $member->id }}" type="button" role="tab">
                            <i class="fas fa-building me-2"></i>Employment
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="political-tab{{ $member->id }}" data-bs-toggle="tab"
                            data-bs-target="#political{{ $member->id }}" type="button" role="tab">
                            <i class="fas fa-landmark me-2"></i>Political
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="emergency-tab{{ $member->id }}" data-bs-toggle="tab"
                            data-bs-target="#emergency{{ $member->id }}" type="button" role="tab">
                            <i class="fas fa-phone-alt me-2"></i>Emergency
                        </button>
                    </li>
                </ul>
            </div>

            <div class="modal-body">
                <div class="tab-content" id="memberTabContent{{ $member->id }}">

                    <!-- Basic Info Tab -->
                    <div class="tab-pane fade show active" id="basic{{ $member->id }}" role="tabpanel">
                        <h6 class="fw-bold text-dark mb-3">Personal Information</h6>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="p-3 border rounded bg-light">
                                    <small class="text-muted d-block">Valid ID Number</small>
                                    <span>{{ $member->id_no ?: 'Not provided' }}</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="p-3 border rounded bg-light">
                                    <small class="text-muted d-block">Valid ID Type</small>
                                    <span>{{ $member->valid_id_type ?: 'Not provided' }}</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="p-3 border rounded">
                                    <small class="text-muted d-block">Full Name</small>
                                    <span>{{ $member->first_name }} {{ $member->middle_name }}
                                        {{ $member->last_name }}</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="p-3 border rounded bg-light">
                                    <small class="text-muted d-block">Alternative Name</small>
                                    <span>{{ $member->alt_name ?: 'Not provided' }}</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="p-3 border rounded">
                                    <small class="text-muted d-block">Email</small>
                                    <span>{{ $member->email ?: 'Not provided' }}</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="p-3 border rounded bg-light">
                                    <small class="text-muted d-block">Mobile</small>
                                    <span>{{ $member->mobile_no ?: 'Not provided' }}</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="p-3 border rounded">
                                    <small class="text-muted d-block">Birthdate</small>
                                    <span class="birthdate-display" data-date="{{ $member->birthdate }}">
                                        {{ $member->birthdate ?: 'Not provided' }}
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="p-3 border rounded bg-light">
                                    <small class="text-muted d-block">Birthplace</small>
                                    <span>{{ $member->birthplace ?: 'Not provided' }}</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="p-3 border rounded">
                                    <small class="text-muted d-block">Civil Status</small>
                                    <span>{{ $member->civil_status ?: 'Not provided' }}</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="p-3 border rounded bg-light">
                                    <small class="text-muted d-block">Nationality</small>
                                    <span>{{ $member->nationality ?: 'Not provided' }}</span>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="p-3 border rounded bg-light">
                                    <small class="text-muted d-block">Employment Status</small>
                                    @if (empty($member->source_of_fund_self) && !empty($member->source_of_fund_employed))
                                        <span>Employed</span>
                                    @elseif (!empty($member->source_of_fund_self) && empty($member->source_of_fund_employed))
                                        <span>Self Employed</span>
                                    @else
                                        <span>Not specified</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Source of Funds Tab -->
                    <div class="tab-pane fade" id="business{{ $member->id }}" role="tabpanel">
                        <h6 class="fw-bold text-dark mb-3">Business Information</h6>
                        @if ($member->businessDetail)
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="p-3 border rounded bg-light">
                                        <small class="text-muted d-block">Business Name</small>
                                        <span>{{ $member->businessDetail->business_name ?: 'Not provided' }}</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="p-3 border rounded">
                                        <small class="text-muted d-block">Nature of Business</small>
                                        <span>{{ $member->businessDetail->business_nature ?: 'Not provided' }}</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="p-3 border rounded bg-light">
                                        <small class="text-muted d-block">ID Presented</small>
                                        <span>{{ $member->businessDetail->id_presented ?: 'Not provided' }}</span>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="text-center p-4 text-muted">
                                <i class="fas fa-briefcase fa-2x mb-2"></i>
                                <h6>No Business Information</h6>
                                <p class="mb-0">Business details have not been provided for this member.</p>
                            </div>
                        @endif
                    </div>

                    <!-- Employment Tab -->
                    <div class="tab-pane fade" id="employment{{ $member->id }}" role="tabpanel">
                        <h6 class="fw-bold text-dark mb-3">Employment Information</h6>
                        @if ($member->employmentDetail)
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="p-3 border rounded bg-light">
                                        <small class="text-muted d-block">Employer Name</small>
                                        <span>{{ $member->employmentDetail->employer_name ?: 'Not provided' }}</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="p-3 border rounded">
                                        <small class="text-muted d-block">Nature of Work</small>
                                        <span>{{ $member->employmentDetail->nature_of_work ?: 'Not provided' }}</span>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="text-center p-4 text-muted">
                                <i class="fas fa-building fa-2x mb-2"></i>
                                <h6>No Employment Information</h6>
                                <p class="mb-0">Employment details have not been provided for this member.</p>
                            </div>
                        @endif
                    </div>

                    <!-- Political Tab -->
                    <div class="tab-pane fade" id="political{{ $member->id }}" role="tabpanel">
                        <h6 class="fw-bold text-dark mb-3">Political Exposure</h6>
                        @if ($member->politicalExposure)
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="p-3 border rounded bg-light">
                                        <small class="text-muted d-block">Have a family Member/s who are politically
                                            exposed</small>
                                        <span
                                            class="badge {{ $member->politicalExposure->is_exposed ? 'bg-success text-light' : 'bg-danger text-light' }}">
                                            {{ $member->politicalExposure->is_exposed ? 'Yes' : 'No' }}
                                        </span>
                                    </div>
                                </div>
                                @if ($member->politicalExposure->is_exposed)
                                    <div class="col-md-6">
                                        <div class="p-3 border rounded">
                                            <small class="text-muted d-block">Relationship</small>
                                            <span>{{ $member->politicalExposure->relationship ?: 'Not specified' }}</span>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        @else
                            <div class="text-center p-4 text-muted">
                                <i class="fas fa-landmark fa-2x mb-2"></i>
                                <h6>No Political Information</h6>
                                <p class="mb-0">Political exposure details have not been provided for this member.
                                </p>
                            </div>
                        @endif
                    </div>

                    <!-- Emergency Tab -->
                    <div class="tab-pane fade" id="emergency{{ $member->id }}" role="tabpanel">
                        <h6 class="fw-bold text-dark mb-3">Emergency Contact</h6>
                        @if ($member->emergencyContact)
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="p-3 border rounded bg-light">
                                        <small class="text-muted d-block">Contact Name</small>
                                        <span>{{ $member->emergencyContact->name ?: 'Not provided' }}</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="p-3 border rounded">
                                        <small class="text-muted d-block">Relationship</small>
                                        <span>{{ $member->emergencyContact->relationship ?: 'Not provided' }}</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="p-3 border rounded bg-light">
                                        <small class="text-muted d-block">Contact Number</small>
                                        @if ($member->emergencyContact->contact_number)
                                            <a href="tel:{{ $member->emergencyContact->contact_number }}"
                                                class="text-decoration-none">
                                                {{ $member->emergencyContact->contact_number }}
                                            </a>
                                        @else
                                            Not provided
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="p-3 border rounded bg-light">
                                        <small class="text-muted d-block">Contact Address</small>
                                        @if ($member->emergencyContact->emergency_contact_address)
                                            <span>{{ $member->emergencyContact->emergency_contact_address }}</span>
                                        @else
                                            Not provided
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="text-center p-4 text-muted">
                                <i class="fas fa-phone-alt fa-2x mb-2"></i>
                                <h6>No Emergency Contact</h6>
                                <p class="mb-0">Emergency contact details have not been provided for this member.</p>
                            </div>
                        @endif
                    </div>

                </div>
            </div>

            <div class="modal-footer bg-light">
                <button type="button" class="btn btn-secondary rounded-0" data-bs-dismiss="modal">
                    <i class="fas fa-times me-1"></i>Close
                </button>
                <a href="{{ route('members.edit', $member->id) }}"
                    class="btn btn-action btn-primary rounded-0 me-2" title="Edit User">
                    <i class="fa-sharp fa-solid fa-edit"></i> Update
                </a>
                {{-- <a href="{{ route('members.edit', $member->id) }}" class="btn btn-primary rounded-0">
                    <i class="fa-regular fa-pen-to-square me-1"></i>Edit Member
                </a> --}}
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('js/view-modal/date_formatter_support.js') }}"></script>

