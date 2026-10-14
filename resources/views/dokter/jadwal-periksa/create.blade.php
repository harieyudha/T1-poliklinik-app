<x-layouts.app>
    <h1 class="text-2xl font-bold text-slate-800 mb-6">Tambah Jadwal Periksa</h1>

    <div class="bg-white rounded-xl shadow border border-slate-200 p-6 max-w-2xl">
        <form action="{{ route('jadwal-periksa.store') }}" method="POST" class="space-y-5">
            @csrf

            <div>
                <label for="hari" class="block text-sm font-medium text-slate-700 mb-1">Hari</label>
                <select id="hari" name="hari"
                        class="w-full rounded-lg border {{ $errors->has('hari') ? 'border-red-500' : 'border-slate-300' }} px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    <option value="">-- Pilih Hari --</option>
                    @foreach ($hariList as $hari)
                        <option value="{{ $hari }}" {{ old('hari') === $hari ? 'selected' : '' }}>{{ $hari }}</option>
                    @endforeach
                </select>
                @error('hari') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                <div>
                    <label for="jam_mulai" class="block text-sm font-medium text-slate-700 mb-1">Jam Mulai</label>
                    <input type="time" id="jam_mulai" name="jam_mulai" value="{{ old('jam_mulai') }}"
                           class="w-full rounded-lg border {{ $errors->has('jam_mulai') ? 'border-red-500' : 'border-slate-300' }} px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    @error('jam_mulai') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label for="jam_selesai" class="block text-sm font-medium text-slate-700 mb-1">Jam Selesai</label>
                    <input type="time" id="jam_selesai" name="jam_selesai" value="{{ old('jam_selesai') }}"
                           class="w-full rounded-lg border {{ $errors->has('jam_selesai') ? 'border-red-500' : 'border-slate-300' }} px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    @error('jam_selesai') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                </div>
            </div>


            <div>
    <!-- <label for="status" class="block text-sm font-medium text-slate-700 mb-1">Status</label>
    <select name="status" id="status"
            class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm">
        <option value="0" {{ old('status', 0) == 0 ? 'selected' : '' }}>Tidak Aktif</option>
        <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Aktif</option>
    </select>
</div> -->


            <div class="flex gap-2 pt-2">
                <button type="submit" class="px-5 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-semibold rounded-lg">Simpan</button>
                <a href="{{ route('jadwal-periksa.index') }}" class="px-5 py-2.5 bg-slate-200 hover:bg-slate-300 text-slate-700 text-sm font-semibold rounded-lg">Batal</a>
            </div>
        </form>
    </div>
</x-layouts.app>