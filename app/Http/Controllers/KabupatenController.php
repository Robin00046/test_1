<?php

namespace App\Http\Controllers;

use App\Models\Provinsi;
use App\Models\Kabupaten;
use App\Http\Requests\StoreKabupatenRequest;
use App\Http\Requests\UpdateKabupatenRequest;

class KabupatenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // This method should return a list of Kabupaten resources.
        $kabupatens = Kabupaten::with('provinsi')->get();
        return view('kabupaten.index', compact('kabupatens'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // This method should show the form for creating a new Kabupaten resource.
        $provinsis = Provinsi::all();
        return view('kabupaten.create', compact('provinsis'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreKabupatenRequest $request)
    {
        // This method should handle the storage of a new Kabupaten resource.
        $kabupaten = Kabupaten::create($request->validated());
        return redirect()->route('kabupaten.index')->with('success', 'Kabupaten created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kabupaten $kabupaten)
    {
        // This method should display a specific Kabupaten resource.
        return view('kabupaten.show', compact('kabupaten'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kabupaten $kabupaten)
    {
        // This method should show the form for editing a specific Kabupaten resource.
        $provinsis = Provinsi::all();
        return view('kabupaten.edit', compact('kabupaten', 'provinsis'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKabupatenRequest $request, Kabupaten $kabupaten)
    {
        // This method should handle the update of a specific Kabupaten resource.
        $kabupaten->update($request->validated());
        return redirect()->route('kabupaten.index')->with('success', 'Kabupaten updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kabupaten $kabupaten)
    {
        // This method should handle the deletion of a specific Kabupaten resource.
        $kabupaten->delete();
        return redirect()->route('kabupaten.index')->with('success', 'Kabupaten deleted successfully');
    }

    // get provinsi by id
    public function getKabupatenByProvinsiId($provinsiId)
    {
        // This method should return a list of Kabupaten resources filtered by Provinsi ID.
        $kabupatens = Kabupaten::where('provinsi_id', $provinsiId)->get();
        return response()->json($kabupatens);
    }
}
