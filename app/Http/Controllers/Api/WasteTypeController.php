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
                return ApiFormatter::createApi(404,'waste type ID not found',$details);
            }
            // Jika data ditemukan
            return ApiFormatter::createApi(200,'success',$details);
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
