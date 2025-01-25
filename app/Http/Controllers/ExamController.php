<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Http\Requests\StoreExamRequest;
use App\Http\Requests\UpdateExamRequest;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreExamRequest $request)
    {
        //
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
        $questions = $exam->questions;
    
       
        foreach ($questions as $question) {
            $question->title = json_decode($question->title);
            $question->option_1 = json_decode($question->option_1);
            $question->option_2 = json_decode($question->option_2);
            $question->option_3 = json_decode($question->option_3);
            $question->option_4 = json_decode($question->option_4);
        }
    
        return view('web.exams.questions', compact('exam', 'questions'));
    }
    


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Exam $exam)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateExamRequest $request, Exam $exam)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Exam $exam)
    {
        //
    }
}
