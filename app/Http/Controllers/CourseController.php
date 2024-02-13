<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        return view('instructors.courses.index', compact('courses'));
    }
    public function create()
    {
        return view('instructors.courses.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'title' => 'required|string|max:255',
            'short_description' => 'required|string',
            'description' => 'required|string',
            'category' => 'required',
            'level' => 'nullable|string|max:255',
            'language' => 'required|string',
            'price' => 'nullable|numeric|min:0',
            'discount_price' => 'nullable|numeric|min:0',
            'video_url' => 'nullable|string|url',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'tags' => 'nullable|string',
        ]);

        // Create course
        $course = new Course();
        $course->title = $request->input('title');
        $course->slug = Str::slug($request->input('title')); 
        $course->short_description = $request->input('short_description');
        $course->description = $request->input('description');
        $course->level = $request->input('level');
        $course->language = $request->input('language');
        $course->featured = $request->input('featured') ? true : false;
        $course->is_free = $request->input('is_free') ? true : false;
        $course->price = $request->input('price');
        $course->discount_price = $request->input('discount_price');
        $course->has_discount = $request->input('has_discount') ? true : false;
        $course->video_url = $request->input('video_url');
        $course->tags = json_decode($request->input('tags'), true);

        if ($request->hasFile('thumbnail')) {
            $image = $request->file('thumbnail');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads'), $imageName);

            $course->thumbnail = 'uploads/' . $imageName;
        }
        $course->save();

        return redirect()->route('courses.create')->with('success', 'Course created successfully!');
    }

    public function edit($id)
    {
        $course = Course::findOrFail($id);
        return view('instructors.courses.edit', compact('course'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'short_description' => 'required|string',
            'description' => 'required|string',
            'level' => 'nullable|string|max:255',
            'language' => 'required|string',
            'price' => 'nullable|numeric|min:0',
            'discount_price' => 'nullable|numeric|min:0',
            'video_url' => 'nullable|string',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'tags' => 'nullable|string',
        ]);

        // Get the course
        $course = Course::findOrFail($id);

        // Upload new thumbnail if provided
        if ($request->hasFile('thumbnail')) {
            // Delete old thumbnail
            if ($course->thumbnail) {
                Storage::disk('public')->delete($course->thumbnail);
            }
            $image = $request->file('thumbnail');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads'), $imageName);
            $course->thumbnail = 'uploads/' . $imageName;
        }

        // Update course details
        $course->title = $request->input('title');
        $course->slug = Str::slug($request->input('title')); 
        $course->short_description = $request->input('short_description');
        $course->description = $request->input('description');
        $course->level = $request->input('level');
        $course->language = $request->input('language');
        $course->featured = $request->input('featured') ? true : false;
        $course->is_free = $request->input('is_free') ? true : false;
        $course->price = $request->input('price');
        $course->discount_price = $request->input('discount_price');
        $course->has_discount = $request->input('has_discount') ? true : false;
        $course->video_url = $request->input('video_url');
        $course->tags = json_decode($request->input('tags'), true);

        // Save the updated course
        $course->save();

        return redirect()->route('courses.index', $course->id)->with('success', 'Course updated successfully!');
    }


    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->route('course.index')->with('success', 'Course deleted successfully!');
    }

}
