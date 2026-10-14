<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use App\Models\JadwalPeriksa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class JadwalPeriksaController extends Controller
{
    private const HARI = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];

    public function index()
    {
        $jadwals = JadwalPeriksa::where('id_dokter', Auth::id())
            ->orderByRaw("FIELD(hari, 'Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu')")
            ->orderBy('jam_mulai')
            ->get();

        return view('dokter.jadwal-periksa.index', compact('jadwals'));
    }

    public function create()
    {
        return view('dokter.jadwal-periksa.create', ['hariList' => self::HARI]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate($this->rules(), $this->messages());

        if ($this->bentrok(Auth::id(), $validated)) {
            return back()->withInput()
                ->withErrors(['jam_mulai' => 'Jadwal bentrok dengan jadwal lain di hari yang sama.']);
        }

        JadwalPeriksa::create([
            'id_dokter'   => Auth::id(),
            'hari'        => $validated['hari'],
            'jam_mulai'   => $validated['jam_mulai'],
            'jam_selesai' => $validated['jam_selesai'],
        ]);

        return redirect()->route('jadwal-periksa.index')
            ->with('success', 'Jadwal periksa berhasil ditambahkan.');
    }

    public function edit(JadwalPeriksa $jadwalPeriksa)
    {
        $this->authorizeOwner($jadwalPeriksa);

        return view('dokter.jadwal-periksa.edit', [
            'jadwal'   => $jadwalPeriksa,
            'hariList' => self::HARI,
        ]);
    }

    public function update(Request $request, JadwalPeriksa $jadwalPeriksa)
    {
        $this->authorizeOwner($jadwalPeriksa);

        $validated = $request->validate($this->rules(), $this->messages());

        if ($this->bentrok(Auth::id(), $validated, $jadwalPeriksa->id)) {
            return back()->withInput()
                ->withErrors(['jam_mulai' => 'Jadwal bentrok dengan jadwal lain di hari yang sama.']);
        }

        $jadwalPeriksa->update($validated);

        return redirect()->route('jadwal-periksa.index')
            ->with('success', 'Jadwal periksa berhasil diperbarui.');
    }

    public function destroy(JadwalPeriksa $jadwalPeriksa)
    {
        $this->authorizeOwner($jadwalPeriksa);

        $jadwalPeriksa->delete();

        return redirect()->route('jadwal-periksa.index')
            ->with('success', 'Jadwal periksa berhasil dihapus.');
    }

    private function rules(): array
    {
        return [
            'hari'        => ['required', Rule::in(self::HARI)],
            'jam_mulai'   => ['required', 'date_format:H:i'],
            'jam_selesai' => ['required', 'date_format:H:i', 'after:jam_mulai'],
        ];
    }

    private function messages(): array
    {
        return [
            'hari.required'           => 'Hari wajib dipilih.',
            'hari.in'                 => 'Hari tidak valid.',
            'jam_mulai.required'      => 'Jam mulai wajib diisi.',
            'jam_mulai.date_format'   => 'Format jam mulai harus HH:MM.',
            'jam_selesai.required'    => 'Jam selesai wajib diisi.',
            'jam_selesai.date_format' => 'Format jam selesai harus HH:MM.',
            'jam_selesai.after'       => 'Jam selesai harus lebih besar dari jam mulai.',
        ];
    }

    private function authorizeOwner(JadwalPeriksa $jadwal): void
    {
        abort_if($jadwal->id_dokter !== Auth::id(), 403, 'Anda tidak berhak mengakses jadwal ini.');
    }

    private function bentrok(int $dokterId, array $data, ?int $exceptId = null): bool
    {
        return JadwalPeriksa::where('id_dokter', $dokterId)
            ->where('hari', $data['hari'])
            ->when($exceptId, fn ($q) => $q->where('id', '!=', $exceptId))
            ->where('jam_mulai', '<', $data['jam_selesai'])
            ->where('jam_selesai', '>', $data['jam_mulai'])
            ->exists();
    }
}