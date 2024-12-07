<?php

namespace App\Http\Controllers\Api;

use App\Helper\ApiFormatter;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Quest;
use App\Models\Material;
use App\Models\Quiz;
use Illuminate\Support\Facades\DB;


class QuestController extends Controller
{    

    public function index(Request $request)
    {
    // Ambil semua quest scan dengan waste_types_id yang unik dari database

        $scanQuests = Quest::where('quest_type', 'scan')
            ->select('id', 'waste_types_id', 'description_quest', 'quest_type')
            ->distinct('waste_types_id')
            ->inRandomOrder()
            ->limit(2)
            ->get();
            
            // Jika tidak cukup scan quests
            if ($scanQuests->count() < 2) {
                return response()->json([
                    'success' => false,
                    'message' => 'Not enough scan quests available.',
                ], 404);
            }
    
        $quests = Quest::where('quest_type','reminder' )
        ->select('id', 'waste_types_id', 'description_quest', 'quest_type')
        ->get();
        $data = [
            "questScan" => $scanQuests,
            "questReminder" => $quests,
        ];
    
    
        // Jika tidak ada quest
        if ($scanQuests->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'No quests available.',
            ], 404);
        }
    
        // Kembalikan hasil dalam JSON
        return ApiFormatter::createApi(200,'success',$data);
    }    

     // Mendapatkan quest berdasarkan waste_types_id
    public function getQuestsByType(Request $request)
     {
         $typeName = $request->query('type_name');
 
         // Jika type_name tidak disediakan
         if (!$typeName) {
             return response()->json([
                 'success' => false,
                 'message' => 'Please provide a type_name.',
             ], 400);
         }
 
         // Cari berdasarkan type_name
         $quests = Quest::join('waste_types', 'quests.waste_types_id', '=', 'waste_types.id')
             ->where('waste_types.type_name', $typeName)
             ->get(['quests.id', 'waste_types.type_name', 'quests.description_quest', 'quests.quest_type']);
 
         if ($quests->isEmpty()) {
             return response()->json([
                 'success' => false,
                 'message' => 'No quests found for the given type_name.',
             ], 404);
         }
 
         return response()->json([
             'success' => true,
             'data' => $quests,
         ], 200);
     }

     public function store(Request $request)
     {
         $validated = $request->validate([
            //  'waste_types_id' => 'required|exists:waste_types,id',
            //  'description' => 'required|string',
            //  'quest_type' => 'required|in:scan,material,quiz',
         ]);
 
         $quest = Quest::create($validated);
 
         return response()->json([
             'success' => true,
             'message' => 'Quest created successfully.',
             'data' => $quest,
         ], 201);
     }

     public function getRandomQuests(Request $request)
    {
        $typeName = $request->query('type_name');

        if (!$typeName) {
            return response()->json([
                'success' => false,
                'message' => 'Please provide a type_name.',
            ], 400);
        }

        $quests = Quest::join('waste_types', 'quests.waste_types_id', '=', 'waste_types.id')
            ->where('waste_types.type_name', $typeName)
            ->inRandomOrder()
            ->limit(4)
            ->get(['quests.id', 'waste_types.type_name', 'quests.description_quest', 'quests.quest_type']);

        if ($quests->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'No quests available.',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $quests,
        ], 200);
    }

}


