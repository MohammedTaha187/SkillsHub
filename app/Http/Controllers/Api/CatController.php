<?php

namespace App\Http\Controllers\Api;

use App\Models\Cat;
use Illuminate\Http\Request;
use App\Http\Resources\CatResource;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cats = Cat::orderBy( 'id', 'desc')->get();
        return CatResource::collection($cats);
    }

    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    
    $validator = Validator::make($request->all(), [
        'name_en' => 'required|string',
        'name_ar' => 'required|string',
    ]);

    if ($validator->fails()) {
        return response()->json([
            'errors' => $validator->errors(),
        ], 400);
    }

    
    Cat::create([
        'name' => [
            'en' => $request->name_en,
            'ar' => $request->name_ar,
        ],
    ]);

    return response()->json(['message' => 'Category created successfully'], 201);
}

    
    

    


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $cat = Cat::find($id);

        if ($cat == null){
            return response()->json(['msg' => 'item not found'], 404);
        }
        return new CatResource($cat);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'name_en' => 'required|string|max:255',
            'name_ar' => 'required|string|max:255',
        ]);
        if ($validator->fails()){
            return response()->json([
                'errors' => $validator->errors(),
            ], 400); 
        }
        $cat = Cat::findOrFail($id);
        $cat->update([
            'name' => json_encode([
                'en' => $request->name_en,
                'ar' => $request->name_ar,
            ])
            ]);
            return response()->json([
                'message' => 'Cat updated successfully',
                ], 200);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cat = Cat::findOrFail($id);
        $cat->delete();
        return response()->json([
            'message' => 'Cat deleted successfully',
            ], 200);
    }
}
