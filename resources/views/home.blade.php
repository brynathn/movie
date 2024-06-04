@extends('layout.app')
@section('content')
<style>
    body {
        font-family: 'Roboto', sans-serif;
        background-color: #f8f9fa;
    }

    h2 {
        color: #3498db;
    }

    .lead {
        font-size: 1.25rem;
        color: #555;
    }

    img {
        max-width: 100%;
        height: auto;
    }

    .event-container {
        margin-top: 20px;
        justify-content: space-around;
    }

    .event-card {
        max-width: 350px;
        margin-bottom: 20px;
        border: 1px solid #ddd;
        border-radius: 10px;
        transition: transform 0.3s ease-in-out;
        overflow: hidden;
    }

    .event-card img {
        width: 100%;
        height: 500px;
        object-fit: cover;
    }

    .event-card:hover {
        transform: scale(1.05);
    }

    .event-title {
        font-weight: bold;
        text-align: center;
        margin-top: 10px;
        color: #333;
    }

    .background_image {
        position: relative;

    }

    .background_image img {
        filter: brightness(60%);
    }

    .title-overlay {
        font-weight: 700;
        font-size: 60px;
        position: absolute;
        top: 70%;
        left: 50%;
        transform: translate(-50%, -50%);
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
    }

    .text-overlay {
        font-weight: 500;
        font-size: 13px;
        position: absolute;
        top: 77%;
        left: 50%;
        transform: translate(-50%, -50%);
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
    }
</style>

<div class="row">
    <div class="col-md-12">
        <div class="background_image">
            <img src="{{ asset('photo/background_movie.png') }}" class="img-fluid" />
            <h1 class="title-overlay text-danger">Bry<span class="text-white">Flix</span></h1>
            <p class="text-overlay text-white">Number #1 Movie Ticket Store</p>
        </div>

        <h1 class="mt-3 text-center text-white"><b>Movie Show</b></h1>

        <div class="d-flex flex-wrap event-container">
            @foreach ($dtpost as $p)
            <div class="me-3 mb-4 event-card">
                <img src="{{ url('/photo/'.$p->poster) }}" alt="{{ $p->Judul }}">
                <p class="text-center mt-2 event-title text-white">{{ $p->Judul }}</p>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection