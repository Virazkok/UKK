<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'id_pengaduan' => 'required',
            'pesan_feedback' => 'required',
            'tanggal_feedback' => 'required|date'
        ]);

        $data['dibuat_oleh'] = auth()->id();

        return Feedback::create($data);
    }

    public function index($id_pengaduan)
    {
        return Feedback::where('id_pengaduan', $id_pengaduan)->get();
    }
}
