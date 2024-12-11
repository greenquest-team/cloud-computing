<?php

namespace App\Http\Controllers\Api;

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
        try {
            // Ambil parameter 'type_name' dari query string
            $typeName = $request->query('type_name');
    
            // Jika type_name kosong
            if (!$typeName) {
                return ApiFormatter::createApi(404, 'no waste_type found', $typeName);
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
                return ApiFormatter::createApi(404, 'no quizzes found', $quizzes);
            }
    
            // Response jika data ditemukan
            return ApiFormatter::createApi(200, 'success', $quizzes);
    
        } catch (\Exception $e) {
            // Log error
            Log::error('Error fetching quizzes: ' . $e->getMessage());
    
            return ApiFormatter::createApi(500, 'An error occurred', $e->getMessage());
        }
    }
    

    public function getQuiz(Request $request)
    {
        $typeName = $request->input('type_name'); // Ambil parameter type_name
    
        // Validasi input type_name
        if (!$typeName) {
            return response()->json([
                'success' => false,
                'message' => 'type_name is required.',
            ], 400);
        }
    
        // Cari maksimal 2 soal berdasarkan type_name
        $quizzes = Quiz::join('waste_types', 'quizzes.waste_types_id', '=', 'waste_types.id')
            ->where('waste_types.type_name')
            ->select(
                'quizzes.id',
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
            return ApiFormatter::createApi(404, 'No quizzes found for the given type_name.',);
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

            $data=[
                'correct_answers' => $correctCount,
                'points_awarded' => $pointsAwarded,
            ];
    
            // Pastikan response dikembalikan
            return ApiFormatter::createApi(200, 'Quiz completed!', $data);

        } catch (\Exception $e) {

            return ApiFormatter::createApi(500, 'An error occurred', $e->getMessage());
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
