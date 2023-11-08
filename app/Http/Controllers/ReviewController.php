<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Sample;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Auth\Access\AuthorizationException;

class ReviewController extends Controller
{

    public function index()
    {
        $reviews = Review::all();
        return view('review.index', compact('reviews'));
    }


    public function create($id)
    {
        $sample = Sample::find($id);
        return view('review.create', compact('sample'));
    }


    public function store(Request $request, $id)
    {

        $request->validate([
            'nb_etoiles' => 'required',
            'commentaire' => 'required'
        ]);

        // Les id nécessairent
        $userId = auth()->id();
        $sampleId = $id;
        $user = User::find($userId);

        $review = Review::create([ 
            'id_sample'=> $sampleId,
            'id_utilisateur'=> $userId,
            'nb_etoiles'=>$request->get('nb_etoiles'),
            'commentaire'=> $request->get('commentaire'),
            'identifiant'=> $user->name
        ]);

        $review->save();

        return redirect(route('review.show', ['id' => $sampleId]))->with('success', 'Review ajouté avec succès');
    }


    public function show($id)
    {

        $sample = Sample::find($id);

        if (!$sample) {
            abort(404); 
        }

        $reviews = Review::where('id_sample', $sample->id)->get();

        return view('review.show', compact('sample', 'reviews'));
    }


    public function edit($id)
    {
        $review = Review::find($id);
        return view('review.edit', compact('review'));
    }


    public function update(Request $request, $id)
    {
        $review = Review::find($id);

        if (Gate::denies('edit-review', $review)) {
            throw new AuthorizationException('You are not authorized to edit this review.');
        }

        $request->validate([
            'id_sample' => 'required',
            'nb_etoiles' => 'required',
            'commentaire' => 'required',
            'identifiant' => 'required',
            'efface' => 'required',
        ]);

        $review->update($request->all());

        return redirect()->route('review.index');
    }


    public function destroy($id)
    {
        $review = Review::find($id);
        if (Gate::denies('edit-review', $review)) {
            throw new AuthorizationException('You are not authorized to delete this review.');
        }
        $review->delete();

        return redirect()->route('review.index');
    }
}

