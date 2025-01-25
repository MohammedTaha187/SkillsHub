<?php

namespace App\Http\Controllers\Admin;

use App\Models\Skill;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cat;
use Illuminate\Support\Facades\Storage;
class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $skills = Skill::orderBy('id', 'desc')->get();
        $skills = $skills->map(function ($skill) {
            $skill->name = json_decode($skill->name);
            return $skill;
        });

        return view('admin.skills.index', [
            'skill' => $skills,
            'cat' => [],
            'exam' => []

        ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cats = Cat::all()->map(function ($cat) {
            $name = json_decode($cat->name, true);
            $cat->name = $name[app()->getLocale()] ?? $name['en'];
            return $cat;
        });

        return view('admin.skills.create', [
            'cats' => $cats
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'name_en' => 'required|string|max:255',
            'name_ar' => 'required|string|max:255',
            'active' => 'required|boolean',
            'cat_id' => 'required | exists:cats,id',
            'img' => 'required | image ',

        ]);
        $imgPath = Storage::putFileAs('skills', $request->img, uniqid() . '.jpg');
        Skill::create([
            'name' => json_encode([
                'en' => $request->name_en,
                'ar' => $request->name_ar,
            ]),
            'cat_id' => $request->cat_id,
            'active' => $request->active,
            'img' => $imgPath,
        ]);
        return redirect()->to('dashboard/skills')->with('success', 'Skill created successfully');
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
        $skill = Skill::findOrFail($id);
        $skill->name = json_decode($skill->name);


        $cat = $skill->cat;

        return view('admin.skills.edit', [
            'skill' => $skill,
            'cat' => $cat
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $skill = Skill::findOrFail($id);
        $request->validate([
            'name_en' => 'required|string|max:255',
            'name_ar' => 'required|string|max:255',
            'active' => 'required|boolean',
            'cat_id' => 'required | exists:cats,id',
            'img' => 'image ',
        ]);

        if ($request->hasFile('img')) {
            if (Storage::exists($skill->img)) {
                Storage::delete($skill->img);

            }
            $skill->img = Storage::putFileAs('skills', $request->img, uniqid() . '.jpg');

        }
        $skill->update([
            'name' => json_encode([
                'en' => $request->name_en,
                'ar' => $request->name_ar,
            ]),
            'cat_id' => $request->cat_id,
            'active' => $request->active,

        ]);
        return redirect()->to('dashboard/skills')->with('success', 'Skill created successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        $skill = Skill::find($id);
        if (Storage::exists($skill->img)) {
            Storage::delete($skill->img);
        }
        $skill->delete();
        return redirect()->to('dashboard/skills')->with('success', 'Skill deleted successfully');

    }
}
