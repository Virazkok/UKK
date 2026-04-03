<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\HistoriPengaduan;
use App\Models\Pengaduan;
use Illuminate\Http\Request;

class PengaduanController extends Controller
{
    public function index()
    {
        return Pengaduan::with(['user', 'kategori'])->get();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'id_kategori' => 'required',
            'tanggal_pengaduan' => 'required|date',
        ]);

        $data['id_user'] = auth()->id();

        return Pengaduan::create($data);
    }

    public function show($id)
    {
        return Pengaduan::with(['feedback', 'histori'])->findOrFail($id);
    }

    public function updateStatus(Request $request, $id)
    {
        $pengaduan = Pengaduan::findOrFail($id);

        $request->validate([
            'status' => 'required|in:menunggu,diproses,selesai',
            'keterangan' => 'nullable'
        ]);

        $pengaduan->update([
            'status' => $request->status
        ]);

        // Simpan histori
        HistoriPengaduan::create([
            'id_pengaduan' => $id,
            'status' => $request->status,
            'keterangan' => $request->keterangan
        ]);

        return response()->json(['message' => 'Status updated']);
    }
}
