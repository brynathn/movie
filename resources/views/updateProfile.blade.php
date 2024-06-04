@extends('layout.app')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card border-info">
            <div class="card-body text-center">
                <h4 class="card-title mb-4">Update Profile</h4>
                <hr class="mb-4"> <!-- Garis pemisah -->
                <form action="process" method="post">
                    @csrf
                    <div class="mb-3 row">
                        <label for="username" class="form-label col-sm-4 col-form-label">USERNAME</label>
                        <div class="col-sm-8">
                            <input class="form-control" type="text" name="username" value="{{ $dtuser->username }}" size="25" readonly />
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="email" class="form-label col-sm-4 col-form-label">EMAIL</label>
                        <div class="col-sm-8">
                            <input class="form-control" type="email" name="email" value="{{ $dtuser->email }}" size="25" required />
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nama" class="form-label col-sm-4 col-form-label">FULLNAME</label>
                        <div class="col-sm-8">
                            <input class="form-control" type="text" name="nama" value="{{ $dtuser->fullname }}" size="25" required/>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="col-sm-8 offset-sm-4">
                            <button class="btn btn-light me-2 border border-success" type="submit">Update</button>
                            <button class="btn btn-light me-2 border border-warning" type="reset">Clear</button>
                            <a href="/profile/{{ $dtuser->username }}" class="btn btn-light me-2 border border-danger">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
