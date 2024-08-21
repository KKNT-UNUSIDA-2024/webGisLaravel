<?php

namespace App\Http\Controllers;

use App\Models\Tempats;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
class TempatsController extends Controller
{
    //
    public function store(Request $request){
        // dd($request->all());
        $validateReq = $request->validate([
            'nama_tempat' => 'required|string|max:255',
            'Kategori_id' => 'required|string',
            'latitude' => 'required|string|max:255',
            'longitude' => 'required|string|max:255',
            'deskripsi' => 'required|string|max:255',
            // 'foto' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        if($request->hasFile('foto')){
            $image = $request->file('foto');
            $imgName = time().'.'.$image->getClientOriginalExtension();
            $request->foto->move(public_path('assets'), $imgName);
        }

        Tempats::create([
            'nama_tempat' => $request->nama_tempat,
            'Kategori_id' => $request->Kategori_id,
            'foto' => $imgName,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'deskripsi' => $request->deskripsi,

        ]);

        return redirect()->route('semua-data')->with('success', 'Data berhasil ditambahkan');
    }

    public function destroy($id){
        $tempats = Tempats::findOrFail($id);
        if($tempats->foto && file_exists(public_path('assets/' . $tempats->foto))){
            unlink(public_path('assets/' . $tempats->foto));
        }
        $tempats->delete();
        return redirect()->route('semua-data')->with('success', 'Data berhasil dihapus');
    }

    public function edit($id){
        $tempats = Tempats::findOrFail($id);
        return view('edit-data', compact('tempats'));
    }

    public function update(Request $request, $id){
        $tempats = Tempats::findOrFail($id);
        // validasi request
        $validateReq = $request->validate([
            'nama_tempat' => 'required|string|max:255',
            'Kategori_id' => 'required|string',
            'latitude' => 'required|string|max:255',
            'longitude' => 'required|string|max:255',
            'deskripsi' => 'required|string|max:255',
            'foto' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        // handle jika request memiliki file foto
        if($request->hasFile('foto')){
            $image = $request->file('foto');
            $imgName = time().'.'.$image->getClientOriginalExtension();
            $request->foto->move(public_path('assets'), $imgName);
        }
        // update data
        $tempats->update([
            'nama_tempat' => $request->nama_tempat,
            'Kategori_id' => $request->Kategori_id,
            'foto' => $imgName,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'deskripsi' => $request->deskripsi,
        ]);
        return redirect()->route('semua-data')->with('success', 'Data berhasil diubah');
    }
}
