@extends('layout.app')
@section('content')
<div class="row justify-content-center">
	<div class="col-md-4">
		@if($message = Session::get('failed'))
			<div class="alert alert-danger alert-dismissible">
					<button type="button" class="btn-close" data-bs-dismiss="alert"></button>
					<b>{{ $message }}</b>
			</div>
		@endif
		<div class="card bg-light">
			<div class="card-body text-center">
				<h4 class="card-title">Change Password</h4>
				<hr class="mb-4"> <!-- Garis pemisah -->
				<table cellpadding="5">
					<form action="process" method="post">
					@csrf
					<tr>
						<td width="40%" >NEW PASSWORD</td>
						<td width="60%"><input class="form-control" type="password" name="password" value="{{old('password')}}" /></td>
					</tr>
					<tr>
						<td>CONFIRM PASSWORD</td>
						<td><input class="form-control" type="password" name="confirm" value="{{old('confirm')}}" /></td>
					</tr>
					<tr>
						<td colspan="2" class="text-end">
							<input class="btn btn-light border border-success" type="submit" value="Update" />
							<input class="btn btn-light border border-warning" type="reset" value="Clear" />
							<a href="/profile/{{ $dtuser->username }}" class="btn btn-light border border-danger">Cancel</a>
						</td>
					</tr>
					</form>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection