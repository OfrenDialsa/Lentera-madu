<?php

namespace App\Http\Controllers;

use App\Models\dokumen;
use App\Models\Krisan;
use Illuminate\Http\Request;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\View\View;

class KrisanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $krisan = Krisan::orderBy('created_at', 'desc')->get();
        return view ('krisan.index')->with('krisan', $krisan);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('krisan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
    try {
        $validatedData = $request->all();

            Log::info('Validated data:', $validatedData);

            $krisan = Krisan::create($validatedData);
            Log::info('Created Krisan instance:', $krisan);

            return redirect('krisan')->with('flash_message', 'Kritik dan saran telah ditambahkan!');
    } catch (\Exception $e) {
            Log::error('Error creating Krisan instance:', $e);
            return back()->with('error_message', 'Error creating Krisan instance');
        }
        
        //$input = $request->all();
        //Krisan::create($input);
        //return redirect('krisan')->with('flash_message', 'Kritik dan saran telah ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $krisan = Krisan::find($id);
        return view('krisan.edit')->with('krisan', $krisan);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $krisan = Krisan::find($id);
        $input = $request->all();
        $krisan->update($input);
        return redirect('krisan')->with('flash_message', 'Telah ditanggapi');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Krisan::destroy($id);
        return redirect('krisan')->with('flash_message', 'Kritik dan saran telah dihapus!'); 
    }
}
