<!-- Manage Member Modal -->
<div class="modal fade border-0 shadow" id="memberActionsModal{{ $member->id }}" tabindex="-1"
    aria-labelledby="memberActionsLabel{{ $member->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered ">
        <div class="modal-content rounded-0 border-0 shadow">
            <div class="modal-header border-0 bg-primary text-light rounded-0">
                <h5 class="modal-title" id="memberActionsLabel{{ $member->id }}">
                    <i class="fa-sharp fa-solid fa-user-gear text-light me-2"></i>
                    Manage Member
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body text-center">
                <!-- Member Info -->
                <h3 class="mb-2">
                    {{ $member->first_name }}
                    {{ $member->middle_name ? $member->middle_name . ' ' : '' }}{{ $member->last_name }}
                </h3>
                <h5 class="text-muted mb-4">ID: {{ $member->id_no }}</h3>

                <!-- Description -->
                <p class="text-muted mb-4">
                    Choose what action you want to perform below.
                </p>

                <!-- Actions -->
                <a href="{{ route('members.edit', $member->id) }}"
                    class="btn btn-action btn-primary rounded-0 me-2 mb-2" title="Edit User">
                    <i class="fa-sharp fa-solid fa-edit"></i> Update
                </a>

                <form action="{{ route('members.destroy', $member->id) }}" method="POST" style="display:inline;">
                    @csrf @method('DELETE')
                    <button type="submit" class="btn btn-action btn-danger rounded-0 mb-2" title="Delete User"
                        onclick="return confirm('Are you sure you want to delete {{ $member->name }}?')">
                        <i class="fa-sharp fa-solid fa-trash"></i> Delete
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
