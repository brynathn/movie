@extends('layout.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-secondary text-white">
                    <h2 class="mb-0 text-center">{{ $judul }}</h2>
                </div>
                <div class="card-body">
                <form action="{{ route('process_beli') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-6 text-center">
                                <img src="{{ url('/photo/'.$poster) }}" class="img-fluid" alt="Poster">
                                <input type="hidden" name="poster" value="{{ url('/photo/'.$poster) }}">
                                <input type="hidden" name="judul" value="{{ $judul }}">
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3 row">
                                    <label for="nik" class="form-label col-sm-4">NIK</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="nik" name="nik" required>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="nama" class="form-label col-sm-4">Nama</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="nama" name="nama" required>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="no_hp" class="form-label col-sm-4">No. HP</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="no_hp" name="no_hp" required>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="jumlah" class="form-label col-sm-4">Jumlah</label>
                                    <div class="col-sm-8">
                                        <select class="form-select" id="jumlah" name="jumlah" required onchange="hitungTotal()">
                                            @for ($i = 1; $i <= 7; $i++)
                                                <option value="{{ $i }}">{{ $i }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="harga" class="form-label col-sm-4"><b style="color: red;">Harga</b></label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" id="harga" name="harga" value="{{ $harga }}" readonly>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="total" class="form-label col-sm-4"><b style="color: red;">Total Bayar</b></label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" id="total" name="total" readonly>
                                    </div>
                                </div>
                                <div class="d-grid gap-2">
                                    <button class="btn btn-primary" type="submit">Beli Sekarang</button>
                                    <a href="{{ url('/posting') }}" class="btn btn-secondary">Cancel</a>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="id" value="{{ $id }}">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function hitungTotal() {
        var jumlah = document.getElementById('jumlah').value;
        var harga = document.getElementById('harga').value;
        var total = jumlah * harga;
        document.getElementById('total').value = total;
    }
</script>
@endsection
