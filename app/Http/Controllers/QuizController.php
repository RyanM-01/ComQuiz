<?php
namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class QuizController extends Controller
{
    public function GetQuiz(){
        $user = Auth::user();
        return view('quizpage',compact('quiz'));
    }

    public function DoQuiz(){
        $user = Auth::user();

        // Ambil jawaban dari request
        $answers = $request->input('answers');

        // Simpan jawaban pengguna ke sesi atau basis data
        session(['user_answers' => $answers]);

        return redirect()->route('completeQuiz');
    }


    public function completeQuiz(Request $request)
    {
        $user = Auth::user();

        // Ambil jawaban pengguna dari sesi atau basis data
        $userAnswers = session('user_answers', []);

        // Ambil kuis pertama sebagai contoh
        $quiz = Quiz::with('questions')->first();
        
        // Hitung skor
        $score = 0;
        foreach ($quiz->questions as $question) {
            if (isset($userAnswers[$question->id]) && $userAnswers[$question->id] == $question->correct_answer) {
                $score++;
            }
        }

        // Contoh logika untuk menambah skor dan balance
        $scoreIncrement = $score * 10; // Setiap jawaban benar bernilai 10
        $balanceIncrement = $score * 5; // Setiap jawaban benar menambah 5 ke balance

        // Update skor dan balance pengguna
        $user->increment('score', $scoreIncrement);
        $user->increment('balance', $balanceIncrement);

        // Logika untuk menambah daily streak
        $dailyStreakBonus = 100;
        $now = Carbon::now();

        if ($user->last_quiz_completed_at === null || $user->last_quiz_completed_at->diffInDays($now) >= 1) {
            $user->increment('balance', $dailyStreakBonus);
            $user->last_quiz_completed_at = $now;
            $user->save();
        }

        return response()->json([
            'message' => 'Quiz completed successfully!',
            'score' => $user->score,
            'balance' => $user->balance,
        ]);
    }
}
