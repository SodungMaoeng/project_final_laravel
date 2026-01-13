<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

use App\Models\CourseModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rows = CourseModel::all();
        return view('course.index', compact('rows'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('course.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            'price'       => 'nullable|numeric',
            'discount'    => 'nullable|numeric',
            'image'       => 'required|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        $data = $request->only(['title', 'description', 'price', 'discount']);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')
                ->store('images/courses', 'public');
        }

        CourseModel::create($data);

        return redirect()->route('course.index')
            ->with('success', 'Course created successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $course = CourseModel::findOrFail($id);
        return view('course.edit', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            'price'       => 'nullable|numeric',
            'discount'    => 'nullable|numeric',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        $course = CourseModel::findOrFail($id);
        $data = $request->only(['title', 'description', 'price', 'discount']);

        if ($request->hasFile('image')) {

            if ($course->image && Storage::disk('public')->exists($course->image)) {
                Storage::disk('public')->delete($course->image);
            }

            $data['image'] = $request->file('image')
                ->store('images/courses', 'public');
        }

        $course->update($data);

        return redirect()->route('course.index')
            ->with('success', 'Course updated successfully');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $course = CourseModel::findOrFail($id);

        if ($course->image && Storage::disk('public')->exists($course->image)) {
            Storage::disk('public')->delete($course->image);
        }

        $course->delete();

        return redirect()->route('course.index')
            ->with('success', 'Course deleted successfully');
    }
}
