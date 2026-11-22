@extends('layouts.app')

@section('title', 'Data Kamar')

@section('content')
<style>
    .rooms-page {
        color: #20352b;
    }

    .page-heading {
        margin-bottom: 24px;
    }

    .page-heading h1 {
        color: #174c35;
        font-size: 30px;
        margin-bottom: 6px;
    }

    .page-heading p {
        color: #617568;
        margin: 0;
    }

    .room-stats {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 18px;
        margin-bottom: 28px;
    }

    .room-stat {
        background: #fff;
        border: 1px solid #cbded1;
        border-left: 5px solid #28734d;
        border-radius: 10px;
        padding: 20px 22px;
        box-shadow: 0 4px 12px rgba(27, 75, 49, 0.08);
    }

    .room-stat span {
        display: block;
        color: #62776a;
        font-size: 14px;
        margin-bottom: 8px;
    }

    .room-stat strong {
        color: #174c35;
        font-size: 28px;
    }

    .table-card {
        background: #fff;
        border: 1px solid #b8d0c0;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 14px rgba(27, 75, 49, 0.08);
    }

    .table-heading {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 15px;
        padding: 20px 22px;
        background: #edf6ef;
        border-bottom: 1px solid #b8d0c0;
    }

    .table-heading h2 {
        margin: 0;
        color: #174c35;
        font-size: 21px;
    }

    .btn {
        display: inline-block;
        border: 0;
        border-radius: 6px;
        padding: 9px 13px;
        color: #fff;
        font-size: 13px;
        font-weight: bold;
        text-decoration: none;
        cursor: pointer;
    }

    .btn-add {
        background: #247449;
    }

    .btn-add:hover {
        background: #185536;
    }

    .table-wrap {
        width: 100%;
        overflow-x: auto;
    }

    .rooms-table {
        width: 100%;
        border-collapse: collapse;
        min-width: 950px;
    }

    .rooms-table thead {
        background: #236b45;
        color: #fff;
    }

    .rooms-table th {
        padding: 14px 12px;
        text-align: left;
        font-size: 13px;
        border: 1px solid #1b5939;
        white-space: nowrap;
    }

    .rooms-table td {
        padding: 13px 12px;
        border: 1px solid #cbd8ce;
        color: #344b3c;
        font-size: 14px;
        vertical-align: middle;
    }

    .rooms-table tbody tr:nth-child(even) {
        background: #f0f7f2;
    }

    .rooms-table tbody tr:nth-child(odd) {
        background: #fff;
    }

    .rooms-table tbody tr:hover {
        background: #e0f0e5;
    }

    .status {
        display: inline-block;
        padding: 5px 10px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: bold;
    }

    .status-empty {
        background: #d9f3e3;
        color: #17643a;
    }

    .status-filled {
        background: #fde3e3;
        color: #a52c2c;
    }

    .actions {
        display: flex;
        align-items: center;
        gap: 6px;
        white-space: nowrap;
    }

    .btn-detail {
        background: #2878c7;
    }

    .btn-edit {
        background: #d58a2b;
    }

    .btn-delete {
        background: #c94343;
    }

    .btn-detail:hover {
        background: #1b5d9e;
    }

    .btn-edit:hover {
        background: #b36b18;
    }

    .btn-delete:hover {
        background: #a92e2e;
    }

    .empty-data {
        padding: 30px !important;
        text-align: center;
        color: #6b7d70 !important;
    }

    @media (max-width: 700px) {
        .room-stats {
            grid-template-columns: 1fr;
        }

        .table-heading {
            align-items: flex-start;
            flex-direction: column;
        }

        .page-heading h1 {
            font-size: 25px;
        }
    }

    .room-stat {
    display: block;
    text-decoration: none;
    cursor: pointer;
}

.room-stat:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 18px rgba(27, 94, 32, 0.15);
}
</style>

<div class="rooms-page">
    <div class="page-heading">
        <h1>Data Kamar</h1>
        <p>Kelola informasi kamar yang tersedia di Sistem Informasi Kos.</p>
    </div>

    <div class="room-stats">
    <a href="{{ route('rooms.index') }}" class="room-stat">
        <span>Total Kamar</span>
        <strong>{{ $totalRooms }}</strong>
    </a>

    <a href="{{ route('rooms.index', ['filter' => 'kosong']) }}" class="room-stat">
        <span>Kamar Kosong</span>
        <strong>{{ $availableRooms }}</strong>
    </a>

    <a href="{{ route('rooms.index', ['filter' => 'terisi']) }}" class="room-stat">
        <span>Kamar Terisi</span>
        <strong>{{ $occupiedRooms }}</strong>
    </a>
</div>

    <section class="table-card">
        <div class="table-heading">
            <h2>Daftar Kamar</h2>
            <a href="{{ route('rooms.create') }}" class="btn btn-add">
                + Tambah Kamar
            </a>
        </div>

        <div class="table-wrap">
            <table class="rooms-table">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nomor Kamar</th>
                        <th>Gedung</th>
                        <th>Luas (m²)</th>
                        <th>Harga/Bulan</th>
                        <th>Tersedia Mulai</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($rooms as $room)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $room->room_number }}</td>
                            <td>{{ $room->building }}</td>
                            <td>{{ $room->size_m2 }} m²</td>
                            <td>Rp {{ number_format($room->monthly_price, 0, ',', '.') }}</td>
                            <td>{{ \Carbon\Carbon::parse($room->available_from)->format('d-m-Y') }}</td>
                            <td>
                                @if ($room->is_occupied)
                                    <span class="status status-filled">Terisi</span>
                                @else
                                    <span class="status status-empty">Kosong</span>
                                @endif
                            </td>
                            <td>
                                <div class="actions">
                                    <a href="{{ route('rooms.show', $room) }}" class="btn btn-detail">Detail</a>
                                    <a href="{{ route('rooms.edit', $room) }}" class="btn btn-edit">Edit</a>

                                    <form action="{{ route('rooms.destroy', $room) }}"
                                          method="POST"
                                          onsubmit="return confirm('Yakin ingin menghapus kamar ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-delete">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="empty-data">
                                Belum ada data kamar.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>
</div>
@endsection