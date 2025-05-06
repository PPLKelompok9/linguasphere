<?php

namespace App\Http\Controllers;

use App\Models\Scholarship;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ScholarshipController extends Controller
{
    public function index()
    {
        $scholarships = Scholarship::latest()
            ->when(request('search'), function($query) {
                $query->where('title', 'like', '%' . request('search') . '%')
                    ->orWhere('provider', 'like', '%' . request('search') . '%');
            })
            ->paginate(10)
            ->withQueryString();

        return response()->json([
            'status' => 'success',
            'data' => $scholarships
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'deadline' => 'required|date',
            'requirements' => 'required|string',
            'benefits' => 'required|string',
            'provider' => 'required|string|max:255',
            'link' => 'required|url',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $validated['slug'] = Str::slug($validated['title']);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')
                ->store('scholarships', 'public');
        }

        $scholarship = Scholarship::create($validated);

        return response()->json([
            'status' => 'success',
            'message' => 'Scholarship created successfully',
            'data' => $scholarship->fresh()
        ], 201);
    }

    public function show(Scholarship $scholarship)
    {
        return response()->json([
            'status' => 'success',
            'data' => $scholarship
        ]);
    }

    public function update(Request $request, Scholarship $scholarship)
    {
        $validated = $request->validate([
            'title' => 'string|max:255',
            'description' => 'string',
            'deadline' => 'date',
            'requirements' => 'string',
            'benefits' => 'string',
            'provider' => 'string|max:255',
            'link' => 'url',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($request->has('title')) {
            $validated['slug'] = Str::slug($request->title);
        }

        if ($request->hasFile('image')) {
            if ($scholarship->image) {
                Storage::disk('public')->delete($scholarship->image);
            }
            
            $validated['image'] = $request->file('image')
                ->store('scholarships', 'public');
        }

        $scholarship->update($validated);

        return response()->json([
            'status' => 'success',
            'message' => 'Scholarship updated successfully',
            'data' => $scholarship->fresh()
        ]);
    }

    public function destroy(Scholarship $scholarship)
    {
        if ($scholarship->image) {
            Storage::disk('public')->delete($scholarship->image);
        }

        $scholarship->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Scholarship deleted successfully'
        ]);
    }
}