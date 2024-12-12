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
                    'quizzes.image',
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
        
    public function checkAnswer(Request $request)
    {
        try {
            // Validasi input
            $request->validate([
                'type_name' => 'required|string',
                'answers' => 'required|array|min:1',
                'answers.*' => 'required|string',
            ]);
    
            $typeName = $request->input('type_name');
            $answers = $request->input('answers');
    
            $correctCount = 0;
    
            // Loop setiap jawaban
            foreach ($answers as $selectedAnswer) {
                $isCorrect = Quiz::join('waste_types', 'quizzes.waste_types_id', '=', 'waste_types.id')
                    ->where('waste_types.type_name', $typeName)
                    ->where('quizzes.correct_answer', $selectedAnswer)
                    ->exists();
    
                if ($isCorrect) {
                    $correctCount++;
                }
            }
    
            // Hitung total poin
            $pointsAwarded = $correctCount * 20;
    
            // Data untuk response
            $data = [
                'correct_answers' => $correctCount,
                'points_awarded' => $pointsAwarded,
            ];
    
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
