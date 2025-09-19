<div class="container my-4">
    <form action="{{ isset($member) ? route('members.update', $member->id) : route('members.store') }}" 
          method="POST">
        @csrf
        @if(isset($member))
            @method('PUT')
        @endif

        {{-- Personal Info --}}
        <div class="card mb-4 shadow-sm">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Personal Information</h5>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col">
                        <label>ID No.</label>
                        <input type="text" name="id_no" class="form-control @error('id_no') is-invalid @enderror"
                               value="{{ old('id_no', $member->id_no ?? '') }}">
                        @error('id_no') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="col">
                        <label>First Name</label>
                        <input type="text" name="first_name" class="form-control @error('first_name') is-invalid @enderror"
                               value="{{ old('first_name', $member->first_name ?? '') }}">
                        @error('first_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="col">
                        <label>Middle Name</label>
                        <input type="text" name="middle_name" class="form-control"
                               value="{{ old('middle_name', $member->middle_name ?? '') }}">
                    </div>
                    <div class="col">
                        <label>Last Name</label>
                        <input type="text" name="last_name" class="form-control @error('last_name') is-invalid @enderror"
                               value="{{ old('last_name', $member->last_name ?? '') }}">
                        @error('last_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label>Alternative Name (social media)</label>
                    <input type="text" name="alt_name" class="form-control"
                           value="{{ old('alt_name', $member->alt_name ?? '') }}">
                </div>

                <div class="row mb-3">
                    <div class="col">
                        <label>Present Address</label>
                        <input type="text" name="present_address" class="form-control"
                               value="{{ old('present_address', $member->present_address ?? '') }}">
                    </div>
                    <div class="col">
                        <label>Permanent Address</label>
                        <input type="text" name="permanent_address" class="form-control"
                               value="{{ old('permanent_address', $member->permanent_address ?? '') }}">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col">
                        <label>Birthdate</label>
                        <input type="date" name="birthdate" class="form-control @error('birthdate') is-invalid @enderror"
                               value="{{ old('birthdate', $member->birthdate ?? '') }}">
                        @error('birthdate') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="col">
                        <label>Birth Place</label>
                        <input type="text" name="birthplace" class="form-control"
                               value="{{ old('birthplace', $member->birthplace ?? '') }}">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col">
                        <label>Civil Status</label>
                        <input type="text" name="civil_status" class="form-control @error('civil_status') is-invalid @enderror"
                               value="{{ old('civil_status', $member->civil_status ?? '') }}">
                        @error('civil_status') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="col">
                        <label>Nationality</label>
                        <input type="text" name="nationality" class="form-control @error('nationality') is-invalid @enderror"
                               value="{{ old('nationality', $member->nationality ?? '') }}">
                        @error('nationality') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                               value="{{ old('email', $member->email ?? '') }}">
                        @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="col">
                        <label>Mobile No.</label>
                        <input type="text" name="mobile_no" class="form-control @error('mobile_no') is-invalid @enderror"
                               value="{{ old('mobile_no', $member->mobile_no ?? '') }}">
                        @error('mobile_no') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>
            </div>
        </div>

        {{-- Source of Fund --}}
        <div class="card mb-4 shadow-sm">
            <div class="card-header bg-success text-white">
                <h5 class="mb-0">Source of Fund</h5>
            </div>
            <div class="card-body">
                <div class="form-check">
                    <input type="checkbox" name="source_of_fund_self" class="form-check-input"
                           {{ old('source_of_fund_self', $member->source_of_fund_self ?? false) ? 'checked' : '' }}>
                    <label class="form-check-label">Self-Employed/Business</label>
                </div>
                <div class="form-check mb-3">
                    <input type="checkbox" name="source_of_fund_employed" class="form-check-input"
                           {{ old('source_of_fund_employed', $member->source_of_fund_employed ?? false) ? 'checked' : '' }}>
                    <label class="form-check-label">Employed</label>
                </div>

                <h6 class="mt-3">Business Details</h6>
                <input type="text" name="business_name" class="form-control mb-2"
                       placeholder="Business Name"
                       value="{{ old('business_name', $member->businessDetail->business_name ?? '') }}">
                <input type="text" name="business_nature" class="form-control mb-2"
                       placeholder="Nature of Business"
                       value="{{ old('business_nature', $member->businessDetail->business_nature ?? '') }}">
                <input type="text" name="id_presented" class="form-control mb-2"
                       placeholder="ID Presented"
                       value="{{ old('id_presented', $member->businessDetail->id_presented ?? '') }}">

                <h6 class="mt-3">Employment Details</h6>
                <input type="text" name="employer_name" class="form-control mb-2"
                       placeholder="Employer Name"
                       value="{{ old('employer_name', $member->employmentDetail->employer_name ?? '') }}">
                <input type="text" name="nature_of_work" class="form-control mb-2"
                       placeholder="Nature of Work"
                       value="{{ old('nature_of_work', $member->employmentDetail->nature_of_work ?? '') }}">
            </div>
        </div>

        {{-- Political Exposure --}}
        <div class="card mb-4 shadow-sm">
            <div class="card-header bg-warning">
                <h5 class="mb-0">Political Exposure</h5>
            </div>
            <div class="card-body">
                <div class="form-check mb-3">
                    <input type="checkbox" name="is_exposed" class="form-check-input"
                           {{ old('is_exposed', $member->politicalExposure->is_exposed ?? false) ? 'checked' : '' }}>
                    <label class="form-check-label">Family member politically exposed</label>
                </div>
                <input type="text" name="relationship" class="form-control"
                       placeholder="Relationship"
                       value="{{ old('relationship', $member->politicalExposure->relationship ?? '') }}">
            </div>
        </div>

        {{-- Emergency Contact --}}
        <div class="card mb-4 shadow-sm">
            <div class="card-header bg-danger text-white">
                <h5 class="mb-0">Emergency Contact</h5>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col">
                        <input type="text" name="emergency_name" class="form-control"
                               placeholder="Name"
                               value="{{ old('emergency_name', $member->emergencyContact->name ?? '') }}">
                    </div>
                    <div class="col">
                        <input type="text" name="emergency_relationship" class="form-control"
                               placeholder="Relationship"
                               value="{{ old('emergency_relationship', $member->emergencyContact->relationship ?? '') }}">
                    </div>
                    <div class="col">
                        <input type="text" name="emergency_contact_number" class="form-control"
                               placeholder="Contact Number"
                               value="{{ old('emergency_contact_number', $member->emergencyContact->contact_number ?? '') }}">
                    </div>
                </div>
            </div>
        </div>

        {{-- Submit --}}
        <div class="text-end">
            <button type="submit" class="btn btn-primary">
                {{ isset($member) ? 'Update Member' : 'Create Member' }}
            </button>
        </div>
    </form>
</div>
