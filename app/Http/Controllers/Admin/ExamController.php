<?php

namespace App\Http\Controllers\Admin;

use App\Models\Exam;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Skill;
use Illuminate\Support\Facades\Storage;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $exams = Exam::orderBy('id', 'desc')->get();


        $exams = $exams->map(function ($exam) {
            $exam->name = json_decode($exam->name);
            $exam->desc = json_decode($exam->desc);
            return $exam;
        });

        return view('admin.exams.index', [
            'exams' => $exams,
            'skill' => []
        ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $skills = Skill::all()->map(function ($skill) {
            $name = json_decode($skill->name, true);
            $skill->name = $name[app()->getLocale()] ?? $name['en'];
            return $skill;
        });

        return view('admin.exams.create', [
            'skills' => $skills
        ]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'skill_id' => 'required',
            'name_en' => 'required|string|max:255',
            'name_ar' => 'required|string|max:255',
            'desc_en' => 'required|string',
            'desc_ar' => 'required|string',
            'img' => 'required|image',
            'question_no' => 'required|integer|min:0|max:10000',
            'difficulty' => 'required|integer',
            'duration_mins' => 'required|integer',
            'active' => 'required|boolean',

        ]);
        $imgPath = Storage::putFileAs('exams', $request->img, uniqid() . '.jpg');
        Exam::create([
            'name' => json_encode([
                'en' => $request->name_en,
                'ar' => $request->name_ar,
            ]),
            'desc' => json_encode([
                'en' => $request->desc_en,
                'ar' => $request->desc_ar,
            ]),
            'skill_id' => $request->skill_id,
            'img' => $imgPath,
            'question_no' => $request->question_no,
            'difficulty' => $request->difficulty,
            'duration_mins' => $request->duration_mins,
            'active' => $request->active,
        ]);
        return redirect()->to('dashboard/exams')->with('success', 'Exam created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $exam = Exam::findOrFail($id);

        $exam->name = json_decode($exam->name);
        $exam->desc = json_decode($exam->desc);

        $skills = Skill::all()->map(function ($skill) {
            $skill->name = json_decode($skill->name);
            return $skill;
        });

        return view('admin.exams.edit', [
            'exam' => $exam,
            'skills' => $skills,
        ]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $exam = Exam::findOrFail($id);
        $request->validate([
            'skill_id' => 'required',
            'name_en' => 'required|string|max:255',
            'name_ar' => 'required|string|max:255',
            'desc_en' => 'required|string',
            'desc_ar' => 'required|string',
            'img' => 'required|image',
            'question_no' => 'required|integer|min:0|max:10000',
            'difficulty' => 'required|integer',
            'duration_mins' => 'required|integer',
            'active' => 'required|boolean',

        ]);

        if ($request->hasFile('img')) {
            if (Storage::exists($exam->img)) {
                Storage::delete($exam->img);

            }
            $exam->img = Storage::putFileAs('exams', $request->img, uniqid() . '.jpg');

        }
        $exam->update([
            'skill_id' => $request->skill_id,
            'name' => json_encode([
                'en' => $request->name_en,
                'ar' => $request->name_ar,
            ]),
            'desc' => json_encode([
                'en' => $request->desc_en,
                'ar' => $request->desc_ar,
            ]),
            'duration_mins' => $request->duration_mins,
            'question_no' => $request->question_no,
            'difficulty' => $request->difficulty,
            'active' => $request->active,
        ]);
        return redirect()->to('dashboard/exams')->with('success', 'Exams created successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        $exam = Exam::findOrFail($id);
        if (Storage::exists($exam->img)) {
            Storage::delete($exam->img);
        }
        $exam->delete();
        return redirect('dashboard/exams')->with('success', 'Exam created successfully');
    }
}
