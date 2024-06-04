@extends('layout.app')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-4">
        @if($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                <b>{{ $message }}</b>
            </div>
        @elseif($message = Session::get('failed'))
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                <b>{{ $message }}</b>
            </div>
        @endif
        <div class="card bg-light mt-4">
            <div class="card-body text-center">
                <h4 class="card-title">Profile</h4>
                <hr class="mb-4"> <!-- Garis pemisah -->
                <table class="table table-responsive" cellpadding="5">
                    <tr>
                        <td class="fw-bold">Username</td>
                        <td>:</td>
                        <td>{{ $dtuser->username }}</td>
                    </tr>
                    <tr>
                        <td class="fw-bold">E-mail</td>
                        <td>:</td>
                        <td>{{ $dtuser->email }}</td>
                    </tr>
                    <tr>
                        <td class="fw-bold">Fullname</td>
                        <td>:</td>
                        <td>{{ $dtuser->fullname }}</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="text-center mt-4">
            <a href="{{ $dtuser->username }}/update/" class="btn btn-outline-success mx-2">Update Profile</a>
            <a href="{{ $dtuser->username }}/change-password/" class="btn btn-outline-warning mx-2">Change Password</a>
            <button type="button" class="btn btn-outline-danger mx-2" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete Account</button>
        </div>
    </div>
    <div class="modal fade" id="deleteModal">
	<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h1 class="modal-title fs-5">Delete</h1>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					Yakin Hapus?
				</div>
				<div class="modal-footer">
					<button type="button" onclick="window.location.href='{{ $dtuser->username }}/delete';" class="btn btn-danger">Delete</button>
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
