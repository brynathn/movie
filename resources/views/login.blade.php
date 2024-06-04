@extends('layout.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-5 mx-auto my-5">
            @if($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <strong>{{ $message }}</strong>
                </div>
            @elseif($message = Session::get('failed'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <strong>{{ $message }}</strong>
                </div>
            @endif
            <div class="card border-info">
                <div class="card-body">
                    <h4 class="card-title text-left mb-4 text-center fw-bold">Login</h4>
                    <hr class="mb-4"> <!-- Garis pemisah -->
                    <form action="login/process" method="post">
                        @csrf
                        <div class="mb-3 row">
                            <label for="username" class="form-label col-sm-4 col-form-label">USERNAME</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="username" name="username" required />
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="password" class="form-label col-sm-4 col-form-label">PASSWORD</label>
                            <div class="col-sm-8">
                                <input type="password" class="form-control" id="password" name="password" required />
                            </div>
                        </div>
                        <div class="mb-3 form-check">
                            <input class="form-check-input" type="checkbox" id="rememberMe">
                            <label class="form-check-label" for="rememberMe">
                                Remember Me
                            </label>
                        </div>
                        <div class="mb-3 text-center">
                            <button class="btn btn-light btn-lg mb-2 w-100 text-dark border border-primary" type="submit">Login</button>
                        </div>
                        <div class="mb-3 text-center">
                            <p>
                                <a href="/register" class="link-primary">Don't have an account? Register</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
