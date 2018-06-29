<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Book;

class ReviewsController extends Controller
{
    public function index()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $reviews = $user->feed_reviews()->orderBy('created_at', 'desc')->paginate(10);

            $data = [
                'user' => $user,
                'reviews' => $reviews,
            ];
            $data += $this->counts($user);
            return view('users.show', $data);
        }else {
            return view('welcome',$data);
        }
    }
    
    public function create(Request $request)
    {
        $user=\Auth::user();
        $item=Book::find($request->item_id);
        return view('reviews.create',[
        'user' => $user,
        'item' => $item,
        ]);
    }
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'content' => 'required|max:1000',
            'book_id' => 'required',
        ]);

        $request->user()->reviews()->create([
            'content' => $request->content,
            'book_id'=> $request->book_id,
        ]);

        return redirect(route('users.show', \Auth::user()->id));
    }
    
    public function destroy($id)
    {
        $review = \App\Review::find($id);

        if (\Auth::id() === $review->user_id) {
            $review->delete();
        }

        return redirect()->back();
    }
}
