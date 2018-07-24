<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kategori;
use App\Berita;
use Auth;
class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $kategori = Kategori::all();
        $berita = Berita::latest('created_at')->get();

        return view('berita.index', compact('kategori','berita'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        Berita::create([
          'judul' => request('judul'),
          'isi' => request('isi'),
          'id_pembuat' => Auth::user()->id,
          'id_kategori' => request('idkategori')
        ]);

        return redirect()->back()->with('success', 'Berhasil ^_^');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $a = Berita::find($id);
        $a->judul = $request->get('judul');
        $a->id_kategori = $request->get('idkategori');
        $a->isi = $request->get('isi');
        $a->save();
        return redirect()->back()->with('info', 'Data berhasil diubah');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del = Berita::find($id);
        $del->delete();
        return redirect()->back()->with('danger', 'Berita Berhasil dihapus');

    }
}
