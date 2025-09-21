@extends('layouts.app')

@section('content')
    <div class="container-fluid mt-4 mx-0 px-0">
        <div class="row justify-content-center">
            <div class="col-12 col-xl-10">
                <div class="card shadow rounded-0">
                    <div class="card-header bg-primary text-white rounded-0 d-flex align-items-center">
                        <i class="fa-sharp fa-solid fa-users fa-lg me-2"></i>
                        <h2 class="mb-0" style="letter-spacing:2px;">Edit Member</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('members.update', $member->id) }}" method="POST">
                            @csrf
                            @include('members.partials.form')
                            {{-- <button type="submit" class="btn btn-success">Save</button>
                            <a href="{{ route('members.index') }}" class="btn btn-secondary">Cancel</a> --}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
