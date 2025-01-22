<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cat;
use Illuminate\Http\Request;

class CatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cats = Cat::orderBy('id', 'desc')->get();
        $cats = $cats->map(function ($cat) {
            $cat->name = json_decode($cat->name);
            return $cat;
        });
        return view('admin.index', [
            'cat' => $cats
        ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name_en' => 'required|string|max:255',
            'name_ar' => 'required|string|max:255',
        ]);

        Cat::create([
            'name' => json_encode([
                'en' => $request->name_en,
                'ar' => $request->name_ar,
            ])
        ]);

        return redirect()->to('dashboard/categories')->with('success', 'Category created successfully.');
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
    public function edit($id)
    {
        $cat = Cat::findOrFail($id);
        $cat->name = json_decode($cat->name);
        return view('admin.edit', ['cat' => $cat]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $cat = Cat::findOrFail($id);

        $request->validate([
            'name_en' => 'required|string|max:255',
            'name_ar' => 'required|string|max:255',
        ]);

        $cat->update([
            'name' => json_encode([
                'en' => $request->name_en,
                'ar' => $request->name_ar,
            ])
        ]);
        return redirect()->to('dashboard/categories')->with('success', 'Category updated successfully.');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {

        $cat = Cat::findOrFail($id);
        $cat->delete();
        return redirect()->to('dashboard/categories')->with('success', 'Category deleted successfully.');


    }
}
