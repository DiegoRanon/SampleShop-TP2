<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Sample;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Gate;
use Illuminate\Auth\Access\AuthorizationException;
use App\Models\User;
use App\Models\Review;

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
        $user = User::find(auth()->id());


        $request->validate([
            'titre' => 'required',
            'description' => 'required',
            'category' => 'required',
            'cle_musical' => 'required',
            'bpm' => 'required',
            'genre' => 'required',
            'photo' => ['required','mimes:jpg,png,jpeg,gif,svg'],
            'music' => ['required', 'mimes:mp3,wav']
        ]);

        
    
        $sample = new Sample([
            'id_utilisateur' => Auth::user()->id,
            'titre' => $request->get('titre'),
            'compositeur' => $user->name,
            'description' => $request->get('description'),
            'category' => $request->get('category'),
            'cle_musical' => $request->get('cle_musical'),
            'bpm' => $request->get('bpm'),
            'genre' => $request->get('genre'),
            'date' => Carbon::now()
        ]);

        // Image
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/images', $fileName);
    
            $sample->photo = 'images/' . $fileName;
        } else {
            dd("photo doesn't work");
        }
        // Audio
        if ($request->hasFile('music')) {
            $file = $request->file('music');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/musiques', $fileName);
    
            $sample->music = 'musiques/' . $fileName;
        } else {
            dd("music doesn't work");
        }
    
        $sample->save();

        return redirect('/')->with('success', 'Sample ajouté avec succès');
    }


    public function show($id)
    {
        $sample = Sample::find($id);
        return view('sample.show', ['sample' => $sample]);
    }


    public function edit($id)
    {
        $sample = Sample::find($id);
        if (Gate::denies('edit-sample', $sample)) {
            throw new AuthorizationException('You are not authorized to edit this sample.');
        }
    
        return view('sample.edit', compact('sample'));

    }


    public function update(Request $request, $id)
    {
        $sample = Sample::findOrFail($id);

        $request->validate([
            'titre' => 'required',
            'description' => 'required',
            'category' => 'required',
            'cle_musical' => 'required',
            'bpm' => 'required',
            'genre' => 'required',
            'photo' => ['required','mimes:jpg,png,jpeg,gif,svg']
        ]);

        $sample->titre = $request->input('titre');
        $sample->description = $request->input('description');
        $sample->category = $request->input('category');
        $sample->cle_musical = $request->input('cle_musical');
        $sample->bpm = $request->input('bpm');
        $sample->genre = $request->input('genre');

        // Image
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/images', $fileName);
    
            $sample->photo = 'images/' . $fileName;
        } else {
            dd("photo doesn't work");
        }



        $sample->update();

        return redirect('/')->with('success', 'Sample modifié avec succès');
    }



    public function destroy($id)
    {
        $sample = Sample::find($id);
        $reviews = Review::where('id_sample', $sample->id)->get();


        if (Gate::denies('edit-sample', $sample)) {
            throw new AuthorizationException('You are not authorized to delete this sample.');
        }

        foreach ($reviews as $review) {
            $review->delete();
        }
        
        $sample->delete();

        return redirect()->route('sample.index');
    }
}

