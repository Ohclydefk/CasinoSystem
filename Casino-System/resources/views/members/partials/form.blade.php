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
                    <i class="fa-sharp fa-solid fa-user me-1"></i> Personal Info
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link fund-tab" id="fund-tab" data-bs-toggle="tab" data-bs-target="#fund"
                    type="button" role="tab" aria-controls="fund" aria-selected="false">
                    <i class="fa-sharp fa-solid fa-wallet me-1"></i> Source of Fund
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link political-tab" id="political-tab" data-bs-toggle="tab"
                    data-bs-target="#political" type="button" role="tab" aria-controls="political"
                    aria-selected="false">
                    <i class="fa-sharp fa-solid fa-gavel me-1"></i> Political Exposure
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link emergency-tab" id="emergency-tab" data-bs-toggle="tab"
                    data-bs-target="#emergency" type="button" role="tab" aria-controls="emergency"
                    aria-selected="false">
                    <i class="fa-sharp fa-solid fa-phone-alt me-1"></i> Emergency Contact
                </button>
            </li>
            <button type="submit" class="btn btn-primary shadow-sm ms-auto rounded-0">
                <i class="fa-sharp fa-solid fa-save me-1"></i> {{ isset($member) ? 'Update' : 'Add Membership' }}
            </button>
        </ul>

        {{-- Tabs Content --}}
        <div class="tab-content mt-2" id="memberFormTabsContent">

            {{-- Personal Info --}}
            <div class="tab-pane fade show active" id="personal" role="tabpanel">
                <div class="card shadow-sm p-0 rounded-0">
                    <div class="card-header bg-primary text-white rounded-0">
                        <i class="fa-sharp fa-solid fa-user-circle me-1"></i> Personal Information
                    </div>
                    <div class="card-body bg-light">

                        {{-- Row 1 --}}
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label class="form-label">Valid ID Number</label>
                                <input type="text" name="id_no"
                                    class="form-control form-control-lg @error('id_no') is-invalid @enderror"
                                    placeholder="Enter valid ID number"
                                    value="{{ old('id_no', $member->id_no ?? '') }}">
                                @error('id_no')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Valid ID Type</label>
                                <input type="text" name="valid_id_type"
                                    class="form-control form-control-lg @error('valid_id_type') is-invalid @enderror"
                                    placeholder="Enter valid ID type"
                                    value="{{ old('valid_id_type', $member->valid_id_type ?? '') }}">
                                @error('valid_id_type')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">First Name</label>
                                <input type="text" name="first_name"
                                    class="form-control form-control-lg @error('first_name') is-invalid @enderror"
                                    placeholder="Enter first name"
                                    value="{{ old('first_name', $member->first_name ?? '') }}">
                                @error('first_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- Row 2 --}}
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label class="form-label">Middle Name</label>
                                <input type="text" name="middle_name" class="form-control form-control-lg"
                                    placeholder="Enter middle name"
                                    value="{{ old('middle_name', $member->middle_name ?? '') }}">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Last Name</label>
                                <input type="text" name="last_name"
                                    class="form-control form-control-lg @error('last_name') is-invalid @enderror"
                                    placeholder="Enter last name"
                                    value="{{ old('last_name', $member->last_name ?? '') }}">
                                @error('last_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Alternative Name (Social Media)</label>
                                <input type="text" name="alt_name" class="form-control form-control-lg"
                                    placeholder="Enter alternative name"
                                    value="{{ old('alt_name', $member->alt_name ?? '') }}">
                            </div>
                        </div>

                        {{-- Row 3 --}}
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Present Address</label>
                                <input type="text" name="present_address" class="form-control form-control-lg"
                                    placeholder="Enter present address"
                                    value="{{ old('present_address', $member->present_address ?? '') }}">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Permanent Address</label>
                                <input type="text" name="permanent_address" class="form-control form-control-lg"
                                    placeholder="Enter permanent address"
                                    value="{{ old('permanent_address', $member->permanent_address ?? '') }}">
                            </div>
                        </div>

                        {{-- Row 4 --}}
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label class="form-label">Birthdate</label>
                                <input type="date" name="birthdate"
                                    class="form-control form-control-lg @error('birthdate') is-invalid @enderror"
                                    placeholder="Select birthdate"
                                    value="{{ old('birthdate', $member->birthdate ?? '') }}">
                                @error('birthdate')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Birth Place</label>
                                <input type="text" name="birthplace" class="form-control form-control-lg"
                                    placeholder="Enter birth place"
                                    value="{{ old('birthplace', $member->birthplace ?? '') }}">
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">Civil Status</label>
                                <input type="text" name="civil_status"
                                    class="form-control form-control-lg @error('civil_status') is-invalid @enderror"
                                    placeholder="Enter civil status"
                                    value="{{ old('civil_status', $member->civil_status ?? '') }}">
                                @error('civil_status')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">Nationality</label>
                                <input type="text" name="nationality"
                                    class="form-control form-control-lg @error('nationality') is-invalid @enderror"
                                    placeholder="Enter nationality"
                                    value="{{ old('nationality', $member->nationality ?? '') }}">
                                @error('nationality')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- Row 5 --}}
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Email</label>
                                <input type="email" name="email"
                                    class="form-control form-control-lg @error('email') is-invalid @enderror"
                                    placeholder="Enter email address"
                                    value="{{ old('email', $member->email ?? '') }}">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Mobile No.</label>
                                <input type="text" name="mobile_no"
                                    class="form-control form-control-lg @error('mobile_no') is-invalid @enderror"
                                    placeholder="Enter mobile number"
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
                    <div class="card-header bg-success rounded-0 text-white">
                        <i class="fa-sharp fa-solid fa-hand-holding-usd me-1"></i> Source of Fund
                    </div>
                    <div class="card-body bg-light">
                        <div class="form-check mb-2">
                            <input type="radio" name="source_of_fund" value="self" id="fund_self"
                                class="form-check-input"
                                {{ old('source_of_fund', $member->source_of_fund_self ?? null ? 'self' : '') == 'self' ? 'checked' : '' }}>
                            <label for="fund_self" class="form-check-label">Self-Employed / Business</label>
                        </div>
                        <div class="form-check mb-4">
                            <input type="radio" name="source_of_fund" value="employed" id="fund_employed"
                                class="form-check-input"
                                {{ old('source_of_fund', $member->source_of_fund_employed ?? null ? 'employed' : '') == 'employed' ? 'checked' : '' }}>
                            <label for="fund_employed" class="form-check-label">Employed</label>
                        </div>

                        <h6 class="text-success mb-4"><i class="fa-sharp fa-solid fa-briefcase me-1"></i> Business
                            Details
                        </h6>
                        <label for="business_name" class="form-label">Business Name</label>
                        <input type="text" name="business_name" class="form-control form-control-lg mb-3"
                            placeholder="e.g., ABC Trading, XYZ Solutions, etc."
                            value="{{ old('business_name', $member->businessDetail->business_name ?? '') }}">
                        <label for="business_nature" class="form-label">Nature of Business</label>
                        <input type="text" name="business_nature" class="form-control form-control-lg mb-3"
                            placeholder="e.g., Retail, IT, Manufacturing, etc."
                            value="{{ old('business_nature', $member->businessDetail->business_nature ?? '') }}">
                        <label for="id_presented" class="form-label">ID Presented</label>
                        <input type="text" name="id_presented" class="form-control form-control-lg mb-4"
                            placeholder="National ID, Passport, Driver's License, etc."
                            value="{{ old('id_presented', $member->businessDetail->id_presented ?? '') }}">

                        <h6 class="text-success"><i class="fa-sharp fa-solid fa-id-badge me-1"></i> Employment Details
                        </h6>
                        <label for="employer_name" class="form-label">Employer Name</label>
                        <input type="text" name="employer_name" class="form-control form-control-lg mb-2"
                            placeholder="Employer Name"
                            value="{{ old('employer_name', $member->employmentDetail->employer_name ?? '') }}">
                        <label for="nature_of_work" class="form-label">Nature of Work</label>
                        <input type="text" name="nature_of_work" class="form-control form-control-lg"
                            placeholder="Nature of Work"
                            value="{{ old('nature_of_work', $member->employmentDetail->nature_of_work ?? '') }}">
                    </div>
                </div>
            </div>

            {{-- Political Exposure --}}
            <div class="tab-pane fade" id="political" role="tabpanel">
                <div class="card rounded-0 shadow-sm">
                    <div class="card-header rounded-0 bg-warning text-dark">
                        <i class="fa-sharp fa-solid fa-landmark me-1"></i> Political Exposure
                    </div>
                    <div class="card-body bg-light">
                        <div class="form-check mb-3">
                            <input type="checkbox" id="is_exposed" name="is_exposed" class="form-check-input"
                                {{ old('is_exposed', $member->politicalExposure->is_exposed ?? false) ? 'checked' : '' }}>
                            <label for="is_exposed" class="form-check-label">Has Politically Exposed Family
                                Member</label>
                        </div>
                        <label class="form-label">Relationship</label>
                        <input type="text" id="relationship" name="relationship"
                            class="form-control form-control-lg"
                            value="{{ old('relationship', $member->politicalExposure->relationship ?? '') }}"
                            {{ old('is_exposed', $member->politicalExposure->is_exposed ?? false) ? '' : 'disabled' }}>
                    </div>
                </div>
            </div>

            {{-- Emergency Contact --}}
            <div class="tab-pane fade" id="emergency" role="tabpanel">
                <div class="card rounded-0 shadow-sm">
                    <div class="card-header rounded-0 bg-danger text-white">
                        <i class="fa-sharp fa-solid fa-user-shield me-1"></i> Emergency Contact
                    </div>
                    <div class="card-body bg-light">
                        <div class="row g-3">
                            <!-- Contact Person Name -->
                            <div class="col-md-6">
                                <label for="emergency_name" class="form-label">Contact Person</label>
                                <input type="text" class="form-control" id="emergency_name" name="emergency_name"
                                    placeholder="Enter full name"
                                    value="{{ old('emergency_name', $member->emergencyContact->name ?? '') }}">
                            </div>

                            <!-- Relationship -->
                            <div class="col-md-6">
                                <label for="emergency_relationship" class="form-label">Relationship</label>
                                <input type="text" class="form-control" id="emergency_relationship"
                                    name="emergency_relationship" placeholder="e.g. Mother, Brother, Friend"
                                    value="{{ old('emergency_relationship', $member->emergencyContact->relationship ?? '') }}">
                            </div>

                            <!-- Contact Number -->
                            <div class="col-md-6">
                                <label for="emergency_contact_number" class="form-label">Contact Number</label>
                                <input type="tel" class="form-control" id="emergency_contact_number"
                                    name="emergency_contact_number" placeholder="Enter contact number"
                                    value="{{ old('emergency_contact_number', $member->emergencyContact->contact_number ?? '') }}">
                            </div>

                            <!-- Address -->
                            <div class="col-md-6">
                                <label for="emergency_contact_address" class="form-label">Address</label>
                                <input type="text" class="form-control" id="emergency_contact_address"
                                    name="emergency_address" placeholder="Enter address"
                                    value="{{ old('emergency_contact_address', $member->emergencyContact->emergency_contact_address ?? '') }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

{{-- Small Script for Political Input --}}
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const exposedCheckbox = document.getElementById("is_exposed");
        const relationshipInput = document.getElementById("relationship");

        function toggleRelationship() {
            relationshipInput.disabled = !exposedCheckbox.checked;
            if (!exposedCheckbox.checked) {
                relationshipInput.value = "";
            }
        }

        exposedCheckbox.addEventListener("change", toggleRelationship);
        toggleRelationship();
    });
</script>
