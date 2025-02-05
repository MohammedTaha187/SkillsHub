<?php

namespace App\Http\Controllers\Api;

use App\Models\Skill;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\SkillsResource;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\QueryException;

class SkillsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $skills = Skill::orderBy('id', 'desc')->get();
        return SkillsResource::collection($skills);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $validator = Validator::make($request->all(), [
                'name_en' => 'required|string',
                'name_ar' => 'required|string',
                'img' => 'required|image',
                'active' => 'required|integer|in:1,0',
                'cat_id' => 'required|integer',
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'errors' => $validator->errors(),
                ], 400);
            }
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

            return response()->json(['message' => 'skill created successfully'], 200);

        }catch(QueryException $ex){
            return response()->json(["state" => "faild" , "message" => $ex]);

            
            
        }
        

    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $skills = Skill::find($id);
        if (!$skills == null) {
            return response()->json(['msg' => 'item not found'], 404);
        }
        return new SkillsResource($skills);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'name_en' => 'required|string',
            'name_ar' => 'required|string',
            'img' => 'image',
            'active' => 'boolean',
            'cat_id' => 'integer',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
            ], 400);
        }
        $skills = Skill::findOrFail($id);
        if ($request->hasFile('img')) {
            if (Storage::exists($skills->img)) {
                Storage::delete($skills->img);
            }
            $skills->img = Storage::putFile("skills", $request->img);
        }
        $skills->name_en = $request->name_en;
        $skills->name_ar = $request->name_ar;
        $skills->active = $request->active;
        $skills->cat_id = $request->cat_id;
        $skills->save();

        return response()->json(['message' => 'skill updated successfully'], 200);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $skills = Skill::find($id);
        if (Storage::exists($skills->img)) {
            Storage::delete($skills->img);
        }


        $skills->delete();

        return response()->json(['msg' => 'skill delete successfully.'], 200);
    }
}
