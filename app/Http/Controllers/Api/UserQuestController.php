<?php

namespace App\Http\Controllers\Api;

use App\Helper\ApiFormatter;
use App\Models\UserQuest;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;



class UserQuestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($userId)
    {
            $progress = UserQuest::where('user_id', $userId)
            ->with('quest') // Include quest details
            ->get();

        if ($progress->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'No progress found for this user.',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $progress,
        ]);
    }


    public function startQuest(Request $request)
{
    $request->validate([
        'user_id' => 'required|exists:users,id',
        'quest_id' => 'required|exists:quests,id',
    ]);

    $progress = UserQuest::updateOrCreate(
        ['user_id' => $request->user_id, 'quest_id' => $request->quest_id],
        ['progress_status' => 'in_progress']
    );

    return response()->json([
        'success' => true,
        'message' => 'Quest started successfully.',
        'data' => $progress,
    ]);
}

public function completeQuest(Request $request)
{
    $request->validate([
        'user_id' => 'required|exists:users,id',
        'quest_id' => 'required|exists:quests,id',
    ]);

    $progress = UserQuest::where('user_id', $request->user_id)
        ->where('quest_id', $request->quest_id)
        ->first();

    if (!$progress) {
        return response()->json([
            'success' => false,
            'message' => 'Quest progress not found.',
        ], 404);
    }

    $progress->update([
        'progress_status' => 'completed',
        'points_awarded' => 100, // Example: Assign points
    ]);

    return response()->json([
        'success' => true,
        'message' => 'Quest completed successfully.',
        'data' => $progress,
    ]);
}


public function getProgressByStatus(Request $request, $userId, $status)
{
    $progress = UserQuest::where('user_id', $userId)
        ->where('progress_status', $status)
        ->with('quest') // Include quest details
        ->get();

    if ($progress->isEmpty()) {
        return response()->json([
            'success' => false,
            'message' => 'No progress found for the given status.',
        ], 404);
    }

    return response()->json([
        'success' => true,
        'data' => $progress,
    ]);
}

public function getLeaderboard(Request $request)
{
    $limit = $request->get('limit', 10); // Default top 10
    
    // Ambil data user berdasarkan poin, urutkan dari yang terbesar
    $leaderboard = User::select('id', 'name', 'points')
        ->orderBy('points', 'desc')
        ->limit($limit)
        ->get();

    return ApiFormatter::createApi(200, 'Leaderboard fetched successfully.', $leaderboard);
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
    public function show(UserQuest $userQuest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UserQuest $userQuest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserQuest $userQuest)
    {
        //
    }
}
