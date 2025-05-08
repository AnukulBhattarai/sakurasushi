@extends('admin.layout.main')

@section('content')
    <div class="row h-100">
        <form action="{{ route('update.password') }}" method="post" class="col-lg-3 col-md-4 col-10 mx-auto">
            @csrf
            <h1 class="h6 mb-3">Change Password</h1>
            <x-admin.input name="current_password" label="Current Password" type="password"
                placeholder="Enter Current Password" />
            <x-admin.input name="password" label="New Password" type="password" placeholder="Enter New Password" />
            <x-admin.input name="password_confirmation" label="Confirm Password" type="password"
                placeholder="Enter Confirm Password" />

            <button class="btn btn-lg btn-primary btn-block mt-3" type="submit">Change Password</button>
        </form>
    </div>
@endsection
