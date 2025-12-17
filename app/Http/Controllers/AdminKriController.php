<?php

namespace App\Http\Controllers;

use App\Models\dokumen;
use App\Models\Krisan;
use Illuminate\Http\Request;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\View\View;

class AdminKriController extends Controller
{
    public function index()
    {
        $krisan = Krisan::orderBy('created_at', 'desc')->get();
        return view ('adminKrisan.index')->with('krisan', $krisan);
    }

    public function create()
    {
        return view('adminKrisan.create');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        Krisan::create($input);
        return redirect('adminKrisan')->with('flash_message', 'Kritik dan saran telah ditambahkan!');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $krisan = Krisan::find($id);
        return view('adminKrisan.edit')->with('krisan', $krisan);
    }

    public function update(Request $request, string $id)
    {
        $krisan = Krisan::find($id);
        $input = $request->all();
        $krisan->update($input);
        return redirect('adminKrisan')->with('flash_message', 'Telah ditanggapi');
    }

    public function destroy(string $id)
    {
        Krisan::destroy($id);
        return redirect('adminKrisan')->with('flash_message', 'Kritik dan saran telah dihapus!'); 
    }
}
