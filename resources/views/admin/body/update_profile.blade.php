@extends('admin.admin_master')
@section('admin')


@if(session('success'))
 <div class="alert alert-success alert-dismissible fade show" role="alert">
   <strong>{{ session('success') }}</strong>
   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
 </div>
 @endif


<div class="card card-default">
    <div class="card-header card-header-border-bottom">
        <h2>User Profile Update</h2>
    </div>
    <div class="card-body">
        <form class="form-pill" action="{{ route('update.user.profile') }}"
         method="POST"  >
            @csrf
            <div class="form-group">
                <label for="old_password">User Name </label>
                <input name="name"   type="name"
                class="form-control"  value="{{ $user->name }}"  >
            </div>


            <div class="form-group">
                <label for="password">User Email</label>
                <input name="email" type="email" class="form-control"
                value="{{ $user->email }}"   >
            </div>




            <button type="submit"
            class="btn btn-primary"   >Update</button>

        </form>
    </div>
</div>


@endsection
