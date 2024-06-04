@extends('layout.app')

@section('content')
<style>
    .card {
        transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        border-radius: 8px;
    }

    .card:hover {
        transform: scale(1.05);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }

    .content {
        padding-bottom: 50px;
    }

    .card-body img {
        width: 300px;
        height: 400px;
    }

    .card-body .card-title {
        font-size: 1.5rem;
        font-weight: bold;
    }

    .card-body .card-text {
        margin-bottom: 1.3rem;
    }

    .card-body .text-center a {
        display: inline-block;
        margin-top: 1.5rem;
    }
</style>

<h2 class="text-center mb-4 text-white">Event Pilihan</h2>
<div class="row row-cols-1 row-cols-md-2 g-4 content">
    @foreach ($dtpost as $p)
    <div class="col">
        <div class="card h-100">
            <div class="card-body d-flex justify-content-around">
                <div class="me-3">
                    <img src="{{ url('/photo/'.$p->poster) }}" alt="{{ $p->Judul }}" class="img-fluid">
                </div>
                <div>
                    <h5 class="card-title fs-4 fw-bold">{{ $p->Judul }}</h5>
                    <p class="card-text"><strong>Tanggal:</strong> {{ $p->tanggal }}</p>
                    <p class="card-text"><strong>Waktu:</strong> {{ $p->waktu }}</p>
                    <p class="card-text"><strong>Lokasi:</strong> {{ $p->lokasi }}</p>
                    <p class="card-text"><strong>Harga:</strong> {{ $p->harga }}</p>
                    <p class="card-text"><strong>Stok:</strong> {{ $p->stok }}</p>
                    <p class="card-text"><strong>Keterangan:</strong> {{ $p->keterangan }}</p>
                    <div class="text-center mt-3">
                        <a href="{{ route('beli.show', ['id' => $p->id, 'judul' => $p->Judul, 'poster' => $p->poster, 'harga' => $p->harga]) }}" class="btn btn-primary">
                            <i class="bi bi-plus-lg"></i> Buy Now
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection