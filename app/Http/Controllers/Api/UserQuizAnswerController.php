<?php

namespace App\Http\Controllers;

use App\Helper\ApiFormatter;
use App\Models\Quiz;
use App\Models\UserQuizAnswer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserQuizAnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'quiz_id' => 'required',
            'selected_answer' => 'required|string',
        ]);

        // Ambil user ID (bisa dari autentikasi)
        $userId = Auth::id();

        // Ambil quiz dan cek jawaban benar
        $quiz = Quiz::findOrFail($request->quiz_id);
        $isCorrect = $quiz->correct_answer === $request->selected_answer;

        // Simpan data jawaban ke database
        $userQuizAnswer = UserQuizAnswer::create([
            'user_id' => $userId,
            'quiz_id' => $quiz->id,
            'selected_answer' => $request->selected_answer,
            'is_correct' => $isCorrect,
        ]);

        // Format respons
        return ApiFormatter::createApi(200, 'success', $userQuizAnswer);
    }

    // Ambil semua jawaban pengguna
    public function index()
    {
        $userId = Auth::id(); // Ambil ID pengguna dari autentikasi

        $answers = UserQuizAnswer::with('quiz')
            ->where('user_id', $userId)
            ->get();

        // Format respons
        return ApiFormatter::createApi(200, 'success', $answers);
    }

    /**
     * Display the specified resource.
     */
    public function show(UserQuizAnswer $userQuizAnswer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UserQuizAnswer $userQuizAnswer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserQuizAnswer $userQuizAnswer)
    {
        //
    }
}
