<?php

namespace App\Http\Controllers;

use App\Models\Pengurus;
use Illuminate\Http\Request;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\View\View;
class PengurusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $pengurus = Pengurus::all();
        return view ('pengurus.index')->with('pengurus', $pengurus);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('pengurus.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $input = $request->all();
        Pengurus::create($input);
        return redirect('pengurus')->with('flash_message', 'Pengurus telah ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $pengurus = Pengurus::find($id);
        return view('pengurus.show')->with('pengurus', $pengurus);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $pengurus = Pengurus::find($id);
        return view('pengurus.edit')->with('pengurus', $pengurus);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $pengurus = Pengurus::find($id);
        $input = $request->all();
        $pengurus->update($input);
        return redirect('pengurus')->with('flash_message', 'Data pengurus telah di edit!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        Pengurus::destroy($id);
        return redirect('pengurus')->with('flash_message', 'Data pengurus telah dihapus!'); 
    }
}
