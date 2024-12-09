<?php

namespace App\Http\Controllers\API;

use Illuminate\Support\Facades\Log;
use App\Helper\ApiFormatter;
use App\Http\Controllers\Controller;
use App\Models\Quiz;
use Illuminate\Http\Request;
class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
    // Ambil parameter 'type_name' dari query string
    $typeName = $request->query('type_name');


    // Jika typename kosong
    if (!$typeName) {
        return ApiFormatter::createApi(404,'no materials found',$typeName);
    }
    // Query untuk mendapatkan materials berdasarkan type_name
    $quizzes = Quiz::join('waste_types', 'quizzes.waste_types_id', '=', 'waste_types.id')
        ->when($typeName, function ($query, $typeName) {
            return $query->where('waste_types.type_name', $typeName);
        })
        ->inRandomOrder()
        ->limit(2) 
        ->get([
            'quizzes.id',
            'quizzes.waste_types_id',
            'waste_types.type_name',
            'quizzes.question',
            'quizzes.option_a',
            'quizzes.option_b',
            'quizzes.option_c',
            'quizzes.option_d',
            'quizzes.correct_answer',
        ]);


    // Cek jika data kosong
   
    if ($quizzes->isEmpty()) {
        return ApiFormatter::createApi(404,'no quizz$quizzes found',$quizzes);
    }


    // Response jika data ditemukan
    return ApiFormatter::createApi(200,'success',$quizzes);
    }

    public function getQuiz(Request $request)
    {
        $typeName = $request->input('type_name'); // Ambil parameter type_name
    
        // Validasi input type_name
        if (!$typeName) {
            return response()->json([
                'success' => false,
                'message' => 'type_cname is required.',
            ], 400);
        }
    
        // Cari maksimal 2 soal berdasarkan type_name
        $quizzes = Quiz::join('waste_types', 'quizzes.waste_types_id', '=', 'waste_types.waste_types_id')
            ->where('waste_types.type_name')
            ->select(
                'quizzes.quizzes_id',
                'quizzes.question',
                'quizzes.option_a',
                'quizzes.option_b',
                'quizzes.option_c',
                'quizzes.option_d',
                'quizzes.correct_answer',
                'waste_types.type_name'
            )
            ->limit(2) // Batasi hanya 4 soal
            ->get();
    
        // Jika quiz tidak ditemukan
        if ($quizzes->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'No quizzes found for the given type_name.',
            ], 404);
        }
    
        // Berikan response quiz
        return response()->json([
            'success' => true,
            'data' => $quizzes,
        ], 200);
    }
    
    public function checkAnswer(Request $request)
    {
        try {
            // Validasi input
            $request->validate([
                'type_name' => 'required|string',
                'answers' => 'required|array',
                'answers.*.quiz_id' => 'required|integer',
                'answers.*.selected_answer' => 'required|string',
            ]);
    
            $typeName = $request->input('type_name');
            $answers = $request->input('answers');
    
            $correctCount = 0;
    
            foreach ($answers as $answer) {
                $quiz = Quiz::join('waste_types', 'quizzes.waste_types_id', '=', 'waste_types.id')
                    ->where('quizzes.id', $answer['quiz_id'])
                    ->where('waste_types.type_name', $typeName)
                    ->select('quizzes.correct_answer')
                    ->first();
    
                if ($quiz && $answer['selected_answer'] === $quiz->correct_answer) {
                    $correctCount++;
                }
            }
    
            // Total poin
            $pointsAwarded = $correctCount * 50;
    
            // Pastikan response dikembalikan
            return response()->json([
                'success' => true,
                'message' => 'Quiz completed!',
                'correct_answers' => $correctCount,
                'points_awarded' => $pointsAwarded,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred.',
            ], 500);
        }
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
        //
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
