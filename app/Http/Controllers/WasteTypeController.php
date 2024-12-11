<?php

namespace App\Http\Controllers;

use App\Helper\ApiFormatter;
use App\Models\WasteType;
use Illuminate\Http\Request;
use App\Http\Controllers\Exception;
use Exception as GlobalException;

class WasteTypeController extends Controller
{
    public function index(Request $request)
    {
        // Mengambil semua data dari tabel waste_types
        // $wasteTypes = WasteType::all();

        try {
            $query = WasteType::query();

            // Filter berdasarkan `type_name` (jika ada parameter query)
            if ($request->has('type_name')) {
                $query->where('type_name', $request->type_name);
            }
        
            // Tambahkan paginasi
            $wasteTypes = $query->get();
        
             return ApiFormatter::createApi(200,'success',$wasteTypes);
        } catch (GlobalException $error) {
                //throw $th;
            return ApiFormatter::createApi(401, 'failed', $error);
            // return ApiFormatter::createApi(500,'error',$th->getMessage());
        }
      
    }}
