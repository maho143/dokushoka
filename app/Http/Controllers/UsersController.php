<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Book;
use App\Review;

class UsersController extends Controller
{
    public function show($id)
    {
        $user = User::find($id);
        $count_want = $user->want_books()->count();
        $count_read = $user->read_books()->count();
        $items = \DB::table('books')->join('book_user', 'books.id', '=', 'book_user.book_id')->select('books.*')->where('book_user.user_id', $user->id)->distinct()->paginate(20);
        $want_items = $user->want_books();
        $read_items = $user->read_books()->paginate(20);
        $reviews = $user->reviews()->orderBy('created_at', 'desc')->paginate(10);

        $data = [
            'user' => $user,
            'reviews' => $reviews,
            'items' => $items,
            'want_items' => $want_items,
            'read_items' => $read_items,
            'count_want' => $count_want,
            'count_read' => $count_read,
        ];

        $data += $this->counts($user);

        return view('users.show', $data);
    }
    
    public function index()
    {
        $users = User::paginate(10);
        
        return view('users.index', [
            'users' => $users,
        ]);
    }
    
    public function followings($id)
    {
        $user = User::find($id);
        $followings = $user->followings()->paginate(10);

        $data = [
            'user' => $user,
            'users' => $followings,
        ];

        $data += $this->counts($user);

        return view('users.followings', $data);
    }

    public function followers($id)
    {
        $user = User::find($id);
        $followers = $user->followers()->paginate(10);

        $data = [
            'user' => $user,
            'users' => $followers,
        ];

        $data += $this->counts($user);

        return view('users.followers', $data);
    }
}
