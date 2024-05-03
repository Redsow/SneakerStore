<?php

namespace App\Http\Controllers;
use App\Models\Review;

use Illuminate\Http\Request;

class ReviewsController extends Controller
{
    public function allReviews()
    {
        $reviews = Review::with('user')->get();
        return view('reviews', compact('reviews'));
    }


    public function CreateReview()
    {
        return view('create_review');
    }

    public function storeReview(Request $request)
    {
        $request->validate([
            'comment' => 'required',
            'rating' => 'required|numeric|min:1|max:5',
        ]);

        $user_id = auth()->id();

        Review::create([
            'user_id' => $user_id,
            'comment' => $request->comment,
            'rating' => $request->rating,
        ]);

        return redirect()->route('reviews')->with('success', 'Review added successfully.');
    }

}



