<?php

namespace App\Http\Controllers\Admin;

use App\Models\Exam;
use App\Models\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $questions = Question::orderBy('id', 'desc')->get();
        $questions = $questions->map(function ($question) {
            $question->title = json_decode($question->title);
            $question->option_1 = json_decode($question->option_1);
            $question->option_2 = json_decode($question->option_2);
            $question->option_3 = json_decode($question->option_3);
            $question->option_4 = json_decode($question->option_4);
            $question->right_ans = json_decode($question->right_ans);
            return $question;
        });
        return view('admin.questions.index', [
            'questions' => $questions,
            'exam' => 'exam'

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $exams = Exam::all()->map(function ($exam) {
            $name = json_decode($exam->name, true);
            $exam->name = $name[app()->getLocale()] ?? $name['en'];
            return $exam;
        });
        return view('admin.questions.create', [
            'exams' => $exams,
        ]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title_en' => 'required|string',
            'title_ar' => 'required|string',
            'option_1_en' => 'required|string',
            'option_1_ar' => 'required|string',
            'option_2_en' => 'required|string',
            'option_2_ar' => 'required|string',
            'option_3_en' => 'required|string',
            'option_3_ar' => 'required|string',
            'option_4_en' => 'required|string',
            'option_4_ar' => 'required|string',
            'right_ans' => 'required|string',
            'exam_id' => 'required|integer',

        ]);

        Question::create([
            'title' => json_encode([
                'en' => $request->input('title_en'),
                'ar' => $request->input('title_ar'),
            ]),

            'option_1' => json_encode([
                'en' => $request->input('option_1_en'),
                'ar' => $request->input('option_1_ar'),

            ]),
            'option_2' => json_encode([
                'en' => $request->input('option_2_en'),
                'ar' => $request->input('option_2_ar'),
            ]),
            'option_3' => json_encode([
                'en' => $request->input('option_3_en'),
                'ar' => $request->input('option_3_ar'),
            ]),
            'option_4' => json_encode([
                'en' => $request->input('option_4_en'),
                'ar' => $request->input('option_4_ar'),
            ]),
            'right_ans' => $request->input('right_ans'),
            'exam_id' => $request->input('exam_id'),

        ]);
        return redirect()->to('dashboard/questions')->with('success', 'Question Added Successfully');


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $question = Question::findOrFail($id);

        $question->title = json_decode($question->title);
        $question->option_1 = json_decode($question->option_1);
        $question->option_2 = json_decode($question->option_2);
        $question->option_3 = json_decode($question->option_3);
        $question->option_4 = json_decode($question->option_4);

        $exams = Exam::all()->map(function ($exam) {
            $exam->name = json_decode($exam->name);
            return $exam;
        });
        return view('admin.questions.edit' , [
            'question' => $question,
            'exams' => $exams,
        ]);

    }

    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       
        $question = Question::findOrFail($id);

        $request->validate([
             'title_en' => 'required|string',
            'title_ar' => 'required|string',
            'option_1_en' => 'required|string',
            'option_1_ar' => 'required|string',
            'option_2_en' => 'required|string',
            'option_2_ar' => 'required|string',
            'option_3_en' => 'required|string',
            'option_3_ar' => 'required|string',
            'option_4_en' => 'required|string',
            'option_4_ar' => 'required|string',
            'right_ans' => 'required|string',
            'exam_id' => 'required|integer',
        ]);

        $question->update([
            'title' => json_encode([
                'en' => $request->title_en,
                'ar' => $request->title_ar,
            ]),
            'option_1' => json_encode([
                'en' => $request->option_1_en,
                'ar' => $request->option_1_ar,
            ]),
            'option_2' => json_encode([
                'en' => $request->option_2_en,
                'ar' => $request->option_2_ar,
            ]),
            'option_3' => json_encode([
                'en' => $request->option_3_en,
                'ar' => $request->option_3_ar,
            ]),
            'option_4' => json_encode([
                'en' => $request->option_4_en,
                'ar' => $request->option_4_ar,
            ]),
            'right_ans' => $request->right_ans,
            'exam_id' => $request->exam_id,
        ]);
        return redirect()->to('dashboard/questions')->with('success', 'Question updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        $question = Question::findOrFail($id);
        $question->delete();
        return redirect()->to('dashboard/questions')->with('success', 'Question deleted successfully');
    }

}
