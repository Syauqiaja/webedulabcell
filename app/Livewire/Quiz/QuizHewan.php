<?php

namespace App\Livewire\Quiz;

use App\Models\UserQuizResult;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class QuizHewan extends Component
{
    public int $correctAnswers = 0;
    public int $wrongAnswers = 0;
    public bool $canSave = false;
    public $userQuizResults;
    public static string $type = 'sel hewan';
    private $totalPoint = 12;

    public function mount(){
        $this->userQuizResults = UserQuizResult::where('user_id', Auth::user()->id)
            ->where('type', QuizHewan::$type)->get();
    }
    public function render()
    {
        return view('livewire.quiz.quiz-hewan');
    }
    public function save(){
        $correct = $this->correctAnswers ?? 0;
        $wrong = $this->wrongAnswers ?? 0;
        UserQuizResult::create([
            'user_id' => Auth::user()->id,
            'correct_count' => $correct,
            'wrong_count' => $wrong,
            'point' => floatval($correct) / ($correct + $wrong),
            'type' => QuizHewan::$type,
        ]);
        $this->redirect(route('home'));
    }

    #[On('updateAnswers')]
    public function updateAnswers($correct, $wrong)
    {
        $this->correctAnswers = $correct;
        $this->wrongAnswers = $wrong;

        if($this->correctAnswers + $this->wrongAnswers == $this->totalPoint){
            $this->canSave = true;
        }else{
            $this->canSave = false;
        }
    }
}
