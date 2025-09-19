@extends('layouts.app')

@section('content')
<h2>Edit Member</h2>
<form action="{{ route('members.update', $member->id) }}" method="POST">
    @csrf @method('PUT')
    @include('members.partials.form', ['member' => $member])
    <button type="submit" class="btn btn-success">Update</button>
    <a href="{{ route('members.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
