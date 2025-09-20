@extends('layouts.app')

@section('content')
<h2>Edit Member</h2>
<form action="{{ route('members.update', $member->id) }}" method="POST">
    @csrf @method('PUT')
    @include('members.partials.form', ['member' => $member])
</form>
@endsection
