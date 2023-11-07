<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Sample;
use Illuminate\Support\Carbon;

class SampleController extends Controller
{

    public function index()
    {
        $samples = Sample::all();
        return view('sample.index',compact('samples'));
    }


    public function create()
    {
        return view('sample.create');
    }


    public function store(Request $request)
    {

        $request->validate([
            'titre' => 'required',
            'compositeur' => 'required',
            'description' => 'required',
            'category' => 'required',
            'cle_musical' => 'required',
            'bpm' => 'required',
            'genre' => 'required'
        ]);

        $sample = new Sample([
            'user_id' => Auth::user()->id,
            'titre' => $request->get('titre'),
            'compositeur' => $request->get('compositeur'),
            'description' => $request->get('description'),
            'category' => $request->get('category'),
            'cle_musical' => $request->get('cle_musical'),
            'bpm' => $request->get('bpm'),
            'genre' => $request->get('genre'),
            'date' => Carbon::now()
        ]);

        $sample->save();

        return redirect('/')->with('success', 'Sample ajouté avec succès');
    }


    public function show($id)
    {
        $sample = Sample::findOrFail($id);
        return view('sample.show', compact('sample'));
    }


    public function edit($id)
    {
        $sample = Sample::find($id);
        return view('sample.edit', compact('sample'));
    }


    public function update(Request $request, $id)
    {
        $sample = Sample::findOrFail($id);

        $request->validate([
            'titre' => 'required',
            'compositeur' => 'required',
            'description' => 'required',
            'category' => 'required',
            'cle_musical' => 'required',
            'bpm' => 'required',
            'genre' => 'required'
        ]);

        $sample->titre = $request->input('titre');
        $sample->compositeur = $request->input('compositeur');
        $sample->description = $request->input('description');
        $sample->category = $request->input('category');
        $sample->cle_musical = $request->input('cle_musical');
        $sample->bpm = $request->input('bpm');
        $sample->genre = $request->input('genre');

        $sample->update();

        return redirect('/')->with('success', 'Sample modifié avec succès');
    }



    public function destroy($id)
    {
        $sample = Sample::find($id);
        $sample->delete();

        return redirect()->route('sample.index');
    }
}

