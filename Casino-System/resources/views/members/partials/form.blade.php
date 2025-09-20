<div class="container mt-4 rounded-0 my-5">
    <form method="POST" action="{{ isset($member) ? route('members.update', $member->id) : route('members.store') }}">
        @csrf
        @if (isset($member))
            @method('PUT')
        @endif

        {{-- Tabs Navigation --}}
        <ul class="nav nav-tabs" id="memberTabs" role="tablist" style="margin-bottom:0;">
            <li class="nav-item" role="presentation">
                <button class="nav-link personal-tab active" id="personal-tab" data-bs-toggle="tab"
                    data-bs-target="#personal" type="button" role="tab" aria-controls="personal"
                    aria-selected="true">
                    Personal Info
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link fund-tab" id="fund-tab" data-bs-toggle="tab" data-bs-target="#fund"
                    type="button" role="tab" aria-controls="fund" aria-selected="false">
                    Source of Fund
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link political-tab" id="political-tab" data-bs-toggle="tab"
                    data-bs-target="#political" type="button" role="tab" aria-controls="political"
                    aria-selected="false">
                    Political Exposure
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link emergency-tab" id="emergency-tab" data-bs-toggle="tab"
                    data-bs-target="#emergency" type="button" role="tab" aria-controls="emergency"
                    aria-selected="false">
                    Emergency Contact
                </button>
            </li>
            <button type="submit" class="btn btn-primary shadow-sm ms-auto rounded-0">
                {{ isset($member) ? 'Update' : 'Add Membership' }}
            </button>
        </ul>

        {{-- Tabs Content --}}
        <div class="tab-content mt-2" id="memberFormTabsContent">
            {{-- Personal Info --}}
            <div class="tab-pane fade show active" id="personal" role="tabpanel">
                <div class="card shadow-sm p-0 rounded-0">
                    <div class="card-header bg-primary text-white rounded-0">Personal Information</div>
                    <div class="card-body bg-light">
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <label class="form-label">ID No.</label>
                                <input type="text" name="id_no"
                                    class="form-control form-control-lg @error('id_no') is-invalid @enderror"
                                    value="{{ old('id_no', $member->id_no ?? '') }}"
                                    {{ isset($member) ? 'readonly' : '' }}
                                    {{ isset($member) ? 'disabled' : '' }}
                                    >
                                @error('id_no')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">First Name</label>
                                <input type="text" name="first_name"
                                    class="form-control form-control-lg @error('first_name') is-invalid @enderror"
                                    value="{{ old('first_name', $member->first_name ?? '') }}">
                                @error('first_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Middle Name</label>
                                <input type="text" name="middle_name" class="form-control form-control-lg"
                                    value="{{ old('middle_name', $member->middle_name ?? '') }}">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Last Name</label>
                                <input type="text" name="last_name"
                                    class="form-control form-control-lg @error('last_name') is-invalid @enderror"
                                    value="{{ old('last_name', $member->last_name ?? '') }}">
                                @error('last_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Alternative Name (Social Media)</label>
                            <input type="text" name="alt_name" class="form-control form-control-lg"
                                value="{{ old('alt_name', $member->alt_name ?? '') }}">
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Present Address</label>
                                <input type="text" name="present_address" class="form-control form-control-lg"
                                    value="{{ old('present_address', $member->present_address ?? '') }}">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Permanent Address</label>
                                <input type="text" name="permanent_address" class="form-control form-control-lg"
                                    value="{{ old('permanent_address', $member->permanent_address ?? '') }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label class="form-label">Birthdate</label>
                                <input type="date" name="birthdate"
                                    class="form-control form-control-lg @error('birthdate') is-invalid @enderror"
                                    value="{{ old('birthdate', $member->birthdate ?? '') }}">
                                @error('birthdate')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Birth Place</label>
                                <input type="text" name="birthplace" class="form-control form-control-lg"
                                    value="{{ old('birthplace', $member->birthplace ?? '') }}">
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">Civil Status</label>
                                <input type="text" name="civil_status"
                                    class="form-control form-control-lg @error('civil_status') is-invalid @enderror"
                                    value="{{ old('civil_status', $member->civil_status ?? '') }}">
                                @error('civil_status')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">Nationality</label>
                                <input type="text" name="nationality"
                                    class="form-control form-control-lg @error('nationality') is-invalid @enderror"
                                    value="{{ old('nationality', $member->nationality ?? '') }}">
                                @error('nationality')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Email</label>
                                <input type="email" name="email"
                                    class="form-control form-control-lg @error('email') is-invalid @enderror"
                                    value="{{ old('email', $member->email ?? '') }}">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Mobile No.</label>
                                <input type="text" name="mobile_no"
                                    class="form-control form-control-lg @error('mobile_no') is-invalid @enderror"
                                    value="{{ old('mobile_no', $member->mobile_no ?? '') }}">
                                @error('mobile_no')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Source of Fund --}}
            <div class="tab-pane fade" id="fund" role="tabpanel">
                <div class="card shadow-sm p-0 rounded-0">
                    <div class="card-header bg-success rounded-0 text-white">Source of Fund</div>
                    <div class="card-body bg-light">
                        <div class="form-check mb-2">
                            <input type="checkbox" name="source_of_fund_self" class="form-check-input"
                                {{ old('source_of_fund_self', $member->source_of_fund_self ?? false) ? 'checked' : '' }}>
                            <label class="form-check-label">Self-Employed / Business</label>
                        </div>
                        <div class="form-check mb-4">
                            <input type="checkbox" name="source_of_fund_employed" class="form-check-input"
                                {{ old('source_of_fund_employed', $member->source_of_fund_employed ?? false) ? 'checked' : '' }}>
                            <label class="form-check-label">Employed</label>
                        </div>

                        <h6 class="text-success">Business Details</h6>
                        <input type="text" name="business_name" class="form-control form-control-lg mb-2"
                            placeholder="Business Name"
                            value="{{ old('business_name', $member->businessDetail->business_name ?? '') }}">
                        <input type="text" name="business_nature" class="form-control form-control-lg mb-2"
                            placeholder="Nature of Business"
                            value="{{ old('business_nature', $member->businessDetail->business_nature ?? '') }}">
                        <input type="text" name="id_presented" class="form-control form-control-lg mb-4"
                            placeholder="ID Presented"
                            value="{{ old('id_presented', $member->businessDetail->id_presented ?? '') }}">

                        <h6 class="text-success">Employment Details</h6>
                        <input type="text" name="employer_name" class="form-control form-control-lg mb-2"
                            placeholder="Employer Name"
                            value="{{ old('employer_name', $member->employmentDetail->employer_name ?? '') }}">
                        <input type="text" name="nature_of_work" class="form-control form-control-lg"
                            placeholder="Nature of Work"
                            value="{{ old('nature_of_work', $member->employmentDetail->nature_of_work ?? '') }}">
                    </div>
                </div>
            </div>

            {{-- Political Exposure --}}
            <div class="tab-pane fade" id="political" role="tabpanel">
                <div class="card rounded-0 shadow-sm">
                    <div class="card-header rounded-0 bg-warning text-dark">Political Exposure</div>
                    <div class="card-body bg-light">
                        <div class="form-check mb-3">
                            <input type="checkbox" name="is_exposed" class="form-check-input"
                                {{ old('is_exposed', $member->politicalExposure->is_exposed ?? false) ? 'checked' : '' }}>
                            <label class="form-check-label">Has Politically Exposed Family Member</label>
                        </div>
                        <label class="form-label">Relationship</label>
                        <input type="text" name="relationship" class="form-control form-control-lg"
                            value="{{ old('relationship', $member->politicalExposure->relationship ?? '') }}">
                    </div>
                </div>
            </div>

            {{-- Emergency Contact --}}
            <div class="tab-pane fade" id="emergency" role="tabpanel">
                <div class="card rounded-0 shadow-sm">
                    <div class="card-header rounded-0 bg-danger text-white">Emergency Contact</div>
                    <div class="card-body bg-light">
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label class="form-label">Name</label>
                                <input type="text" name="emergency_name" class="form-control form-control-lg"
                                    value="{{ old('emergency_name', $member->emergencyContact->name ?? '') }}">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Relationship</label>
                                <input type="text" name="emergency_relationship"
                                    class="form-control form-control-lg"
                                    value="{{ old('emergency_relationship', $member->emergencyContact->relationship ?? '') }}">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Contact Number</label>
                                <input type="text" name="emergency_contact_number"
                                    class="form-control form-control-lg"
                                    value="{{ old('emergency_contact_number', $member->emergencyContact->contact_number ?? '') }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Submit --}}
        </div>

    </form>
</div>

<style>
    .nav-tabs {
        border-bottom: none;
        margin-bottom: 0;
    }

    .nav-tabs .nav-link {
        border-radius: 0;
        /* Default tabs not rounded */
        margin-bottom: -1px;
        border: 1px solid #dee2e6;
        background: #f8f9fa;
        color: #495057;
        font-weight: normal;
    }

    .nav-tabs .nav-link.active.personal-tab {
        background-color: #0d6efd;
        color: #fff;
        border-color: #0d6efd #0d6efd #fff;
    }

    .nav-tabs .nav-link.active.fund-tab {
        background-color: #198754;
        color: #fff;
        border-color: #198754 #198754 #fff;
    }

    .nav-tabs .nav-link.active.political-tab {
        background-color: #ffc107;
        color: #212529;
        border-color: #ffc107 #ffc107 #fff;
    }

    .nav-tabs .nav-link.active.emergency-tab {
        background-color: #dc3545;
        color: #fff;
        border-color: #dc3545 #dc3545 #fff;
    }

    .nav-tabs .nav-link:focus {
        outline: none;
        box-shadow: none;
    }

    .nav-tabs .nav-link:not(.active) {
        border-bottom: 1px solid #dee2e6;
    }

    .tab-content>.tab-pane {
        margin-top: 0;

    }
</style>
