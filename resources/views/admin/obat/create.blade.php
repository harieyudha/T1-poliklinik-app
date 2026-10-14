<x-layouts.app>
    <h1 class="text-2xl font-bold text-slate-800 mb-6">Tambah Obat</h1>

    <div class="bg-white rounded-xl shadow border border-slate-200 p-6 max-w-2xl">
        <form action="{{ route('obat.store') }}" method="POST" class="space-y-5">
            @csrf

            <div>
                <label for="nama_obat" class="block text-sm font-medium text-slate-700 mb-1">Nama Obat</label>
                <input type="text" id="nama_obat" name="nama_obat" value="{{ old('nama_obat') }}"
                       class="w-full rounded-lg border {{ $errors->has('nama_obat') ? 'border-red-500' : 'border-slate-300' }} px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                @error('nama_obat') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="kemasan" class="block text-sm font-medium text-slate-700 mb-1">Kemasan</label>
                <input type="text" id="kemasan" name="kemasan" value="{{ old('kemasan') }}" placeholder="Contoh: Strip 10 tablet"
                       class="w-full rounded-lg border {{ $errors->has('kemasan') ? 'border-red-500' : 'border-slate-300' }} px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                @error('kemasan') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="harga" class="block text-sm font-medium text-slate-700 mb-1">Harga</label>
                <input type="number" min="0" id="harga" name="harga" value="{{ old('harga') }}"
                       class="w-full rounded-lg border {{ $errors->has('harga') ? 'border-red-500' : 'border-slate-300' }} px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                @error('harga') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
            </div>

            <div class="flex gap-2 pt-2">
                <button type="submit" class="px-5 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-semibold rounded-lg">Simpan</button>
                <a href="{{ route('obat.index') }}" class="px-5 py-2.5 bg-slate-200 hover:bg-slate-300 text-slate-700 text-sm font-semibold rounded-lg">Batal</a>
            </div>
        </form>
    </div>
</x-layouts.app>