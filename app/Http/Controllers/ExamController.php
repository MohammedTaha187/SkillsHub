<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use Illuminate\Http\Request;
use App\Http\Requests\StoreExamRequest;
use App\Http\Requests\UpdateExamRequest;
use Illuminate\Support\Facades\Log;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreExamRequest $request)
    {

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {

        $data['exams'] = Exam::findOrFail($id);
        $data['skill'] = $data['exams']->skill->paginate(6);
        return view('web.exams.index')->with($data);
    }






   
public function questions($id)
{
    $exam = Exam::findOrFail($id);

    
    if (!session()->has("exam_start_time_$id")) {
        session()->put("exam_start_time_$id", now());
    }

    $questions = $exam->questions->map(function ($question) {
        $question->title = json_decode($question->title);
        $question->option_1 = json_decode($question->option_1);
        $question->option_2 = json_decode($question->option_2);
        $question->option_3 = json_decode($question->option_3);
        $question->option_4 = json_decode($question->option_4);
        $question->right_ans = json_decode($question->right_ans);
        return $question;
    });

    return view('web.exams.questions', [
        'exam' => $exam,
        'questions' => $questions,
        'start_time' => session("exam_start_time_$id"),
        'duration' => $exam->duration_mins,
    ]);
}

    
    






public function submit(Request $request, $examId)
{
    $exam = Exam::findOrFail($examId);
    $questions = $exam->questions;

    
    foreach ($questions as $question) {
        if (!isset($request->question[$question->id])) {
            return back()->with('error', 'Please answer all the questions.');
        }
    }

    $score = 0;

    
    foreach ($questions as $question) {
        $studentAnswer = $request->question[$question->id];

        
        if (!session()->has("answer_$question->id")) {
            session(["answer_$question->id" => $studentAnswer]); 
        }

        
        if ($studentAnswer == $question->right_ans) {
            $score++;
        }
    }

    return redirect()->route('exams.result', $examId)->with('score', $score);
}





    public function startExam($examId)
{
    $exam = Exam::findOrFail($examId);

    
    $duration = $exam->duration_mins * 60; 
    $startTime = time(); 

    
    session([
        'exam_start_time' => $startTime,
        'exam_duration' => $duration,
    ]);

    
    Log::info('Exam Started: Start Time = ' . $startTime . ', Duration = ' . $duration);
    Log::info('Session Start Time: ' . session('exam_start_time'));
    Log::info('Session Duration: ' . session('exam_duration'));

    return view('web.exams.exam', compact('exam', 'duration'));
}

    

    
    




    public function showResult($examId)
    {
        $exam = Exam::findOrFail($examId);


        $score = session('score');


        $startTime = session('exam_start_time');
        $duration = session('exam_duration');

        if ($startTime && $duration) {
            $currentTime = time();
            $timeRemaining = $duration - ($currentTime - $startTime);

            if ($timeRemaining <= 0) {
                $timeRemaining = 0;
            }
        } else {
            $timeRemaining = 0;
        }

        if ($score === null) {
            return redirect()->route('exams.show', $examId)->with('error', 'Please complete the exam before viewing the results.');
        }

        return view('web.exams.result', [
            'exam' => $exam,
            'score' => $score,
            'timeRemaining' => $timeRemaining,
        ]);
    }






    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Exam $exam)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateExamRequest $request, Exam $exam)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Exam $exam)
    {

    }
}