@extends('layout.app')
@section('content')
<style>
    .itemFlex {
        display: flex;
        justify-content: space-around;
    }

    .info {
        display: flex;
        justify-content: space-between;
        margin-bottom: 1.5em;
        /* Optional: Add margin between each set of label and value */
    }

    .imgContent img{
        width: 250px;
        height: 400px;
        object-fit: cover;
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

    @media screen and (max-width: 1200px) {
        .itemFlex {
        flex-direction: column;
        align-items: center;
        font-size: medium;
    }
    }
</style>
<div class="row justify-content-center">
    <div class="col-md-10">
        @if($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <b>{{ $message }}</b>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @elseif($message = Session::get('failed'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <b>{{ $message }}</b>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <h2 class="text-center mb-4 fw-bold text-white">Show List</h2>
        <a href="/manage/create" class="btn btn-outline-success mb-3"><i class="bi bi-plus-lg"></i> Add Show</a>
        <div class="row row-cols-1 row-cols-md-2 g-4 content">
            @foreach ($dtpost as $p)
            <div class="col">
                <div class="card h-100">
                    <div class="card-body itemFlex">
                        <div class="flexItems imgContent me-3">
                            <img src="{{ url('/photo/'.$p->poster) }}"  class="">
                        </div>
                        <div class="flexItems fs-6">
                            <h5 class="card-title text-center fs-4 fw-bold mb-4"> {{ $p->Judul }}</h5>
                            <div class="info">
                                <span class="label">Tanggal</span>
                                <span class="separator">:</span>
                                <span class="value"> {{ $p->tanggal }}</span>
                            </div>
                            <div class="info">
                                <span class="label">Waktu</span>
                                <span class="separator">:</span>
                                <span class="value"> {{ $p->waktu }}</span>
                            </div>
                            <div class="info">
                                <span class="label">Lokasi</span>
                                <span class="separator">:</span>
                                <span class="value"> {{ $p->lokasi }}</span>
                            </div>
                            <div class="info">
                                <span class="label">Harga</span>
                                <span class="separator">:</span>
                                <span class="value"> {{ $p->harga }}</span>
                            </div>
                            <div class="info">
                                <span class="label">Stok</span>
                                <span class="separator">:</span>
                                <span class="value"> {{ $p->stok }}</span>
                            </div>
                            <div class="info">
                                <span class="label">Keterangan</span>
                                <span class="separator">:</span>
                                <span class="value"> {{ $p->keterangan }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center gap-4 mb-4">
                        <button class="btn btn-success me-2 btn-lg" title="Update" onclick="window.location.href='/manage/update/{{ $p->id }}/';">
                            <i class="bi bi-pencil-fill"></i>
                        </button>
                        <button class="btn btn-danger btn-lg" title="Delete" onclick="window.location.href='/manage/delete/{{ $p->id }}&{{ $p->poster }}';">
                            <i class="bi bi-trash3-fill"></i>
                        </button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
<style>
    .content {
        padding-bottom: 50px;
        /* Sesuaikan dengan tinggi footer yang diinginkan */
    }
</style>