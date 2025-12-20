<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CampaignController extends Controller
{
    // Tampil Daftar Campaign
    public function index() {
        $campaigns = Campaign::latest()->get();
        return view('admin.campaign.index', compact('campaigns'));
    }

    // Tampil Form Tambah
    public function create() {
        return view('admin.campaign.create');
    }

    // Simpan Data ke Database
    public function store(Request $request) {
        $request->validate([
            'title' => 'required',
            'target_dana' => 'required|numeric',
            'image' => 'required|image|mimes:jpg,png,jpeg|max:2048',
            'description' => 'required'
        ]);

        // Proses Upload Foto
        $path = $request->file('image')->store('campaigns', 'public');

        Campaign::create([
            'title' => $request->title,
            'target_dana' => $request->target_dana,
            'description' => $request->description,
            'image' => $path,
        ]);

        return redirect()->route('admin.campaign.index')->with('success', 'Campaign Berhasil Dibuat!');
    }
    public function destroy($id)
    {
        // 1. Cari data campaign berdasarkan ID
        $campaign = Campaign::findOrFail($id);

        // 2. Hapus File Gambar dari folder storage (agar server tidak penuh sampah)
        if ($campaign->image) {
            Storage::disk('public')->delete($campaign->image);
        }

        // 3. Hapus data dari database
        $campaign->delete();

        // 4. Kembali ke halaman index dengan pesan sukses
        return redirect()->route('admin.campaign.index')->with('success', 'Campaign berhasil dihapus!');
    }
        public function edit($id)
    {
        // Ambil data campaign berdasarkan ID
        $campaign = \App\Models\Campaign::findOrFail($id);
        
        // Kirim data ke view edit
        return view('admin.campaign.edit', compact('campaign'));
    }

    public function update(Request $request, $id)
    {
        $campaign = \App\Models\Campaign::findOrFail($id);

        // 1. Validasi
        $request->validate([
            'title'       => 'required|string|max:255',
            'target_dana' => 'required|numeric',
            'description' => 'required',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg|max:2048', 
        ]);
        if ($request->hasFile('image')) {           
            $path = $request->file('image')->store('campaigns', 'public');                    
            $campaign->image = $path;
        }

        // 3. Update data lainnya
        $campaign->title = $request->title;
        $campaign->target_dana = $request->target_dana;
        $campaign->description = $request->description; 
        
        $campaign->save();

        return redirect()->route('admin.campaign.index')->with('success', 'Data berhasil diperbarui!');
    }
}
