<?php

namespace App\Http\Controllers\Api;

use App\Helper\ApiFormatter;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Quest;
use App\Models\Material;
use App\Models\Quiz;
use App\Models\WasteTypeDetail;
use Illuminate\Support\Facades\DB;


class QuestController extends Controller
{    

    public function index(Request $request)
    {
    $scanQuests = Quest::where('quest_type', 'scan')
    ->join('waste_type_details', 'quests.waste_types_id', '=', 'waste_type_details.waste_types_id')
    ->join('waste_types', 'waste_type_details.waste_types_id', '=', 'waste_types.id')
    ->select('quests.id', 'quests.waste_types_id', 'waste_types.type_name', 'quests.description_quest', 'quests.quest_type', 'quests.image')
    ->distinct('quests.waste_types_id')
    ->inRandomOrder()
    ->limit(2)
    ->get();

    // Jika tidak cukup scan quests
    if ($scanQuests->count() < 2) {
        return ApiFormatter::createApi(404, 'Not enough scan quests available.', null);
    }

    // Pilih salah satu hasil dari random scanQuests
    $randomScanQuest = $scanQuests->random();

    // Ambil satu questsMaterial secara acak yang sesuai dengan waste_types_id dari randomScanQuest
    $questsMaterial = Quest::where('quests.quest_type', 'material')
        ->where('quests.waste_types_id', $randomScanQuest->waste_types_id)
        ->join('waste_type_details', 'quests.waste_types_id', '=', 'waste_type_details.waste_types_id')
        ->join('waste_types', 'waste_type_details.waste_types_id', '=', 'waste_types.id')
        ->select('quests.id', 'quests.waste_types_id', 'waste_types.type_name', 'quests.description_quest', 'quests.quest_type', 'quests.image')
        ->inRandomOrder()
        ->limit(1)
        ->get();

    $questsQuiz = Quest::where('quests.quest_type','quiz' )
        ->where('quests.waste_types_id', $randomScanQuest->waste_types_id)
        // ->join('waste_type_details', 'quests.waste_types_id', '=', 'waste_type_details.waste_types_id')
        ->join('waste_types', 'quests.waste_types_id', '=', 'waste_types.id')
        ->select('quests.id', 'quests.waste_types_id','waste_types.type_name', 'description_quest', 'quest_type', 'image')
        ->get();
    
    $questsReminder = Quest::where('quest_type','reminder' )
        ->select('id', 'waste_types_id', 'description_quest', 'quest_type', 'image')
        ->get();


    $data = [
        "questScan" => $scanQuests,
        "questMaterial" => $questsMaterial,
        "questQuiz" => $questsQuiz,
        "questReminder" => $questsReminder,
    ];


    // Jika tidak ada quest
    if ($scanQuests->isEmpty()) {
        return ApiFormatter::createApi(404, 'No quests available.', null);
    }

    // Kembalikan hasil dalam JSON
        return ApiFormatter::createApi(200,'success',$data);
    }    

    public function getQuestsByType(Request $request)
    {

    }

    public function store(Request $request)
    {

    }


}


