@extends('layout.app')
@section('content')

<style>
    .card-body h4 {
        text-align: center;
        font-size: 2em;
        font-weight: 700;
    }

    .itemFlex {
        display: flex;
        justify-content: row;
        justify-content: space-around;
    }

    .info {
        display: flex;
        justify-content: space-between;
        margin-bottom: 1.5em;
        /* Optional: Add margin between each set of label and value */
    }

    .label {
        flex: 1;
        text-align: left;
        margin-right: 5px;
        font-weight: 700;
    }

    .separator {
        margin: 0 6px;
    }

    .value {
        flex: 1;
        text-align: left;
        margin-left: 15px;
    }
</style>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 shadow">
                <div class="card-body">
                    <h4 class="mb-4">SALE</h4>
                    @forelse ($dtbeli as $d)
                    <div class="mb-4 border-bottom itemFlex">
                        <div class="flexItems">
                            <img src="{{url('/photo/'.$d->poster)}}" width="300" height="300" class="img-fluid">
                        </div>
                        <div class="flexItems fs-5">
                            <p class="mb-4 text-center fs-2 fw-bold">{{ $d->judul }}</p>
                            <div class="info">
                                <span class="label">Nik</span>
                                <span class="separator">:</span>
                                <span class="value"> {{ $d->nik }}</span>
                            </div>
                            <div class="info">
                                <span class="label">Nama</span>
                                <span class="separator">:</span>
                                <span class="value"> {{ $d->nama }}</span>
                            </div>
                            <div class="info">
                                <span class="label">No HP</span>
                                <span class="separator">:</span>
                                <span class="value"> {{ $d->no_hp }}</span>
                            </div>
                            <div class="info">
                                <span class="label">Jumlah</span>
                                <span class="separator">:</span>
                                <span class="value"> {{ $d->jumlah }}</span>
                            </div>
                            <div class="info">
                                <span class="label">Total Bayar</span>
                                <span class="separator">:</span>
                                <span class="value"> {{ $d->total_harga }}</span>
                            </div>
                        </div>
                    </div>
                    @empty
                    <p>No data available</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection