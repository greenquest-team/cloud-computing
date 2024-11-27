<?php

namespace App\Http\Controllers\Api;

use App\Helper\ApiFormatter;
use App\Http\Controllers\Controller;
use App\Models\WasteType;
use App\Models\WasteTypeDetail;
use Illuminate\Http\Request;

class WasteTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $wasteTypes = WasteType::all(['waste_types_id', 'type_name']);
        // return response()->json([
        //     'success' => true,
        //     'data' => $wasteTypes,
        // ], 200);

        // try {
        //     $wasteTypes = WasteType::all(['waste_types_id', 'type_name']);
        //     return response()->json([
        //         'success' => true,
        //         'data' => $wasteTypes,
        //     ], 200);
        // } catch (\Exception $e) {
        //     return response()->json([
        //         'success' => false,
        //         'message' => $e->getMessage(),
        //     ], 500);
        // }

        // Mengambil semua data dari tabel waste_types
        // $wasteTypes = WasteType::all();

        // $query = WasteType::query();

        // // Filter berdasarkan `type_name` (jika ada parameter query)
        // if ($request->has('type_name')) {
        //     $query->where('type_name', $request->type_name);
        // }
    
        // // Tampilkan data
        // $wasteTypes = $query->get(

        // );
    // Ambil parameter query 'type_name' jika ada
    $typeName = $request->query('type_name');

    // Query untuk mengambil data waste types
    $query = WasteTypeDetail::join('waste_types', 'waste_type_details.waste_types_id', '=', 'waste_types.id')
                            ->select(
                                'waste_type_details.id',
                                'waste_type_details.waste_types_id as waste_type_id',
                                'waste_types.type_name',
                                'waste_type_details.description',
                                'waste_type_details.craft'
                            );

         // Jika parameter 'type_name' disediakan, tambahkan kondisi filter
    if ($typeName) {
        $query->where('waste_types.type_name', 'like', '%' . $typeName . '%');
    }

    // Dapatkan semua data setelah filter
    $details = $query->get();
    
        return ApiFormatter::createApi(200,'success',$details);
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
    public function show(string $id)
    {
        // $wasteTypeDetails = WasteTypeDetail::where('waste_types_id', $id)->first();

        // if (!$wasteTypeDetails) {
        //     return response()->json([
        //         'success' => false,
        //         'message' => 'Waste type details not found',
        //     ], 404);
        // }

            // Ambil data detail berdasarkan waste_types_id
            // $details = WasteTypeDetail::where('waste_types_id', $id)->get();
        // Ambil data dengan kolom yang diperlukan menggunakan join
        $details = WasteTypeDetail::join('waste_types', 'waste_type_details.id', '=', 'waste_types.id')
            ->where('waste_type_details.waste_types_id', $id)
            ->get([
                'waste_type_details.id as id',
                'waste_type_details.waste_types_id as waste_type_id',
                'waste_types.type_name',
                'waste_type_details.description',
                'waste_type_details.craft',
            ]);
            // Jika tidak ada data
            if ($details->isEmpty()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Details not found for the given waste type ID.',
                ], 404);
            }
    
            // Jika data ditemukan
            return response()->json([
                'success' => true,
                'data' => $details,
            ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
