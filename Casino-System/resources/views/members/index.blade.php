@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Members</h2>
    <a href="{{ route('members.create') }}" class="btn btn-primary">Add New</a>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID No.</th>
            <th>Name</th>
            <th>Email</th>
            <th>Mobile</th>
            <th>Nationality</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse($members as $member)
            <tr>
                <td>{{ $member->id_no }}</td>
                <td>{{ $member->first_name }} {{ $member->last_name }}</td>
                <td>{{ $member->email }}</td>
                <td>{{ $member->mobile_no }}</td>
                <td>{{ $member->nationality }}</td>
                <td>
                    <a href="{{ route('members.edit', $member->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('members.destroy', $member->id) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this member?')">Delete</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="6">No members found.</td></tr>
        @endforelse
    </tbody>
</table>
@endsection
