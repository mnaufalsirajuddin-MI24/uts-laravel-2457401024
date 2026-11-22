@extends('layouts.app')

@section('content')
<style>
    .detail-page {
        max-width: 1000px;
        margin: 35px auto;
        padding: 0 20px;
    }

    .detail-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 16px;
        margin-bottom: 24px;
    }

    .detail-header h1 {
        margin: 0 0 8px;
        color: #183f3b;
        font-size: 28px;
    }

    .detail-header p {
        margin: 0;
        color: #64748b;
    }

    .detail-card {
        background: #fff;
        border: 1px solid #e2e8f0;
        border-radius: 14px;
        overflow: hidden;
        box-shadow: 0 8px 24px rgba(15, 23, 42, .06);
    }

    .detail-card-title {
        background: #245e59;
        color: #fff;
        padding: 18px 24px;
        font-size: 18px;
        font-weight: 700;
    }

    .detail-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 0;
        padding: 10px 24px;
    }

    .detail-item {
        padding: 18px 10px;
        border-bottom: 1px solid #edf2f7;
    }

    .detail-item.full {
        grid-column: 1 / -1;
    }

    .detail-label {
        display: block;
        color: #64748b;
        font-size: 13px;
        margin-bottom: 7px;
    }

    .detail-value {
        color: #1e293b;
        font-size: 16px;
        font-weight: 600;
        overflow-wrap: anywhere;
    }

    .status-badge {
        display: inline-block;
        padding: 6px 13px;
        border-radius: 20px;
        font-size: 13px;
        font-weight: 700;
    }

    .status-empty {
        background: #dcfce7;
        color: #166534;
    }

    .status-occupied {
        background: #fee2e2;
        color: #991b1b;
    }

    .detail-actions {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        padding: 20px 24px;
        background: #f8fafc;
        border-top: 1px solid #e2e8f0;
    }

    .detail-btn {
        display: inline-block;
        padding: 10px 18px;
        border-radius: 8px;
        text-decoration: none;
        font-weight: 600;
        border: 0;
        cursor: pointer;
        font-size: 14px;
    }

    .btn-back {
        background: #e2e8f0;
        color: #334155;
    }

    .btn-edit {
        background: #245e59;
        color: #fff;
    }

    @media (max-width: 600px) {
        .detail-grid {
            grid-template-columns: 1fr;
            padding: 8px 16px;
        }

        .detail-item.full {
            grid-column: auto;
        }

        .detail-header {
            align-items: flex-start;
            flex-direction: column;
        }
    }
</style>

<div class="detail-page">
    <div class="detail-header">
        <div>
            <h1>Detail Kamar</h1>
            <p>Informasi lengkap kamar kos yang dipilih.</p>
        </div>

        <a href="{{ route('rooms.index') }}" class="detail-btn btn-back">
            Kembali ke Data Kamar
        </a>
    </div>

    <section class="detail-card">
        <div class="detail-card-title">
            Informasi Kamar
        </div>

        <div class="detail-grid">
            <div class="detail-item">
                <span class="detail-label">Nomor Kamar</span>
                <div class="detail-value">{{ $room->room_number }}</div>
            </div>

            <div class="detail-item">
                <span class="detail-label">Gedung</span>
                <div class="detail-value">{{ $room->building }}</div>
            </div>

            <div class="detail-item">
                <span class="detail-label">Luas Kamar</span>
                <div class="detail-value">{{ $room->size_m2 }} m²</div>
            </div>

            <div class="detail-item">
                <span class="detail-label">Harga per Bulan</span>
                <div class="detail-value">
                    Rp {{ number_format($room->monthly_price, 0, ',', '.') }}
                </div>
            </div>

            <div class="detail-item">
                <span class="detail-label">Tersedia Mulai</span>
                <div class="detail-value">
                    {{ \Carbon\Carbon::parse($room->available_from)->format('d/m/Y') }}
                </div>
            </div>

            <div class="detail-item">
                <span class="detail-label">Status Kamar</span>
                <div class="detail-value">
                    @if ($room->is_occupied)
                        <span class="status-badge status-occupied">Terisi</span>
                    @else
                        <span class="status-badge status-empty">Kosong</span>
                    @endif
                </div>
            </div>

            <div class="detail-item full">
                <span class="detail-label">Fasilitas</span>
                <div class="detail-value">
                    {{ $room->facilities ?: 'Tidak ada fasilitas yang dicatat.' }}
                </div>
            </div>
        </div>

        <div class="detail-actions">
            <a href="{{ route('rooms.index') }}" class="detail-btn btn-back">
                Kembali
            </a>

            <a href="{{ route('rooms.edit', $room) }}" class="detail-btn btn-edit">
                Edit Kamar
            </a>
        </div>
    </section>
</div>
@endsection