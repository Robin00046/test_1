<?php

namespace App\Http\Controllers;

use App\Models\Penduduk;
use App\Models\Kabupaten;
use App\Http\Requests\StorePendudukRequest;
use App\Http\Requests\UpdatePendudukRequest;
use App\Models\Provinsi;

class PendudukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // This method should return a list of Penduduk resources.
        $penduduks = Penduduk::with('kabupaten')->get();
        // dd($penduduks[0]);
        return view('penduduk.index', compact('penduduks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // This method should show the form for creating a new Penduduk resource.
        $provinsis = Provinsi::all();
        return view('penduduk.create', compact('provinsis'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePendudukRequest $request)
    {
        // This method should handle the storage of a new Penduduk resource.
        $penduduk = Penduduk::create($request->validated());
        return redirect()->route('penduduk.index')->with('success', 'Penduduk created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Penduduk $penduduk)
    {
        // This method should display a specific Penduduk resource.
        return view('penduduk.show', compact('penduduk'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Penduduk $penduduk)
    {
        // This method should show the form for editing a specific Penduduk resource.
        $provinsis = Provinsi::all();
        $kabupatens = Kabupaten::all();
        return view('penduduk.edit', compact('penduduk', 'kabupatens', 'provinsis'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePendudukRequest $request, Penduduk $penduduk)
    {
        // dd($request->all());
        // This method should handle the update of a specific Penduduk resource.
        $penduduk->update($request->validated());
        return redirect()->route('penduduk.index')->with('success', 'Penduduk updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Penduduk $penduduk)
    {
        // This method should handle the deletion of a specific Penduduk resource.
        $penduduk->delete();
        return redirect()->route('penduduk.index')->with('success', 'Penduduk deleted successfully');
    }
}
