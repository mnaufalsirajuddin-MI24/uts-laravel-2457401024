<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function home()
    {
        return view('rooms.home');
    }

    public function index(Request $request)
{
    // Angka kartu dihitung dari seluruh data kamar
    $totalRooms = Room::count();
    $occupiedRooms = Room::where('is_occupied', true)->count();
    $availableRooms = Room::where('is_occupied', false)->count();

    // Filter hanya memengaruhi daftar tabel
    $query = Room::query();
    $filter = $request->query('filter');

    if ($filter === 'kosong') {
        $query->where('is_occupied', false);
    } elseif ($filter === 'terisi') {
        $query->where('is_occupied', true);
    }

    $rooms = $query->latest()->get();

    return view('rooms.index', compact(
        'rooms',
        'totalRooms',
        'availableRooms',
        'occupiedRooms'
    ));
}
    public function create()
    {
        return view('rooms.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'room_number' => 'required|string|max:20|unique:rooms,room_number',
            'building' => 'required|in:Gedung A,Gedung B,Gedung C,Gedung D,Gedung E',
            'size_m2' => 'required|integer|min:1',
            'monthly_price' => 'required|numeric|min:0',
            'available_from' => 'required|date',
            'is_occupied' => 'required|boolean',
            'facilities' => 'nullable|string',
            'floor' => 'required|integer|min:1',
        ]);

        Room::create($validated);

        return redirect()
            ->route('rooms.index')
            ->with('success', 'Data kamar berhasil ditambahkan.');
    }

    public function show(Room $room)
    {
        return view('rooms.show', compact('room'));
    }

    public function edit(Room $room)
    {
        return view('rooms.edit', compact('room'));
    }

    public function update(Request $request, Room $room)
    {
        $validated = $request->validate([
            'room_number' => 'required|string|max:20|unique:rooms,room_number,' . $room->id,
            'building' => 'required|in:Gedung A,Gedung B,Gedung C,Gedung D,Gedung E',
            'size_m2' => 'required|integer|min:1',
            'monthly_price' => 'required|numeric|min:0',
            'available_from' => 'required|date',
            'is_occupied' => 'required|boolean',
            'facilities' => 'nullable|string',
        ]);

        $room->update($validated);

        return redirect()
            ->route('rooms.index')
            ->with('success', 'Data kamar berhasil diperbarui.');
    }

    public function destroy(Room $room)
    {
        $room->delete();

        return redirect()
            ->route('rooms.index')
            ->with('success', 'Data kamar berhasil dihapus.');
    }
}