@extends('layout.app')
@section('content')
<div class="row justify-content-center">
	<div class="col-md-6">
		@if($message = Session::get('failed'))
			<div class="alert alert-danger alert-dismissible">
				<button type="button" class="btn-close" data-bs-dismiss="alert"></button>
				<b>{{ $message }}</b>
			</div>
		@endif
		<div class="card bg-primary-light">
			<div class="card-body text-center">
				<h2 class="card-title">Manage Show</h2>
				<table cellpadding="5" class="mt-4">
				<form action="create/process" method="post" enctype="multipart/form-data">
					@csrf
					<tr>
						<td class="fw-bold">Judul</td>
						<td><input class="form-control" type="text" name="judul" value="{{old('judul')}}" size="80" required /></td>
					</tr>
					<tr>
						<td class="fw-bold">Tanggal</td>
						<td><input class="form-control" type="date" name="tanggal" value="{{old('tanggal')}}" required /></td>
					</tr>
					<tr>
						<td class="fw-bold">Waktu</td>
						<td><input class="form-control" type="time" name="waktu" value="{{old('waktu')}}" required /></td>
					</tr>
					<tr>
						<td class="fw-bold">Poster</td>
						<td><input class="form-control" type="file" name="poster" accept=".jpg, .jpeg, .png" size="80" required></td>
					</tr>
					<tr>
						<td class="fw-bold">Lokasi</td>
						<td>
							<label class="form-check-label">
								<input type="radio" name="lokasi" value="Studio 1" required>
								Studio 1
							</label>
							<label class="form-check-label">
								<input type="radio" name="lokasi" value="Studio 2" required>
								Studio 2
							</label>
							<label class="form-check-label">
								<input type="radio" name="lokasi" value="Studio 3" required>
								Studio 3
							</label>
						</td>
					</tr>
					<tr>
						<td class="fw-bold">Harga</td>
						<td><input class="form-control" type="number" name="harga" value="{{old('harga')}}" placeholder="Masukkan Harga" required /></td>
					</tr>
					<tr>
						<td class="fw-bold">Stok</td>
						<td><input class="form-control" type="number" name="stok" value="{{old('stok')}}" placeholder="Masukkan Stok" required /></td>
					</tr>
					<tr>
						<td class="fw-bold">Keterangan</td>
						<td><input class="form-control" type="text" name="keterangan" value="{{old('keterangan')}}" size="80" required /></td>
					</tr>
					<tr>
						<td colspan="2" class="text-end">
							<input class="btn btn-success" type="submit" value="Save" />
							<input class="btn btn-warning" type="reset" value="Clear" />
							<a href="/manage" class="btn btn-danger">Cancel</a>
						</td>
					</tr>
				</form>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection