<?php

namespace App\Http\Controllers;

use App\Models\Arsip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class ArsipController extends Controller
{
    public function index()
    {
        return view('admin.arsips.index');
    }

    public function create()
    {
        if (Gate::allows('is_kaprodi', Arsip::class)) {
            abort(403);
        }
        return view('admin.arsips.create');
    }

    public function show(Arsip $arsip)
    {
        return view('admin.arsips.show', ['arsip' => Arsip::find($arsip->id)]);
    }

    public function edit(Arsip $arsip)
    {
        if (Gate::allows('is_kaprodi', Arsip::class)) {
            abort(403);
        }
        return view('admin.arsips.edit', ['arsip' => Arsip::findOrFail($arsip->id)]);
    }

    public function store(Request $request)
    {
        if (Gate::allows('is_kaprodi', Arsip::class)) {
            abort(403);
        }
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'nama_file' => 'file|mimes:pdf|max:2048'
        ]);
        $validatedData['admin_id'] = auth()->user()->id;
        $validatedData['nama_file'] = $request->file('nama_file')->store('pdf');
        Arsip::create($validatedData);
        return redirect()->route('arsip.index')->with('success', 'success');
    }

    public function update(Request $request, Arsip $arsip)
    {
        if (Gate::allows('is_kaprodi', Arsip::class)) {
            abort(403);
        }
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'nama_file' => 'file|mimes:pdf|max:2048'
        ]);
        $validatedData['admin_id'] = auth()->user()->id;
        if ($request->file('nama_file')) {
            if ($request->oldPdf) {
                Storage::delete($request->oldPdf);
            }
            $validatedData['nama_file'] = $request->file('nama_file')->store('pdf');
        }
        Arsip::where('id', $arsip->id)->update($validatedData);
        return redirect()->route('arsip.index')->with('success', 'success');
    }
}
