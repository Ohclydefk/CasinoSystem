@extends('layouts.app')

@section('content')
<h2>MEMBERSHIP</h2>
<form action="{{ route('members.store') }}" method="POST">
    @csrf
    @include('members.partials.form')
    {{-- <button type="submit" class="btn btn-success">Save</button>
    <a href="{{ route('members.index') }}" class="btn btn-secondary">Cancel</a> --}}
</form>
@endsection
