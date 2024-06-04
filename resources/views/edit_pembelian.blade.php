@extends('layout.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card border-info">
                <div class="card-body text-center">
                    <h4 class="card-title mb-4">Edit Tiket</h4>
                    <hr class="mb-4"> <!-- Garis pemisah -->
                    <form action="{{ route('update_pembelian', $data->nik) }}" method="post">
                        @csrf
                        @method('put')
                        <div class="mb-3 row">
                            <label for="nama" class="form-label col-sm-4 col-form-label">Nama:</label>
                            <div class="col-sm-8">
                                <input class="form-control" type="text" name="nama" value="{{ $data->nama }}" required />
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="no_hp" class="form-label col-sm-4 col-form-label">No HP:</label>
                            <div class="col-sm-8">
                                <input class="form-control" type="text" name="no_hp" value="{{ $data->no_hp }}" required />
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-sm-8 offset-sm-4">
                                <button class="btn btn-light me-2 border border-primary" type="submit">Update</button>
                                <a href="/mytiket/" class="btn btn-light me-2 border border-danger">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
