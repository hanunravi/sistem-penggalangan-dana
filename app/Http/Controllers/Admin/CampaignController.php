<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str; 

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
        // 1. VALIDASI (Sesuaikan dengan name="" di Form HTML)
        $request->validate([
            'title'       => 'required|string|max:255',
            'target_dana' => 'required|numeric', // Di Form namanya target_dana
            'image'       => 'required|image|mimes:jpg,png,jpeg|max:2048',
            'description' => 'required'
            // Slug, status, current_amount TIDAK perlu divalidasi karena kita generate sendiri
        ]);

        // 2. Proses Upload Foto
        $path = $request->file('image')->store('campaigns', 'public');

        // 3. Simpan ke Database
        Campaign::create([
            'title'          => $request->title,
            'slug'           => Str::slug($request->title), // Generate otomatis
            'target_amount'  => $request->target_dana,      // Pindahkan target_dana ke target_amount
            'current_amount' => 0,                          // Default 0
            'description'    => $request->description,
            'image'          => $path,
            'status'         => 'active',                   // Default active
        ]);

        return redirect()->route('admin.campaign.index')->with('success', 'Campaign Berhasil Dibuat!');
    }

    // Hapus Campaign
    public function destroy($id)
    {
        $campaign = Campaign::findOrFail($id);

        if ($campaign->image) {
            Storage::disk('public')->delete($campaign->image);
        }

        $campaign->delete();

        return redirect()->route('admin.campaign.index')->with('success', 'Campaign berhasil dihapus!');
    }

    // Halaman Edit
    public function edit($id)
    {
        $campaign = Campaign::findOrFail($id);
        return view('admin.campaign.edit', compact('campaign'));
    }

    // Proses Update
    public function update(Request $request, $id)
    {
        $campaign = Campaign::findOrFail($id);

        // 1. Validasi Update
        $request->validate([
            'title'       => 'required|string|max:255',
            'target_dana' => 'required|numeric',
            'description' => 'required',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Image boleh kosong pas update
        ]);

        // 2. Cek Gambar Baru
        if ($request->hasFile('image')) {          
            if ($campaign->image) {
                Storage::disk('public')->delete($campaign->image);
            }
            $path = $request->file('image')->store('campaigns', 'public');                    
            $campaign->image = $path;
        }

        // 3. Update Data
        $campaign->title         = $request->title;
        $campaign->slug          = Str::slug($request->title); 
        $campaign->target_amount = $request->target_dana; // Map target_dana -> target_amount
        $campaign->description   = $request->description; 
        
        $campaign->save();

        return redirect()->route('admin.campaign.index')->with('success', 'Data berhasil diperbarui!');
    }
}