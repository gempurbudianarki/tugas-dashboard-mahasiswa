<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use DataTables; // Pastikan use DataTables ada

class MahasiswaController extends Controller
{
    public function index()
    {
        // Fungsi ini hanya menampilkan view utama, sudah benar.
        return view('mahasiswa-dashboard');
    }

    // Fungsi ini yang melayani data untuk AJAX DataTables
    public function getData(Request $request)
    {
        if ($request->ajax()) {
            $data = Mahasiswa::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('aksi', function($row){
                    $btn = '<button class="btn btn-sm btn-warning tombol-edit" data-id="'.$row->id.'">Edit</button> ';
                    $btn .= '<button class="btn btn-sm btn-danger tombol-hapus" data-id="'.$row->id.'">Hapus</button>';
                    return $btn;
                })
                ->rawColumns(['aksi'])
                ->make(true);
        }
    }

    // Fungsi untuk menyimpan data baru
    public function store(Request $request)
    {
        $request->validate(['nim' => 'required|string|unique:mahasiswas,nim','nama' => 'required|string|max:255','semester' => 'required|integer','matkul' => 'required|string|max:255',]);
        Mahasiswa::create($request->all());
        return response()->json(['success' => true, 'message' => 'Data Mahasiswa Berhasil Ditambahkan!']);
    }

    // Fungsi untuk mengambil data yang akan diedit
    public function edit(Mahasiswa $mahasiswa)
    {
        return response()->json(['success' => true, 'data' => $mahasiswa]);
    }

    // Fungsi untuk menyimpan perubahan data
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $request->validate(['nim' => ['required', 'string', Rule::unique('mahasiswas')->ignore($mahasiswa->id)],'nama' => 'required|string|max:255','semester' => 'required|integer','matkul' => 'required|string|max:255',]);
        $mahasiswa->update($request->all());
        return response()->json(['success' => true, 'message' => 'Data Mahasiswa Berhasil Diperbarui!']);
    }

    // Fungsi untuk menghapus data
    public function destroy(Mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();
        return response()->json(['success' => true, 'message' => 'Data Mahasiswa Berhasil Dihapus!']);
    }
}