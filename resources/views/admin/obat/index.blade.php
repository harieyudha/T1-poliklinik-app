<x-layouts.app>
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold text-slate-800">Data Obat</h1>
        <a href="{{ route('obat.create') }}"
           class="inline-flex items-center gap-2 px-5 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-semibold rounded-lg shadow">
            <span class="text-lg leading-none">+</span> Tambah Obat
        </a>
    </div>

    <!-- @if (session('success'))
        <div class="mb-4 px-4 py-3 rounded-lg bg-green-100 text-green-800 text-sm">
            {{ session('success') }}
        </div>
    @endif -->

    <div class="bg-white rounded-xl shadow border border-slate-200 overflow-x-auto">
        <table class="w-full text-sm text-left">
            <thead class="border-b border-slate-200 text-xs uppercase text-slate-500">
                <tr>
                    <th class="px-6 py-4">Nama Obat</th>
                    <th class="px-6 py-4">Kemasan</th>
                    <th class="px-6 py-4">Harga</th>
                    <th class="px-6 py-4 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse ($obats as $obat)
                    <tr class="hover:bg-slate-50">
                        <td class="px-6 py-4 font-medium text-slate-800">{{ $obat->nama_obat }}</td>
                        <td class="px-6 py-4 text-slate-600">{{ $obat->kemasan }}</td>
                        <td class="px-6 py-4 text-slate-600">Rp {{ number_format($obat->harga, 0, ',', '.') }}</td>
                        <td class="px-6 py-4">
                            <div class="flex justify-end gap-2">
                                <a href="{{ route('obat.edit', $obat) }}"
                                   class="px-3 py-1.5 bg-orange-500 hover:bg-orange-600 text-white text-xs font-semibold rounded-md">Edit</a>
                                <form action="{{ route('obat.destroy', $obat) }}" method="POST"
                                      onsubmit="return confirm('Yakin ingin menghapus obat ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="px-3 py-1.5 bg-red-500 hover:bg-red-600 text-white text-xs font-semibold rounded-md">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-6 py-8 text-center text-slate-400">Belum ada data obat.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">{{ $obats->links() }}</div>
</x-layouts.app>