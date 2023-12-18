<?php

namespace App\Http\Controllers;

use App\Models\Arsip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ArsipController extends Controller
{
    public function index()
    {
        $arsips = Arsip::all();
        return view('admin.arsip', compact('arsips'));
    }

    public function show(Arsip $arsip)
    {
        return view('admin.view-arsip', compact('arsip'));
    }

    public function create()
{
    return view('admin.create-arsip'); // Adjust the view name accordingly
}

    public function edit($arsip_id)
    {
        // Temukan arsip berdasarkan ID
        $arsip = Arsip::find($arsip_id);

        if (!$arsip) {
            return redirect()->route('arsip.index')->with('error', 'Arsip tidak ditemukan');
        }

        return view('admin.edit-arsip', compact('arsip'));
    }

    public function update(Request $request, $arsip_id)
{
    // Validasi data formulir
    $validatedData = $request->validate([
        'nama' => 'sometimes|string|max:255',
        'deskripsi' => 'required|string',
        'pdf' => 'sometimes|mimes:pdf|max:2048', // Sesuaikan aturan validasi untuk pdf
        // Tambahkan kolom lain jika diperlukan
    ]);

    $arsip = Arsip::find($arsip_id);

    if (!$arsip) {
        return redirect()->route('arsip.index')->with('error', 'Arsip tidak ditemukan');
    }

    // Simpan path pdf lama sebelum diupdate
    $oldPdfPath = $arsip->pdf;

    $arsip->update([
        'nama' => $validatedData['nama'] ?? $arsip->nama,
        'deskripsi' => strip_tags($validatedData['deskripsi']),
        // Tambahkan kolom lain jika diperlukan
    ]);

    // Tangani unggahan pdf
    if ($request->hasFile('pdf')) {
        $uploadedpdf = $request->file('pdf');

        // Gunakan storeAs untuk menentukan nama file tanpa subdirektori
        $pdfPath = $uploadedpdf->storeAs('pdf', 'pdf_' . $arsip->id . '.' . $uploadedpdf->getClientOriginalExtension(), 'public');

        // Hapus pdf lama jika ada
        if ($oldPdfPath) {
            Storage::disk('public')->delete($oldPdfPath);
        }

        // Perbarui arsip dengan path pdf baru
        $arsip->update(['pdf' => $pdfPath]);
    }

    // Redirect atau beri respons sesuai kebutuhan
    return redirect('/arsip/index')->with('success', 'Arsip berhasil diperbarui');
}

    public function store(Request $request)
    {
        if (auth()->check()) {
        // Validasi data formulir
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'pdf' => 'required|mimes:pdf|mimetypes:application/pdf|max:2048',
            // Tambahkan kolom lain jika diperlukan 
        ]);

        $validatedData['deskripsi'] = strip_tags($validatedData['deskripsi']);

        $validatedData['admin_id'] = auth()->user()->admin_id;
        
        $arsip = Arsip::create($validatedData);

        $uploadedpdf = $request->file('pdf');

       // Gunakan storeAs untuk menentukan nama file tanpa subdirektori
       $pdfPath = $uploadedpdf->storeAs('pdf', 'pdf_' . $arsip->id . '.' . $uploadedpdf->getClientOriginalExtension(), 'public');

        // Perbarui arsip dengan path pdf baru
        $arsip->update(['pdf' => $pdfPath]);

        // Redirect atau beri respons sesuai kebutuhan
        return redirect()->route('arsip.index')->with('success', 'Arsip berhasil dibuat');
    } else {
        // Redirect or respond if the user is not authenticated
        return redirect()->route('login')->with('error', 'Silakan login untuk membuat arsip');
    }
    }

}
