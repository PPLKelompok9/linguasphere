<?php

namespace App\Http\Controllers;

use App\Models\Institution;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class InstitutionController extends Controller
{
    public function index()
    {
        $institutions = Institution::with('partnerships')
            ->latest()
            ->paginate(10);
            
        return view('institutions.index', compact('institutions'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:institutions',
            'description' => 'required|string',
            'address' => 'required|string',
            'contact' => 'required|string',
            'cover' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $validated['slug'] = Str::slug($validated['name']);

        if ($request->hasFile('cover')) {
            $validated['cover'] = $request->file('cover')->store('institutions', 'public');
        }

        $institution = Institution::create($validated);

        return redirect()->route('institutions.show', $institution->slug)
            ->with('success', 'Institution created successfully');
    }

    public function show(Institution $institution)
    {
        return view('institutions.show', [
            'institution' => $institution->load('partnerships.agency')
        ]);
    }

    public function update(Request $request, Institution $institution)
    {
        $validated = $request->validate([
            'name' => "string|max:255|unique:institutions,name,{$institution->id}",
            'description' => 'string',
            'address' => 'string',
            'contact' => 'string',
            'cover' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($request->has('name')) {
            $validated['slug'] = Str::slug($validated['name']);
        }

        if ($request->hasFile('cover')) {
            if ($institution->cover) {
                Storage::disk('public')->delete($institution->cover);
            }
            $validated['cover'] = $request->file('cover')->store('institutions', 'public');
        }

        $institution->update($validated);

        return redirect()->route('institutions.show', $institution->slug)
            ->with('success', 'Institution updated successfully');
    }

    public function destroy(Institution $institution)
    {
        if ($institution->cover) {
            Storage::disk('public')->delete($institution->cover);
        }

        $institution->partnerships()->delete();
        $institution->delete();

        return redirect()->route('institutions.index')
            ->with('success', 'Institution deleted successfully');
    }

    public function activePartnerships(Institution $institution)
    {
        $partnerships = $institution->partnerships()
            ->where('is_active', true)
            ->with('agency')
            ->get();

        return view('institutions.partnerships', [
            'institution' => $institution,
            'partnerships' => $partnerships
        ]);
    }
}