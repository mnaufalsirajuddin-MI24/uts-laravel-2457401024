@extends('layouts.app')

@section('title', 'Tambah Kamar')

@section('content')
<style>
    .create-page {
        max-width: 900px;
        margin: 20px auto;
        color: #20352b;
    }

    .create-heading {
        margin-bottom: 22px;
    }

    .create-heading h1 {
        color: #174c35;
        font-size: 30px;
        margin-bottom: 7px;
    }

    .create-heading p {
        color: #617568;
        margin: 0;
    }

    .create-card {
        background: #fff;
        border: 1px solid #b8d0c0;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 5px 16px rgba(27, 75, 49, 0.08);
    }

    .create-card-header {
        background: #236b45;
        color: #fff;
        padding: 18px 24px;
        font-size: 18px;
        font-weight: bold;
    }

    .create-form {
        padding: 26px;
    }

    .form-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 20px;
    }

    .form-group {
        display: flex;
        flex-direction: column;
        gap: 8px;
    }

    .form-group.full-width {
        grid-column: 1 / -1;
    }

    .form-group label {
        color: #294b37;
        font-size: 14px;
        font-weight: bold;
    }

    .form-group input,
    .form-group select,
    .form-group textarea {
        width: 100%;
        padding: 12px 13px;
        border: 1px solid #b8cbbd;
        border-radius: 7px;
        background: #fbfdfb;
        color: #263b2e;
        font: inherit;
    }

    .form-group input:focus,
    .form-group select:focus,
    .form-group textarea:focus {
        outline: none;
        border-color: #28734d;
        box-shadow: 0 0 0 3px rgba(40, 115, 77, 0.13);
    }

    .form-group textarea {
        min-height: 100px;
        resize: vertical;
    }

    .form-error {
        color: #b42323;
        font-size: 13px;
    }

    .form-actions {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin-top: 26px;
        padding-top: 20px;
        border-top: 1px solid #d8e4db;
    }

    .form-btn {
        display: inline-block;
        padding: 11px 18px;
        border: 0;
        border-radius: 7px;
        font-size: 14px;
        font-weight: bold;
        text-decoration: none;
        cursor: pointer;
    }

    .btn-save {
        background: #247449;
        color: #fff;
    }

    .btn-save:hover {
        background: #185536;
    }

    .btn-back {
        background: #e8eee9;
        color: #365442;
        border: 1px solid #c5d4c9;
    }

    .btn-back:hover {
        background: #d8e4dc;
    }

    @media (max-width: 650px) {
        .form-grid {
            grid-template-columns: 1fr;
        }

        .form-group.full-width {
            grid-column: auto;
        }

        .create-form {
            padding: 18px;
        }
    }
</style>

<div class="create-page">
    <div class="create-heading">
        <h1>Tambah Kamar</h1>
        <p>Masukkan informasi kamar baru ke dalam sistem.</p>
    </div>

    <section class="create-card">
        <div class="create-card-header">
            Formulir Data Kamar
        </div>

        <form action="{{ route('rooms.store') }}" method="POST" class="create-form">
            @csrf

            <div class="form-grid">
                <div class="form-group">
                    <label for="room_number">Nomor Kamar</label>
                    <input
                        type="text"
                        id="room_number"
                        name="room_number"
                        value="{{ old('room_number') }}"
                        placeholder="Contoh: A-04"
                        required
                    >
                    @error('room_number')
                        <span class="form-error">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
    <label for="floor">Lantai</label>
    <input
        type="number"
        id="floor"
        name="floor"
        min="1"
        value="{{ old('floor') }}"
        required
    >
    @error('floor')
        <span class="form-error">{{ $message }}</span>
    @enderror
</div>

                <div class="form-group">
                    <label for="building">Gedung</label>
                    <select id="building" name="building" required>
                        <option value="">-- Pilih Gedung --</option>
                        @foreach (['Gedung A', 'Gedung B', 'Gedung C', 'Gedung D', 'Gedung E'] as $building)
                            <option value="{{ $building }}"
                                {{ old('building') == $building ? 'selected' : '' }}>
                                {{ $building }}
                            </option>
                        @endforeach
                    </select>
                    @error('building')
                        <span class="form-error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="size_m2">Luas Kamar (m²)</label>
                    <input
                        type="number"
                        id="size_m2"
                        name="size_m2"
                        min="1"
                        step="1"
                        value="{{ old('size_m2') }}"
                        placeholder="Contoh: 20"
                        required
                    >
                    @error('size_m2')
                        <span class="form-error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="monthly_price">Harga per Bulan (Rp)</label>
                    <input
                        type="number"
                        id="monthly_price"
                        name="monthly_price"
                        min="0"
                        step="1"
                        value="{{ old('monthly_price') }}"
                        placeholder="Contoh: 750000"
                        required
                    >
                    @error('monthly_price')
                        <span class="form-error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="available_from">Tersedia Mulai</label>
                    <input
                        type="date"
                        id="available_from"
                        name="available_from"
                        value="{{ old('available_from') }}"
                        required
                    >
                    @error('available_from')
                        <span class="form-error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="is_occupied">Status Kamar</label>
                    <select id="is_occupied" name="is_occupied" required>
                        <option value="">-- Pilih Status --</option>
                        <option value="0" {{ old('is_occupied') === '0' ? 'selected' : '' }}>
                            Kosong
                        </option>
                        <option value="1" {{ old('is_occupied') === '1' ? 'selected' : '' }}>
                            Terisi
                        </option>
                    </select>
                    @error('is_occupied')
                        <span class="form-error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group full-width">
                    <label for="facilities">Fasilitas</label>
                    <textarea
                        id="facilities"
                        name="facilities"
                        placeholder="Contoh: Kasur, lemari, meja belajar"
                    >{{ old('facilities') }}</textarea>
                    @error('facilities')
                        <span class="form-error">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="form-actions">
                <button type="submit" class="form-btn btn-save">
                    Simpan Kamar
                </button>

                <a href="{{ route('rooms.index') }}" class="form-btn btn-back">
                    Kembali
                </a>
            </div>
        </form>
    </section>
</div>
@endsection