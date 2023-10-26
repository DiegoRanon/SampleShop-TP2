<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sample;

class SampleController extends Controller
{
    
    public function index()
    {
        $samples = Sample::all();
        return view('sample.index', compact('samples'));
    }

    
    public function create()
    {
        return view('sample.create');
    }

    
    public function store(Request $request)
    {
        
        $request->validate([
            'id_utilisateur' => 'required',
            'titre' => 'required',
            'compositeur' => 'required',
            'description' => 'required',
            'category' => 'required',
            'cle_musical' => 'required',
            'bpm' => 'required',
            'genre' => 'required',
            'date' => 'required',
        ]);

        Sample::create($request->all());

        return redirect()->route('sample.index');
    }

    
    public function show($id)
    {
        $sample = Sample::find($id);
        return view('sample.show', compact('sample'));
    }

    
    public function edit($id)
    {
        $sample = Sample::find($id);
        return view('sample.edit', compact('sample'));
    }

    
    public function update(Request $request, $id)
    {
        $sample = Sample::find($id);

        $request->validate([
            'id_utilisateur' => 'required',
            'titre' => 'required',
            'compositeur' => 'required',
            'description' => 'required',
            'category' => 'required',
            'cle_musical' => 'required',
            'bpm' => 'required',
            'genre' => 'required',
            'date' => 'required',
        ]);

        $sample->update($request->all());

        return redirect()->route('samples.index');
    }

    
    public function destroy($id)
    {
        $sample = Sample::find($id);
        $sample->delete();

        return redirect()->route('samples.index');
    }
}

