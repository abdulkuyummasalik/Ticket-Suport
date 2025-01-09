<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $Projects = Project::all();
        return view('projects.index', compact('Projects'));
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ],[
            'required' => 'Nama wajib di isi'
        ]);

        Project::create($validatedData);

        return redirect()->route('projects.index')->with('success', 'Project berhasil dibuat.');
    }

    public function show($id)
    {
        $Project = Project::findOrFail($id);
        return view('projects.show', compact('Project'));
    }

    public function edit($id)
    {
        $Project = Project::findOrFail($id);
        return view('projects.edit', compact('Project'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $Project = Project::findOrFail($id);
        $Project->update($validatedData);

        return redirect()->route('projects.index')->with('success', 'Project berhasil diupdate.');
    }

    public function destroy($id)
    {
        $Project = Project::findOrFail($id);
        $Project->delete();

        return redirect()->route('projects.index')->with('success', 'Project berhasil dihapus.');
    }
}
