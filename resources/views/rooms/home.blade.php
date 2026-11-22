@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
<style>
    .home-page {
        min-height: 75vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 35px 20px;
    }

    .home-card {
        width: 100%;
        max-width: 850px;
        padding: 55px 45px;
        text-align: center;
        background: linear-gradient(135deg, #ffffff, #e8f5e9);
        border: 1px solid #c8e6c9;
        border-radius: 24px;
        box-shadow: 0 12px 35px rgba(27, 94, 32, 0.12);
    }

    .home-icon {
        width: 85px;
        height: 85px;
        margin: 0 auto 22px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 22px;
        background: #2e7d32;
        color: white;
        font-size: 38px;
    }

    .home-card h1 {
        margin: 0 0 15px;
        color: #1b5e20;
        font-size: 34px;
        line-height: 1.3;
    }

    .home-card p {
        max-width: 620px;
        margin: 0 auto 30px;
        color: #52745a;
        font-size: 16px;
        line-height: 1.8;
    }

    .home-button {
        display: inline-block;
        padding: 14px 28px;
        border-radius: 10px;
        background: #2e7d32;
        color: white;
        font-weight: 700;
        text-decoration: none;
        transition: 0.2s;
    }

    .home-button:hover {
        background: #1b5e20;
        color: white;
        transform: translateY(-2px);
    }

    @media (max-width: 600px) {
        .home-card {
            padding: 35px 22px;
        }

        .home-card h1 {
            font-size: 26px;
        }
    }
</style>

<div class="home-page">
    <section class="home-card">
        <div class="home-icon">⌂</div>

        <h1>Selamat Datang di Sistem Informasi Kos-Kosan</h1>

        <p>
            Sistem informasi untuk membantu pengelolaan data kamar kos,
            mulai dari melihat informasi kamar hingga menambah,
            mengubah, dan menghapus data kamar.
        </p>

        <a href="{{ route('rooms.index') }}" class="home-button">
            Lihat Data Kamar →
        </a>
    </section>
</div>
@endsection