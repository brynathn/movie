@extends('layout.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4 mx-auto">
            @if($message = Session::get('failed'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <strong>{{ $message }}</strong>
                </div>
            @endif
            <div class="card border-info">
                <div class="card-body">
                    <div class="mb-3 text-left">
                        <h4 class="card-title mb-4">Register</h4>
                    </div>
                    <hr class="mb-4"> <!-- Garis pemisah -->
                    <form action="register/process" method="post" id="registerForm">
                        @csrf
                        <div class="mb-3 row">
                            <label for="username" class="col-sm-4 col-form-label">USERNAME</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="username" value="{{ old('username') }}" required />
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="email" class="col-sm-4 col-form-label">EMAIL</label>
                            <div class="col-sm-8">
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}" required />
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="nama" class="col-sm-4 col-form-label">FULLNAME</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="nama" value="{{ old('nama') }}" required />
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="password" class="col-sm-4 col-form-label">PASSWORD</label>
                            <div class="col-sm-8">
                                <input type="password" class="form-control" name="password" value="{{ old('password') }}" required />
                            </div>
                        </div>
                        <div class="d-flex flex-column align-items-center">
                            <button class="btn btn-light btn-lg mb-2 w-100 text-dark border border-primary" type="submit">Register</button>
                            <div class="d-flex justify-content-end w-100">
                                <div class="mb-3 text-center">
                                    <button class="btn btn-light border border-danger" onclick="window.location.href='/login'">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
