<?php

namespace App\Http\Controllers\Api;

use App\Helper\ApiFormatter;
use App\Http\Controllers\Controller;
use App\Models\Material;
use App\Models\WasteType;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
    $typeName = $request->query('type_name');

    // Query untuk mendapatkan materials berdasarkan type_name
    $materials = Material::join('waste_types', 'materials.waste_types_id', '=', 'waste_types.id')
        ->when($typeName, function ($query, $materials) {
            return $query->where('waste_types.type_name', $materials);
        })
        ->inRandomOrder()
        ->limit(1)
        ->get([
            'materials.id',
            'materials.waste_types_id',
            'waste_types.type_name',
            'materials.description_mat',
            'materials.image'
        ]);

    // Cek jika data kosong
        if ($materials->isEmpty()) {
            return ApiFormatter::createApi(404,'no materials found',$materials);
        }

        // Response jika data ditemukan
            return ApiFormatter::createApi(200,'success',$materials);
        }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($waste_type_id)
    {
        //
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Material $material)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Material $material)
    {
        //
    }
}
