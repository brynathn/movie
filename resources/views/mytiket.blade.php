@extends('layout.app')
@section('content')
<style>
    .ticket {
        border: 2px solid #dcdcdc;
        border-radius: 15px;
        margin-bottom: 20px;
        transition: transform 0.3s ease-in-out;
        background-color: #f8f9fa;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .ticket:hover {
        transform: scale(1.05);
    }

    .ticket-content {
        display: flex;
        justify-content: space-between;
    }

    .ticket-left {
        flex: 1;
        align-items: center;
    }

    .ticket-right {
        flex: 1;
        padding: 20px;
    }

    .label {
        font-weight: bold;
    }

    .separator {
        margin: 0 5px;
    }

    .value {
        flex: 1;
        text-align: left;
    }

    .ticket th,
    .ticket td {
        padding: 10px;
        text-align: left;
    }

    .ticket h5 {
        color: #343a40;
    }

    .ticket h3 {
        font-weight: bolder;
    }

    .img-container {
        text-align: center;
        /* Menengahkan elemen secara horizontal */
    }
</style>

<div class="row">
    <div class="col-md-8 mx-auto">
        <div class="card border-0 shadow">
            <div class="judul text-center mt-4">
                <h3><strong>Detail Pembelian</strong></h3>
            </div>
            <div class="card-body">
                @foreach ($dtbeli as $d)
                <div class="ticket">
                    <div class="ticket-content">
                        <div class="ticket-left">
                            <div class="img-container">
                                <img src="{{url('/photo/'.$d->poster)}}" width="300" height="300" class="img-fluid">
                            </div>
                        </div>
                        <div class="ticket-right d-flex flex-column gap-4">
                            <h3 class="text-center">{{ $d->judul }}</h3>
                            <div class="d-flex">
                                <span class="label me-2">Nik</span>
                                <span class="separator">:</span>
                                <span class="value">{{ $d->nik }}</span>
                            </div>
                            <div class="d-flex">
                                <span class="label me-2">Nama</span>
                                <span class="separator">:</span>
                                <span class="value">{{ $d->nama }}</span>
                            </div>
                            <div class="d-flex">
                                <span class="label me-2">No HP</span>
                                <span class="separator">:</span>
                                <span class="value">{{ $d->no_hp }}</span>
                            </div>
                            <div class="d-flex">
                                <span class="label me-2">Jumlah</span>
                                <span class="separator">:</span>
                                <span class="value">{{ $d->jumlah }}</span>
                            </div>
                            <div class="d-flex">
                                <span class="label me-2">Total Bayar</span>
                                <span class="separator">:</span>
                                <span class="value">{{ $d->total_harga }}</span>
                            </div>
                            <div class="d-flex">
                                <form action="{{ route('hapus_pembelian', $d->nik) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-light me-2 border border-danger" onclick="return confirm('Apakah Anda yakin membatalkan pembelian ini?')">Cancel Order</button>
                                </form>
                                <form action="{{ route('edit_pembelian', $d->nik) }}" method="get">
                                    @csrf
                                    <button type="submit" class="btn btn-light border border-warning">Ubah Nama / No HP</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection