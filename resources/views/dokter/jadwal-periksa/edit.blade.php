<x-layouts.app>
    <h1 class="text-2xl font-bold text-slate-800 mb-6">Edit Jadwal Periksa</h1>

    <div class="bg-white rounded-xl shadow border border-slate-200 p-6 max-w-xl">
        <form action="{{ route('jadwal-periksa.update', $jadwal) }}" method="POST" class="space-y-5">
            @csrf
            @method('PUT')

            <div>
                <label for="hari" class="block text-sm font-medium text-slate-700 mb-1">Hari</label>
                <select name="hari" id="hari"
                        class="w-full rounded-lg border px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 @error('hari') border-red-500 @else border-slate-300 @enderror">
                    @foreach ($hariList as $hari)
                        <option value="{{ $hari }}" {{ old('hari', $jadwal->hari) === $hari ? 'selected' : '' }}>{{ $hari }}</option>
                    @endforeach
                </select>
                @error('hari')
                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="jam_mulai" class="block text-sm font-medium text-slate-700 mb-1">Jam Mulai</label>
                <input type="time" name="jam_mulai" id="jam_mulai"
                       class="w-full rounded-lg border px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 @error('jam_mulai') border-red-500 @else border-slate-300 @enderror"
                       value="{{ old('jam_mulai', \Carbon\Carbon::parse($jadwal->jam_mulai)->format('H:i')) }}">
                @error('jam_mulai')
                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="jam_selesai" class="block text-sm font-medium text-slate-700 mb-1">Jam Selesai</label>
                <input type="time" name="jam_selesai" id="jam_selesai"
                       class="w-full rounded-lg border px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 @error('jam_selesai') border-red-500 @else border-slate-300 @enderror"
                       value="{{ old('jam_selesai', \Carbon\Carbon::parse($jadwal->jam_selesai)->format('H:i')) }}">
                @error('jam_selesai')
                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- <div>
                <label for="status" class="block text-sm font-medium text-slate-700 mb-1">Status</label>
                <select name="status" id="status"
                        class="w-full rounded-lg border px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 @error('status') border-red-500 @else border-slate-300 @enderror">
                    <option value="1" {{ old('status', $jadwal->status ? 1 : 0) == 1 ? 'selected' : '' }}>Aktif</option>
                    <option value="0" {{ old('status', $jadwal->status ? 1 : 0) == 0 ? 'selected' : '' }}>Tidak Aktif</option>
                </select>
                @error('status')
                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                @enderror
                <p class="mt-1 text-xs text-slate-500">Hanya satu jadwal yang bisa aktif. Mengaktifkan jadwal ini akan menonaktifkan jadwal lainnya.</p>
            </div> -->

            <div class="flex gap-2 pt-2">
                <a href="{{ route('jadwal-periksa.index') }}"
                   class="px-5 py-2.5 bg-slate-200 hover:bg-slate-300 text-slate-700 text-sm font-semibold rounded-lg">Batal</a>
                <button type="submit"
                        class="px-5 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-semibold rounded-lg shadow">Perbarui</button>
            </div>
        </form>
    </div>
</x-layouts.app>