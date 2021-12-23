@extends('admin.admin_master')

@section('admin')



<div class="card card-default">
    <div class="card-header card-header-border-bottom">
        <h2>Change Password</h2>
    </div>
    <div class="card-body">
        <form class="form-pill"
         method="POST" action="{{ route('password.update') }}">
            @csrf
            <div class="form-group">
                <label for="old_password">Current Password</label>
                <input name="oldpassword" id="old_password" type="password"
                class="form-control"
                   placeholder="Current Password">
                   @error('oldpassword')
                <span class="text-danger" >{{ $message }}</span>
                   @enderror

            </div>
            <div class="form-group">
                <label for="password">New Password</label>
                <input name="password" type="password" class="form-control"
                id="password" placeholder="New Password">
                @error('password')
                <span class="text-danger" >{{ $message }}</span>
                @enderror

            </div>
            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input name="password_confirmation" type="password" class="form-control"
                id="password_confirmation" placeholder="Confirm Password">
                @error('password_confirmation')
                <span class="text-danger" >{{ $message }}</span>
                   @enderror
            </div>



            <button type="submit"
            class="btn btn-primary"   >Submit</button>

        </form>
    </div>
</div>








@endsection
