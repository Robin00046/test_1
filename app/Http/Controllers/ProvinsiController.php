<?php

namespace App\Http\Controllers;

use App\Models\Provinsi;
use App\Http\Requests\StoreProvinsiRequest;
use App\Http\Requests\UpdateProvinsiRequest;

class ProvinsiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // This method should return a list of Provinsi resources.
        $provinsis = Provinsi::all();
        return view('provinsi.index', compact('provinsis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // This method should show the form for creating a new Provinsi resource.
        return view('provinsi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProvinsiRequest $request)
    {
        // This method should handle the storage of a new Provinsi resource.
        $provinsi = Provinsi::create($request->validated());
        return redirect()->route('provinsi.index')->with('success', 'Provinsi created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Provinsi $provinsi)
    {
        // This method should display a specific Provinsi resource.
        return view('provinsi.show', compact('provinsi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Provinsi $provinsi)
    {
        // This method should show the form for editing a specific Provinsi resource.
        return view('provinsi.edit', compact('provinsi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProvinsiRequest $request, Provinsi $provinsi)
    {
        // This method should handle the update of a specific Provinsi resource.
        $provinsi->update($request->validated());
        return redirect()->route('provinsi.index')->with('success', 'Provinsi updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Provinsi $provinsi)
    {
        // This method should handle the deletion of a specific Provinsi resource.
        $provinsi->delete();
        return redirect()->route('provinsi.index')->with('success', 'Provinsi deleted successfully');
    }
}
