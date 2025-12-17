<?php

namespace App\Http\Controllers;

use App\Models\dokumen;
use Illuminate\Http\Request;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\View\View;

class dokumenController extends Controller
{

    public function index()
    {
        $dokumen = dokumen::all();
        return view ('dokumen.index')->with('dokumen', $dokumen);
    }

    public function create()
    {
        return view('dokumen.create');
    }

    public function store(Request $request)
    {
        $nm = $request->file;
        $namafile = $nm->getClientOriginalName();

            $dtupload = new dokumen();
            $dtupload->nama = $request->nama;
            $dtupload->file = $namafile;

        $nm->move(public_path().'/pdf',$namafile);
        $dtupload->save();

        return redirect('dokumen')->with('flash_message', 'dokumen telah ditambahkan!');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        dokumen::destroy($id);
        return redirect('dokumen')->with('flash_message', 'Dokumen telah dihapus!'); 
    }
}