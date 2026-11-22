@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
    <section style="background: white; padding: 40px; border: 1px solid #b7cbbd; border-radius: 10px;">
        <h1 style="color: #236b45; margin-bottom: 15px;">
            Selamat Datang di Sistem Informasi Kos-kosan
        </h1>

        <p style="line-height: 1.7; margin-bottom: 25px;">
            Sistem informasi ini membantu mengelola data kamar kos, mulai dari
            melihat daftar kamar hingga menambah, mengubah, dan menghapus data.
        </p>

        <a href="{{ route('rooms.index') }}" class="btn">
            Masuk ke Data Kamar
        </a>
    </section>
@endsection