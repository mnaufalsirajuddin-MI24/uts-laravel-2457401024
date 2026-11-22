<div style="display: grid; gap: 16px;">
    <div>
        <label for="room_number">Nomor Kamar</label>
        <input
            type="text"
            id="room_number"
            name="room_number"
            value="{{ old('room_number', $room->room_number ?? '') }}"
            required
        >
        @error('room_number')
            <p style="color: #b42318;">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="building">Gedung</label>
        <select id="building" name="building" required>
            <option value="">-- Pilih Gedung --</option>
            @foreach (['Kos Melati', 'Kos Kenanga', 'Kos Mawar'] as $building)
                <option value="{{ $building }}"
                    @selected(old('building', $room->building ?? '') == $building)>
                    {{ $building }}
                </option>
            @endforeach
        </select>
        @error('building')
            <p style="color: #b42318;">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="size_m2">Luas Kamar (m²)</label>
        <input
            type="number"
            id="size_m2"
            name="size_m2"
            min="1"
            value="{{ old('size_m2', $room->size_m2 ?? '') }}"
            required
        >
        @error('size_m2')
            <p style="color: #b42318;">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="monthly_price">Harga per Bulan (Rp)</label>
        <input
            type="number"
            id="monthly_price"
            name="monthly_price"
            min="0"
            value="{{ old('monthly_price', $room->monthly_price ?? '') }}"
            required
        >
        @error('monthly_price')
            <p style="color: #b42318;">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="available_from">Tersedia Mulai</label>
        <input
            type="date"
            id="available_from"
            name="available_from"
            value="{{ old('available_from', isset($room) && $room->available_from ? \Carbon\Carbon::parse($room->available_from)->format('Y-m-d') : '') }}"
            required
        >
        @error('available_from')
            <p style="color: #b42318;">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="is_occupied">Status Kamar</label>
        <select id="is_occupied" name="is_occupied" required>
            <option value="0"
                @selected((string) old('is_occupied', $room->is_occupied ?? '0') === '0')>
                Kosong
            </option>
            <option value="1"
                @selected((string) old('is_occupied', $room->is_occupied ?? '') === '1')>
                Terisi
            </option>
        </select>
        @error('is_occupied')
            <p style="color: #b42318;">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="facilities">Fasilitas</label>
        <textarea id="facilities" name="facilities" rows="3">{{ old('facilities', $room->facilities ?? '') }}</textarea>
        @error('facilities')
            <p style="color: #b42318;">{{ $message }}</p>
        @enderror
    </div>
</div>